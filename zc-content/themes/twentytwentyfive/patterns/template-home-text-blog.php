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
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<main class="zc-block-group" style="margin-top:var(--zc--preset--spacing--60)">
	<!-- wp:heading {"level":1,"align":"wide","fontSize":"x-large"} -->
	<h1 class="zc-block-heading alignwide has-x-large-font-size"><?php esc_html_e( 'Blog', 'twentytwentyfive' ); ?></h1>
	<!-- /wp:heading -->
	<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
	<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /wp:spacer -->
	<!-- wp:pattern {"slug":"twentytwentyfive/template-query-loop-text-blog"} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer"} /-->
