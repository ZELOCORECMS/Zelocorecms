<?php
/**
 * Title: Call to action
 * Slug: twentytwentythree/cta
 * Categories: featured
 * Keywords: Call to action
 * Block Types: core/buttons
 * Description: Left-aligned text with a CTA button and a separator.
 */
?>
<!-- zc:columns {"align":"wide"} -->
<div class="zc-block-columns alignwide">
	<!-- zc:column -->
	<div class="zc-block-column">
		<!-- zc:paragraph {"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"x-large"} -->
		<p class="has-x-large-font-size" style="line-height:1.2"><?php echo esc_html_x( 'Got any book recommendations?', 'sample content for call to action', 'twentytwentythree' ); ?>
		</p>
		<!-- /zc:paragraph -->

		<!-- zc:buttons -->
		<div class="zc-block-buttons">
			<!-- zc:button {"fontSize":"small"} -->
			<div class="zc-block-button has-custom-font-size has-small-font-size">
				<a class="zc-block-button__link zc-element-button">
				<?php echo esc_html_x( 'Get In Touch', 'sample content for call to action button', 'twentytwentythree' ); ?>
				</a>
			</div>
			<!-- /zc:button -->
		</div>
		<!-- /zc:buttons -->
	</div>
	<!-- /zc:column -->

	<!-- zc:column -->
	<div class="zc-block-column">
		<!-- zc:separator {"className":"is-style-wide"} -->
		<hr class="zc-block-separator has-alpha-channel-opacity is-style-wide"/>
		<!-- /zc:separator -->
	</div>
	<!-- /zc:column -->
</div>
<!-- /zc:columns -->
