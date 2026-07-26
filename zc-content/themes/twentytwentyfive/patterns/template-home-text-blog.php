<?php
/**
 * Title: Text blog home
 * Slug: twentytwentyfive/template-home-text-blog
 * Template Types: front-page, home
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
	<!-- zc:heading {"level":1,"align":"wide","fontSize":"x-large"} -->
	<h1 class="zc-block-heading alignwide has-x-large-font-size"><?php esc_html_e( 'Blog', 'twentytwentyfive' ); ?></h1>
	<!-- /zc:heading -->
	<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
	<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->
	<!-- zc:pattern {"slug":"twentytwentyfive/template-query-loop-text-blog"} /-->
</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer"} /-->
