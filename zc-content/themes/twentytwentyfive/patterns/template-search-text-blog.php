<?php
/**
 * Title: Text blog search results
 * Slug: twentytwentyfive/template-search-text-blog
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
	<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:query-title {"type":"search","align":"wide","fontSize":"x-large"} /-->
		<!-- zc:pattern {"slug":"twentytwentyfive/hidden-search"} /-->
	</div>
	<!-- /zc:group -->
	<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
	<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->
	<!-- zc:pattern {"slug":"twentytwentyfive/template-query-loop-text-blog"} /-->
</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer"} /-->
