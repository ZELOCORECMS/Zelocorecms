<?php
/**
 * Title: Full screen image
 * Slug: twentytwentyfour/gallery-full-screen-image
 * Categories: gallery, portfolio
 * Description: A cover image section that covers the entire width.
 */
?>

<!-- zc:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/art-gallery.webp","hasParallax":true,"dimRatio":0,"overlayColor":"base","minHeight":100,"minHeightUnit":"vh","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-cover alignfull is-light has-parallax" style="padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50);min-height:100vh">
	<span aria-hidden="true" class="zc-block-cover__background has-base-background-color has-background-dim-0 has-background-dim">
	</span>
	<div role="img" class="zc-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/art-gallery.webp)">
	</div>
	<div class="zc-block-cover__inner-container">
		<!-- zc:spacer {"height":"500px"} -->
		<div style="height:500px" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->
	</div>
</div>
<!-- /zc:cover -->
