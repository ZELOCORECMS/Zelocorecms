<?php
/**
 * Title: Portfolio index template
 * Slug: twentytwentyfour/template-index-portfolio
 * Template Types: index
 * Viewport width: 1400
 * Inserter: no
 */
?>

<!-- zc:template-part {"slug":"header","area":"header","tagName":"header"} /-->

<!-- zc:group {"tagName":"main","align":"full","layout":{"type":"constrained"}} -->
<main class="zc-block-group alignfull">
	<!-- zc:heading {"level":1,"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50"}}}} -->
	<h1 class="zc-block-heading alignwide" style="padding-top:var(--zc--preset--spacing--50)"><?php esc_html_e( 'Posts', 'twentytwentyfour' ); ?></h1>
	<!-- /zc:heading -->

	<!-- zc:pattern {"slug":"twentytwentyfour/posts-images-only-offset-4-col"} /-->

</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer","area":"footer","tagName":"footer"} /-->
