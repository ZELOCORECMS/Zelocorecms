<?php
/**
 * Title: Hero
 * Slug: twentytwentyfour/banner-hero
 * Categories: banner, call-to-action, featured
 * Viewport width: 1400
 * Description: A hero section with a title, a paragraph, a CTA button, and an image.
 */
?>

<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"","wideSize":""}} -->
<div class="zc-block-group alignfull" style="padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">

	<!-- zc:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained","contentSize":"565px"}} -->
	<div class="zc-block-group">

		<!-- zc:heading {"textAlign":"center","fontSize":"x-large","level":1} -->
		<h1 class="zc-block-heading has-text-align-center has-x-large-font-size"><?php echo esc_html_x( 'A commitment to innovation and sustainability', 'Heading of the hero section', 'twentytwentyfour' ); ?></h1>
		<!-- /zc:heading -->

		<!-- zc:spacer {"height":"1.25rem"} -->
		<div style="height:1.25rem" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->

		<!-- zc:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php echo esc_html_x( 'Études is a pioneering firm that seamlessly merges creativity and functionality to redefine architectural excellence.', 'Content of the hero section', 'twentytwentyfour' ); ?></p>
		<!-- /zc:paragraph -->

		<!-- zc:spacer {"height":"1.25rem"} -->
		<div style="height:1.25rem" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->

		<!-- zc:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="zc-block-buttons">
			<!-- zc:button -->
			<div class="zc-block-button">
				<a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'About us', 'Button text of the hero section', 'twentytwentyfour' ); ?></a>
			</div>
			<!-- /zc:button -->
		</div>
		<!-- /zc:buttons -->
	</div>
	<!-- /zc:group -->

	<!-- zc:spacer {"height":"var:preset|spacing|30","style":{"layout":{}}} -->
	<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer">
	</div>
	<!-- /zc:spacer -->

	<!-- zc:image {"align":"wide","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="zc-block-image alignwide size-full is-style-rounded">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/building-exterior.webp" alt="<?php esc_attr_e( 'Building exterior in Toronto, Canada', 'twentytwentyfour' ); ?>" />
	</figure>
	<!-- /zc:image -->
</div>
<!-- /zc:group -->
