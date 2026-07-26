<?php
/**
 * Title: Photo blog posts
 * Slug: twentytwentyfive/template-query-loop-photo-blog
 * Categories: query
 * Block Types: core/query
 * Viewport width: 1400
 * Description: A list of posts, 3 columns, with only featured images.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:query {"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]},"align":"wide","layout":{"type":"default"}} -->
<div class="zc-block-query alignwide">
		<!-- zc:group {"layout":{"type":"constrained"}} -->
		<div class="zc-block-group">
		<!-- zc:query-no-results -->
		<!-- zc:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'twentytwentyfive' ); ?></p>
		<!-- /zc:paragraph -->
		<!-- /zc:query-no-results -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
	<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);">
		<!-- zc:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"23rem"}} -->
			<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"1"} /-->
		<!-- /zc:post-template -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"layout":{"type":"default"}} -->
	<div class="zc-block-group">
		<!-- zc:query-pagination {"paginationArrow":"arrow","align":"full","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- zc:query-pagination-previous /-->
		<!-- zc:query-pagination-numbers /-->
		<!-- zc:query-pagination-next /-->
		<!-- /zc:query-pagination -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:query -->
