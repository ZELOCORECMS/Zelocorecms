<?php
/**
 * Title: RSVP
 * Slug: twentytwentyfour/cta-rsvp
 * Categories: call-to-action, featured
 * Viewport width: 1100
 * Description: A large RSVP heading sideways, a description, and a CTA button.
 */
?>

<!-- zc:group {"metadata":{"name":"<?php echo esc_html_x( 'RSVP', 'Name of RSVP pattern', 'twentytwentyfour' ); ?>"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"accent-5","layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull has-accent-5-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|30"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"verticalAlignment":"stretch","width":"40%"} -->
		<div class="zc-block-column is-vertically-aligned-stretch" style="flex-basis:40%">
			<!-- zc:group {"style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
			<div class="zc-block-group" style="min-height:100%">

				<!-- zc:heading {"textAlign":"right","level":2,"style":{"typography":{"fontSize":"12rem","writingMode":"vertical-rl","lineHeight":"1"},"spacing":{"margin":{"right":"0","left":"calc( var(--zc--preset--spacing--20) * -1)"}}}} -->
					<h2 class="zc-block-heading has-text-align-right" style="margin-right:0;margin-left:calc( var(--zc--preset--spacing--20) * -1);font-size:12rem;line-height:1;writing-mode:vertical-rl"><?php echo esc_html_x( 'RSVP', 'Initials for ´please respond´', 'twentytwentyfour' ); ?></h2>
				<!-- /zc:heading -->

				<!-- zc:group {"layout":{"type":"constrained","contentSize":"300px","justifyContent":"left"}} -->
				<div class="zc-block-group">
					<!-- zc:paragraph {"style":{"layout":{"selfStretch":"fixed","flexSize":"50%"}}} -->
					<p><?php echo esc_html_x( 'Experience the fusion of imagination and expertise with Études Arch Summit, February 2025.', 'RSVP call to action description', 'twentytwentyfour' ); ?></p>
					<!-- /zc:paragraph -->

					<!-- zc:buttons -->
					<div class="zc-block-buttons">
						<!-- zc:button -->
						<div class="zc-block-button">
							<a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Reserve your spot', 'Call to action button text for the reservation button', 'twentytwentyfour' ); ?></a>
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

		<!-- zc:column {"verticalAlignment":"top","width":"60%"} -->
		<div class="zc-block-column is-vertically-aligned-top" style="flex-basis:60%">
			<!-- zc:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|duotone-5"}},"className":"is-style-rounded"} -->
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
