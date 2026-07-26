<?php
/**
 * Title: Centered call to action
 * Slug: twentytwentyfour/cta-subscribe-centered
 * Categories: call-to-action
 * Keywords: newsletter, subscribe, button
 * Description: Subscribers CTA section with a title, a paragraph and a CTA button.
 */
?>

<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:group {"align":"wide","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"base-2","layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide has-base-2-background-color has-background" style="border-radius:16px;padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--50)">
		<!-- zc:spacer {"height":"var:preset|spacing|10"} -->
		<div style="height:var(--zc--preset--spacing--10)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->

		<!-- zc:heading {"textAlign":"center","fontSize":"x-large"} -->
		<h2 class="zc-block-heading has-text-align-center has-x-large-font-size"><?php echo esc_html_x( 'Join 900+ subscribers', 'Sample text for Subscriber Heading with numbers', 'twentytwentyfour' ); ?></h2>
		<!-- /zc:heading -->

		<!-- zc:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php echo esc_html_x( 'Stay in the loop with everything you need to know.', 'Sample text for Subscriber Description', 'twentytwentyfour' ); ?></p>
		<!-- /zc:paragraph -->

		<!-- zc:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="zc-block-buttons">
			<!-- zc:button -->
			<div class="zc-block-button">
				<a class="zc-block-button__link zc-element-button"><?php echo esc_html_x( 'Sign up', 'Sample text for Sign Up Button', 'twentytwentyfour' ); ?></a>
			</div>
			<!-- /zc:button -->
		</div>
		<!-- /zc:buttons -->

		<!-- zc:spacer {"height":"var:preset|spacing|10"} -->
		<div style="height:var(--zc--preset--spacing--10)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
