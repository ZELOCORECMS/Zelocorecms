<?php
/**
 * Title: News blog with featured posts grid
 * Slug: twentytwentyfive/template-home-posts-grid-news-blog
 * Template Types: front-page, index, home
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:template-part {"slug":"header-large-title"} /-->

<!-- zc:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<main class="zc-block-group" style="margin-top:0;margin-bottom:0;">

	<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
		<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false},"align":"wide"} -->
		<div class="zc-block-query alignwide">
			<!-- zc:post-template -->
				<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"16/9","align":"wide"} /-->
				<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
				<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--40)">
					<!-- zc:post-title {"textAlign":"center","level":1,"isLink":true,"fontSize":"xx-large"} /-->
					<!-- zc:post-terms {"term":"category","textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
					<!-- zc:post-date {"textAlign":"center","isLink":true} /-->
				</div>
				<!-- /zc:group -->
			<!-- /zc:post-template -->
			<!-- zc:query-no-results -->
				<!-- zc:paragraph {"align":"center","placeholder":"<?php esc_attr_e( 'Add text or blocks that will display when a query returns no results.', 'twentytwentyfive' ); ?>"} -->
				<p class="has-text-align-center"><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'twentytwentyfive' ); ?></p>
				<!-- /zc:paragraph -->
			<!-- /zc:query-no-results -->
		</div>
		<!-- /zc:query -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
		<!-- zc:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"40rem"}} -->
		<div class="zc-block-group alignwide">
			<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]}} -->
			<div class="zc-block-query">
				<!-- zc:post-template -->
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
					<div class="zc-block-group">
						<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
						<!-- zc:post-title {"isLink":true,"fontSize":"x-large"} /-->
						<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
					</div>
					<!-- /zc:group -->
				<!-- /zc:post-template -->
				<!-- zc:query-no-results -->
				<!-- zc:paragraph -->
				<p><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'twentytwentyfive' ); ?></p>
				<!-- /zc:paragraph -->
				<!-- /zc:query-no-results -->
			</div>
			<!-- /zc:query -->
			<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":"2","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]}} -->
			<div class="zc-block-query">
				<!-- zc:post-template -->
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
					<div class="zc-block-group">
						<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
						<!-- zc:post-title {"isLink":true,"fontSize":"x-large"} /-->
						<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
					</div>
					<!-- /zc:group -->
				<!-- /zc:post-template -->
				<!-- zc:query-no-results -->
				<!-- zc:paragraph -->
				<p><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'twentytwentyfive' ); ?></p>
				<!-- /zc:paragraph -->
				<!-- /zc:query-no-results -->
			</div>
			<!-- /zc:query -->
		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
		<!-- zc:query {"query":{"perPage":3,"pages":0,"offset":"3","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]},"align":"wide"} -->
		<div class="zc-block-query alignwide">
			<!-- zc:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":3}} -->
				<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
				<div class="zc-block-group">
					<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"4/3"} /-->
					<!-- zc:post-title {"isLink":true,"fontSize":"large"} /-->
					<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
				</div>
				<!-- /zc:group -->
			<!-- /zc:post-template -->
			<!-- zc:query-no-results -->
			<!-- zc:paragraph -->
			<p><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->
			<!-- /zc:query-no-results -->
		</div>
		<!-- /zc:query -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
		<!-- zc:heading {"align":"wide"} -->
		<h2 class="zc-block-heading alignwide"><?php esc_html_e( 'Architecture', 'twentytwentyfive' ); ?></h2>
		<!-- /zc:heading -->
		<!-- zc:query {"query":{"perPage":6,"pages":0,"offset":"6","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]},"align":"wide","layout":{"type":"default"}} -->
		<div class="zc-block-query alignwide">
			<!-- zc:post-template {"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
				<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"color":"var:preset|color|accent-6","width":"1px"},"top":[],"right":[],"left":[]}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"space-between"}} -->
				<div class="zc-block-group alignfull" style="border-bottom-color:var(--zc--preset--color--accent-6);border-bottom-width:1px;padding-top:var(--zc--preset--spacing--30);padding-bottom:var(--zc--preset--spacing--30)">
					<!-- zc:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->
					<!-- zc:post-date {"textAlign":"right","isLink":true} /-->
				</div>
				<!-- /zc:group -->
			<!-- /zc:post-template -->
			</div>
		<!-- /zc:query -->
	</div>
	<!-- /zc:group -->

</main>
<!-- /zc:group -->

<!-- zc:pattern {"slug":"twentytwentyfive/cta-newsletter"} /-->

<!-- zc:template-part {"slug":"footer-columns"} /-->
