<?php
/**
 * Title: Grid with videos
 * Slug: twentytwentyfive/grid-videos
 * Categories: about
 * Description: A grid with videos.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
	<!-- zc:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:heading {"textAlign":"left","align":"wide","className":"is-style-text-subtitle","style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"x-large"} -->
		<h2 class="zc-block-heading alignwide has-text-align-left is-style-text-subtitle has-x-large-font-size"><?php esc_html_e( 'Explore the episodes', 'twentytwentyfive' ); ?></h2>
		<!-- /zc:heading -->

		<!-- zc:paragraph {"className":"is-style-text-annotation"} -->
		<p class="is-style-text-annotation"><?php esc_html_e( 'Podcast', 'twentytwentyfive' ); ?></p>
		<!-- /zc:paragraph -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","minimumColumnWidth":"19rem"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:video -->
		<figure class="zc-block-video"></figure>
		<!-- /zc:video -->

		<!-- zc:video -->
		<figure class="zc-block-video"></figure>
		<!-- /zc:video -->

		<!-- zc:video -->
		<figure class="zc-block-video"></figure>
		<!-- /zc:video -->

		<!-- zc:video -->
		<figure class="zc-block-video"></figure>
		<!-- /zc:video -->

		<!-- zc:video -->
		<figure class="zc-block-video"></figure>
		<!-- /zc:video -->

		<!-- zc:video -->
		<figure class="zc-block-video"></figure>
		<!-- /zc:video -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
