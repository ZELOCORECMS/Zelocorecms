<?php
/**
 * Title: Post meta
 * Slug: twentytwentyfour/hidden-post-meta
 * Inserter: no
 */
?>

<!-- zc:group {"layout":{"type":"constrained"}} -->
<div class="zc-block-group">
	<!-- zc:group {"style":{"spacing":{"blockGap":"0.3em"}},"layout":{"type":"flex","justifyContent":"left"}} -->
	<div class="zc-block-group">
		<!-- zc:post-date {"format":"M j, Y","isLink":true} /-->

		<!-- zc:paragraph {"textColor":"contrast-2"} -->
		<p class="has-contrast-2-color has-text-color">—</p>
		<!-- /zc:paragraph -->

		<!-- zc:paragraph {"fontSize":"small","textColor":"contrast-2"} -->
		<p class="has-small-font-size has-contrast-2-color has-text-color"><?php echo esc_html_x( 'by', 'Prefix for the post author block: By author name', 'twentytwentyfour' ); ?></p>
		<!-- /zc:paragraph -->

		<!-- zc:post-author-name {"isLink":true} /-->

		<!-- zc:post-terms {"term":"category","prefix":"<?php echo esc_html_x( 'in ', 'Prefix for the post category block: in category name', 'twentytwentyfour' ); ?>"} /-->

	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
