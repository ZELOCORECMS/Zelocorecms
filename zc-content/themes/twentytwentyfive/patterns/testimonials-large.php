<?php
/**
 * Title: Review with large image on right
 * Slug: twentytwentyfive/testimonials-large
 * Keywords: testimonial
 * Categories: testimonials
 * Description: A testimonial with a large image on the right.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column -->
		<div class="zc-block-column">
			<!-- zc:group {"style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"wrap","verticalAlignment":"space-between"}} -->
			<div class="zc-block-group" style="min-height:100%">
				<!-- zc:heading {"className":"is-style-text-annotation","style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"x-small"} -->
				<h2 class="zc-block-heading is-style-text-annotation has-x-small-font-size"><?php echo esc_html_x( 'What people are saying', 'Testimonial heading.', 'twentytwentyfive' ); ?></h2>
				<!-- /zc:heading -->

				<!-- zc:quote {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|50"},"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"x-large"} -->
				<blockquote class="zc-block-quote is-style-plain has-x-large-font-size" style="font-style:normal;font-weight:400">
					<!-- zc:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"400px"}} -->
					<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- zc:paragraph {"fontSize":"xx-large"} -->
						<p class="has-xx-large-font-size"><?php echo esc_html_x( '“Superb product and customer service!”', 'Sample testimonial.', 'twentytwentyfive' ); ?></p>
						<!-- /zc:paragraph -->
					</div>
					<!-- /zc:group -->
					<cite><?php echo zc_kses_post( _x( 'Jo Mulligan <br /><sub>Atlanta, GA</sub>', 'Sample testimonial citation.', 'twentytwentyfive' ) ); ?></cite>
				</blockquote>
				<!-- /zc:quote -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
		<div class="zc-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
			<figure class="zc-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/typewriter.webp" alt="<?php echo esc_attr_x( 'Picture of a person typing on a typewriter.', 'Alt text for testimonial image.', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /zc:image -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
