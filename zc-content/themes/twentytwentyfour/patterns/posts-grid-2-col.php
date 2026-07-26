<?php
/**
 * Title: Grid of posts featuring the first post, 2 columns
 * Slug: twentytwentyfour/posts-grid-2-col
 * Categories: query
 * Block Types: core/query
 * Description: A grid of posts featuring the first post, 2 columns.
 */
?>

<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:heading {"align":"wide","style":{"typography":{"lineHeight":"1"},"spacing":{"margin":{"top":"0"}}},"fontSize":"x-large"} -->
	<h2 class="zc-block-heading alignwide has-x-large-font-size" style="margin-top:0;line-height:1"><?php esc_html_e( 'Watch, Read, Listen', 'twentytwentyfour' ); ?></h2>
	<!-- /zc:heading -->

	<!-- zc:spacer {"height":"var:preset|spacing|10","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<div style="margin-top:0;margin-bottom:0;height:var(--zc--preset--spacing--10)" aria-hidden="true" class="zc-block-spacer">
	</div>
	<!-- /zc:spacer -->

	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|30"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"width":"60%"} -->
		<div class="zc-block-column" style="flex-basis:60%">
			<!-- zc:query {"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
			<div class="zc-block-query">
				<!-- zc:post-template {"style":{"spacing":{"blockGap":"0"}}} -->
				<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"3/4"} /-->

				<!-- zc:spacer {"height":"var:preset|spacing|10"} -->
				<div style="height:var(--zc--preset--spacing--10)" aria-hidden="true" class="zc-block-spacer">
				</div>
				<!-- /zc:spacer -->

				<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="zc-block-group">
					<!-- zc:post-title {"level":3,"isLink":true,"fontSize":"x-large"} /-->

					<!-- zc:post-excerpt {"excerptLength":35} /-->

					<!-- zc:template-part {"slug":"post-meta"} /-->

				</div>
				<!-- /zc:group -->
				<!-- /zc:post-template -->
			</div>
			<!-- /zc:query -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"40%"} -->
		<div class="zc-block-column" style="flex-basis:40%">
			<!-- zc:query {"query":{"perPage":2,"pages":0,"offset":1,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
			<div class="zc-block-query">
				<!-- zc:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
				<!-- zc:post-featured-image {"isLink":true,"aspectRatio":"4/3"} /-->

				<!-- zc:spacer {"height":"5px","style":{"layout":{}}} -->
				<div style="height:5px" aria-hidden="true" class="zc-block-spacer">
				</div>
				<!-- /zc:spacer -->

				<!-- zc:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
				<div class="zc-block-group">
					<!-- zc:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->

					<!-- zc:post-excerpt {"excerptLength":14,"fontSize":"small"} /-->
					<!-- zc:template-part {"slug":"post-meta"} /-->

				</div>
				<!-- /zc:group -->
				<!-- /zc:post-template -->
			</div>
			<!-- /zc:query -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
