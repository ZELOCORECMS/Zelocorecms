<?php
/**
 * Title: List of posts without images, 1 column
 * Slug: twentytwentyfour/posts-list
 * Categories: query, posts
 * Block Types: core/query
 * Description: A list of posts without images, 1 column.
 */
?>

<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:heading {"align":"wide","style":{"typography":{"lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}},"fontSize":"x-large"} -->
		<h2 class="zc-block-heading alignwide has-x-large-font-size" style="margin-top:0;margin-bottom:var(--zc--preset--spacing--40);line-height:1"><?php esc_html_e( 'Watch, Read, Listen', 'twentytwentyfour' ); ?></h2>
	<!-- /zc:heading -->

	<!-- zc:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","layout":{"type":"default"}} -->
		<div class="zc-block-query alignwide">
			<!-- zc:post-template -->
			<!-- zc:separator {"backgroundColor":"contrast-3","className":"alignwide is-style-wide"} -->
			<hr class="zc-block-separator has-text-color has-contrast-3-color has-alpha-channel-opacity has-contrast-3-background-color has-background alignwide is-style-wide" />
			<!-- /zc:separator -->

			<!-- zc:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
			<div class="zc-block-columns alignwide are-vertically-aligned-center" style="margin-top:var(--zc--preset--spacing--20);margin-bottom:var(--zc--preset--spacing--20)">
				<!-- zc:column {"verticalAlignment":"center","width":"72%"} -->
				<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:72%">
					<!-- zc:post-title {"isLink":true,"style":{"typography":{"lineHeight":"1.1","fontSize":"1.5rem"}}} /-->
				</div>
				<!-- /zc:column -->

				<!-- zc:column {"verticalAlignment":"center","width":"28%"} -->
				<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:28%">
					<!-- zc:template-part {"slug":"post-meta"} /-->
				</div>
				<!-- /zc:column -->
			</div>
			<!-- /zc:columns -->
			<!-- /zc:post-template -->

			<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
			<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer"></div>
			<!-- /zc:spacer -->

			<!-- zc:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
			<!-- zc:query-pagination-previous /-->

			<!-- zc:query-pagination-numbers /-->

			<!-- zc:query-pagination-next /-->
			<!-- /zc:query-pagination -->

			<!-- zc:query-no-results -->
			<!-- zc:pattern {"slug":"twentytwentyfour/hidden-no-results"} /-->
			<!-- /zc:query-no-results -->
		</div>
		<!-- /zc:query -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
