<?php
/**
 * Title: Sidebar
 * Slug: twentytwentyfour/hidden-sidebar
 * Inserter: no
 */
?>
<!-- zc:group {"style":{"spacing":{"blockGap":"36px","padding":{"right":"0","left":"0"}}},"layout":{"type":"default"}} -->
<div class="zc-block-group" style="padding-right:0;padding-left:0">
	<!-- zc:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group" style="margin-top:0;margin-bottom:0">
		<!-- zc:avatar {"size":80,"style":{"border":{"radius":"16px"}}} /-->

		<!-- zc:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="zc-block-group">
			<!-- zc:heading {"style":{"typography":{"fontSize":"1.6rem"}}} -->
			<h2 class="zc-block-heading" style="font-size:1.6rem"><?php esc_html_e( 'About the author', 'twentytwentyfour' ); ?></h2>
			<!-- /zc:heading -->

			<!-- zc:post-author-biography {"fontSize":"small"} /-->
		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->

	<!-- zc:separator {"backgroundColor":"contrast","className":"is-style-wide"} -->
	<hr class="zc-block-separator has-text-color has-contrast-color has-alpha-channel-opacity has-contrast-background-color has-background is-style-wide"/>
	<!-- /zc:separator -->

	<!-- zc:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group">
		<!-- zc:heading {"style":{"typography":{"fontSize":"1.6rem"}}} -->
		<h2 class="zc-block-heading" style="font-size:1.6rem"><?php esc_html_e( 'Popular Categories', 'twentytwentyfour' ); ?></h2>
		<!-- /zc:heading -->

		<!-- zc:categories {"showHierarchy":true,"showPostCounts":true,"fontSize":"small"} /-->
	</div>
	<!-- /zc:group -->

	<!-- zc:separator {"backgroundColor":"contrast","className":"is-style-wide"} -->
	<hr class="zc-block-separator has-text-color has-contrast-color has-alpha-channel-opacity has-contrast-background-color has-background is-style-wide"/>
	<!-- /zc:separator -->

	<!-- zc:group {"style":{"spacing":{"blockGap":"26px"}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group">
		<!-- zc:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="zc-block-group">
			<!-- zc:heading {"style":{"typography":{"fontSize":"1.6rem"}}} -->
			<h2 class="zc-block-heading" style="font-size:1.6rem"><?php esc_html_e( 'Useful Links', 'twentytwentyfour' ); ?></h2>
			<!-- /zc:heading -->

			<!-- zc:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'Links I found useful and wanted to share.', 'twentytwentyfour' ); ?></p>
			<!-- /zc:paragraph -->
		</div>
		<!-- /zc:group -->

		<!-- zc:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small"} -->
		<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Latest inflation report', 'twentytwentyfour' ); ?>","url":"#","className":"is-style-arrow-link","style":{"typography":{"textDecoration":"underline"}}} /-->
		<!-- zc:navigation-link {"label":"<?php esc_html_e( 'Financial apps for families', 'twentytwentyfour' ); ?>","url":"#","className":"is-style-arrow-link","style":{"typography":{"textDecoration":"underline"}}} /-->
		<!-- /zc:navigation -->
	</div>
	<!-- /zc:group -->

	<!-- zc:separator {"backgroundColor":"contrast","className":"is-style-wide"} -->
	<hr class="zc-block-separator has-text-color has-contrast-color has-alpha-channel-opacity has-contrast-background-color has-background is-style-wide"/>
	<!-- /zc:separator -->

	<!-- zc:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
	<div class="zc-block-group">
		<!-- zc:heading {"style":{"typography":{"fontSize":"1.6rem"}}} -->
		<h2 class="zc-block-heading" style="font-size:1.6rem"><?php esc_html_e( 'Search the website', 'twentytwentyfour' ); ?></h2>
		<!-- /zc:heading -->

		<!-- zc:search {"label":"<?php echo esc_attr_x( 'Search', 'search form label', 'twentytwentyfour' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr_x( 'Search...', 'search form placeholder', 'twentytwentyfour' ); ?>","width":100,"widthUnit":"%","buttonText":"<?php echo esc_attr_x( 'Search', 'search form label', 'twentytwentyfour' ); ?>"} /-->
	</div>
	<!-- /zc:group -->

	<!-- zc:spacer {"height":"var:preset|spacing|10"} -->
	<div style="height:var(--zc--preset--spacing--10)" aria-hidden="true" class="zc-block-spacer">
	</div>
	<!-- /zc:spacer -->
</div>
<!-- /zc:group -->
