<?php
/**
 * Title: Photo blog search results
 * Slug: twentytwentyfive/template-search-photo-blog
 * Template Types: search
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
	<!-- zc:query-title {"type":"search","textAlign":"center","align":"wide"} /-->
	<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:pattern {"slug":"twentytwentyfive/hidden-search"} /-->
	</div>
	<!-- /zc:group -->
	<!-- zc:pattern {"slug":"twentytwentyfive/template-query-loop-photo-blog"} /-->
</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer"} /-->
