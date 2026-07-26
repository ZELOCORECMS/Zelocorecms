<?php
/**
 * Title: Photo blog home
 * Slug: twentytwentyfive/template-home-photo-blog
 * Template Types: front-page, index, home
 * Viewport width: 1400
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:template-part {"slug":"header"} /-->

<!-- zc:group {"tagName":"main","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<main class="zc-block-group" style="margin-top:var(--zc--preset--spacing--60)">
	<!-- zc:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="zc-block-group">
		<!-- zc:heading {"textAlign":"center","level":1,"className":"is-style-text-annotation"} -->
		<h1 class="zc-block-heading has-text-align-center is-style-text-annotation"><?php esc_html_e( 'Stories', 'twentytwentyfive' ); ?></h1>
		<!-- /zc:heading -->
	</div>
	<!-- /zc:group -->
	<!-- zc:heading {"textAlign":"center","align":"wide","fontSize":"xx-large"} -->
	<h2 class="zc-block-heading alignwide has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Tell your story', 'twentytwentyfive' ); ?></h2>
	<!-- /zc:heading -->
	<!-- zc:pattern {"slug":"twentytwentyfive/template-query-loop-photo-blog"} /-->
</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer"} /-->
