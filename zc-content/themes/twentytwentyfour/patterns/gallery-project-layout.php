<?php
/**
 * Title: Project layout
 * Slug: twentytwentyfour/gallery-project-layout
 * Categories: gallery, featured, portfolio
 * Viewport width: 1600
 * Description: A gallery section with a project layout with 2 images.
 */
?>

<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base-2"}}}},"backgroundColor":"contrast","textColor":"base-2","layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull has-base-2-color has-contrast-background-color has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"verticalAlignment":"stretch","width":"60%","style":{"spacing":{"padding":{"right":"0"}}}} -->
		<div class="zc-block-column is-vertically-aligned-stretch" style="padding-right:0;flex-basis:60%">
			<!-- zc:group {"style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
			<div class="zc-block-group" style="min-height:100%">
				<!-- zc:image {"aspectRatio":"9/16","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="zc-block-image size-large is-style-rounded">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/angular-roof.webp" alt="<?php esc_attr_e( 'An empty staircase under an angular roof in Darling Harbour, Sydney, Australia', 'twentytwentyfour' ); ?>" style="aspect-ratio:9/16;object-fit:cover" />
				</figure>
				<!-- /zc:image -->

				<!-- zc:paragraph {"fontSize":"medium"} -->
				<p class="has-medium-font-size"><?php echo esc_html_x( '1. Through Études, we aspire to redefine architectural boundaries and usher in a new era of design excellence that leaves an indelible mark on the built environment.', 'Sample text for the feature area', 'twentytwentyfour' ); ?></p>
				<!-- /zc:paragraph -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"40%"} -->
		<div class="zc-block-column" style="flex-basis:40%">
			<!-- zc:group {"layout":{"type":"constrained"}} -->
			<div class="zc-block-group">
				<!-- zc:paragraph {"style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"500"}},"fontSize":"large"} -->
				<p class="has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2"><?php echo esc_html_x( 'Our comprehensive suite of professional services caters to a diverse clientele, ranging from homeowners to commercial developers. With a commitment to innovation and sustainability, Études is the bridge that transforms architectural dreams into remarkable built realities.', 'Sample text for the feature area', 'twentytwentyfour' ); ?></p>
				<!-- /zc:paragraph -->

				<!-- zc:spacer {"height":"var:preset|spacing|40","style":{"layout":{}}} -->
				<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer">
				</div>
				<!-- /zc:spacer -->

				<!-- zc:group {"layout":{"type":"default"}} -->
				<div class="zc-block-group">
					<!-- zc:paragraph {"fontSize":"medium"} -->
					<p class="has-medium-font-size"><?php echo esc_html_x( '2. Case studies that celebrate the artistry can fuel curiosity and ignite inspiration.', 'Sample text for the feature area', 'twentytwentyfour' ); ?></p>
					<!-- /zc:paragraph -->

					<!-- zc:image {"aspectRatio":"9/16","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
					<figure class="zc-block-image size-large is-style-rounded">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/art-gallery.webp" alt="<?php esc_attr_e( 'Art Gallery of Ontario, Toronto, Canada', 'twentytwentyfour' ); ?>" style="aspect-ratio:9/16;object-fit:cover" />
					</figure>
					<!-- /zc:image -->
				</div>
				<!-- /zc:group -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
