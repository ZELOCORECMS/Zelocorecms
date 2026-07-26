<?php
/**
 * Title: List of posts, 1 column
 * Slug: twentytwentyfour/posts-1-col
 * Categories: query
 * Block Types: core/query
 * Description: A list of posts, 1 column.
 */
?>

<!-- zc:query {"query":{"perPage":3,"pages":0,"offset":"0","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"constrained"}} -->
<div class="zc-block-query">
	<!-- zc:query-no-results -->
	<!-- zc:pattern {"slug":"twentytwentyfour/hidden-no-results"} /-->
	<!-- /zc:query-no-results -->

	<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
	<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:0;padding-bottom:var(--zc--preset--spacing--50);padding-left:0">
		<!-- zc:post-template {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default","columnCount":3}} -->
		<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->
		<!-- zc:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="zc-block-group">
			<!-- zc:post-title {"isLink":true,"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"x-large"} /-->
			<!-- zc:template-part {"slug":"post-meta"} /-->
			<!-- zc:post-excerpt {"fontSize":"small"} /-->
			<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
			<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer">
			</div>
			<!-- /zc:spacer -->
		</div>
		<!-- /zc:group -->
		<!-- /zc:post-template -->
		<!-- zc:spacer {"height":"var:preset|spacing|50","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<div style="margin-top:0;margin-bottom:0;height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->
		<!-- zc:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- zc:query-pagination-previous /-->
		<!-- zc:query-pagination-next /-->
		<!-- /zc:query-pagination -->

	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:query -->
