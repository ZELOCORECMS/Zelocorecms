<?php
/**
 * Title: News blog home
 * Slug: twentytwentyfive/template-home-news-blog
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

<!-- zc:group {"tagName":"main","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<main class="zc-block-group">
	<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignfull" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
		<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
		<div class="zc-block-columns alignwide">
			<!-- zc:column {"width":"25%"} -->
			<div class="zc-block-column" style="flex-basis:25%">
				<!-- zc:group {"style":{"layout":{"columnSpan":1,"rowSpan":1}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
				<div class="zc-block-group">
					<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]}} -->
					<div class="zc-block-query">
						<!-- zc:post-template -->
							<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
							<div class="zc-block-group">
								<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
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
					<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":"3","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]}} -->
					<div class="zc-block-query">
						<!-- zc:post-template -->
							<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
							<div class="zc-block-group">
								<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
								<!-- zc:post-title {"isLink":true,"fontSize":"large"} /-->
								<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
							</div>
							<!-- /zc:group -->
						<!-- /zc:post-template -->
					</div>
					<!-- /zc:query -->
				</div>
				<!-- /zc:group -->
			</div>
			<!-- /zc:column -->
			<!-- zc:column {"width":"50%"} -->
			<div class="zc-block-column" style="flex-basis:50%">
				<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]}} -->
				<div class="zc-block-query">
					<!-- zc:post-template -->
						<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
						<div class="zc-block-group">
							<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"4/3"} /-->
							<!-- zc:post-title {"level":1,"isLink":true} /-->
							<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
							<!-- zc:post-excerpt {"fontSize":"medium"} /-->
						</div>
						<!-- /zc:group -->
					<!-- /zc:post-template -->
				</div>
				<!-- /zc:query -->
			</div>
			<!-- /zc:column -->
			<!-- zc:column {"width":"25%"} -->
			<div class="zc-block-column" style="flex-basis:25%">
				<!-- zc:group {"style":{"layout":{"columnSpan":1,"rowSpan":1}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
				<div class="zc-block-group">
					<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":"2","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]}} -->
					<div class="zc-block-query">
						<!-- zc:post-template -->
							<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
							<div class="zc-block-group">
								<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
								<!-- zc:post-title {"isLink":true,"fontSize":"large"} /-->
								<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
							</div>
							<!-- /zc:group -->
						<!-- /zc:post-template -->
					</div>
					<!-- /zc:query -->
					<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":"4","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]}} -->
					<div class="zc-block-query">
						<!-- zc:post-template -->
							<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
							<div class="zc-block-group">
								<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
								<!-- zc:post-title {"isLink":true,"fontSize":"large"} /-->
								<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
							</div>
							<!-- /zc:group -->
						<!-- /zc:post-template -->
					</div>
					<!-- /zc:query -->
				</div>
				<!-- /zc:group -->
			</div>
			<!-- /zc:column -->
		</div>
		<!-- /zc:columns -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignfull" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
		<!-- zc:query {"query":{"perPage":2,"pages":0,"offset":"5","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]},"align":"wide"} -->
		<div class="zc-block-query alignwide">
			<!-- zc:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":2}} -->
				<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
				<div class="zc-block-group">
					<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
					<!-- zc:post-title {"isLink":true,"fontSize":"x-large"} /-->
					<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
				</div>
				<!-- /zc:group -->
			<!-- /zc:post-template -->
		</div>
		<!-- /zc:query -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignfull" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
		<!-- zc:query {"query":{"perPage":6,"pages":0,"offset":"7","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]},"align":"wide"} -->
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
			<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
			<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
				<!-- zc:query-pagination {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
					<!-- zc:query-pagination-previous /-->
					<!-- zc:query-pagination-numbers /-->
					<!-- zc:query-pagination-next /-->
				<!-- /zc:query-pagination -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:query -->
	</div>
	<!-- /zc:group -->
</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer-newsletter"} /-->
