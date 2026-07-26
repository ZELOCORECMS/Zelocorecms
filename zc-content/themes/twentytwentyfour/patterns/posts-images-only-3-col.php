<?php
/**
 * Title: Posts with featured images only, 3 columns
 * Slug: twentytwentyfour/posts-images-only-3-col
 * Categories: query
 * Block Types: core/query
 * Description: A list of posts with featured images only, 3 columns.
 */
?>

<!-- zc:query {"query":{"perPage":10,"pages":0,"offset":"0","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","layout":{"type":"default"}} -->
<div class="zc-block-query alignwide">
	<!-- zc:query-no-results -->
	<!-- zc:pattern {"slug":"twentytwentyfour/hidden-no-results"} /-->
	<!-- /zc:query-no-results -->

	<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
	<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:0;padding-bottom:var(--zc--preset--spacing--50);padding-left:0">

		<!-- zc:post-template {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":3}} -->
		<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/4","style":{"spacing":{"margin":{"bottom":"0"},"padding":{"bottom":"var:preset|spacing|20"}}}} /-->
		<!-- /zc:post-template -->

		<!-- zc:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<div style="margin-top:0;margin-bottom:0;height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->

		<!-- zc:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- zc:query-pagination-previous /-->
		<!-- zc:query-pagination-next /-->
		<!-- /zc:query-pagination -->

	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:query -->
