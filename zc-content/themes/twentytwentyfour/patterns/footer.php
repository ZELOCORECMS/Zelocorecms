<?php
/**
 * Title: Footer with colophon, 4 columns
 * Slug: twentytwentyfour/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: A footer section with a colophon and 4 columns.
 */
?>

<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
	<!-- zc:columns {"align":"wide"} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"width":"30%"} -->
		<div class="zc-block-column" style="flex-basis:30%">
			<!-- zc:group {"style":{"dimensions":{"minHeight":""},"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="zc-block-group">
				<!-- zc:site-logo {"width":20,"shouldSyncIcon":true,"style":{"layout":{"selfStretch":"fit","flexSize":null}}} /-->

				<!-- zc:site-title {"level":0,"fontSize":"medium"} /-->

				<!-- zc:site-tagline {"fontSize":"small"} /-->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"20%"} -->
		<div class="zc-block-column" style="flex-basis:20%">
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"50%"} -->
		<div class="zc-block-column" style="flex-basis:50%">
			<!-- zc:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
			<div class="zc-block-group">
				<!-- zc:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
				<div class="zc-block-group">
					<!-- zc:heading {"level":2,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontFamily":"body"} -->
					<h2 class="zc-block-heading has-medium-font-size has-body-font-family" style="font-style:normal;font-weight:600"><?php esc_html_e( 'About', 'twentytwentyfour' ); ?></h2>
					<!-- /zc:heading -->

					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="zc-block-group">

						<!-- zc:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small","ariaLabel":"<?php esc_attr_e( 'About', 'twentytwentyfour' ); ?>"} -->

						<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Team', 'twentytwentyfour' ); ?>","url":"#"} /-->
						<!-- zc:navigation-link {"label":"<?php esc_html_e( 'History', 'twentytwentyfour' ); ?>","url":"#"} /-->
						<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Careers', 'twentytwentyfour' ); ?>","url":"#"} /-->

						<!-- /zc:navigation -->

					</div>
					<!-- /zc:group -->
				</div>

				<!-- /zc:group -->

				<!-- zc:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
				<div class="zc-block-group">
					<!-- zc:heading {"level":2,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontFamily":"body"} -->
					<h2 class="zc-block-heading has-medium-font-size has-body-font-family" style="font-style:normal;font-weight:600"><?php esc_html_e( 'Privacy', 'twentytwentyfour' ); ?></h2>
					<!-- /zc:heading -->

					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="zc-block-group">

						<!-- zc:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small","ariaLabel":"<?php esc_attr_e( 'Privacy', 'twentytwentyfour' ); ?>"} -->

						<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Privacy Policy', 'twentytwentyfour' ); ?>","url":"#"} /-->
						<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Terms and Conditions', 'twentytwentyfour' ); ?>","url":"#"} /-->
						<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Contact Us', 'twentytwentyfour' ); ?>","url":"#"} /-->

						<!-- /zc:navigation -->

					</div>
					<!-- /zc:group -->
				</div>
				<!-- /zc:group -->

				<!-- zc:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
				<div class="zc-block-group">
					<!-- zc:heading {"level":2,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontFamily":"body"} -->
					<h2 class="zc-block-heading has-medium-font-size has-body-font-family" style="font-style:normal;font-weight:600"><?php esc_html_e( 'Social', 'twentytwentyfour' ); ?></h2>
					<!-- /zc:heading -->

					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="zc-block-group">

						<!-- zc:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small","ariaLabel":"<?php esc_attr_e( 'Social Media', 'twentytwentyfour' ); ?>"} -->

						<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Facebook', 'twentytwentyfour' ); ?>","url":"#"} /-->
						<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Instagram', 'twentytwentyfour' ); ?>","url":"#"} /-->
						<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Twitter/X', 'twentytwentyfour' ); ?>","url":"#"} /-->

						<!-- /zc:navigation -->

					</div>
					<!-- /zc:group -->
				</div>
				<!-- /zc:group -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->

	<!-- zc:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"0"}}}} -->
	<div class="zc-block-group alignwide" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:0">
		<!-- zc:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast-2","fontSize":"small"} -->
		<p class="has-contrast-2-color has-text-color has-link-color has-small-font-size">
		<?php
			/* Translators: ZelocoreCMS link. */
			$zelocorecms_link = '<a href="' . esc_url( __( 'https://zelocorecms.org', 'twentytwentyfour' ) ) . '" rel="nofollow">ZelocoreCMS</a>';
			echo sprintf(
				/* Translators: Designed with ZelocoreCMS */
				esc_html__( 'Designed with %1$s', 'twentytwentyfour' ),
				$zelocorecms_link
			);
			?>
		</p>
		<!-- /zc:paragraph -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
