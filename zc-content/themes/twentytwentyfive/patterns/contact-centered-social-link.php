<?php
/**
 * Title: Centered link and social links
 * Slug: twentytwentyfive/contact-centered-social-link
 * Keywords: contact, faq, questions
 * Categories: contact
 * Description: Centered contact section with a prominent message and social media links.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>

<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"blockGap":"var:preset|spacing|50","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--80);padding-bottom:var(--zc--preset--spacing--80)">
	<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:paragraph {"align":"center","className":"is-style-text-display","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
		<p class="has-text-align-center is-style-text-display" style="font-style:normal;font-weight:400"><?php echo zc_kses_post( _x( 'Got questions? <br><a href="#" rel="nofollow">Feel free to reach out.</a>', 'Heading of the Contact social link pattern', 'twentytwentyfive' ) ); ?></p>
		<!-- /zc:paragraph -->

		<!-- zc:spacer {"height":"var:preset|spacing|40"} -->
		<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->

		<!-- zc:social-links {"iconColor":"contrast","className":"has-icon-color is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
		<ul class="zc-block-social-links has-icon-color is-style-logos-only">
			<!-- zc:social-link {"url":"#","service":"twitter"} /-->
			<!-- zc:social-link {"url":"#","service":"facebook"} /-->
			<!-- zc:social-link {"url":"#","service":"instagram"} /-->
			<!-- zc:social-link {"url":"#","service":"pinterest"} /-->
		</ul>
		<!-- /zc:social-links -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
