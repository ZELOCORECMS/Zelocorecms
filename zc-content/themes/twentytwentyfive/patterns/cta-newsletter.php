<?php
/**
 * Title: Newsletter sign-up
 * Slug: twentytwentyfive/cta-newsletter
 * Keywords: call-to-action, newsletter
 * Categories: call-to-action
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"tagName":"aside","align":"full","className":"is-style-section-3","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""}},"layout":{"type":"constrained","contentSize":"800px"}} -->
<aside class="zc-block-group alignfull is-style-section-3" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:group {"style":{"dimensions":{"minHeight":"360px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
	<div class="zc-block-group" style="min-height:360px;margin-top:0;margin-bottom:0">
		<!-- zc:heading {"textAlign":"center","fontSize":"xx-large"} -->
		<h2 class="zc-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Sign up to get daily stories', 'twentytwentyfive' ); ?></h2>
		<!-- /zc:heading -->

		<!-- zc:paragraph {"align":"center","className":"is-style-text-subtitle"} -->
		<p class="has-text-align-center is-style-text-subtitle"><?php esc_html_e( 'Get access to a curated collection of moments in time featuring photographs from historical relevance.', 'twentytwentyfive' ); ?></p>
		<!-- /zc:paragraph -->

		<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
		<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->

		<!-- zc:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="zc-block-buttons"><!-- zc:button {"textAlign":"center"} -->
			<div class="zc-block-button"><a class="zc-block-button__link has-text-align-center zc-element-button"><?php esc_html_e( 'Subscribe', 'twentytwentyfive' ); ?></a></div>
		<!-- /zc:button --></div>
		<!-- /zc:buttons -->
	</div>
	<!-- /zc:group -->
</aside>
<!-- /zc:group -->
