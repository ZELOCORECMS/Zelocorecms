<?php
/**
 * Title: Right-aligned page
 * Slug: twentytwentyfive/template-page-vertical-header-blog
 * Template Types: page
 * Viewport width: 1400
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
	<!-- zc:column {"width":"90%","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|50","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
	<div class="zc-block-column" style="padding-right:0;padding-bottom:var(--zc--preset--spacing--50);padding-left:0;flex-basis:90%">
		<!-- zc:group {"tagName":"main","layout":{"type":"default"}} -->
		<main class="zc-block-group">
			<!-- zc:post-featured-image {"aspectRatio":"16/9","height":""} /-->
			<!-- zc:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
			<div class="zc-block-group" style="padding-right:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
				<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
				<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
				<!-- zc:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
				<div class="zc-block-group">
					<!-- zc:post-title {"level":1,"style":{"layout":{"selfStretch":"fixed","flexSize":"70vw"}},"fontSize":"xx-large"} /-->
				</div>
				<!-- /zc:group -->
				<!-- zc:spacer {"height":"var:preset|spacing|30"} -->
				<div style="height:var(--zc--preset--spacing--30)" aria-hidden="true" class="zc-block-spacer"></div>
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
			</div>
			<!-- /zc:group -->
		</main>
		<!-- /zc:group -->
	</div>
	<!-- /zc:column -->
</div>
<!-- /zc:columns -->

<!-- zc:template-part {"slug":"footer"} /-->
