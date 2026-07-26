<?php
/**
 * Title: Text blog query loop
 * Slug: twentytwentyfive/template-query-loop-text-blog
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]},"align":"wide","layout":{"type":"default"}} -->
<div class="zc-block-query alignwide">
	<!-- zc:group {"layout":{"type":"constrained"}} -->
	<div class="zc-block-group">
		<!-- zc:query-no-results {"align":"wide","fontSize":"medium"} -->
			<!-- zc:paragraph -->
			<p><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->
		<!-- /zc:query-no-results -->
	</div>
	<!-- /zc:group -->
	<!-- zc:post-template {"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
		<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"color":"var:preset|color|accent-6","width":"1px"},"top":{},"right":{},"left":{}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"space-between"}} -->
		<div class="zc-block-group alignfull" style="border-bottom-color:var(--zc--preset--color--accent-6);border-bottom-width:1px;padding-top:var(--zc--preset--spacing--30);padding-bottom:var(--zc--preset--spacing--30)">
			<!-- zc:post-title {"isLink":true,"fontSize":"large"} /-->
			<!-- zc:post-date {"textAlign":"right","isLink":true,"fontSize":"small"} /-->
		</div>
		<!-- /zc:group -->
	<!-- /zc:post-template -->

	<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
	<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->

	<!-- zc:group {"align":"full","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignfull" style="margin-top:var(--zc--preset--spacing--40);margin-bottom:var(--zc--preset--spacing--40);">
		<!-- zc:query-pagination {"align":"full","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
		<!-- zc:query-pagination-previous /-->
		<!-- zc:query-pagination-numbers /-->
		<!-- zc:query-pagination-next /-->
		<!-- /zc:query-pagination -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:query -->
