<?php
/**
 * Title: Right-aligned single post
 * Slug: twentytwentyfive/template-single-vertical-header-blog
 * Template Types: posts, single
 * Viewport width: 1400
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:columns {"isStackedOnMobile":false,"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":{"left":"0"}}}} -->
<div class="zc-block-columns is-not-stacked-on-mobile" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- zc:column {"width":"8rem"} -->
	<div class="zc-block-column" style="flex-basis:8rem">
		<!-- zc:template-part {"slug":"vertical-header"} /-->
	</div>
	<!-- /zc:column -->
	<!-- zc:column {"width":"90%","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"0"}}},"layout":{"type":"default"}} -->
	<div class="zc-block-column" style="padding-top:var(--zc--preset--spacing--50);padding-right:0;padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50);flex-basis:90%">
		<!-- zc:group {"tagName":"main","layout":{"type":"default"}} -->
		<main class="zc-block-group">
			<!-- zc:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"0"}}},"layout":{"type":"default"}} -->
			<div class="zc-block-group" style="padding-right:var(--zc--preset--spacing--50);padding-left:0">
				<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
				<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
				<!-- zc:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
				<div class="zc-block-group">
					<!-- zc:post-title {"level":1,"style":{"layout":{"selfStretch":"fixed","flexSize":"70vw"}},"fontSize":"xx-large"} /-->
					<!-- zc:post-date {"textAlign":"right","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"small"} /-->
					</div>
				<!-- /zc:group -->

				<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
				<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
			</div>
			<!-- /zc:group -->
			<!-- zc:post-featured-image {"aspectRatio":"16/9"} /-->
			<!-- zc:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
			<div class="zc-block-group" style="padding-right:var(--zc--preset--spacing--50)">
				<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--20);padding-bottom:var(--zc--preset--spacing--20)">
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="zc-block-group">
						<!-- zc:avatar {"size":30,"isLink":true,"style":{"border":{"radius":"100px"}}} /-->
						<!-- zc:post-author-name {"isLink":true,"fontSize":"small"} /-->
					</div>
					<!-- /zc:group -->
					<!-- zc:post-terms {"term":"post_tag","separator":"  ","className":"is-style-post-terms-1","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} /-->
				</div>
				<!-- /zc:group -->

				<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
				<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->

				<!-- zc:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
				<div class="zc-block-columns">
					<!-- zc:column {"width":"75%","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}}} -->
					<div class="zc-block-column" style="padding-bottom:var(--zc--preset--spacing--60);flex-basis:75%">
						<!-- zc:post-content {"layout":{"type":"default"}} /-->
					</div>
					<!-- /zc:column -->
					<!-- zc:column {"width":"25%"} -->
					<div class="zc-block-column" style="flex-basis:25%">
						<!-- zc:template-part {"slug":"sidebar"} /-->
					</div>
					<!-- /zc:column -->
				</div>
				<!-- /zc:columns -->

				<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
				<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
			</div>
			<!-- /zc:group -->
			<!-- zc:group {"ariaLabel":"<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>","tagName":"nav","align":"full","style":{"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
			<nav class="zc-block-group alignfull" aria-label="<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>" style="border-top-color:var(--zc--preset--color--accent-6);border-top-width:1px;padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
				<!-- zc:post-navigation-link {"type":"previous","showTitle":true,"arrow":"arrow"} /-->
				<!-- zc:post-navigation-link {"showTitle":true,"arrow":"arrow"} /-->
			</nav>
			<!-- /zc:group -->
		</main>
		<!-- /zc:group -->
		<!-- zc:group {"tagName":"aside","align":"wide","layout":{"type":"constrained","justifyContent":"left"},"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
		<aside class="zc-block-group alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- zc:pattern {"slug":"twentytwentyfive/comments"} /-->
		</aside>
		<!-- /zc:group -->
	</div>
	<!-- /zc:column -->
</div>
<!-- /zc:columns -->

<!-- zc:template-part {"slug":"footer"} /-->
