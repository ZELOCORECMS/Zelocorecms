<?php
/**
 * Title: Centered footer
 * Slug: twentytwentyfive/footer-centered
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Footer with centered site title and tagline.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="padding-top:var(--zc--preset--spacing--70);padding-bottom:var(--zc--preset--spacing--70)">
	<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="zc-block-group">
		<!-- zc:site-title {"level":0,"textAlign":"center"} /-->
		<!-- zc:site-tagline {"textAlign":"center"} /-->
	</div>
	<!-- /zc:group -->

	<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
	<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->

	<!-- zc:paragraph {"align":"center","fontSize":"small"} -->
	<p class="has-text-align-center has-small-font-size">
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
