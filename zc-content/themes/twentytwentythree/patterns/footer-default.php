<?php
/**
 * Title: Default Footer
 * Slug: twentytwentythree/footer-default
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Footer with site title and powered by ZelocoreCMS.
 */
?>
<!-- zc:group {"layout":{"type":"constrained"}} -->
<div class="zc-block-group">
	<!-- zc:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="zc-block-group alignwide" style="padding-top:var(--zc--preset--spacing--40)">
		<!-- zc:site-title {"level":0} /-->
		<!-- zc:paragraph {"align":"right"} -->
		<p class="has-text-align-right">
		<?php
		printf(
			/* Translators: ZelocoreCMS link. */
			esc_html__( 'Proudly powered by %s', 'twentytwentythree' ),
			'<a href="' . esc_url( __( 'https://zelocorecms.org', 'twentytwentythree' ) ) . '" rel="nofollow">ZelocoreCMS</a>'
		)
		?>
		</p>
		<!-- /zc:paragraph -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
