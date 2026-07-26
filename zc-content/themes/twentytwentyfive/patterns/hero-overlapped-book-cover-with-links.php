<?php
/**
 * Title: Hero, overlapped book cover with links
 * Slug: twentytwentyfive/hero-overlapped-book-cover-with-links
 * Categories: banner
 * Description: A hero with an overlapped book cover and links.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","className":"is-style-section-1","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull is-style-section-1" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--80);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--80);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:columns {"verticalAlignment":null,"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|80","left":"var:preset|spacing|80"}}}} -->
		<div class="zc-block-columns alignwide">
			<!-- zc:column {"verticalAlignment":"center","width":"55%"} -->
			<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:55%">
				<!-- zc:group {"style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"nowrap","verticalAlignment":"top"}} -->
				<div class="zc-block-group" style="min-height:100%">
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
					<div class="zc-block-group">
						<!-- zc:heading {"fontSize":"xx-large"} -->
						<h2 class="zc-block-heading has-xx-large-font-size">
							<?php echo esc_html_x( 'The Stories Book', 'Hero - Overlapped book cover pattern headline text', 'twentytwentyfive' ); ?>
						</h2>
						<!-- /zc:heading -->

						<!-- zc:paragraph {"className":"is-style-text-subtitle"} -->
						<p class="is-style-text-subtitle">
							<?php echo esc_html_x( 'A fine collection of moments in time featuring photographs from Louis Fleckenstein, Paul Strand and Asahachi Kōno.', 'Hero - Overlapped book cover pattern subline text', 'twentytwentyfive' ); ?>
						</p>
						<!-- /zc:paragraph -->
					</div>
					<!-- /zc:group -->

					<!-- zc:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
					<div class="zc-block-group">
						<!-- zc:spacer {"style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
						<div style="margin-top:var(--zc--preset--spacing--20);margin-bottom:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
						<!-- /zc:spacer -->

						<!-- zc:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
						<div class="zc-block-columns">
							<!-- zc:column {"verticalAlignment":"stretch"} -->
							<div class="zc-block-column is-vertically-aligned-stretch">
								<!-- zc:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"horizontal","flexWrap":"wrap","justifyContent":"space-between"}} -->
								<div class="zc-block-buttons">
									<!-- zc:button {"width":100,"className":"is-style-fill"} -->
									<div class="zc-block-button has-custom-width zc-block-button__width-100 is-style-fill">
										<a class="zc-block-button__link zc-element-button" href="#">
											<?php echo esc_html_x( 'Amazon', 'Example brand name.', 'twentytwentyfive' ); ?>
										</a>
									</div>
									<!-- /zc:button -->
									<!-- zc:button {"width":100,"className":"is-style-fill"} -->
									<div class="zc-block-button has-custom-width zc-block-button__width-100 is-style-fill">
										<a class="zc-block-button__link zc-element-button" href="#">
											<?php echo esc_html_x( 'Apple Books', 'Example brand name.', 'twentytwentyfive' ); ?>
										</a>
									</div>
									<!-- /zc:button -->
								</div>
								<!-- /zc:buttons -->
							</div>
							<!-- /zc:column -->
							<!-- zc:column {"verticalAlignment":"stretch"} -->
							<div class="zc-block-column is-vertically-aligned-stretch">
								<!-- zc:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"horizontal","flexWrap":"wrap","justifyContent":"space-between"}} -->
								<div class="zc-block-buttons">
									<!-- zc:button {"width":100,"className":"is-style-fill"} -->
									<div class="zc-block-button has-custom-width zc-block-button__width-100 is-style-fill">
										<a class="zc-block-button__link zc-element-button" href="#">
											<?php echo esc_html_x( 'Audible', 'Example brand name.', 'twentytwentyfive' ); ?>
										</a>
									</div>
									<!-- /zc:button -->
									<!-- zc:button {"width":100,"className":"is-style-fill"} -->
									<div class="zc-block-button has-custom-width zc-block-button__width-100 is-style-fill">
										<a class="zc-block-button__link zc-element-button" href="#">
											<?php echo esc_html_x( 'Barnes &amp; Noble', 'Example brand name.', 'twentytwentyfive' ); ?>
										</a>
									</div>
									<!-- /zc:button -->
								</div>
								<!-- /zc:buttons -->
							</div>
							<!-- /zc:column -->
						</div>
						<!-- /zc:columns -->

						<!-- zc:spacer {"style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
						<div style="margin-top:var(--zc--preset--spacing--20);margin-bottom:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
						<!-- /zc:spacer -->

						<!-- zc:paragraph {"fontSize":"medium"} -->
						<p class="has-medium-font-size"><?php echo zc_kses_post( _x( 'Outside Europe? View <a href="#" rel="nofollow">international editions</a>.', 'Pattern placeholder text with link.', 'twentytwentyfive' ) ); ?></p>
						<!-- /zc:paragraph -->
					</div>
					<!-- /zc:group -->
				</div>
				<!-- /zc:group -->
			</div>
			<!-- /zc:column -->

			<!-- zc:column {"verticalAlignment":"top","width":"45%"} -->
			<div class="zc-block-column is-vertically-aligned-top" style="flex-basis:45%">
				<!-- zc:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
				<figure class="zc-block-image size-full">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/book-image.webp" alt="<?php echo esc_attr__( 'Book Image', 'twentytwentyfive' ); ?>" style="aspect-ratio:3/4;object-fit:cover"/>
				</figure>
				<!-- /zc:image -->
			</div>
			<!-- /zc:column -->
		</div>
		<!-- /zc:columns -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
