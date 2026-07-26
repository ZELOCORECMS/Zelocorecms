<?php
/**
 * Title: Post with left-aligned content
 * Slug: twentytwentyfive/post-with-left-aligned-content
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

	<!-- zc:group {"tagName":"main","align":"wide","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
	<main class="zc-block-group alignwide">
		<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
		<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
			<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
			<div class="zc-block-columns alignwide">
				<!-- zc:column {"width":"40%"} -->
				<div class="zc-block-column" style="flex-basis:40%">
					<!-- zc:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
					<div class="zc-block-group alignwide">
						<!-- zc:post-title {"level":1,"align":"wide","fontSize":"x-large"} /-->
						<!-- zc:group {"style":{"spacing":{"blockGap":"4px"}},"fontSize":"small","layout":{"type":"flex","flexWrap":"nowrap"}} -->
						<div class="zc-block-group has-small-font-size">
							<!-- zc:paragraph -->
							<p><?php echo esc_html_x( 'by', 'Prefix before the author name. The post author name is displayed in a separate block.', 'twentytwentyfive' ); ?></p>
							<!-- /zc:paragraph -->
							<!-- zc:post-author-name {"isLink":true,"fontSize":"small"} /-->
						</div>
						<!-- /zc:group -->
					</div>
					<!-- /zc:group -->
				</div>
				<!-- /zc:column -->
				<!-- zc:column {"width":"60%"} -->
				<div class="zc-block-column" style="flex-basis:60%">
					<!-- zc:post-featured-image /-->
				</div>
				<!-- /zc:column -->
			</div>
			<!-- /zc:columns -->

			<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
			<div class="zc-block-columns alignwide">
				<!-- zc:column {"width":"100%"} -->
				<div class="zc-block-column" style="flex-basis:100%">
					<!-- zc:group {"align":"wide","style":{"spacing":{"blockGap":"4px"}},"fontSize":"small","layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="zc-block-group alignwide has-small-font-size">
						<!-- zc:post-date /-->
						<!-- zc:paragraph -->
						<p><?php echo esc_html_x( '·', 'Separator between date and categories.', 'twentytwentyfive' ); ?></p>
						<!-- /zc:paragraph -->
						<!-- zc:post-terms {"term":"category"} /-->
					</div>
					<!-- /zc:group -->
				</div>
				<!-- /zc:column -->
			</div>
			<!-- /zc:columns -->
		</div>
		<!-- /zc:group -->

		<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
		<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
			<!-- zc:post-content {"align":"wide","layout":{"type":"constrained","justifyContent":"left","contentSize":"800px"}} /-->
		</div>
		<!-- /zc:group -->

		<!-- zc:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"default"}} -->
		<div class="zc-block-group alignwide" style="margin-top:var(--zc--preset--spacing--60);margin-bottom:var(--zc--preset--spacing--60)">
			<!-- zc:group {"align":"wide","style":{"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"},"right":[],"bottom":[],"left":[]}},"layout":{"type":"constrained"}} -->
			<div class="zc-block-group alignwide" style="border-top-color:var(--zc--preset--color--accent-6);border-top-width:1px">
				<!-- zc:group {"ariaLabel":"<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>","tagName":"nav","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<nav class="zc-block-group alignwide" aria-label="<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>" style="padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
					<!-- zc:post-navigation-link {"type":"previous","showTitle":true,"arrow":"arrow"} /-->
					<!-- zc:post-navigation-link {"showTitle":true,"arrow":"arrow"} /-->
				</nav>
				<!-- /zc:group -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:group -->

		<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
		<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
			<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
			<div class="zc-block-columns alignwide">
				<!-- zc:column {"width":"40%"} -->
				<div class="zc-block-column" style="flex-basis:40%">
					<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
					<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
					<!-- /zc:spacer -->
				</div>
				<!-- /zc:column -->
				<!-- zc:column {"width":"60%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
				<div class="zc-block-column" style="padding-top:0;padding-bottom:0;flex-basis:60%">
					<!-- zc:pattern {"slug":"twentytwentyfive/comments"} /-->
				</div>
				<!-- /zc:column -->
			</div>
			<!-- /zc:columns -->
		</div>
		<!-- /zc:group -->
	</main>
	<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer-columns"} /-->
