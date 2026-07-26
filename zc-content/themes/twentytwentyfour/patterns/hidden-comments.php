<?php
/**
 * Title: Comments
 * Slug: twentytwentyfour/hidden-comments
 * Inserter: no
 */
?>

<!-- zc:comments {"className":"zc-block-comments-query-loop"} -->
<div class="zc-block-comments zc-block-comments-query-loop">
	<!-- zc:heading -->
	<h2><?php esc_html_e( 'Comments', 'twentytwentyfour' ); ?></h2>
	<!-- /zc:heading -->
	<!-- zc:comments-title {"level":3} /-->
	<!-- zc:comment-template -->
	<!-- zc:group {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
	<div class="zc-block-group" style="margin-top:0;margin-bottom:var(--zc--preset--spacing--30)">
		<!-- zc:group {"layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"0.5em"}}} -->
		<div class="zc-block-group">
			<!-- zc:avatar {"size":40} /-->
			<!-- zc:group -->
			<div class="zc-block-group">
				<!-- zc:comment-author-name /-->
				<!-- zc:comment-date /-->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:group -->
		<!-- zc:comment-content /-->
		<!-- zc:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="zc-block-group">
			<!-- zc:comment-edit-link /-->
			<!-- zc:comment-reply-link /-->
		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->
	<!-- /zc:comment-template -->

	<!-- zc:comments-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<!-- zc:comments-pagination-previous /-->
	<!-- zc:comments-pagination-next /-->
	<!-- /zc:comments-pagination -->

	<!-- zc:post-comments-form {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} /-->
</div>
<!-- /zc:comments -->
