<?php
/**
 * Title: Overlapping images and paragraph on right
 * Slug: twentytwentyfive/overlapped-images
 * Categories: about, featured
 * Description: A section with overlapping images, and a description.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","className":"is-style-section-1","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull is-style-section-1" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--80);padding-bottom:var(--zc--preset--spacing--80)">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|80","left":"var:preset|spacing|80"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"width":"45%","style":{"spacing":{"padding":{"right":"var:preset|spacing|50"}}}} -->
		<div class="zc-block-column" style="padding-right:var(--zc--preset--spacing--50);flex-basis:45%">
			<!-- zc:image {"sizeSlug":"full"} -->
			<figure class="zc-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/red-hibiscus-closeup.webp" alt="<?php esc_attr_e( 'Photography close up of a red flower.', 'twentytwentyfive' ); ?>"/></figure>
			<!-- /zc:image -->
			<!-- zc:group {"style":{"spacing":{"margin":{"top":"-12vw"}}},"layout":{"type":"constrained"}} -->
			<div class="zc-block-group" style="margin-top:-12vw">
				<!-- zc:image {"width":"202px","sizeSlug":"full","align":"right","className":"is-resized","style":{"spacing":{"margin":{"right":"-5vw","left":"-5vw"}}}} -->
				<figure class="zc-block-image alignright size-full is-resized" style="margin-right:-5vw;margin-left:-5vw"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/grid-flower-2.webp" alt="<?php esc_attr_e( 'Black and white photography close up of a flower.', 'twentytwentyfive' ); ?>" style="width:202px"/></figure>
				<!-- /zc:image -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->
		<!-- zc:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"left":"0","right":"0"}}}} -->
		<div class="zc-block-column is-vertically-aligned-center" style="padding-right:0;padding-left:0;flex-basis:50%">
			<!-- zc:group {"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="zc-block-group">
				<!-- zc:heading {"className":"is-style-text-annotation"} -->
				<h2 class="zc-block-heading is-style-text-annotation"><?php esc_html_e( 'About Us', 'twentytwentyfive' ); ?></h2>
				<!-- /zc:heading -->
			</div>
			<!-- /zc:group -->

			<!-- zc:paragraph {"className":"is-style-text-subtitle"} -->
			<p class="is-style-text-subtitle">
			<?php
				printf(
					/* translators: %s is the brand name, e.g., 'Fleurs'. */
					esc_html__( '%s is a flower delivery and subscription business. Based in the EU, our mission is not only to deliver stunning flower arrangements across but also foster knowledge and enthusiasm on the beautiful gift of nature: flowers.', 'twentytwentyfive' ),
					'<strong>' . esc_html_x( 'Fleurs', 'Example brand name.', 'twentytwentyfive' ) . '</strong>'
				);
				?>
			</p>
			<!-- /zc:paragraph -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
