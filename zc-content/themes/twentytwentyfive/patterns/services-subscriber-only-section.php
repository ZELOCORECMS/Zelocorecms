<?php
/**
 * Title: Services, subscriber only section
 * Slug: twentytwentyfive/services-subscriber-only-section
 * Categories: call-to-action, services
 * Description: A subscriber-only section highlighting exclusive services and offerings.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|50","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--70);padding-bottom:var(--zc--preset--spacing--70)">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|70","left":"var:preset|spacing|70"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"verticalAlignment":"center"} -->
		<div class="zc-block-column is-vertically-aligned-center">
			<!-- zc:heading {"fontSize":"xx-large"} -->
			<h2 class="zc-block-heading has-xx-large-font-size"><?php esc_html_e( 'Subscribe to get unlimited access', 'twentytwentyfive' ); ?></h2>
			<!-- /zc:heading -->

			<!-- zc:list {"className":"is-style-checkmark-list","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"padding":{"left":"var:preset|spacing|30"}}}} -->
			<ul style="margin-top:var(--zc--preset--spacing--40);margin-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--30)" class="zc-block-list is-style-checkmark-list">
				<!-- zc:list-item {"fontSize":"medium"} -->
				<li class="has-medium-font-size"><?php esc_html_e( 'Get access to our paid articles and weekly newsletter.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item {"fontSize":"medium"} -->
				<li class="has-medium-font-size"><?php esc_html_e( 'Join our IRL events.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item {"fontSize":"medium"} -->
				<li class="has-medium-font-size"><?php esc_html_e( 'Get a free tote bag.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item {"fontSize":"medium"} -->
				<li class="has-medium-font-size"><?php esc_html_e( 'An elegant addition of home decor collection.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->

				<!-- zc:list-item {"fontSize":"medium"} -->
				<li class="has-medium-font-size"><?php esc_html_e( 'Join our forums.', 'twentytwentyfive' ); ?></li>
				<!-- /zc:list-item -->
			</ul>
			<!-- /zc:list -->

			<!-- zc:buttons {"layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap"}} -->
			<div class="zc-block-buttons">
				<!-- zc:button {"className":"is-style-fill"} -->
				<div class="zc-block-button is-style-fill"><a class="zc-block-button__link zc-element-button"><?php esc_html_e( 'Subscribe', 'twentytwentyfive' ); ?></a></div>
				<!-- /zc:button -->

				<!-- zc:button {"className":"is-style-outline"} -->
				<div class="zc-block-button is-style-outline"><a class="zc-block-button__link zc-element-button"><?php esc_html_e( 'View plans', 'twentytwentyfive' ); ?></a></div>
				<!-- /zc:button -->
			</div>
			<!-- /zc:buttons -->

			<!-- zc:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'Cancel or pause anytime.', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"verticalAlignment":"center"} -->
		<div class="zc-block-column is-vertically-aligned-center">
			<!-- zc:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="zc-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/services-subscriber-photo.webp" alt="<?php esc_attr_e( 'Smartphones capturing a scenic wildflower meadow with trees', 'twentytwentyfive' ); ?>"/></figure>
			<!-- /zc:image -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
