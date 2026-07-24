<?php
/**
 * Title: Centered heading
 * Slug: twentytwentyfive/cta-centered-heading
 * Categories: call-to-action
 * Description: A hero with a centered heading, paragraph and button.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0vh"}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="min-height:0vh;margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--70);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--70);padding-left:var(--zc--preset--spacing--40)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group">
		<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"right":"0","left":"0"},"padding":{"right":"0","left":"0"}}},"fontSize":"xx-large"} -->
		<h2 class="zc-block-heading has-text-align-center has-xx-large-font-size" style="margin-right:0;margin-left:0;padding-right:0;padding-left:0"><?php esc_html_e( 'Tell your story', 'twentytwentyfive' ); ?></h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php esc_html_e( 'Like flowers that bloom in unexpected places, every story unfolds with beauty and resilience, revealing hidden wonders.', 'twentytwentyfive' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="zc-block-buttons">
			<!-- wp:button -->
			<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"><?php esc_html_e( 'Learn more', 'twentytwentyfive' ); ?></a></div>
			<!-- /wp:button --></div>
		<!-- /wp:buttons -->
		</div>
	<!-- /wp:group -->
	</div>
<!-- /wp:group -->
