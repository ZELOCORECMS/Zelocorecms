<?php
/**
 * Title: Photo blog archive
 * Slug: twentytwentyfive/template-archive-photo-blog
 * Template Types: archive
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
	<!-- zc:query-title {"type":"archive","textAlign":"center"} /-->
	<!-- zc:term-description {"textAlign":"center"} /-->
	<!-- zc:pattern {"slug":"twentytwentyfive/template-query-loop-photo-blog"} /-->
</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer"} /-->
