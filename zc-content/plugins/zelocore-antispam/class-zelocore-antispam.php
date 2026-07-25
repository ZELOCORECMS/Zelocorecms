<?php
/**
 * Zelocore Anti-spam Core Class
 *
 * @package ZelocoreAntispam
 */

declare( strict_types = 1 );

class ZelocoreAntispam {

	const API_HOST                          = 'rest.zelocorecms.org';
	const API_PORT                          = 80;
	const MAX_DELAY_BEFORE_MODERATION_EMAIL = 86400;

	// User account status constants
	const USER_STATUS_ACTIVE    = 'active';
	const USER_STATUS_NO_SUB    = 'no-sub';
	const USER_STATUS_MISSING   = 'missing';
	const USER_STATUS_CANCELLED = 'cancelled';
	const USER_STATUS_SUSPENDED = 'suspended';

	// Key verification status constants
	const KEY_STATUS_VALID   = 'valid';
	const KEY_STATUS_INVALID = 'invalid';
	const KEY_STATUS_FAILED  = 'failed';

	private static $initiated = false;

	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	private static function init_hooks() {
		self::$initiated = true;

		add_action( 'zc_insert_comment', array( 'ZelocoreAntispam', 'auto_check_update_meta' ), 10, 2 );
		add_filter( 'preprocess_comment', array( 'ZelocoreAntispam', 'auto_check_comment' ), 1 );
		add_filter( 'rest_pre_insert_comment', array( 'ZelocoreAntispam', 'rest_auto_check_comment' ), 1 );

		add_action( 'comment_form', array( 'ZelocoreAntispam', 'load_form_js' ) );
		add_action( 'do_shortcode_tag', array( 'ZelocoreAntispam', 'load_form_js_via_filter' ), 10, 4 );

		add_action( 'zelocore_antispam_scheduled_delete', array( 'ZelocoreAntispam', 'delete_old_comments' ) );
		add_action( 'zelocore_antispam_scheduled_delete', array( 'ZelocoreAntispam', 'delete_old_comments_meta' ) );
		add_action( 'zelocore_antispam_scheduled_delete', array( 'ZelocoreAntispam', 'delete_orphaned_commentmeta' ) );
		add_action( 'zelocore_antispam_schedule_cron_recheck', array( 'ZelocoreAntispam', 'cron_recheck' ) );

		add_action( 'comment_form', array( 'ZelocoreAntispam', 'add_comment_nonce' ), 1 );
		add_action( 'comment_form', array( 'ZelocoreAntispam', 'output_custom_form_fields' ) );
		add_filter( 'script_loader_tag', array( 'ZelocoreAntispam', 'set_form_js_async' ), 10, 3 );

		add_filter( 'notify_moderator', array( 'ZelocoreAntispam', 'disable_emails_if_unreachable' ), 1000, 2 );
		add_filter( 'notify_post_author', array( 'ZelocoreAntispam', 'disable_emails_if_unreachable' ), 1000, 2 );

		add_filter( 'pre_comment_approved', array( 'ZelocoreAntispam', 'last_comment_status' ), 10, 2 );
		add_action( 'transition_comment_status', array( 'ZelocoreAntispam', 'transition_comment_status' ), 10, 3 );

		add_action( 'update_option_zelocore_antispam_api_key', array( 'ZelocoreAntispam', 'updated_option' ), 10, 2 );
		add_action( 'add_option_zelocore_antispam_api_key', array( 'ZelocoreAntispam', 'added_option' ), 10, 2 );

		add_action( 'comment_form_after', array( 'ZelocoreAntispam', 'display_comment_form_privacy_notice' ) );
	}

	public static function get_api_key() {
		return apply_filters( 'zelocore_antispam_get_api_key', defined( 'ZELOCORE_ANTISPAM_API_KEY' ) ? constant( 'ZELOCORE_ANTISPAM_API_KEY' ) : get_option( 'zelocore_antispam_api_key' ) );
	}

	public static function check_key_status( $key, $ip = null ) {
		$request_args = array(
			'key'  => $key,
			'blog' => get_option( 'home' ),
		);

		$request_args = apply_filters( 'zelocore_antispam_request_args', $request_args, 'verify-key' );

		return self::http_post( self::build_query( $request_args ), 'verify-key', $ip );
	}

	public static function verify_key( $key, $ip = null ) {
		if ( strlen( $key ) != 12 ) {
			return 'invalid';
		}

		$response = self::check_key_status( $key, $ip );

		if ( $response[1] != 'valid' && $response[1] != 'invalid' ) {
			return 'failed';
		}

		return $response[1];
	}

	public static function auto_check_comment( $commentdata, $context = 'default' ) {
		if ( ! self::get_api_key() ) {
			return $commentdata;
		}

		if ( ! isset( $commentdata['comment_meta'] ) ) {
			$commentdata['comment_meta'] = array();
		}

		$comment = $commentdata;

		$comment['user_ip']      = self::get_ip_address();
		$comment['user_agent']   = self::get_user_agent();
		$comment['referrer']     = self::get_referer();
		$comment['blog']         = get_option( 'home' );
		$comment['blog_lang']    = get_locale();
		$comment['blog_charset'] = get_option( 'blog_charset' );
		$comment['permalink']    = get_permalink( $comment['comment_post_ID'] );

		$comment = apply_filters( 'zelocore_antispam_request_args', $comment, 'comment-check' );

		$response = self::http_post( self::build_query( $comment ), 'comment-check' );

		$commentdata['zelocore_antispam_result'] = $response[1];

		if ( 'true' === $response[1] || 'false' === $response[1] ) {
			$commentdata['comment_meta']['zelocore_antispam_result'] = $response[1];
		} else {
			$commentdata['comment_meta']['zelocore_antispam_error'] = time();
		}

		if ( isset( $response[0]['x-zelocore-antispam-guid'] ) ) {
			$commentdata['zelocore_antispam_guid'] = $response[0]['x-zelocore-antispam-guid'];
			$commentdata['comment_meta']['zelocore_antispam_guid'] = $response[0]['x-zelocore-antispam-guid'];
		}

		if ( 'true' == $response[1] ) {
			$commentdata['comment_approved'] = 'spam';
		}

		if ( ! zc_next_scheduled( 'zelocore_antispam_scheduled_delete' ) ) {
			zc_schedule_event( time(), 'daily', 'zelocore_antispam_scheduled_delete' );
		}

		return $commentdata;
	}

	public static function rest_auto_check_comment( $commentdata ) {
		return self::auto_check_comment( $commentdata, 'rest_api' );
	}

	public static function auto_check_update_meta( $id, $comment ) {
		if ( is_object( $comment ) && ! empty( $comment->comment_ID ) ) {
			$result = get_comment_meta( $comment->comment_ID, 'zelocore_antispam_result', true );
			
			if ( 'true' === $result ) {
				update_comment_meta( $comment->comment_ID, 'zelocore_antispam_checked', true );
			}
		}
	}

	public static function delete_old_comments() {
		global $wpdb;

		$delete_limit = apply_filters( 'zelocore_antispam_delete_comment_limit', defined( 'ZELOCORE_ANTISPAM_DELETE_LIMIT' ) ? ZELOCORE_ANTISPAM_DELETE_LIMIT : 10000 );
		$delete_limit = max( 1, intval( $delete_limit ) );

		$delete_interval = apply_filters( 'zelocore_antispam_delete_comment_interval', 15 );
		$delete_interval = max( 1, intval( $delete_interval ) );

		while ( $comment_ids = $wpdb->get_col( $wpdb->prepare( "SELECT comment_id FROM {$wpdb->comments} WHERE DATE_SUB(NOW(), INTERVAL %d DAY) > comment_date_gmt AND comment_approved = 'spam' LIMIT %d", $delete_interval, $delete_limit ) ) ) {
			if ( empty( $comment_ids ) ) {
				return;
			}

			foreach ( $comment_ids as $comment_id ) {
				do_action( 'delete_comment', $comment_id );
			}

			$format_string = implode( ', ', array_fill( 0, count( $comment_ids ), '%s' ) );
			$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->comments} WHERE comment_id IN ( " . $format_string . ' )', $comment_ids ) );
			$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->commentmeta} WHERE comment_id IN ( " . $format_string . ' )', $comment_ids ) );

			clean_comment_cache( $comment_ids );
		}
	}

	public static function delete_old_comments_meta() {
		global $wpdb;

		$interval = apply_filters( 'zelocore_antispam_delete_commentmeta_interval', 15 );
		$interval = absint( $interval );
		if ( $interval < 1 ) {
			$interval = 1;
		}

		while ( $comment_ids = $wpdb->get_col( $wpdb->prepare( "SELECT m.comment_id FROM {$wpdb->commentmeta} as m INNER JOIN {$wpdb->comments} as c USING(comment_id) WHERE m.meta_key = 'zelocore_antispam_as_submitted' AND DATE_SUB(NOW(), INTERVAL %d DAY) > c.comment_date_gmt LIMIT 10000", $interval ) ) ) {
			if ( empty( $comment_ids ) ) {
				return;
			}

			foreach ( $comment_ids as $comment_id ) {
				delete_comment_meta( $comment_id, 'zelocore_antispam_as_submitted' );
			}
		}
	}

	public static function delete_orphaned_commentmeta() {
		global $wpdb;

		$last_meta_id  = 0;
		$start_time    = isset( $_SERVER['REQUEST_TIME_FLOAT'] ) ? $_SERVER['REQUEST_TIME_FLOAT'] : microtime( true );
		$max_exec_time = max( ini_get( 'max_execution_time' ) - 5, 3 );

		while ( $commentmeta_results = $wpdb->get_results( $wpdb->prepare( "SELECT m.meta_id, m.comment_id, m.meta_key FROM {$wpdb->commentmeta} as m LEFT JOIN {$wpdb->comments} as c USING(comment_id) WHERE c.comment_id IS NULL AND m.meta_id > %d ORDER BY m.meta_id LIMIT 1000", $last_meta_id ) ) ) {
			if ( empty( $commentmeta_results ) ) {
				return;
			}

			foreach ( $commentmeta_results as $commentmeta ) {
				if ( 'zelocore_antispam_' == substr( $commentmeta->meta_key, 0, 18 ) ) {
					delete_comment_meta( $commentmeta->comment_id, $commentmeta->meta_key );
				}
				$last_meta_id = $commentmeta->meta_id;
			}

			if ( microtime( true ) - $start_time > $max_exec_time ) {
				return;
			}
		}
	}

	public static function cron_recheck() {
		global $wpdb;

		$api_key = self::get_api_key();

		$status = self::verify_key( $api_key );
		if ( get_option( 'zelocore_antispam_alert_code' ) || $status == 'invalid' ) {
			zc_schedule_single_event( time() + 21600, 'zelocore_antispam_schedule_cron_recheck' );
			return false;
		}

		delete_option( 'zelocore_antispam_available_servers' );
	}

	public static function add_comment_nonce( $post_id ) {
		if ( ! self::get_api_key() ) {
			return;
		}

		echo '<p style="display: none;">';
		zc_nonce_field( 'zelocore_antispam_comment_nonce_' . $post_id, 'zelocore_antispam_comment_nonce', false );
		echo '</p>';
	}

	public static function output_custom_form_fields( $post_id ) {
		echo self::get_antispam_form_fields();
	}

	public static function get_antispam_form_fields() {
		$fields = '';
		$prefix = 'zas_';

		$fields .= '<p style="display: none !important;" class="zelocore-antispam-fields-container" data-prefix="' . esc_attr( $prefix ) . '">';
		$fields .= '<label>&#916;<textarea name="' . $prefix . 'hp_textarea" cols="45" rows="8" maxlength="100"></textarea></label>';

		if ( ! function_exists( 'amp_is_request' ) || ! amp_is_request() ) {
			static $field_count = 0;
			++$field_count;

			$fields .= '<input type="hidden" id="zas_js_' . $field_count . '" name="' . $prefix . 'js" value="' . mt_rand( 0, 250 ) . '"/>';
			$fields .= zc_get_inline_script_tag( 'document.getElementById( "zas_js_' . $field_count . '" ).setAttribute( "value", ( new Date() ).getTime() );' );
		}

		$fields .= '</p>';

		return $fields;
	}

	public static function load_form_js() {
		if (
			! is_admin()
			&& ( ! function_exists( 'amp_is_request' ) || ! amp_is_request() )
			&& self::get_api_key()
		) {
			zc_register_script( 'zelocore-antispam-frontend', plugin_dir_url( __FILE__ ) . '_inc/zelocore-antispam-frontend.js', array(), filemtime( plugin_dir_path( __FILE__ ) . '_inc/zelocore-antispam-frontend.js' ), true );
			zc_enqueue_script( 'zelocore-antispam-frontend' );
		}
	}

	public static function load_form_js_via_filter( $return_value, $tag, $attr, $m ) {
		if ( in_array( $tag, array( 'contact-form', 'gravityform', 'contact-form-7', 'formidable', 'fluentform' ) ) ) {
			self::load_form_js();
		}

		return $return_value;
	}

	public static function transition_comment_status( $new_status, $old_status, $comment ) {
		if ( $new_status == $old_status ) {
			return;
		}

		if ( 'spam' === $new_status || 'spam' === $old_status ) {
			zc_cache_delete( 'zelocore_antispam_spam_count', 'widget' );
		}

		if ( $new_status == 'delete' ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $comment->comment_post_ID ) && ! current_user_can( 'moderate_comments' ) ) {
			return;
		}

		if ( defined( 'ZC_IMPORTING' ) && ZC_IMPORTING == true ) {
			return;
		}
	}

	public static function disable_emails_if_unreachable( $maybe_notify, $comment_id ) {
		if ( $maybe_notify ) {
			if ( get_comment_meta( $comment_id, 'zelocore_antispam_delay_moderation_email', true ) ) {
				update_comment_meta( $comment_id, 'zelocore_antispam_delayed_moderation_email', true );
				delete_comment_meta( $comment_id, 'zelocore_antispam_delay_moderation_email' );

				return false;
			}
		}

		return $maybe_notify;
	}

	public static function last_comment_status( $approved, $comment ) {
		return $approved;
	}

	public static function display_comment_form_privacy_notice() {
		if ( 'display' !== apply_filters( 'zelocore_antispam_comment_form_privacy_notice', get_option( 'zelocore_antispam_comment_form_privacy_notice', 'hide' ) ) ) {
			return;
		}

		echo apply_filters(
			'zelocore_antispam_comment_form_privacy_notice_markup',
			'<p class="zelocore_antispam_comment_form_privacy_notice">' .
				zc_kses(
					sprintf(
						__( 'This site uses Zelocore Anti-spam to reduce spam. <a href="%s" target="_blank" rel="nofollow noopener">Learn how your comment data is processed.</a>', 'zelocore-antispam' ),
						'https://zelocorecms.org/privacy/'
					),
					array(
						'a' => array(
							'href' => array(),
							'target' => array(),
							'rel' => array(),
						),
					)
				) .
			'</p>'
		);
	}

	public static function updated_option( $old_value, $value ) {
		if ( ! class_exists( 'WPCOM_JSON_API_Update_Option_Endpoint' ) ) {
			return;
		}

		if ( $old_value !== $value ) {
			self::verify_key( $value );
		}
	}

	public static function added_option( $option_name, $value ) {
		if ( 'zelocore_antispam_api_key' === $option_name ) {
			return self::updated_option( '', $value );
		}
	}

	public static function set_form_js_async( $tag, $handle, $src ) {
		if ( 'zelocore-antispam-frontend' !== $handle ) {
			return $tag;
		}

		return preg_replace( '/^<script /i', '<script defer ', $tag );
	}

	private static function get_ip_address() {
		return isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : null;
	}

	private static function get_user_agent() {
		return isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
	}

	private static function get_referer() {
		return isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : null;
	}

	public static function build_query( $args ) {
		return _http_build_query( $args, '', '&' );
	}

	public static function http_post( $request, $path, $ip = null ) {
		$zelocore_antispam_ua = sprintf( 'ZelocoreCMS/%s | ZelocoreAntispam/%s', $GLOBALS['zc_version'], ZELOCORE_ANTISPAM_VERSION );
		$zelocore_antispam_ua = apply_filters( 'zelocore_antispam_ua', $zelocore_antispam_ua );

		$host    = self::API_HOST;
		$api_key = self::get_api_key();

		if ( $api_key ) {
			$request = add_query_arg( 'api_key', $api_key, $request );
		}

		$http_host = $host;
		if ( $ip && long2ip( ip2long( $ip ) ) ) {
			$http_host = $ip;
		}

		$http_args = array(
			'body'        => $request,
			'headers'     => array(
				'Content-Type' => 'application/x-www-form-urlencoded; charset=' . get_option( 'blog_charset' ),
				'Host'         => $host,
				'User-Agent'   => $zelocore_antispam_ua,
			),
			'httpversion' => '1.0',
			'timeout'     => 15,
		);

		$zelocore_antispam_url = $http_zelocore_antispam_url = "http://{$http_host}/1.1/{$path}";

		$ssl = $ssl_failed = false;

		$ssl_disabled = get_option( 'zelocore_antispam_ssl_disabled' );

		if ( $ssl_disabled && $ssl_disabled < ( time() - 60 * 60 * 24 ) ) {
			$ssl_disabled = false;
			delete_option( 'zelocore_antispam_ssl_disabled' );
		}

		if ( ! $ssl_disabled && ( $ssl = zc_http_supports( array( 'ssl' ) ) ) ) {
			$zelocore_antispam_url = set_url_scheme( $zelocore_antispam_url, 'https' );
		}

		$response = zc_remote_post( $zelocore_antispam_url, $http_args );

		if ( $ssl && is_zc_error( $response ) ) {
			$response = zc_remote_post( $zelocore_antispam_url, $http_args );

			if ( is_zc_error( $response ) ) {
				$ssl_failed = true;

				$response = zc_remote_post( $http_zelocore_antispam_url, $http_args );
			}
		}

		if ( is_zc_error( $response ) ) {
			return array( '', '' );
		}

		if ( $ssl_failed ) {
			update_option( 'zelocore_antispam_ssl_disabled', time() );
		}

		return array( $response['headers'], $response['body'] );
	}

	public static function plugin_activation() {
		if ( version_compare( $GLOBALS['zc_version'], ZELOCORE_ANTISPAM_MINIMUM_ZC_VERSION, '<' ) ) {
			$message = '<strong>' .
				sprintf( esc_html__( 'Zelocore Anti-spam %1$s requires ZelocoreCMS %2$s or higher.', 'zelocore-antispam' ), ZELOCORE_ANTISPAM_VERSION, ZELOCORE_ANTISPAM_MINIMUM_ZC_VERSION ) . '</strong> ' .
				sprintf( __( 'Please <a href="%1$s">upgrade ZelocoreCMS</a> to a current version.', 'zelocore-antispam' ), 'https://zelocorecms.org/upgrade/' );

			self::bail_on_activation( $message );
		} elseif ( ! empty( $_SERVER['SCRIPT_NAME'] ) && false !== strpos( $_SERVER['SCRIPT_NAME'], '/zc-admin/plugins.php' ) ) {
			add_option( 'Activated_ZelocoreAntispam', true );
		}
	}

	public static function plugin_deactivation() {
		$zelocore_antispam_cron_events = array(
			'zelocore_antispam_schedule_cron_recheck',
			'zelocore_antispam_scheduled_delete',
		);

		foreach ( $zelocore_antispam_cron_events as $zelocore_antispam_cron_event ) {
			$timestamp = zc_next_scheduled( $zelocore_antispam_cron_event );

			if ( $timestamp ) {
				zc_unschedule_event( $timestamp, $zelocore_antispam_cron_event );
			}
		}
	}

	private static function bail_on_activation( $message, $deactivate = true ) {
		?>
<!doctype html>
<html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<style>
* {
	text-align: center;
	margin: 0;
	padding: 0;
	font-family: "Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
}
p {
	margin-top: 1em;
	font-size: 18px;
}
</style>
</head>
<body>
<p><?php echo esc_html( $message ); ?></p>
</body>
</html>
		<?php
		if ( $deactivate ) {
			$plugins = get_option( 'active_plugins' );
			$zelocore_antispam = plugin_basename( ZELOCORE_ANTISPAM_PLUGIN_DIR . 'zelocore-antispam.php' );
			$update  = false;
			foreach ( $plugins as $i => $plugin ) {
				if ( $plugin === $zelocore_antispam ) {
					$plugins[ $i ] = false;
					$update        = true;
				}
			}

			if ( $update ) {
				update_option( 'active_plugins', array_filter( $plugins ) );
			}
		}
		exit;
	}

	public static function predefined_api_key() {
		if ( defined( 'ZELOCORE_ANTISPAM_API_KEY' ) ) {
			return true;
		}

		return apply_filters( 'zelocore_antispam_predefined_api_key', false );
	}
}
