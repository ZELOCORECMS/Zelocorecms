<?php
/**
 * Title: News blog query loop
 * Slug: twentytwentyfive/template-query-loop-news-blog
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]}} -->
<div class="zc-block-query"><!-- zc:post-template -->
<!-- zc:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}}}} -->
<div class="zc-block-columns" style="border-top-color:var(--zc--preset--color--accent-6);border-top-width:1px;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)"><!-- zc:column {"width":"20%"} -->
<div class="zc-block-column" style="flex-basis:20%"><!-- zc:post-date {"isLink":true} /--></div>
<!-- /zc:column -->

<!-- zc:column -->
<div class="zc-block-column"><!-- zc:post-title /-->

<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->

<!-- zc:post-excerpt {"showMoreOnNewLine":false,"fontSize":"medium"} /-->

<!-- zc:group {"style":{"spacing":{"blockGap":"0.12em"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="zc-block-group">
	<!-- zc:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-4"}}}},"textColor":"accent-4","fontSize":"small"} -->
	<p class="has-accent-4-color has-text-color has-link-color has-small-font-size"><?php echo esc_html_x( 'Written by', 'Prefix before the author name. The post author name is displayed in a separate block.', 'twentytwentyfive' ); ?></p>
	<!-- /zc:paragraph -->
	<!-- zc:post-author-name {"isLink":true,"fontSize":"small"} /-->
</div>
<!-- /zc:group --></div>
<!-- /zc:column -->

<!-- zc:column {"width":"20%"} -->
<div class="zc-block-column" style="flex-basis:20%"><!-- zc:post-featured-image {"aspectRatio":"1"} /--></div>
<!-- /zc:column --></div>
<!-- /zc:columns -->
<!-- /zc:post-template -->

<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)"><!-- zc:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- zc:query-pagination-previous {"label":"<?php esc_html_e( 'Newer Posts', 'twentytwentyfive' ); ?>"} /-->

<!-- zc:query-pagination-numbers /-->

<!-- zc:query-pagination-next {"label":"<?php esc_html_e( 'Older Posts', 'twentytwentyfive' ); ?>"} /-->
<!-- /zc:query-pagination --></div>
<!-- /zc:group -->

<!-- zc:query-no-results -->
<!-- zc:paragraph -->
<p><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'twentytwentyfive' ); ?></p>
<!-- /zc:paragraph -->
<!-- /zc:query-no-results -->

<!-- zc:spacer {"height":"var:preset|spacing|70"} -->
<div style="height:var(--zc--preset--spacing--70)" aria-hidden="true" class="zc-block-spacer"></div>
<!-- /zc:spacer --></div>
<!-- /zc:query -->
