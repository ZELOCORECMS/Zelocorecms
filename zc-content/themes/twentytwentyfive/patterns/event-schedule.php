<?php
/**
 * Title: Event schedule
 * Slug: twentytwentyfive/event-schedule
 * Categories: about
 * Description: A section with specified dates and times for an event.
 * Keywords: events, agenda, schedule, lectures
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
	<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:heading {"fontSize":"xx-large"} -->
		<h2 class="zc-block-heading has-xx-large-font-size"><?php esc_html_e( 'Agenda', 'twentytwentyfive' ); ?></h2>
		<!-- /zc:heading -->
		<!-- zc:paragraph -->
		<p><?php esc_html_e( 'These are some of the upcoming events.', 'twentytwentyfive' ); ?></p>
		<!-- /zc:paragraph -->
		<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
		<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->
		<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="zc-block-group" style="border-top-color:var(--zc--preset--color--accent-6);border-top-width:1px;padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
			<!-- zc:columns -->
			<div class="zc-block-columns">
				<!-- zc:column {"verticalAlignment":"top","width":"40%"} -->
				<div class="zc-block-column is-vertically-aligned-top" style="flex-basis:40%">
					<!-- zc:heading {"level":3} -->
					<h3 class="zc-block-heading"><?php echo esc_html_x( 'Mon, Jan 1', 'Example event date in pattern.', 'twentytwentyfive' ); ?></h3>
					<!-- /zc:heading -->
				</div>
				<!-- /zc:column -->
				<!-- zc:column {"verticalAlignment":"top","width":"60%"} -->
				<div class="zc-block-column is-vertically-aligned-top" style="flex-basis:60%">
					<!-- zc:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
					<div class="zc-block-columns is-not-stacked-on-mobile" style="margin-top:var(--zc--preset--spacing--40);margin-bottom:var(--zc--preset--spacing--40)">
						<!-- zc:column {"width":"33.33%"} -->
						<div class="zc-block-column" style="flex-basis:33.33%">
							<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fixed","flexSize":"270px"}}} -->
							<figure class="zc-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/marshland-birds-square.webp" alt="<?php esc_attr_e( 'Birds on a lake.', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
							<!-- /zc:image -->
						</div>
						<!-- /zc:column -->
						<!-- zc:column {"width":"66.66%"} -->
						<div class="zc-block-column" style="flex-basis:66.66%">
							<!-- zc:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
							<div class="zc-block-group">
								<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
								<div class="zc-block-group">
									<!-- zc:heading {"level":4} -->
									<h4 class="zc-block-heading"><a href="#"><?php esc_html_e( 'Fauna from North America and its characteristics', 'twentytwentyfive' ); ?></a></h4>
									<!-- /zc:heading -->
									<!-- zc:paragraph -->
									<p><?php echo esc_html_x( '9 AM — 11 AM', 'Example event time in pattern.', 'twentytwentyfive' ); ?></p>
									<!-- /zc:paragraph -->
								</div>
								<!-- /zc:group -->
								<!-- zc:paragraph {"fontSize":"small"} -->
								<p class="has-small-font-size"><?php echo zc_kses_post( _x( 'Lecture by <a href="#">Prof. Fiona Presley</a>', 'Pattern placeholder text with link.', 'twentytwentyfive' ) ); ?></p>
								<!-- /zc:paragraph -->
							</div>
							<!-- /zc:group -->
						</div>
						<!-- /zc:column -->
					</div>
					<!-- /zc:columns -->
					<!-- zc:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
					<div class="zc-block-columns is-not-stacked-on-mobile" style="margin-top:var(--zc--preset--spacing--40);margin-bottom:var(--zc--preset--spacing--40)">
						<!-- zc:column {"width":"33.33%"} -->
						<div class="zc-block-column" style="flex-basis:33.33%">
							<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fixed","flexSize":"270px"}}} -->
							<figure class="zc-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/coral-square.webp" alt="<?php esc_attr_e( 'View of the deep ocean.', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
							<!-- /zc:image -->
						</div>
						<!-- /zc:column -->
						<!-- zc:column {"width":"66.66%"} -->
						<div class="zc-block-column" style="flex-basis:66.66%">
							<!-- zc:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
							<div class="zc-block-group">
								<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
								<div class="zc-block-group">
									<!-- zc:heading {"level":4} -->
									<h4 class="zc-block-heading"><a href="#"><?php esc_html_e( 'Things you didn’t know about the deep ocean', 'twentytwentyfive' ); ?></a></h4>
									<!-- /zc:heading -->
									<!-- zc:paragraph -->
									<p><?php echo esc_html_x( '9 AM — 11 AM', 'Example event time in pattern.', 'twentytwentyfive' ); ?></p>
									<!-- /zc:paragraph -->
								</div>
								<!-- /zc:group -->
								<!-- zc:paragraph {"fontSize":"small"} -->
								<p class="has-small-font-size"><?php echo zc_kses_post( _x( 'Lecture by <a href="#">Prof. Fiona Presley</a>', 'Pattern placeholder text with link.', 'twentytwentyfive' ) ); ?></p>
								<!-- /zc:paragraph -->
							</div>
							<!-- /zc:group -->
						</div>
						<!-- /zc:column -->
					</div>
					<!-- /zc:columns -->
				</div>
				<!-- /zc:column -->
			</div>
			<!-- /zc:columns -->
		</div>
		<!-- /zc:group -->
		<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
		<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->
		<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="zc-block-group" style="border-top-color:var(--zc--preset--color--accent-6);border-top-width:1px;padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
			<!-- zc:columns -->
			<div class="zc-block-columns">
				<!-- zc:column {"verticalAlignment":"top","width":"40%"} -->
				<div class="zc-block-column is-vertically-aligned-top" style="flex-basis:40%">
					<!-- zc:heading {"level":3} -->
					<h3 class="zc-block-heading"><?php echo esc_html_x( 'Mon, Jan 1', 'Example event date in pattern.', 'twentytwentyfive' ); ?></h3>
					<!-- /zc:heading -->
				</div>
				<!-- /zc:column -->
				<!-- zc:column {"verticalAlignment":"top","width":"60%"} -->
				<div class="zc-block-column is-vertically-aligned-top" style="flex-basis:60%">
					<!-- zc:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
					<div class="zc-block-columns is-not-stacked-on-mobile" style="margin-top:var(--zc--preset--spacing--40);margin-bottom:var(--zc--preset--spacing--40)">
						<!-- zc:column {"width":"33.33%"} -->
						<div class="zc-block-column" style="flex-basis:33.33%">
							<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fixed","flexSize":"270px"}}} -->
							<figure class="zc-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/parthenon-square.webp" alt="<?php esc_attr_e( 'The Acropolis of Athens.', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
							<!-- /zc:image -->
						</div>
						<!-- /zc:column -->
						<!-- zc:column {"width":"66.66%"} -->
						<div class="zc-block-column" style="flex-basis:66.66%"><!-- zc:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
							<div class="zc-block-group">
								<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
								<div class="zc-block-group">
									<!-- zc:heading {"level":4} -->
									<h4 class="zc-block-heading"><a href="#"><?php esc_html_e( 'Ancient buildings and symbols', 'twentytwentyfive' ); ?></a></h4>
									<!-- /zc:heading -->
									<!-- zc:paragraph -->
									<p><?php echo esc_html_x( '9 AM — 11 AM', 'Example event time in pattern.', 'twentytwentyfive' ); ?></p>
									<!-- /zc:paragraph -->
								</div>
								<!-- /zc:group -->
								<!-- zc:paragraph {"fontSize":"small"} -->
								<p class="has-small-font-size"><?php echo zc_kses_post( _x( 'Lecture by <a href="#">Prof. Fiona Presley</a>', 'Pattern placeholder text with link.', 'twentytwentyfive' ) ); ?></p>
								<!-- /zc:paragraph -->
							</div>
							<!-- /zc:group -->
						</div>
						<!-- /zc:column -->
					</div>
					<!-- /zc:columns -->
					<!-- zc:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
					<div class="zc-block-columns is-not-stacked-on-mobile" style="margin-top:var(--zc--preset--spacing--40);margin-bottom:var(--zc--preset--spacing--40)">
						<!-- zc:column {"width":"33.33%"} -->
						<div class="zc-block-column" style="flex-basis:33.33%">
							<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fixed","flexSize":"270px"}}} -->
							<figure class="zc-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/agenda-img-4.webp" alt="<?php esc_attr_e( 'Black and white photo of an African woman.', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
							<!-- /zc:image -->
						</div>
						<!-- /zc:column -->
						<!-- zc:column {"width":"66.66%"} -->
						<div class="zc-block-column" style="flex-basis:66.66%">
							<!-- zc:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
							<div class="zc-block-group">
								<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
								<div class="zc-block-group">
									<!-- zc:heading {"level":4} -->
									<h4 class="zc-block-heading"><a href="#"><?php esc_html_e( 'An introduction to African dialects', 'twentytwentyfive' ); ?></a></h4>
									<!-- /zc:heading -->
									<!-- zc:paragraph -->
									<p><?php echo esc_html_x( '9 AM — 11 AM', 'Example event time in pattern.', 'twentytwentyfive' ); ?></p>
									<!-- /zc:paragraph -->
								</div>
								<!-- /zc:group -->
								<!-- zc:paragraph {"fontSize":"small"} -->
								<p class="has-small-font-size"><?php echo zc_kses_post( _x( 'Lecture by <a href="#">Prof. Fiona Presley</a>', 'Pattern placeholder text with link.', 'twentytwentyfive' ) ); ?></p>
								<!-- /zc:paragraph -->
							</div>
							<!-- /zc:group -->
						</div>
						<!-- /zc:column -->
					</div>
					<!-- /zc:columns -->
				</div>
				<!-- /zc:column -->
			</div>
			<!-- /zc:columns -->
		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
