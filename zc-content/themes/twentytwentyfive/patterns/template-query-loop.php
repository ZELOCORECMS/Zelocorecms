<?php
/**
 * Title: List of posts, 1 column
 * Slug: twentytwentyfive/template-query-loop
 * Categories: query
 * Block Types: core/query
 * Description: A list of posts, 1 column, with featured image and post date.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]},"align":"full","layout":{"type":"default"}} -->
<div class="zc-block-query alignfull">
	<!-- zc:post-template {"align":"full","layout":{"type":"default"}} -->
		<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
		<div class="zc-block-group alignfull" style="padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
			<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
			<!-- zc:post-title {"isLink":true,"fontSize":"x-large"} /-->
			<!-- zc:post-content {"align":"full","fontSize":"medium","layout":{"type":"constrained"}} /-->
			<!-- zc:post-date {"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"fontSize":"small"} /-->
		</div>
		<!-- /zc:group -->
	<!-- /zc:post-template -->
	<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
		<!-- zc:query-no-results -->
		<!-- zc:paragraph -->
		<p><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'twentytwentyfive' ); ?></p>
		<!-- /zc:paragraph -->
		<!-- /zc:query-no-results -->
	</div>
	<!-- /zc:group -->
	<!-- zc:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
			<!-- zc:query-pagination-previous /-->
			<!-- zc:query-pagination-numbers /-->
			<!-- zc:query-pagination-next /-->
		<!-- /zc:query-pagination -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:query -->
