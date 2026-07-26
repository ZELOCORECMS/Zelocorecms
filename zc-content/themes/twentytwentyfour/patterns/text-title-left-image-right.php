<?php
/**
 * Title: Title text and button on left with image on right
 * Slug: twentytwentyfour/text-title-left-image-right
 * Categories: banner, about, featured
 * Viewport width: 1400
 * Description: A title, a paragraph and a CTA button on the left with an image on the right.
 */
?>

<!-- zc:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"accent","layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull has-accent-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:columns {"verticalAlignment":null,"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|50"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"verticalAlignment":"stretch","width":"50%"} -->
		<div class="zc-block-column is-vertically-aligned-stretch" style="flex-basis:50%">
			<!-- zc:group {"style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
			<div class="zc-block-group" style="min-height:100%">

				<!-- zc:paragraph {"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"x-large","fontFamily":"heading"} -->
				<p class="has-heading-font-family has-x-large-font-size" style="line-height:1.2"><?php echo esc_html_x( 'Études offers comprehensive consulting, management, design, and research solutions. Every architectural endeavor is an opportunity to shape the future.', 'Headline for the About pattern', 'twentytwentyfour' ); ?></p>
				<!-- /zc:paragraph -->

				<!-- zc:group {"layout":{"type":"constrained","contentSize":"300px","justifyContent":"left"}} -->
				<div class="zc-block-group">

					<!-- zc:paragraph {"style":{"layout":{"selfStretch":"fixed","flexSize":"50%"}}} -->
					<p><?php echo esc_html_x( 'Leaving an indelible mark on the landscape of tomorrow.', 'Description for the About pattern', 'twentytwentyfour' ); ?></p>
					<!-- /zc:paragraph -->

					<!-- zc:buttons -->
					<div class="zc-block-buttons">
						<!-- zc:button -->
						<div class="zc-block-button">
							<a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'About us', 'Call to Action button text', 'twentytwentyfour' ); ?></a>
						</div>
						<!-- /zc:button -->
					</div>
					<!-- /zc:buttons -->
				</div>
				<!-- /zc:group -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- zc:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="zc-block-image size-large is-style-rounded">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/museum.webp" alt="<?php esc_attr_e( 'A ramp along a curved wall in the Kiasma Museu, Helsinki, Finland', 'twentytwentyfour' ); ?>" style="aspect-ratio:3/4;object-fit:cover" />
			</figure>
			<!-- /zc:image -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
