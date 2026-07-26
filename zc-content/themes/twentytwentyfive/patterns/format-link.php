<?php
/**
 * Title: Link format
 * Slug: twentytwentyfive/format-link
 * Categories: twentytwentyfive_post-format
 * Description: A link post format with a description and an emphasized link for key content.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"className":"is-style-section-3","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group is-style-section-3" style="padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--40)">
	<!-- zc:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
	<p style="font-style:normal;font-weight:700"><?php esc_html_e( 'The Stories Book, a fine collection of moments in time featuring photographs from Louis Fleckenstein, Paul Strand and Asahachi Kōno, is available for pre-order', 'twentytwentyfive' ); ?></p>
	<!-- /zc:paragraph -->

	<!-- zc:group {"fontSize":"medium","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="zc-block-group has-medium-font-size">
		<!-- zc:paragraph -->
		<p><a href="#"><?php esc_html_e( 'https://example.com', 'twentytwentyfive' ); ?></a></p>
		<!-- /zc:paragraph -->
		</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
