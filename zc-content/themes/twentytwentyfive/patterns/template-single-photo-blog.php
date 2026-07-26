<?php
/**
 * Title: Photo blog single post
 * Slug: twentytwentyfive/template-single-photo-blog
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

<!-- zc:group {"tagName":"main","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<main class="zc-block-group" style="margin-top:var(--zc--preset--spacing--60)">
	<!-- zc:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide" style="padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
		<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
		<div class="zc-block-columns alignwide">
			<!-- zc:column {"width":"60%"} -->
			<div class="zc-block-column" style="flex-basis:60%">
				<!-- zc:post-title {"level":1} /-->
				</div>
			<!-- /zc:column -->
			<!-- zc:column {"width":"40%"} -->
			<div class="zc-block-column" style="flex-basis:40%">
				<!-- zc:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
				<div class="zc-block-group">
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="zc-block-group">
						<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small","layout":{"type":"constrained"}} -->
						<div class="zc-block-group has-small-font-size">
							<!-- zc:paragraph --><p><?php echo esc_html_x( 'Published on', 'Prefix before the post date block.', 'twentytwentyfive' ); ?></p><!-- /zc:paragraph -->
							<!-- zc:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} /-->
						</div>
						<!-- /zc:group -->
						<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small","layout":{"type":"constrained"}} -->
						<div class="zc-block-group has-small-font-size">
							<!-- zc:paragraph --><p><?php echo esc_html_x( 'Posted by', 'Prefix before the author name. The post author name is displayed in a separate block on the next line.', 'twentytwentyfive' ); ?></p><!-- /zc:paragraph -->
							<!-- zc:post-author-name {"isLink":true} /-->
						</div>
						<!-- /zc:group -->
					</div>
					<!-- /zc:group -->
					<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="zc-block-group">
						<!-- zc:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
						<div class="zc-block-group">
							<!-- zc:paragraph {"fontSize":"small"} -->
							<p class="has-small-font-size"><?php echo esc_html_x( 'Categories:', 'Prefix before one or more categories. The categories are displayed in a separate block on the next line.', 'twentytwentyfive' ); ?></p>
							<!-- /zc:paragraph -->
							<!-- zc:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"300"}}} /-->
						</div>
						<!-- /zc:group -->
						<!-- zc:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
						<div class="zc-block-group">
							<!-- zc:paragraph {"fontSize":"small"} -->
							<p class="has-small-font-size"><?php echo esc_html_x( 'Tagged:', 'Prefix before one or more tags. The tags are displayed in a separate block on the next line.', 'twentytwentyfive' ); ?></p>
							<!-- /zc:paragraph -->
							<!-- zc:post-terms {"term":"post_tag","style":{"typography":{"fontStyle":"normal","fontWeight":"300"}}} /-->
						</div>
					<!-- /zc:group -->
					</div>
				<!-- /zc:group -->
				</div>
				<!-- /zc:group -->
			</div>
			<!-- /zc:column -->
		</div>
		<!-- /zc:columns -->
		<!-- zc:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"0"}}},"layout":{"type":"default"}} -->
		<div class="zc-block-group alignwide" style="margin-top:var(--zc--preset--spacing--50);margin-bottom:0">
			<!-- zc:group {"ariaLabel":"<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>","tagName":"nav","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<nav aria-label="<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>" class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
				<!-- zc:post-navigation-link {"type":"previous","label":"<?php esc_html_e( 'Previous Photo', 'twentytwentyfive' ); ?>","fontSize":"small"} /-->
				<!-- zc:post-navigation-link {"label":"<?php esc_html_e( 'Next Photo', 'twentytwentyfive' ); ?>","fontSize":"small"} /-->
			</nav>
			<!-- /zc:group -->
		</div>
		<!-- /zc:group -->
		<!-- zc:post-featured-image {"aspectRatio":"auto","align":"wide"} /-->
		</div>
	<!-- /zc:group -->

	<!-- zc:post-content {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} /-->

	<!-- zc:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:pattern {"slug":"twentytwentyfive/comments"} /-->
	</div>
	<!-- /zc:group -->
</main>
<!-- /zc:group -->
<!-- zc:template-part {"slug":"footer"} /-->
