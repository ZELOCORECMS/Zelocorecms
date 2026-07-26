<?php
/**
 * Title: Hidden Comments
 * Slug: twentytwentythree/hidden-comments
 * Inserter: no
 */
?>
<!-- zc:group {"layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--40)">
	<!-- zc:comments -->
	<div class="zc-block-comments">
		<!-- zc:heading {"level":2} -->
		<h2><?php echo esc_html_x( 'Comments', 'Title of comments section', 'twentytwentythree' ); ?></h2>
		<!-- /zc:heading -->

		<!-- zc:comments-title {"level":3} /-->

		<!-- zc:comment-template -->
			<!-- zc:columns {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
			<div class="zc-block-columns" style="margin-bottom:var(--zc--preset--spacing--40)">
				<!-- zc:column {"width":"40px"} -->
				<div class="zc-block-column" style="flex-basis:40px">
					<!-- zc:avatar {"size":40,"style":{"border":{"radius":"20px"}}} /-->
				</div>
				<!-- /zc:column -->

				<!-- zc:column -->
				<div class="zc-block-column">
					<!-- zc:comment-author-name /-->

					<!-- zc:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex"}} -->
					<div class="zc-block-group" style="margin-top:0px;margin-bottom:0px">
						<!-- zc:comment-date /-->
						<!-- zc:comment-edit-link /-->
					</div>
					<!-- /zc:group -->

					<!-- zc:comment-content /-->

					<!-- zc:comment-reply-link /-->
				</div>
				<!-- /zc:column -->
			</div>
			<!-- /zc:columns -->
		<!-- /zc:comment-template -->

		<!-- zc:comments-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
			<!-- zc:comments-pagination-previous /-->
			<!-- zc:comments-pagination-numbers /-->
			<!-- zc:comments-pagination-next /-->
		<!-- /zc:comments-pagination -->

	<!-- zc:post-comments-form /-->
	</div>
	<!-- /zc:comments -->
</div>
<!-- /zc:group -->
