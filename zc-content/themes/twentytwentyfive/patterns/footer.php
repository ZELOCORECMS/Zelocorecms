<?php
/**
 * Title: Footer
 * Slug: twentytwentyfive/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Footer columns with logo, title, tagline and links.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--50)">
	<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:site-logo /-->

		<!-- zc:group {"align":"full","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
		<div class="zc-block-group alignfull">
			<!-- zc:columns -->
			<div class="zc-block-columns">
				<!-- zc:column {"width":"100%"} -->
				<div class="zc-block-column" style="flex-basis:100%"><!-- zc:site-title {"level":2} /-->

				<!-- zc:site-tagline /-->
				</div>
				<!-- /zc:column -->

				<!-- zc:column {"width":""} -->
				<div class="zc-block-column">
					<!-- zc:spacer {"height":"var:preset|spacing|40","width":"0px"} -->
					<div style="height:var(--zc--preset--spacing--40);width:0px" aria-hidden="true" class="zc-block-spacer"></div>
					<!-- /zc:spacer -->
				</div>
				<!-- /zc:column -->
			</div>
			<!-- /zc:columns -->

			<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|80"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"top","justifyContent":"space-between"}} -->
			<div class="zc-block-group">
				<!-- zc:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"}} -->
					<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Blog', 'twentytwentyfive' ); ?>","url":"#"} /-->

					<!-- zc:navigation-link {"label":"<?php esc_html_e( 'About', 'twentytwentyfive' ); ?>","url":"#"} /-->

					<!-- zc:navigation-link {"label":"<?php esc_html_e( 'FAQs', 'twentytwentyfive' ); ?>","url":"#"} /-->

					<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Authors', 'twentytwentyfive' ); ?>","url":"#"} /-->
				<!-- /zc:navigation -->

				<!-- zc:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"}} -->
					<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Events', 'twentytwentyfive' ); ?>","url":"#"} /-->

					<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Shop', 'twentytwentyfive' ); ?>","url":"#"} /-->

					<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Patterns', 'twentytwentyfive' ); ?>","url":"#"} /-->

					<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Themes', 'twentytwentyfive' ); ?>","url":"#"} /-->
				<!-- /zc:navigation -->
			</div>
				<!-- /zc:group -->
		</div>
		<!-- /zc:group -->

		<!-- zc:spacer {"height":"var:preset|spacing|70"} -->
		<div style="height:var(--zc--preset--spacing--70)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->

		<!-- zc:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
		<div class="zc-block-group alignfull">
			<!-- zc:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'Twenty Twenty-Five', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->
			<!-- zc:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size">
				<?php
				printf(
					/* translators: Designed with ZelocoreCMS. %s: ZelocoreCMS link. */
					esc_html__( 'Designed with %s', 'twentytwentyfive' ),
					'<a href="' . esc_url( __( 'https://zelocorecms.org', 'twentytwentyfive' ) ) . '" rel="nofollow">ZelocoreCMS</a>'
				);
				?>
			</p>
			<!-- /zc:paragraph -->
		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
