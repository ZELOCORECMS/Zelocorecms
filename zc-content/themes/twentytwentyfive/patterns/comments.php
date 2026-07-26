<?php
/**
 * Title: Comments
 * Slug: twentytwentyfive/comments
 * Description: Comments area with comments list, pagination, and comment form.
 * Categories: text
 * Block Types: core/comments
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:comments {"className":"zc-block-comments-query-loop","style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}}} -->
<div class="zc-block-comments zc-block-comments-query-loop" style="margin-top:var(--zc--preset--spacing--70);margin-bottom:var(--zc--preset--spacing--70)">
	<!-- zc:heading {"fontSize":"x-large"} -->
	<h2 class="zc-block-heading has-x-large-font-size"><?php esc_html_e( 'Comments', 'twentytwentyfive' ); ?></h2>
	<!-- /zc:heading -->
	<!-- zc:comments-title {"level":3,"fontSize":"large"} /-->
	<!-- zc:comment-template -->
	<!-- zc:group {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|50"}}}} -->
	<div class="zc-block-group" style="margin-top:0;margin-bottom:var(--zc--preset--spacing--50)">
		<!-- zc:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
		<div class="zc-block-group">
			<!-- zc:avatar {"size":50} /-->
			<!-- zc:group -->
			<div class="zc-block-group">
				<!-- zc:comment-date /-->
				<!-- zc:comment-author-name /-->
				<!-- zc:comment-content /-->
				<!-- zc:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="zc-block-group">
					<!-- zc:comment-edit-link /-->
					<!-- zc:comment-reply-link /-->
				</div>
				<!-- /zc:group -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->
	<!-- /zc:comment-template -->

	<!-- zc:comments-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<!-- zc:comments-pagination-previous /-->
	<!-- zc:comments-pagination-next /-->
	<!-- /zc:comments-pagination -->

	<!-- zc:post-comments-form /-->
</div>
<!-- /zc:comments -->
