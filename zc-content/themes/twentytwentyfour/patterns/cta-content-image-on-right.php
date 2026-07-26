<?php
/**
 * Title: Call to action with image on right
 * Slug: twentytwentyfour/cta-content-image-on-right
 * Categories: call-to-action, banner
 * Viewport width: 1400
 * Description: A title, paragraph, two CTA buttons, and an image for a general CTA section.
 */
?>

<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
	<div class="zc-block-columns alignwide are-vertically-aligned-center">
		<!-- zc:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- zc:heading -->
			<h2 class="zc-block-heading"><?php echo esc_html_x( 'Enhance your architectural journey with the Études Architect app.', 'Sample heading', 'twentytwentyfour' ); ?></h2>
			<!-- /zc:heading -->

			<!-- zc:list {"style":{"typography":{"lineHeight":"1.75"}},"className":"is-style-checkmark-list"} -->
			<ul class="is-style-checkmark-list" style="line-height:1.75">
				<!-- zc:list-item -->
				<li><?php echo esc_html_x( 'Collaborate with fellow architects.', 'Sample list item', 'twentytwentyfour' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item -->
				<li><?php echo esc_html_x( 'Showcase your projects.', 'Sample list item', 'twentytwentyfour' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item -->
				<li><?php echo esc_html_x( 'Experience the world of architecture.', 'Sample list item', 'twentytwentyfour' ); ?></li>
				<!-- /zc:list-item -->
			</ul>
			<!-- /zc:list -->

			<!-- zc:buttons -->
			<div class="zc-block-buttons">
				<!-- zc:button -->
				<div class="zc-block-button">
					<a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Download app', 'Button text of this section', 'twentytwentyfour' ); ?></a>
				</div>
				<!-- /zc:button -->

				<!-- zc:button {"className":"is-style-outline"} -->
				<div class="zc-block-button is-style-outline">
					<a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'How it works', 'Button text of this section', 'twentytwentyfour' ); ?></a>
				</div>
				<!-- /zc:button -->
			</div>
			<!-- /zc:buttons -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- zc:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="zc-block-image size-full is-style-rounded">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/abstract-geometric-art.webp" alt="<?php esc_attr_e( 'White abstract geometric artwork from Dresden, Germany', 'twentytwentyfour' ); ?>" style="aspect-ratio:4/3;object-fit:cover" />
			</figure>
			<!-- /zc:image -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
