<?php
/**
 * Title: Right-aligned blog, search
 * Slug: twentytwentyfive/template-search-vertical-header-blog
 * Template Types: search
 * Viewport width: 1400
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:columns {"isStackedOnMobile":false,"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":{"left":"0"}}}} -->
<div class="zc-block-columns is-not-stacked-on-mobile" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- zc:column {"width":"8rem"} -->
	<div class="zc-block-column" style="flex-basis:8rem">
		<!-- zc:template-part {"slug":"vertical-header"} /-->
	</div>
	<!-- /zc:column -->
	<!-- zc:column {"width":"90%","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
	<div class="zc-block-column" style="padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50);flex-basis:90%">
		<!-- zc:group {"tagName":"main","layout":{"type":"default"}} -->
		<main class="zc-block-group">
			<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
			<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
			<!-- /zc:spacer -->
			<!-- zc:query-title {"type":"search","fontSize":"large"} /-->
			<!-- zc:pattern {"slug":"twentytwentyfive/hidden-search"} /-->
			<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
			<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
			<!-- /zc:spacer -->
			<!-- zc:pattern {"slug":"twentytwentyfive/template-query-loop-vertical-header-blog"} /-->
			<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
			<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
			<!-- /zc:spacer -->
		</main>
		<!-- /zc:group -->
	</div>
	<!-- /zc:column -->
</div>
<!-- /zc:columns -->

<!-- zc:template-part {"slug":"footer"} /-->
