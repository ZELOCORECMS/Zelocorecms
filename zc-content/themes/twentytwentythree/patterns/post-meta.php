<?php
/**
 * Title: Post Meta
 * Slug: twentytwentythree/post-meta
 * Categories: query
 * Keywords: post meta
 * Block Types: core/template-part/post-meta
 * Description: Post meta information with separator on the top.
 */
?>
<!-- zc:spacer {"height":"0"} -->
<div style="height:0" aria-hidden="true" class="zc-block-spacer"></div>
<!-- /zc:spacer -->

<!-- zc:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group" style="margin-top:var(--zc--preset--spacing--70)">
	<!-- zc:separator {"opacity":"css","align":"wide","className":"is-style-wide"} -->
	<hr class="zc-block-separator alignwide has-css-opacity is-style-wide"/>
	<!-- /zc:separator -->

	<!-- zc:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|30"}},"fontSize":"small"} -->
	<div class="zc-block-columns alignwide has-small-font-size" style="margin-top:var(--zc--preset--spacing--30)">
		<!-- zc:column {"style":{"spacing":{"blockGap":"0px"}}} -->
		<div class="zc-block-column">
			<!-- zc:group {"style":{"spacing":{"blockGap":"0.5ch"}},"layout":{"type":"flex"}} -->
			<div class="zc-block-group">
				<!-- zc:paragraph -->
				<p>
					<?php echo esc_html_x( 'Posted', 'Verb to explain the publication status of a post', 'twentytwentythree' ); ?>
				</p>
				<!-- /zc:paragraph -->

				<!-- zc:post-date /-->

				<!-- zc:paragraph -->
				<p>
					<?php echo esc_html_x( 'in', 'Preposition to show the relationship between the post and its categories', 'twentytwentythree' ); ?>
				</p>
				<!-- /zc:paragraph -->

				<!-- zc:post-terms {"term":"category"} /-->
			</div>
			<!-- /zc:group -->

			<!-- zc:group {"style":{"spacing":{"blockGap":"0.5ch"}},"layout":{"type":"flex"}} -->
			<div class="zc-block-group">
				<!-- zc:paragraph -->
				<p>
					<?php echo esc_html_x( 'by', 'Preposition to show the relationship between the post and its author', 'twentytwentythree' ); ?>
				</p>
				<!-- /zc:paragraph -->

				<!-- zc:post-author {"showAvatar":false} /-->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"style":{"spacing":{"blockGap":"0px"}}} -->
		<div class="zc-block-column">
			<!-- zc:group {"style":{"spacing":{"blockGap":"0.5ch"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="zc-block-group">
				<!-- zc:paragraph -->
				<p>
					<?php echo esc_html_x( 'Tags:', 'Label for a list of post tags', 'twentytwentythree' ); ?>
				</p>
				<!-- /zc:paragraph -->

				<!-- zc:post-terms {"term":"post_tag"} /-->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
