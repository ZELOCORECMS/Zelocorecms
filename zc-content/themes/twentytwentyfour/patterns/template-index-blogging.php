<?php
/**
 * Title: Blogging index template
 * Slug: twentytwentyfour/template-index-blogging
 * Template Types: index, home
 * Viewport width: 1400
 * Inserter: no
 */
?>

<!-- zc:template-part {"slug":"header","area":"header","tagName":"header"} /-->

<!-- zc:group {"tagName":"main","style":{"spacing":{"blockGap":"0","margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<main class="zc-block-group" style="margin-top:0">
	<!-- zc:heading {"level":1,"style":{"typography":{"lineHeight":"1"},"spacing":{"padding":{"top":"var:preset|spacing|50"}}}} -->
	<h1 class="zc-block-heading" style="padding-top:var(--zc--preset--spacing--50);line-height:1"><?php esc_html_e( 'Watch, Read, Listen', 'twentytwentyfour' ); ?></h1>
	<!-- /zc:heading -->

	<!-- zc:pattern {"slug":"twentytwentyfour/posts-1-col"} /-->
</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer","area":"footer","tagName":"footer"} /-->
