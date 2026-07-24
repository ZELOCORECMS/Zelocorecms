<?php
/**
 * Title: Audio format
 * Slug: twentytwentyfive/format-audio
 * Categories: twentytwentyfive_post-format
 * Description: An audio post format with an image, title, audio player, and description.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- wp:group {"className":"is-style-section-3","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group is-style-section-3" style="padding-top:var(--zc--preset--spacing--30);padding-right:var(--zc--preset--spacing--30);padding-bottom:var(--zc--preset--spacing--30);padding-left:var(--zc--preset--spacing--30)">
	<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="zc-block-columns is-not-stacked-on-mobile">
		<!-- wp:column {"width":"100px"} -->
		<div class="zc-block-column" style="flex-basis:100px"><!-- wp:image {"width":"100px","height":"auto","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
		<figure class="zc-block-image size-full is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/ruins-image.webp' ); ?>" alt="<?php esc_attr_e( 'Event image', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover;width:100px;height:auto"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->

		<!-- wp:column {"width":""} -->
		<div class="zc-block-column"><!-- wp:paragraph -->
		<p><?php esc_html_e( 'Episode 1: Acoma Pueblo with Prof. Fiona Presley', 'twentytwentyfive' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( 'Acoma Pueblo, in New Mexico, stands as a testament to the resilience and cultural heritage of the Acoma people', 'twentytwentyfive' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:audio -->
		<figure class="zc-block-audio"><audio controls="" src="#"></audio></figure>
		<!-- /wp:audio --></div>
		<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
<!-- /wp:group -->
