<?php
/**
 * Title: Hero, full width image
 * Slug: twentytwentyfive/hero-full-width-image
 * Categories: banner
 * Description: A hero with a full width image, heading, short paragraph and button.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>

<!-- zc:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/northern-buttercups-flowers.webp","alt":"Picture of a flower","dimRatio":10,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.95},"minHeight":840,"minHeightUnit":"px","contentPosition":"bottom center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-cover alignfull has-custom-content-position is-position-bottom-center" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50);min-height:840px">
	<span aria-hidden="true" class="zc-block-cover__background has-background-dim-10 has-background-dim"></span>
	<img class="zc-block-cover__image-background" alt="<?php echo esc_attr_x( 'Picture of a flower', 'Alt text for cover image.', 'twentytwentyfive' ); ?>" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/northern-buttercups-flowers.webp" style="object-position:50% 95%" data-object-fit="cover" data-object-position="50% 95%"/>
	<div class="zc-block-cover__inner-container">
		<!-- zc:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="zc-block-group alignwide">
			<!-- zc:heading {"textAlign":"left","fontSize":"xx-large"} -->
			<h2 class="zc-block-heading has-text-align-left has-xx-large-font-size"><?php echo esc_html_x( 'Tell your story', 'Sample hero heading', 'twentytwentyfive' ); ?></h2>
			<!-- /zc:heading -->

			<!-- zc:paragraph -->
			<p><?php echo esc_html_x( 'Like flowers that bloom in unexpected places, every story unfolds with beauty and resilience, revealing hidden wonders.', 'Sample hero paragraph', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->

			<!-- zc:buttons -->
			<div class="zc-block-buttons">
				<!-- zc:button -->
				<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"><?php esc_html_e( 'Learn more', 'twentytwentyfive' ); ?></a></div>
				<!-- /zc:button -->
			</div>
			<!-- /zc:buttons -->
		</div>
		<!-- /zc:group -->
	</div>
</div>
<!-- /zc:cover -->
