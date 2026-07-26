<?php
/**
 * Title: Sidebar
 * Slug: twentytwentyfive/hidden-sidebar
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase","letterSpacing":"1.6px"}},"fontSize":"small"} -->
<h2 class="zc-block-heading has-small-font-size" style="font-style:normal;font-weight:600;letter-spacing:1.6px;text-transform:uppercase"><?php esc_html_e( 'Other Posts', 'twentytwentyfive' ); ?></h2>
<!-- /zc:heading -->

<!-- zc:spacer {"height":"var:preset|spacing|40"} -->
<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer"></div>
<!-- /zc:spacer -->

<!-- zc:query {"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[]}} -->
<div class="zc-block-query">
	<!-- zc:post-template -->
		<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="zc-block-group">
			<!-- zc:post-title {"isLink":true,"fontSize":"medium"} /-->
			<!-- zc:post-date {"fontSize":"small","isLink":true} /-->
		</div>
		<!-- /zc:group -->

		<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
		<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->
	<!-- /zc:post-template -->

	<!-- zc:query-no-results -->
		<!-- zc:paragraph {"placeholder":"<?php esc_attr_e( 'Add text or blocks that will display when a query returns no results.', 'twentytwentyfive' ); ?>","fontSize":"medium"} -->
		<p class="has-medium-font-size"><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'twentytwentyfive' ); ?></p>
		<!-- /zc:paragraph -->
	<!-- /zc:query-no-results -->
</div>
<!-- /zc:query -->
