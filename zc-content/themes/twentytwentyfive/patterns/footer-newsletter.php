<?php
/**
 * Title: Footer with newsletter signup
 * Slug: twentytwentyfive/footer-newsletter
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Footer with large site title and newsletter signup.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","className":"is-style-section-3","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="zc-block-group alignfull is-style-section-3" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
	<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:heading {"style":{"typography":{"fontSize":"clamp(1rem, 380px, 24vw)","letterSpacing":"-0.02em","fontWeight":"600","fontStyle":"normal"}}} -->
		<h2 class="zc-block-heading" style="font-size:clamp(1rem, 380px, 24vw);font-style:normal;font-weight:600;letter-spacing:-0.02em"><?php esc_html_e( 'Stories', 'twentytwentyfive' ); ?></h2>
		<!-- /zc:heading -->

		<!-- zc:paragraph {"fontSize":"x-large"} -->
		<p class="has-x-large-font-size"><?php esc_html_e( 'Receive our articles in your inbox.', 'twentytwentyfive' ); ?></p>
		<!-- /zc:paragraph -->

		<!-- zc:buttons -->
		<div class="zc-block-buttons">
			<!-- zc:button -->
			<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"><?php esc_html_e( 'Subscribe', 'twentytwentyfive' ); ?></a></div>
			<!-- /zc:button -->
		</div>
		<!-- /zc:buttons -->

		<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
		<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->

		<!-- zc:group {"align":"full","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
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
