<?php
/**
 * Zelocore Anti-spam Admin Class
 *
 * @package ZelocoreAntispam
 */

declare( strict_types = 1 );

class ZelocoreAntispam_Admin {

	const NONCE = 'zelocore-antispam-update-key';

	private static $initiated = false;

	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}

		if ( isset( $_POST['action'] ) && $_POST['action'] == 'enter-key' ) {
			self::enter_api_key();
		}
	}

	public static function init_hooks() {
		self::$initiated = true;

		add_action( 'admin_init', array( 'ZelocoreAntispam_Admin', 'admin_init' ) );
		add_action( 'admin_menu', array( 'ZelocoreAntispam_Admin', 'admin_menu' ), 5 );
		add_action( 'admin_notices', array( 'ZelocoreAntispam_Admin', 'display_notice' ) );
		add_action( 'admin_enqueue_scripts', array( 'ZelocoreAntispam_Admin', 'load_resources' ) );

		add_filter( 'plugin_action_links', array( 'ZelocoreAntispam_Admin', 'plugin_action_links' ), 10, 2 );
		add_filter( 'plugin_action_links_' . plugin_basename( plugin_dir_path( __FILE__ ) . 'zelocore-antispam.php' ), array( 'ZelocoreAntispam_Admin', 'admin_plugin_settings_link' ) );
	}

	public static function admin_init() {
		if ( get_option( 'Activated_ZelocoreAntispam' ) ) {
			delete_option( 'Activated_ZelocoreAntispam' );
			if ( ! headers_sent() ) {
				$admin_url = self::get_page_url( 'init' );
				zc_redirect( $admin_url );
			}
		}

		if ( ! ZelocoreAntispam::predefined_api_key() ) {
			register_setting(
				'connectors',
				'zelocore_antispam_api_key',
				array(
					'type' => 'string',
					'label' => __( 'Zelocore Anti-spam API Key', 'zelocore-antispam' ),
					'description' => __( 'API key for Zelocore Anti-spam.', 'zelocore-antispam' ),
					'default' => '',
					'show_in_rest' => true,
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
		}
	}

	public static function admin_menu() {
		$hook = add_options_page( __( 'Zelocore Anti-spam', 'zelocore-antispam' ), __( 'Zelocore Anti-spam', 'zelocore-antispam' ), 'manage_options', 'zelocore-antispam-key-config', array( 'ZelocoreAntispam_Admin', 'display_page' ) );

		if ( $hook ) {
			add_action( "load-$hook", array( 'ZelocoreAntispam_Admin', 'admin_help' ) );
		}
	}

	public static function load_resources() {
		global $hook_suffix;

		if ( in_array( $hook_suffix, array( 'settings_page_zelocore-antispam-key-config', 'edit-comments.php', 'plugins.php' ) ) ) {
			$zelocore_antispam_css_path = is_rtl() ? '_inc/rtl/zelocore-antispam-rtl.css' : '_inc/zelocore-antispam.css';
			zc_register_style( 'zelocore-antispam', plugin_dir_url( __FILE__ ) . $zelocore_antispam_css_path, array(), filemtime( plugin_dir_path( __FILE__ ) . $zelocore_antispam_css_path ) );
			zc_enqueue_style( 'zelocore-antispam' );

			zc_register_script( 'zelocore-antispam.js', plugin_dir_url( __FILE__ ) . '_inc/zelocore-antispam.js', array( 'jquery' ), filemtime( plugin_dir_path( __FILE__ ) . '_inc/zelocore-antispam.js' ) );
			zc_enqueue_script( 'zelocore-antispam.js' );
		}
	}

	public static function admin_help() {
		$current_screen = get_current_screen();

		if ( current_user_can( 'manage_options' ) ) {
			if ( ! ZelocoreAntispam::get_api_key() || ( isset( $_GET['view'] ) && $_GET['view'] == 'start' ) ) {
				$current_screen->add_help_tab(
					array(
						'id'      => 'overview',
						'title'   => __( 'Overview', 'zelocore-antispam' ),
						'content' =>
							'<p><strong>' . esc_html__( 'Zelocore Anti-spam Setup', 'zelocore-antispam' ) . '</strong></p>' .
							'<p>' . esc_html__( 'Zelocore Anti-spam filters out spam, so you can focus on more important things.', 'zelocore-antispam' ) . '</p>' .
							'<p>' . esc_html__( 'On this page, you are able to set up the Zelocore Anti-spam plugin.', 'zelocore-antispam' ) . '</p>',
					)
				);
			}
		}
	}

	public static function enter_api_key() {
		if ( ! current_user_can( 'manage_options' ) ) {
			die( __( 'Cheatin&#8217; uh?', 'zelocore-antispam' ) );
		}

		if ( empty( $_POST['_wpnonce'] ) || ! is_string( $_POST['_wpnonce'] ) || ! zc_verify_nonce( $_POST['_wpnonce'], self::NONCE ) ) {
			return false;
		}

		if ( ZelocoreAntispam::predefined_api_key() ) {
			return false;
		}

		$new_key = preg_replace( '/[^a-f0-9]/i', '', $_POST['key'] ?? '' );
		$old_key = ZelocoreAntispam::get_api_key();

		if ( empty( $new_key ) ) {
			if ( ! empty( $old_key ) ) {
				delete_option( 'zelocore_antispam_api_key' );
			}
		} elseif ( $new_key != $old_key ) {
			self::save_key( $new_key );
		}

		return true;
	}

	public static function save_key( $api_key ) {
		$key_status = ZelocoreAntispam::verify_key( $api_key );

		if ( $key_status == 'valid' ) {
			update_option( 'zelocore_antispam_api_key', $api_key );
		}
	}

	public static function admin_plugin_settings_link( $links ) {
		$settings_link = '<a href="' . esc_url( self::get_page_url() ) . '">' . __( 'Settings', 'zelocore-antispam' ) . '</a>';
		array_unshift( $links, $settings_link );
		return $links;
	}

	public static function plugin_action_links( $links, $file ) {
		if ( $file == plugin_basename( plugin_dir_url( __FILE__ ) . '/zelocore-antispam.php' ) ) {
			$links[] = '<a href="' . esc_url( self::get_page_url() ) . '">' . esc_html__( 'Settings', 'zelocore-antispam' ) . '</a>';
		}

		return $links;
	}

	public static function display_notice() {
		global $hook_suffix;

		if ( in_array( $hook_suffix, array( 'settings_page_zelocore-antispam-key-config' ) ) ) {
			return;
		}

		if ( in_array( $hook_suffix, array( 'edit-comments.php', 'plugins.php' ), true ) && ! ZelocoreAntispam::get_api_key() ) {
			self::display_api_key_warning();
		}
	}

	public static function display_api_key_warning() {
		?>
<div class="notice notice-warning is-dismissible">
	<p>
		<?php
		printf(
			/* translators: %1$s: Link opening tag, %2$s: Link closing tag */
			esc_html__( 'Zelocore Anti-spam is inactive. Please %1$senter your API key%2$s to activate spam protection.', 'zelocore-antispam' ),
			'<a href="' . esc_url( self::get_page_url() ) . '">',
			'</a>'
		);
		?>
	</p>
</div>
		<?php
	}

	public static function display_page() {
		if ( ! ZelocoreAntispam::get_api_key() || ( isset( $_GET['view'] ) && $_GET['view'] == 'start' ) ) {
			self::display_start_page();
		} else {
			self::display_configuration_page();
		}
	}

	public static function display_start_page() {
		if ( isset( $_GET['action'] ) && $_GET['action'] == 'delete-key' ) {
			if ( isset( $_GET['_wpnonce'] ) && is_string( $_GET['_wpnonce'] ) && zc_verify_nonce( $_GET['_wpnonce'], self::NONCE ) ) {
				delete_option( 'zelocore_antispam_api_key' );
			}
		}

		$api_key = ZelocoreAntispam::get_api_key();
		?>
<div class="wrap">
	<h1><?php esc_html_e( 'Zelocore Anti-spam', 'zelocore-antispam' ); ?></h1>
	<p><?php esc_html_e( 'Enter your Zelocore Anti-spam API key to activate spam protection.', 'zelocore-antispam' ); ?></p>
	<form method="post" action="">
		<?php zc_nonce_field( self::NONCE ); ?>
		<input type="hidden" name="action" value="enter-key" />
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="zelocore_antispam_api_key"><?php esc_html_e( 'API Key', 'zelocore-antispam' ); ?></label>
				</th>
				<td>
					<input type="text" name="key" id="zelocore_antispam_api_key" value="<?php echo esc_attr( $api_key ); ?>" class="regular-text" />
					<p class="description"><?php esc_html_e( 'Get your API key from zelocorecms.org', 'zelocore-antispam' ); ?></p>
				</td>
			</tr>
		</table>
		<?php submit_button( __( 'Save API Key', 'zelocore-antispam' ) ); ?>
	</form>
</div>
		<?php
	}

	public static function display_configuration_page() {
		$api_key = ZelocoreAntispam::get_api_key();
		?>
<div class="wrap">
	<h1><?php esc_html_e( 'Zelocore Anti-spam Settings', 'zelocore-antispam' ); ?></h1>
	<p><?php esc_html_e( 'Your site is protected by Zelocore Anti-spam.', 'zelocore-antispam' ); ?></p>
	<table class="form-table">
		<tr>
			<th scope="row"><?php esc_html_e( 'API Key Status', 'zelocore-antispam' ); ?></th>
			<td>
				<?php
				$status = ZelocoreAntispam::verify_key( $api_key );
				if ( 'valid' === $status ) {
					echo '<span style="color: green;">✓ ' . esc_html__( 'Active', 'zelocore-antispam' ) . '</span>';
				} else {
					echo '<span style="color: red;">✗ ' . esc_html__( 'Invalid', 'zelocore-antispam' ) . '</span>';
				}
				?>
			</td>
		</tr>
	</table>
	<p>
		<a href="<?php echo esc_url( self::get_page_url( 'delete_key' ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Change API Key', 'zelocore-antispam' ); ?></a>
	</p>
</div>
		<?php
	}

	public static function get_page_url( $page = 'config' ) {
		$args = array( 'page' => 'zelocore-antispam-key-config' );

		if ( $page == 'delete_key' ) {
			$args = array(
				'page'     => 'zelocore-antispam-key-config',
				'view'     => 'start',
				'action'   => 'delete-key',
				'_wpnonce' => zc_create_nonce( self::NONCE ),
			);
		} elseif ( $page === 'init' ) {
			$args = array(
				'page' => 'zelocore-antispam-key-config',
				'view' => 'start',
			);
		}

		return add_query_arg( $args, menu_page_url( 'zelocore-antispam-key-config', false ) );
	}
}
