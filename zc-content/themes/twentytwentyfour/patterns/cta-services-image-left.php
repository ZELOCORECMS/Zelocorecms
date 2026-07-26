<?php
/**
 * Title: Services call to action with image on left
 * Slug: twentytwentyfour/cta-services-image-left
 * Categories: call-to-action, banner, featured, services
 * Viewport width: 1400
 * Description: An image, title, paragraph and a CTA button to describe services.
 */
?>

<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"accent-5","layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull has-accent-5-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:columns {"verticalAlignment":null,"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|50"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"verticalAlignment":"center","width":"60%"} -->
		<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:60%">
			<!-- zc:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|duotone-1"}},"className":"is-style-rounded"} -->
			<figure class="zc-block-image size-full is-style-rounded">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/abstract-geometric-art.webp" alt="<?php esc_attr_e( 'White abstract geometric artwork from Dresden, Germany', 'twentytwentyfour' ); ?>" style="aspect-ratio:4/3;object-fit:cover" />
			</figure>
			<!-- /zc:image -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"40%"} -->
		<div class="zc-block-column" style="flex-basis:40%">
			<!-- zc:heading -->
			<h2 class="zc-block-heading"><?php echo esc_html_x( 'Guiding your business through the project', 'Sample heading of the services pattern', 'twentytwentyfour' ); ?></h2>
			<!-- /zc:heading -->

			<!-- zc:paragraph -->
			<p><?php echo esc_html_x( 'Experience the fusion of imagination and expertise with Études—the catalyst for architectural transformations that enrich the world around us.', 'Sample description of the services pattern', 'twentytwentyfour' ); ?></p>
			<!-- /zc:paragraph -->

			<!-- zc:buttons -->
			<div class="zc-block-buttons">
				<!-- zc:button -->
				<div class="zc-block-button">
					<a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Our services', 'Sample button text to view the services', 'twentytwentyfour' ); ?></a>
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
