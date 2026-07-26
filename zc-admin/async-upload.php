<?php
/**
 * Server-side file upload handler from zc-plupload or other asynchronous upload methods.
 *
 * @package ZelocoreCMS
 * @subpackage Administration
 */

if ( isset( $_REQUEST['action'] ) && 'upload-attachment' === $_REQUEST['action'] ) {
	define( 'DOING_AJAX', true );
}

if ( ! defined( 'ZC_ADMIN' ) ) {
	define( 'ZC_ADMIN', true );
}

/** Load ZelocoreCMS Bootstrap */
require_once dirname( __DIR__ ) . '/zc-load.php';

require_once ABSPATH . 'zc-admin/admin.php';

header( 'Content-Type: text/plain; charset=' . get_option( 'blog_charset' ) );

if ( isset( $_REQUEST['action'] ) && 'upload-attachment' === $_REQUEST['action'] ) {
	require ABSPATH . 'zc-admin/includes/ajax-actions.php';

	send_nosniff_header();
	nocache_headers();

	zc_ajax_upload_attachment();
	die( '0' );
}

if ( ! current_user_can( 'upload_files' ) ) {
	zc_die( __( 'Sorry, you are not allowed to upload files.' ) );
}

// Just fetch the detail form for that attachment.
if ( isset( $_REQUEST['attachment_id'] ) && (int) $_REQUEST['attachment_id'] && $_REQUEST['fetch'] ) {
	$id   = (int) $_REQUEST['attachment_id'];
	$post = get_post( $id );
	if ( 'attachment' !== $post->post_type ) {
		zc_die( __( 'Invalid post type.' ) );
	}

	switch ( $_REQUEST['fetch'] ) {
		case 3:
			?>
			<div class="media-item-wrapper">
				<div class="attachment-details">
					<?php
					$thumb_url = zc_get_attachment_image_src( $id, 'thumbnail', true );
					if ( $thumb_url ) {
						echo '<img class="pinkynail" src="' . esc_url( $thumb_url[0] ) . '" alt="" />';
					}

					// Title shouldn't ever be empty, but use filename just in case.
					$file     = get_attached_file( $post->ID );
					$file_url = zc_get_attachment_url( $post->ID );
					$title    = $post->post_title ? $post->post_title : zc_basename( $file );
					?>
					<div class="filename new">
						<span class="media-list-title word-wrap-break-word"><strong><?php echo esc_html( zc_html_excerpt( $title, 60, '&hellip;' ) ); ?></strong></span>
						<span class="media-list-subtitle word-wrap-break-word"><?php echo esc_html( zc_basename( $file ) ); ?></span>
						<div class="attachment-tools">
							<?php
							if ( current_user_can( 'edit_post', $id ) ) {
								echo '<a class="edit-attachment" href="' . esc_url( get_edit_post_link( $id ) ) . '">' . _x( 'Edit', 'media item' ) . '</a>';
							} else {
								echo '<span class="edit-attachment">' . _x( 'Success', 'media item' ) . '</span>';
							}
							?>
							<span class="media-item-copy-container copy-to-clipboard-container edit-attachment">
								<button type="button" class="button button-small copy-attachment-url"
									data-clipboard-text="<?php echo esc_url( $file_url ); ?>"
								><?php _e( 'Copy URL to clipboard' ); ?></button>
								<span class="success hidden" aria-hidden="true"><?php _e( 'Copied!' ); ?></span>
							</span>
						</div>
					</div>
				</div>
			</div>
			<?php
			break;
		case 2:
			add_filter( 'attachment_fields_to_edit', 'media_single_attachment_fields_to_edit', 10, 2 );
			echo get_media_item(
				$id,
				array(
					'send'   => false,
					'delete' => true,
				)
			);
			break;
		default:
			add_filter( 'attachment_fields_to_edit', 'media_post_single_attachment_fields_to_edit', 10, 2 );
			echo get_media_item( $id );
			break;
	}
	exit;
}

check_admin_referer( 'media-form' );

$post_id = 0;
if ( isset( $_REQUEST['post_id'] ) ) {
	$post_id = absint( $_REQUEST['post_id'] );
	if ( ! get_post( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
		$post_id = 0;
	}
}

$id = media_handle_upload( 'async-upload', $post_id );
if ( is_zc_error( $id ) ) {
	$button_unique_id     = uniqid( 'dismiss-' );
	$error_description_id = uniqid( 'error-description-' );
	$message              = sprintf(
		'%s <strong>%s</strong><br />%s',
		sprintf(
			'<button type="button" id="%1$s" class="dismiss button-link" aria-describedby="%2$s">%3$s</button>',
			esc_attr( $button_unique_id ),
			esc_attr( $error_description_id ),
			__( 'Dismiss' )
		),
		sprintf(
			/* translators: %s: Name of the file that failed to upload. */
			__( '&#8220;%s&#8221; has failed to upload.' ),
			esc_html( $_FILES['async-upload']['name'] )
		),
		esc_html( $id->get_error_message() )
	);

	zc_admin_notice(
		$message,
		array(
			'id'                 => $error_description_id,
			'additional_classes' => array( 'error-div', 'error' ),
			'paragraph_wrap'     => false,
		)
	);

	$speak_message = sprintf(
		/* translators: %s: Name of the file that failed to upload. */
		__( '%s has failed to upload.' ),
		$_FILES['async-upload']['name']
	);

	echo '<script>_.delay(function() {zc.a11y.speak(' . zc_json_encode( $speak_message, JSON_HEX_TAG | JSON_UNESCAPED_SLASHES ) . ");}, 1500);jQuery( 'button#{$button_unique_id}' ).on( 'click', function() {jQuery(this).parents('div.media-item').slideUp(200, function(){jQuery(this).remove();zc.a11y.speak( zc.i18n.__( 'Error dismissed.' ) );jQuery( '#plupload-browse-button' ).trigger( 'focus' );})});</script>\n";
	exit;
}

if ( $_REQUEST['short'] ) {
	// Short form response - attachment ID only.
	echo $id;
} else {
	// Long form response - big chunk of HTML.
	$type = $_REQUEST['type'];

	/**
	 * Filters the returned ID of an uploaded attachment.
	 *
	 * The dynamic portion of the hook name, `$type`, refers to the attachment type.
	 *
	 * Possible hook names include:
	 *
	 *  - `async_upload_audio`
	 *  - `async_upload_file`
	 *  - `async_upload_image`
	 *  - `async_upload_video`
	 *
	 * @since 2.5.0
	 *
	 * @param int $id Uploaded attachment ID.
	 */
	echo apply_filters( "async_upload_{$type}", $id );
}
