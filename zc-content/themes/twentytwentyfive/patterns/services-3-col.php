<?php
/**
 * Title: Services, 3 columns
 * Slug: twentytwentyfive/services-3-col
 * Categories: call-to-action, banner, services
 * Description: Three columns with images and text to showcase services.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
	<!-- zc:heading {"align":"wide"} -->
	<h2 class="zc-block-heading alignwide"><?php esc_html_e( 'Our services', 'twentytwentyfive' ); ?></h2>
	<!-- /zc:heading -->

	<!-- zc:columns {"align":"wide"} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column -->
		<div class="zc-block-column">

			<!-- zc:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","style":{"spacing":{"margin":{"bottom":"24px"}}}} -->
			<figure class="zc-block-image size-full" style="margin-bottom:24px">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/campanula-alliariifolia-flower.webp" alt="<?php esc_attr_e( 'Image for service', 'twentytwentyfive' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/>
			</figure>
			<!-- /zc:image -->

			<!-- zc:heading {"level":3} -->
			<h3 class="zc-block-heading"><?php esc_html_e( 'Collect', 'twentytwentyfive' ); ?></h3>
			<!-- /zc:heading -->

			<!-- zc:paragraph {"fontSize":"medium"} -->
			<p class="has-medium-font-size"><?php esc_html_e( 'Like flowers that bloom in unexpected places, every story unfolds with beauty and resilience', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column -->
		<div class="zc-block-column">
			<!-- zc:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","style":{"spacing":{"margin":{"bottom":"24px"}}}} -->
			<figure class="zc-block-image size-full" style="margin-bottom:24px">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/delphinium-flowers.webp" alt="<?php esc_attr_e( 'Image for service', 'twentytwentyfive' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/>
			</figure>
			<!-- /zc:image -->

			<!-- zc:heading {"level":3} -->
			<h3 class="zc-block-heading"><?php esc_html_e( 'Assemble', 'twentytwentyfive' ); ?></h3>
			<!-- /zc:heading -->

			<!-- zc:paragraph {"fontSize":"medium"} -->
			<p class="has-medium-font-size"><?php esc_html_e( 'Like flowers that bloom in unexpected places, every story unfolds with beauty and resilience', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column -->
		<div class="zc-block-column">
			<!-- zc:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","style":{"spacing":{"margin":{"bottom":"24px"}}}} -->
			<figure class="zc-block-image size-full" style="margin-bottom:24px">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/star-thristle-flower.webp" alt="<?php esc_attr_e( 'Image for service', 'twentytwentyfive' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/>
			</figure>
			<!-- /zc:image -->

			<!-- zc:heading {"level":3} -->
			<h3 class="zc-block-heading"><?php esc_html_e( 'Deliver', 'twentytwentyfive' ); ?></h3>
			<!-- /zc:heading -->

			<!-- zc:paragraph {"fontSize":"medium"} -->
			<p class="has-medium-font-size"><?php esc_html_e( 'Like flowers that bloom in unexpected places, every story unfolds with beauty and resilience', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
