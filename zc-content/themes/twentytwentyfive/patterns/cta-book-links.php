<?php
/**
 * Title: Call to action with book links
 * Slug: twentytwentyfive/cta-book-links
 * Categories: call-to-action
 * Description: A call to action section with links to get the book in different websites.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|50","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
	<!-- zc:heading {"textAlign":"center","align":"wide","fontSize":"x-large"} -->
	<h2 class="zc-block-heading alignwide has-text-align-center has-x-large-font-size"><?php esc_html_e( 'Buy your copy of The Stories Book', 'twentytwentyfive' ); ?></h2>
	<!-- /zc:heading -->

	<!-- zc:buttons {"align":"wide","fontSize":"medium","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="zc-block-buttons alignwide has-custom-font-size has-medium-font-size">
		<!-- zc:button -->
		<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Amazon', 'Example brand name.', 'twentytwentyfive' ); ?></a></div>
		<!-- /zc:button -->

		<!-- zc:button -->
		<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Audible', 'Example brand name.', 'twentytwentyfive' ); ?></a></div>
		<!-- /zc:button -->

		<!-- zc:button -->
		<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Barnes &amp; Noble', 'Example brand name.', 'twentytwentyfive' ); ?></a></div>
		<!-- /zc:button -->

		<!-- zc:button -->
		<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Apple Books', 'Example brand name.', 'twentytwentyfive' ); ?></a></div>
		<!-- /zc:button -->

		<!-- zc:button -->
		<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Bookshop.org', 'Example brand name.', 'twentytwentyfive' ); ?></a></div>
		<!-- /zc:button -->

		<!-- zc:button -->
		<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Spotify', 'Example brand name.', 'twentytwentyfive' ); ?></a></div>
		<!-- /zc:button -->

		<!-- zc:button -->
		<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'BAM!', 'Example brand name.', 'twentytwentyfive' ); ?></a></div>
		<!-- /zc:button -->

		<!-- zc:button -->
		<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Simon &amp; Schuster', 'Example brand name.', 'twentytwentyfive' ); ?></a></div>
		<!-- /zc:button -->
	</div>
	<!-- /zc:buttons -->

	<!-- zc:paragraph {"align":"center","fontSize":"medium"} -->
	<p class="has-text-align-center has-medium-font-size"><?php echo zc_kses_post( _x( 'Outside Europe? View <a href="#" rel="nofollow">international editions</a>.', 'Pattern placeholder text with link.', 'twentytwentyfive' ) ); ?></p>
	<!-- /zc:paragraph -->
</div>
<!-- /zc:group -->
