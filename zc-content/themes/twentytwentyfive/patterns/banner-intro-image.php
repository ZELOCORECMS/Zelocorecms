<?php
/**
 * Title: Short heading and paragraph and image on the left
 * Slug: twentytwentyfive/banner-intro-image
 * Categories: banner, featured
 * Description: A Intro pattern with Short heading, paragraph and image on the left.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"width":"56%"} -->
		<div class="zc-block-column" style="flex-basis:56%">
			<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full"} -->
			<figure class="zc-block-image size-full">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/botany-flowers.webp" alt="<?php echo esc_attr_x( 'Picture of a flower', 'Alt text for intro picture.', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/>
			</figure>
			<!-- /zc:image -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
		<div class="zc-block-column is-vertically-aligned-center">
			<!-- zc:heading -->
			<h2 class="zc-block-heading"><?php echo esc_html_x( 'New arrivals', 'Heading for banner pattern.', 'twentytwentyfive' ); ?></h2>
			<!-- /zc:heading -->

			<!-- zc:paragraph -->
			<p><?php echo esc_html_x( 'Like flowers that bloom in unexpected places, every story unfolds with beauty and resilience, revealing hidden wonders.', 'Sample description for banner with flower.', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->

			<!-- zc:buttons -->
			<div class="zc-block-buttons">
				<!-- zc:button -->
				<div class="zc-block-button">
					<a class="zc-block-button__link zc-element-button"><?php esc_html_e( 'Learn more', 'twentytwentyfive' ); ?></a>
				</div>
				<!-- /zc:button -->
			</div>
			<!-- /zc:buttons -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
