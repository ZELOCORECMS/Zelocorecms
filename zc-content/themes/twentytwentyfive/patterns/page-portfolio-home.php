<?php
/**
 * Title: Portfolio homepage
 * Slug: twentytwentyfive/page-portfolio-home
 * Categories: twentytwentyfive_page, posts
 * Keywords: starter
 * Block Types: core/post-content
 * Post Types: page, zc_template
 * Viewport width: 1400
 * Description: A portfolio homepage pattern.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","layout":{"type":"default"}} -->
<div class="zc-block-group alignfull">
	<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignfull" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
		<!-- zc:columns {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|50"}}}} -->
		<div class="zc-block-columns alignwide" style="padding-top:var(--zc--preset--spacing--80);padding-bottom:var(--zc--preset--spacing--50)">
			<!-- zc:column {"width":"50%"} -->
			<div class="zc-block-column" style="flex-basis:50%">
				<!-- zc:heading {"align":"wide","fontSize":"x-large"} -->
				<h2 class="zc-block-heading alignwide has-x-large-font-size"><?php esc_html_e( 'My name is Anna Möller and these are some of my photo projects.', 'twentytwentyfive' ); ?></h2>
				<!-- /zc:heading -->
			</div>
			<!-- /zc:column -->

			<!-- zc:column {"width":"50%"} -->
			<div class="zc-block-column" style="flex-basis:50%">
				<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
				<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
				</div>
			<!-- /zc:column -->
		</div>
		<!-- /zc:columns -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->

<!-- zc:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|20"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"width":"66.66%"} -->
		<div class="zc-block-column" style="flex-basis:66.66%">
			<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]},"layout":{"type":"default"}} -->
			<div class="zc-block-query">
				<!-- zc:post-template -->
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
					<div class="zc-block-group">
						<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
						<!-- zc:post-title {"isLink":true} /-->
						<!-- zc:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-4"}}},"typography":{"fontStyle":"normal","fontWeight":"300"}}} /-->
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
		<!-- /zc:column -->
		<!-- zc:column {"width":"33.33%"} -->
		<div class="zc-block-column" style="flex-basis:33.33%">
			<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]},"layout":{"type":"default"}} -->
			<div class="zc-block-query">
				<!-- zc:post-template -->
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
					<div class="zc-block-group">
						<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
						<!-- zc:post-title {"isLink":true} /-->
						<!-- zc:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-4"}}},"typography":{"fontStyle":"normal","fontWeight":"300"}}} /-->
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
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->

	<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
	<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->
</div>
<!-- /zc:group -->

<!-- zc:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0">
	<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
	<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->
	<!-- zc:query {"query":{"perPage":3,"pages":0,"offset":"2","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]},"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-query alignwide">
		<!-- zc:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":3}} -->
			<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
			<div class="zc-block-group">
				<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
				<!-- zc:post-title {"isLink":true} /-->
				<!-- zc:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-4"}}},"typography":{"fontStyle":"normal","fontWeight":"300"}}} /-->
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
	<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
	<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->
</div>
<!-- /zc:group -->

<!-- zc:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0">
	<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
	<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|20"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"width":"33.33%"} -->
		<div class="zc-block-column" style="flex-basis:33.33%">
			<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":"5","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]},"layout":{"type":"default"}} -->
			<div class="zc-block-query">
				<!-- zc:post-template -->
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
					<div class="zc-block-group">
						<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
						<!-- zc:post-title {"isLink":true} /-->
						<!-- zc:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-4"}}},"typography":{"fontStyle":"normal","fontWeight":"300"}}} /-->
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
		<!-- /zc:column -->
		<!-- zc:column {"width":"66.66%"} -->
		<div class="zc-block-column" style="flex-basis:66.66%">
			<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":"6","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]},"layout":{"type":"default"}} -->
			<div class="zc-block-query">
				<!-- zc:post-template -->
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
					<div class="zc-block-group">
						<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
						<!-- zc:post-title {"isLink":true} /-->
						<!-- zc:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-4"}}},"typography":{"fontStyle":"normal","fontWeight":"300"}}} /-->
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
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->

	<!-- zc:spacer {"height":"var:preset|spacing|70"} -->
	<div style="height:var(--zc--preset--spacing--70)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->

	<!-- zc:query {"query":{"perPage":3,"pages":0,"offset":"7","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"ignore","inherit":false,"taxQuery":null,"parents":[]},"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-query alignwide">
		<!-- zc:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":3}} -->
			<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
			<div class="zc-block-group">
				<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
				<!-- zc:post-title {"isLink":true} /-->
				<!-- zc:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-4"}}},"typography":{"fontStyle":"normal","fontWeight":"300"}}} /-->
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

	<!-- zc:separator {"align":"full"} -->
	<hr class="zc-block-separator alignfull has-alpha-channel-opacity"/>
	<!-- /zc:separator -->

	<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
	<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer"></div>
	<!-- /zc:spacer -->
</div>
<!-- /zc:group -->

<!-- zc:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0">
	<!-- zc:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
		<div class="zc-block-group alignwide">
			<!-- zc:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'Twenty Twenty-Five', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->
			<!-- zc:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'email@example.com', 'twentytwentyfive' ); ?><br><?php echo esc_html_x( '+1 555 349 1806', 'Phone number.', 'twentytwentyfive' ); ?></p>
			<!-- /zc:paragraph -->
		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
