<?php
/**
 * Title: Offset post without featured image
 * Slug: twentytwentyfive/template-single-offset
 * Template Types: posts, single
 * Viewport width: 1400
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:template-part {"slug":"header"} /-->

<!-- zc:group {"tagName":"main","align":"wide","layout":{"type":"default"}} -->
<main class="zc-block-group alignwide">
	<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--80);padding-bottom:var(--zc--preset--spacing--40)">
		<!-- zc:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|50"}},"border":{"bottom":{"color":"var:preset|color|accent-6","width":"1px"},"top":[],"right":[],"left":[]}},"layout":{"type":"default"}} -->
		<div class="zc-block-group alignwide" style="border-bottom-color:var(--zc--preset--color--accent-6);border-bottom-width:1px;padding-bottom:var(--zc--preset--spacing--50)">
			<!-- zc:post-title {"level":1,"align":"wide","fontSize":"xx-large"} /-->
			<!-- zc:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.4px"}}} /-->
		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--30);padding-bottom:var(--zc--preset--spacing--50)">
		<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
		<div class="zc-block-group alignwide">
			<!-- zc:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
			<div class="zc-block-columns">
				<!-- zc:column {"width":"30%"} -->
				<div class="zc-block-column" style="flex-basis:30%">
					<!-- zc:group {"style":{"spacing":{"blockGap":"4px"}},"fontSize":"small","layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="zc-block-group has-small-font-size">
						<!-- zc:paragraph --><p><?php echo esc_html_x( 'Published on', 'Prefix before the post date block.', 'twentytwentyfive' ); ?></p><!-- /zc:paragraph -->
						<!-- zc:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} /-->
					</div>
					<!-- /zc:group -->
				</div>
				<!-- /zc:column -->

				<!-- zc:column {"width":"70%"} -->
				<div class="zc-block-column" style="flex-basis:70%">
					<!-- zc:post-content {"layout":{"type":"default"}} /-->
				</div>
				<!-- /zc:column -->
			</div>
			<!-- /zc:columns -->
		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide" style="margin-top:0;margin-bottom:0">
		<!-- zc:group {"ariaLabel":"<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>","tagName":"nav","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"},"right":{},"bottom":{},"left":{}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
		<nav class="zc-block-group alignwide" aria-label="<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>" style="border-top-color:var(--zc--preset--color--accent-6);border-top-width:1px;padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
			<!-- zc:post-navigation-link {"type":"previous","showTitle":true,"arrow":"arrow"} /-->
			<!-- zc:post-navigation-link {"showTitle":true,"arrow":"arrow"} /-->
		</nav>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->

	<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
		<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
		<div class="zc-block-columns alignwide">
			<!-- zc:column {"width":"30%"} -->
			<div class="zc-block-column" style="flex-basis:30%">
				<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
				<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
			</div>
			<!-- /zc:column -->
			<!-- zc:column {"width":"70%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
			<div class="zc-block-column" style="padding-top:0;padding-bottom:0;flex-basis:70%">
				<!-- zc:pattern {"slug":"twentytwentyfive/comments"} /-->
			</div>
			<!-- /zc:column -->
		</div>
		<!-- /zc:columns -->
	</div>
	<!-- /zc:group -->
</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer"} /-->
