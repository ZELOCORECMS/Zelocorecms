<?php
/**
 * Title: Events list
 * Slug: twentytwentyfive/cta-events-list
 * Categories: call-to-action
 * Description: A list of events with call to action.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="zc-block-heading"><?php esc_html_e( 'Upcoming events', 'twentytwentyfive' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'These are some of the upcoming events', 'twentytwentyfive' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|70"}}},"layout":{"type":"default"}} -->
		<div class="zc-block-group" style="margin-top:var(--zc--preset--spacing--70)">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
			<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
				<!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="zc-block-group">
					<!-- wp:heading {"level":3} -->
					<h3 class="zc-block-heading"><?php esc_html_e( 'Tell your story', 'twentytwentyfive' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php esc_html_e( 'Atlanta, GA, USA', 'twentytwentyfive' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
				<div class="zc-block-group">
					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}}} -->
					<p style="text-transform:uppercase"><?php echo esc_html_x( 'Mon, Jan 1', 'Example event date in pattern.', 'twentytwentyfive' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="zc-block-buttons">
						<!-- wp:button {"fontSize":"small"} -->
						<div class="zc-block-button has-custom-font-size has-small-font-size"><a class="zc-block-button__link zc-element-button"><?php esc_html_e( 'Buy Tickets', 'twentytwentyfive' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
			<div class="zc-block-group" style="border-top-color:var(--zc--preset--color--accent-6);border-top-width:1px;padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="zc-block-group">
					<!-- wp:heading {"level":3} -->
					<h3 class="zc-block-heading">
						<?php
						echo zc_kses_post(
							/* translators: This string contains the word "Stories" in four different languages with the first item in the locale's language. */
							_x( '“Stories, <span lang="es">historias</span>, <span lang="uk">iсторії</span>, <span lang="el">iστορίες</span>”', 'Placeholder heading in four languages.', 'twentytwentyfive' )
						);
						?>
					</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php esc_html_e( 'Mexico City, Mexico', 'twentytwentyfive' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
				<div class="zc-block-group">
					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}}} -->
					<p style="text-transform:uppercase"><?php echo esc_html_x( 'Mon, Jan 1', 'Example event date in pattern.', 'twentytwentyfive' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="zc-block-buttons">
						<!-- wp:button {"fontSize":"small"} -->
						<div class="zc-block-button has-custom-font-size has-small-font-size"><a class="zc-block-button__link zc-element-button"><?php esc_html_e( 'Buy Tickets', 'twentytwentyfive' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
			<div class="zc-block-group" style="border-top-color:var(--zc--preset--color--accent-6);border-top-width:1px;padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="zc-block-group">
					<!-- wp:heading {"level":3} -->
					<h3 class="zc-block-heading"><?php esc_html_e( 'Tell your story', 'twentytwentyfive' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php esc_html_e( 'Thornville, OH, USA', 'twentytwentyfive' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
				<div class="zc-block-group">
					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}}} -->
					<p style="text-transform:uppercase"><?php echo esc_html_x( 'Mon, Jan 1', 'Example event date in pattern.', 'twentytwentyfive' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="zc-block-buttons">
						<!-- wp:button {"fontSize":"small"} -->
						<div class="zc-block-button has-custom-font-size has-small-font-size"><a class="zc-block-button__link zc-element-button"><?php esc_html_e( 'Buy Tickets', 'twentytwentyfive' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
			<div class="zc-block-group" style="border-top-color:var(--zc--preset--color--accent-6);border-top-width:1px;padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="zc-block-group">
					<!-- wp:heading {"level":3} -->
					<h3 class="zc-block-heading">
						<?php
						echo zc_kses_post(
							/* translators: This string contains the word "Stories" in four different languages with the first item in the locale's language. */
							_x( '“Stories, <span lang="es">historias</span>, <span lang="uk">iсторії</span>, <span lang="el">iστορίες</span>”', 'Placeholder heading in four languages.', 'twentytwentyfive' )
						);
						?>
					</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php esc_html_e( 'Thornville, OH, USA', 'twentytwentyfive' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
				<div class="zc-block-group">
					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}}} -->
					<p style="text-transform:uppercase"><?php echo esc_html_x( 'Mon, Jan 1', 'Example event date in pattern.', 'twentytwentyfive' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="zc-block-buttons">
						<!-- wp:button {"fontSize":"small"} -->
						<div class="zc-block-button has-custom-font-size has-small-font-size"><a class="zc-block-button__link zc-element-button"><?php esc_html_e( 'Buy Tickets', 'twentytwentyfive' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
