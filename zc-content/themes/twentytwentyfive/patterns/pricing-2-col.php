<?php
/**
 * Title: Pricing, 2 columns
 * Slug: twentytwentyfive/pricing-2-col
 * Categories: call-to-action
 * Viewport width: 1400
 * Description: Pricing section with two columns, pricing plan, description, and call-to-action buttons.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
	<!-- zc:heading {"textAlign":"center","align":"wide"} -->
	<h2 class="zc-block-heading alignwide has-text-align-center"><?php esc_html_e( 'Pricing', 'twentytwentyfive' ); ?></h2>
	<!-- /zc:heading -->

	<!-- zc:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Cancel or pause anytime.', 'twentytwentyfive' ); ?></p>
	<!-- /zc:paragraph -->

	<!-- zc:spacer {"height":"var:preset|spacing|40"} -->
	<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->

	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|50"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"border":{"width":"1px","color":"var:preset|color|accent-6","radius":"10px"}}} -->
		<div class="zc-block-column has-border-color" style="border-color:var(--zc--preset--color--accent-6);border-width:1px;border-radius:10px;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
			<!-- zc:heading {"level":3} -->
			<h3 class="zc-block-heading" id="free"><?php esc_html_e( 'Free', 'twentytwentyfive' ); ?></h3>
			<!-- /zc:heading -->

			<!-- zc:paragraph {"fontSize":"large"} -->
			<p class="has-large-font-size"><?php esc_html_e( '0€', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->

			<!-- zc:list {"className":"is-style-checkmark-list","style":{"spacing":{"padding":{"left":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"fontSize":"small"} -->
			<ul style="padding-bottom:var(--zc--preset--spacing--20);padding-left:var(--zc--preset--spacing--20)" class="zc-block-list is-style-checkmark-list has-small-font-size">
				<!-- zc:list-item -->
				<li><?php esc_html_e( 'Get access to our paid articles and weekly newsletter.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item -->
				<li><?php esc_html_e( 'Join our IRL events.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item -->
				<li><?php esc_html_e( 'Get a free tote bag.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item -->
				<li><?php esc_html_e( 'An elegant addition of home decor collection.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item -->
				<li><?php esc_html_e( 'Join our forums.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->
			</ul>
			<!-- /zc:list -->

			<!-- zc:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="zc-block-buttons">
				<!-- zc:button {"width":100} -->
				<div class="zc-block-button has-custom-width zc-block-button__width-100"><a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Join', 'Button text, refers to joining a community. Verb.', 'twentytwentyfive' ); ?></a></div>
				<!-- /zc:button -->
			</div>
			<!-- /zc:buttons -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"border":{"width":"1px","color":"var:preset|color|accent-6","radius":"10px"}},"layout":{"type":"default"}} -->
		<div class="zc-block-column has-border-color" style="border-color:var(--zc--preset--color--accent-6);border-width:1px;border-radius:10px;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
			<!-- zc:heading {"level":3} -->
			<h3 class="zc-block-heading" id="single"><?php echo esc_html_x( 'Single', 'Name of membership package.', 'twentytwentyfive' ); ?></h3>
			<!-- /zc:heading -->

			<!-- zc:paragraph {"fontSize":"large"} -->
			<p class="has-large-font-size"><?php esc_html_e( '20€/month', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->

			<!-- zc:list {"className":"is-style-checkmark-list","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"fontSize":"small"} -->
			<ul style="padding-bottom:var(--zc--preset--spacing--20);padding-left:var(--zc--preset--spacing--20)" class="zc-block-list is-style-checkmark-list has-small-font-size">
				<!-- zc:list-item -->
				<li><?php esc_html_e( 'Get access to our paid articles and weekly newsletter.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item -->
				<li><?php esc_html_e( 'Join our IRL events.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item -->
				<li><?php esc_html_e( 'Get a free tote bag.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item -->
				<li><?php esc_html_e( 'An elegant addition of home decor collection.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item -->
				<li><?php esc_html_e( 'Join our forums.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->
			</ul>
			<!-- /zc:list -->

			<!-- zc:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="zc-block-buttons">
				<!-- zc:button {"width":100} -->
				<div class="zc-block-button has-custom-width zc-block-button__width-100"><a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Join', 'Button text, refers to joining a community. Verb.', 'twentytwentyfive' ); ?></a></div>
				<!-- /zc:button -->
			</div>
			<!-- /zc:buttons -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
