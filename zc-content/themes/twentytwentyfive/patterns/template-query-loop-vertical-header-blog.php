<?php
/**
 * Title: Right-aligned query loop
 * Slug: twentytwentyfive/template-query-loop-vertical-header-blog
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]}} -->
<div class="zc-block-query">
	<!-- zc:post-template -->
		<!-- zc:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="zc-block-group">
			<!-- zc:post-title {"isLink":true,"fontSize":"xx-large"} /-->
			<!-- zc:post-date {"fontSize":"small","isLink":true} /-->
		</div>
		<!-- /zc:group -->
		<!-- zc:spacer {"height":"var:preset|spacing|40"} -->
		<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->
		<!-- zc:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
		<div class="zc-block-columns"><!-- zc:column {"width":"70%"} -->
		<div class="zc-block-column" style="flex-basis:70%"><!-- zc:post-excerpt {"moreText":"","showMoreOnNewLine":false} /--></div>
		<!-- /zc:column -->

		<!-- zc:column -->
		<div class="zc-block-column"></div>
		<!-- /zc:column --></div>
		<!-- /zc:columns -->
		<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
		<!-- zc:spacer {"height":"var:preset|spacing|80"} -->
		<div style="height:var(--zc--preset--spacing--80)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->
	<!-- /zc:post-template -->
	<!-- zc:query-pagination {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
		<!-- zc:query-pagination-previous /-->
		<!-- zc:query-pagination-numbers /-->
		<!-- zc:query-pagination-next /-->
	<!-- /zc:query-pagination -->

	<!-- zc:query-no-results -->
		<!-- zc:paragraph -->
		<p><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'twentytwentyfive' ); ?></p>
		<!-- /zc:paragraph -->
	<!-- /zc:query-no-results -->
</div>
<!-- /zc:query -->
