<?php
/**
 * Title: Project details
 * Slug: twentytwentyfour/text-project-details
 * Categories: text, portfolio
 * Viewport width: 1400
 * Description: A text-only section for project details.
 */
?>

<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|30"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"width":"40%","layout":{"type":"constrained","contentSize":"260px","justifyContent":"left"}} -->
		<div class="zc-block-column" style="flex-basis:40%">
			<!-- zc:paragraph -->
			<p><?php echo esc_html_x( 'The revitalized art gallery is set to redefine cultural landscape.', 'Title text for the feature area', 'twentytwentyfour' ); ?></p>
			<!-- /zc:paragraph -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"60%","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
		<div class="zc-block-column" style="flex-basis:60%">

			<!-- zc:paragraph {"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"x-large","fontFamily":"heading"} -->
			<p class="has-heading-font-family has-x-large-font-size" style="line-height:1.2"><?php echo esc_html_x( 'With meticulous attention to detail and a commitment to excellence, we create spaces that inspire, elevate, and enrich the lives of those who inhabit them.', 'Descriptive title for the feature area', 'twentytwentyfour' ); ?></p>
			<!-- /zc:paragraph -->

			<!-- zc:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
			<div class="zc-block-columns">
				<!-- zc:column -->
				<div class="zc-block-column">
					<!-- zc:paragraph {"style":{"layout":{"selfStretch":"fill","flexSize":null}}} -->
					<p><?php echo esc_html_x( 'The revitalized Art Gallery is set to redefine the cultural landscape of Toronto, serving as a nexus of artistic expression, community engagement, and architectural marvel. The expansion and renovation project pay homage to the Art Gallery\'s rich history while embracing the future, ensuring that the gallery remains a beacon of inspiration.', 'Descriptive text for the feature area', 'twentytwentyfour' ); ?></p>
					<!-- /zc:paragraph -->
				</div>
				<!-- /zc:column -->

				<!-- zc:column -->
				<div class="zc-block-column">
					<!-- zc:paragraph -->
					<p><?php echo esc_html_x( 'The revitalized Art Gallery is set to redefine the cultural landscape of Toronto, serving as a nexus of artistic expression, community engagement, and architectural marvel. The expansion and renovation project pay homage to the Art Gallery\'s rich history while embracing the future, ensuring that the gallery remains a beacon of inspiration.', 'Descriptive text for the feature area', 'twentytwentyfour' ); ?></p>
					<!-- /zc:paragraph -->
				</div>
				<!-- /zc:column -->
			</div>
			<!-- /zc:columns -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
