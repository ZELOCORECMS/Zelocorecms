<?php
/**
 * Title: Cover with big heading
 * Slug: twentytwentyfive/banner-cover-big-heading
 * Categories: banner, about, featured
 * Description: A full-width cover section with a large background image and an oversized heading.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","className":"is-style-section-3","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull is-style-section-3" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
	<!-- zc:group {"align":"wide","style":{"spacing":{}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:image {"sizeSlug":"full","linkDestination":"none","align":"wide"} -->
		<figure class="zc-block-image alignwide size-full">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/coming-soon-bg-image.webp" alt="<?php esc_attr_e( 'Photo of a field full of flowers, a blue sky and a tree.', 'twentytwentyfive' ); ?>"/>
		</figure>
		<!-- /zc:image -->

		<!-- zc:group {"align":"full","layout":{"type":"default"}} -->
		<div class="zc-block-group alignfull">
			<!-- zc:heading {"align":"left","style":{"typography":{"fontSize":"clamp(1rem, 380px, 24vw)","letterSpacing":"-0.02em","lineHeight":"1","fontWeight":"700","fontStyle":"normal"}}} -->
			<h2 class="zc-block-heading has-text-align-left" style="font-size:clamp(1rem, 380px, 24vw);font-style:normal;font-weight:700;letter-spacing:-0.02em;line-height:1"><?php esc_html_e( 'Stories', 'twentytwentyfive' ); ?></h2>
			<!-- /zc:heading -->

		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
