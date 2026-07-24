<?php
/**
 * Title: Text blog single post
 * Slug: twentytwentyfive/template-single-text-blog
 * Template Types: posts, single
 * Viewport width: 1400
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<main class="zc-block-group" style="margin-top:var(--zc--preset--spacing--60)">
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignfull" style="padding-top:var(--zc--preset--spacing--60);">
		<!-- wp:post-title {"level":1} /-->
		<!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} /-->
		<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
		<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /wp:spacer -->
		<!-- wp:post-content {"align":"full","layout":{"type":"constrained"}} /-->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
		<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
		<!-- wp:post-terms {"term":"post_tag","separator":"  ","className":"is-style-post-terms-1"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
		<div class="zc-block-group alignfull" style="margin-top:var(--zc--preset--spacing--60);margin-bottom:var(--zc--preset--spacing--60);padding-right:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
			<!-- wp:group {"ariaLabel":"<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>","tagName":"nav","align":"wide","style":{"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"},"right":[],"bottom":[],"left":[]},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<nav class="zc-block-group alignwide" aria-label="<?php esc_attr_e( 'Post navigation', 'twentytwentyfive' ); ?>" style="border-top-color:var(--zc--preset--color--accent-6);border-top-width:1px;padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
				<!-- wp:post-navigation-link {"type":"previous","showTitle":true,"arrow":"arrow"} /-->
				<!-- wp:post-navigation-link {"showTitle":true,"arrow":"arrow"} /-->
			</nav>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<!-- wp:pattern {"slug":"twentytwentyfive/comments"} /-->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->
<!-- wp:template-part {"slug":"footer"} /-->
