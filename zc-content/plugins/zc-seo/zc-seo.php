<?php
/**
 * Plugin Name: ZelocoreCMS Advanced SEO (zc-seo)
 * Plugin URI: https://zelocorecms.org/
 * Description: The world's most advanced AI-powered SEO system for ZelocoreCMS.
 * Version: 1.0.0
 * Author: ZelocoreCMS Team
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'ZC_SEO_VERSION', '1.0.0' );
define( 'ZC_SEO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Phase 1: Basic Meta Boxes for SEO Metadata
 */

// Register the SEO Meta Box
function zc_seo_add_meta_boxes() {
	add_meta_box(
		'zc_seo_meta_box',       // ID
		'Advanced AI SEO',       // Title
		'zc_seo_meta_box_html',  // Callback
		'post',                  // Screen
		'normal',                // Context
		'high'                   // Priority
	);
}
add_action( 'add_meta_boxes', 'zc_seo_add_meta_boxes' );

// Display the Meta Box HTML
function zc_seo_meta_box_html( $post ) {
	// Add nonce for security
	wp_nonce_field( 'zc_seo_save_meta_box_data', 'zc_seo_meta_box_nonce' );
	
	// Retrieve existing values from the database
	$seo_title = get_post_meta( $post->ID, '_zc_seo_title', true );
	$seo_desc  = get_post_meta( $post->ID, '_zc_seo_description', true );
	$seo_kw    = get_post_meta( $post->ID, '_zc_seo_focus_keyword', true );

	?>
	<div style="padding: 10px 0;">
		<p>
			<label for="zc_seo_title"><strong>SEO Title</strong></label><br>
			<input type="text" id="zc_seo_title" name="zc_seo_title" value="<?php echo esc_attr( $seo_title ); ?>" style="width:100%;" />
			<small>The title displayed on search engines.</small>
		</p>
		<p>
			<label for="zc_seo_description"><strong>Meta Description</strong></label><br>
			<textarea id="zc_seo_description" name="zc_seo_description" rows="3" style="width:100%;"><?php echo esc_textarea( $seo_desc ); ?></textarea>
			<small>A short, compelling description for search results.</small>
		</p>
		<p>
			<label for="zc_seo_focus_keyword"><strong>Focus Keyword</strong></label><br>
			<input type="text" id="zc_seo_focus_keyword" name="zc_seo_focus_keyword" value="<?php echo esc_attr( $seo_kw ); ?>" style="width:100%;" />
			<small>The primary keyword you want to rank for.</small>
		</p>
		
		<div style="margin-top: 15px; padding: 10px; background: #f0f8ff; border: 1px solid #cce5ff;">
			<strong>AI Assistant (Coming Soon)</strong>
			<p>In Phase 2, click a button here to automatically generate high-converting SEO Titles and Meta Descriptions using AI.</p>
		</div>
	</div>
	<?php
}

// Save the Meta Box Data
function zc_seo_save_meta_box_data( $post_id ) {
	// Check if our nonce is set.
	if ( ! isset( $_POST['zc_seo_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['zc_seo_meta_box_nonce'], 'zc_seo_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	// Sanitize and save user input
	if ( isset( $_POST['zc_seo_title'] ) ) {
		update_post_meta( $post_id, '_zc_seo_title', sanitize_text_field( $_POST['zc_seo_title'] ) );
	}
	if ( isset( $_POST['zc_seo_description'] ) ) {
		update_post_meta( $post_id, '_zc_seo_description', sanitize_textarea_field( $_POST['zc_seo_description'] ) );
	}
	if ( isset( $_POST['zc_seo_focus_keyword'] ) ) {
		update_post_meta( $post_id, '_zc_seo_focus_keyword', sanitize_text_field( $_POST['zc_seo_focus_keyword'] ) );
	}
}
add_action( 'save_post', 'zc_seo_save_meta_box_data' );


/**
 * Output SEO tags to the frontend <head>
 */
function zc_seo_output_head_tags() {
	if ( is_single() || is_page() ) {
		global $post;
		
		$seo_title = get_post_meta( $post->ID, '_zc_seo_title', true );
		$seo_desc  = get_post_meta( $post->ID, '_zc_seo_description', true );

		if ( ! empty( $seo_title ) ) {
			// Typically we'd filter zc_title or output a direct meta tag, 
			// but we'll output OG tags and a basic meta description here.
			echo '<meta property="og:title" content="' . esc_attr( $seo_title ) . '" />' . "\n";
		}
		
		if ( ! empty( $seo_desc ) ) {
			echo '<meta name="description" content="' . esc_attr( $seo_desc ) . '" />' . "\n";
			echo '<meta property="og:description" content="' . esc_attr( $seo_desc ) . '" />' . "\n";
		}
	}
}
add_action( 'zc_head', 'zc_seo_output_head_tags', 1 );
