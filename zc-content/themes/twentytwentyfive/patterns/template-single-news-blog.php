<?php
/**
 * Title: News blog single post with sidebar
 * Slug: twentytwentyfive/template-single-news-blog
 * Template Types: posts, single
 * Viewport width: 1400
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:template-part {"slug":"header-large-title"} /-->

<!-- zc:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="zc-block-group">

	<!-- zc:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
		<div class="zc-block-group alignwide">
			<!-- zc:spacer {"height":"var:preset|spacing|80"} -->
			<div style="height:var(--zc--preset--spacing--80)" aria-hidden="true" class="zc-block-spacer"></div>
			<!-- /zc:spacer -->
			<!-- zc:post-title {"level":1,"align":"wide","fontSize":"xx-large"} /-->
			<!-- zc:spacer {"height":"var:preset|spacing|40"} -->
			<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer"></div>
			<!-- /zc:spacer -->
			<!-- zc:group {"layout":{"type":"default"}} -->
			<div class="zc-block-group">
				<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
				<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--20);padding-bottom:var(--zc--preset--spacing--20)">
					<!-- zc:group {"style":{"spacing":{"blockGap":"4px"}},"fontSize":"small","layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="zc-block-group has-small-font-size">
						<!-- zc:post-date /-->
						<!-- zc:paragraph -->
						<p><?php echo esc_html_x( '·', 'Separator between date and categories.', 'twentytwentyfive' ); ?></p>
						<!-- /zc:paragraph -->
						<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
					</div>
					<!-- /zc:group -->
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="zc-block-group">
						<!-- zc:avatar {"size":30,"isLink":true,"style":{"border":{"radius":"100px"}}} /-->
						<!-- zc:post-author-name {"isLink":true,"fontSize":"small"} /-->
					</div>
					<!-- /zc:group -->
				</div>
				<!-- /zc:group -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide"><!-- zc:post-featured-image {"align":"wide"} /--></div>
	<!-- /zc:group -->

	<!-- zc:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"},"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
		<div class="zc-block-columns alignwide" style="padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
			<!-- zc:column {"width":"5%"} -->
			<div class="zc-block-column" style="flex-basis:5%"></div>
			<!-- /zc:column -->
			<!-- zc:column {"width":"65%","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}}} -->
			<div class="zc-block-column" style="padding-bottom:var(--zc--preset--spacing--60);flex-basis:65%">
				<!-- zc:post-content {"layout":{"type":"default"}} /-->
				<!-- zc:spacer {"height":"var:preset|spacing|40"} -->
				<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
				<!-- zc:post-terms {"term":"post_tag","separator":"  ","className":"is-style-post-terms-1","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} /-->
			</div>
			<!-- /zc:column -->
			<!-- zc:column {"width":"5%"} -->
			<div class="zc-block-column" style="flex-basis:5%"></div>
			<!-- /zc:column -->
			<!-- zc:column {"width":"25%"} -->
			<div class="zc-block-column" style="flex-basis:25%"><!-- zc:template-part {"slug":"sidebar"} /--></div>
			<!-- /zc:column -->
			<!-- zc:column {"width":"5%"} -->
			<div class="zc-block-column" style="flex-basis:5%"></div>
			<!-- /zc:column -->
		</div>
		<!-- /zc:columns -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide" style="margin-top:var(--zc--preset--spacing--60);margin-bottom:var(--zc--preset--spacing--60)">
		<!-- zc:group {"ariaLabel":"<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>","tagName":"nav","align":"wide","style":{"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
		<nav class="zc-block-group alignwide" aria-label="<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>" style="border-top-color:var(--zc--preset--color--accent-6);border-top-width:1px;padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
			<!-- zc:post-navigation-link {"type":"previous","showTitle":true,"arrow":"arrow"} /-->
			<!-- zc:post-navigation-link {"showTitle":true,"arrow":"arrow"} /-->
		</nav>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"align":"wide","layout":{"type":"constrained","justifyContent":"center"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}}} -->
		<div class="zc-block-columns alignwide" style="margin-top:0;margin-bottom:0">
			<!-- zc:column {"width":"5%"} -->
			<div class="zc-block-column" style="flex-basis:5%"></div>
			<!-- /zc:column -->

			<!-- zc:column {"width":"65%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
			<div class="zc-block-column" style="padding-top:0;padding-bottom:0;flex-basis:65%">
				<!-- zc:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
				<div class="zc-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- zc:pattern {"slug":"twentytwentyfive/comments"} /-->
				</div>
				<!-- /zc:group -->
			</div>
			<!-- /zc:column -->

			<!-- zc:column {"width":"5%"} -->
			<div class="zc-block-column" style="flex-basis:5%"></div>
			<!-- /zc:column -->

			<!-- zc:column {"width":"25%"} -->
			<div class="zc-block-column" style="flex-basis:25%"></div>
			<!-- /zc:column -->

			<!-- zc:column {"width":"5%"} -->
			<div class="zc-block-column" style="flex-basis:5%"></div>
			<!-- /zc:column -->

		</div>
		<!-- /zc:columns -->
	</div>
	<!-- /zc:group -->
</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer-newsletter"} /-->
