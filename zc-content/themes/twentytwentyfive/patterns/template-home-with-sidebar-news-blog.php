<?php
/**
 * Title: News blog with sidebar
 * Slug: twentytwentyfive/template-home-with-sidebar-news-blog
 * Template Types: front-page, index, home
 * Viewport width: 1400
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:template-part {"slug":"header-large-title"} /-->

<!-- zc:group {"tagName":"main","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<main class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"width":"75%"} -->
		<div class="zc-block-column" style="flex-basis:75%">
			<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false}} -->
			<div class="zc-block-query">
				<!-- zc:post-template -->
					<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2","align":"wide"} /-->
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
					<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
						<!-- zc:post-title {"level":1,"isLink":true} /-->
						<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
						<!-- zc:post-date {"isLink":true} /-->
					</div>
					<!-- /zc:group -->
				<!-- /zc:post-template -->
			</div>
			<!-- /zc:query -->
		</div>
		<!-- /zc:column -->
		<!-- zc:column {"width":"25%"} -->
		<div class="zc-block-column" style="flex-basis:25%">
			<!-- zc:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase","letterSpacing":"1.6px"}},"fontSize":"small"} -->
			<h2 class="zc-block-heading has-small-font-size" style="font-style:normal;font-weight:600;letter-spacing:1.6px;text-transform:uppercase"><?php esc_html_e( 'The Latest', 'twentytwentyfive' ); ?></h2>
			<!-- /zc:heading -->
			<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
			<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
			<!-- /zc:spacer -->
			<!-- zc:query {"query":{"perPage":6,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[]}} -->
			<div class="zc-block-query">
				<!-- zc:post-template -->
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="zc-block-group">
						<!-- zc:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->
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
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
	<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
	<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->
	<!-- zc:query {"query":{"perPage":4,"pages":0,"offset":"7","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]},"align":"wide"} -->
	<div class="zc-block-query alignwide">
		<!-- zc:post-template -->
			<!-- zc:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"color":"var:preset|color|accent-6","width":"1px"}}}} -->
			<div class="zc-block-columns" style="border-bottom-color:var(--zc--preset--color--accent-6);border-bottom-width:1px;margin-top:var(--zc--preset--spacing--30);margin-bottom:var(--zc--preset--spacing--30);padding-top:var(--zc--preset--spacing--30);padding-bottom:var(--zc--preset--spacing--30)">
				<!-- zc:column {"verticalAlignment":"center","width":"60%"} -->
				<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:60%">
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
					<div class="zc-block-group">
						<!-- zc:post-title {"fontSize":"x-large"} /-->
						<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"fontSize":"small","layout":{"type":"flex","flexWrap":"wrap"}} -->
						<div class="zc-block-group has-small-font-size">
							<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
							<!-- zc:paragraph -->
							<p><?php echo esc_html_x( '·', 'Separator between date and categories.', 'twentytwentyfive' ); ?></p>
							<!-- /zc:paragraph -->
							<!-- zc:post-date {"isLink":true} /-->
						</div>
						<!-- /zc:group -->
					</div>
					<!-- /zc:group -->
				</div>
				<!-- /zc:column -->
				<!-- zc:column {"width":"20%"} -->
				<div class="zc-block-column" style="flex-basis:20%"></div>
				<!-- /zc:column -->
				<!-- zc:column {"width":"13.33%"} -->
				<div class="zc-block-column" style="flex-basis:13.33%">
					<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"1","style":{"layout":{"selfStretch":"fixed","flexSize":"180px"}}} /-->
				</div>
				<!-- /zc:column -->
			</div>
			<!-- /zc:columns -->
		<!-- /zc:post-template -->
		<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
		<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--30);padding-bottom:var(--zc--preset--spacing--30)">
			<!-- zc:query-pagination {"fontSize":"medium","layout":{"type":"flex","justifyContent":"space-between"}} -->
				<!-- zc:query-pagination-previous /-->
				<!-- zc:query-pagination-numbers /-->
				<!-- zc:query-pagination-next /-->
			<!-- /zc:query-pagination -->
		</div>
		<!-- /zc:group -->
		<!-- zc:query-no-results -->
			<!-- zc:paragraph -->
			<p><?php echo esc_html_x( 'Sorry, but nothing was found. Please try a search with different keywords.', 'Message explaining that there are no results returned from a search.', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->
		<!-- /zc:query-no-results -->
	</div>
	<!-- /zc:query -->
</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer-columns"} /-->
