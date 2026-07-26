<?php
/**
 * Title: Services, team photos
 * Slug: twentytwentyfive/services-team-photos
 * Categories: banner, call-to-action, featured
 * Description: Display team photos in a services section with grid layout.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
	<!-- zc:columns {"align":"wide"} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column -->
		<div class="zc-block-column">
			<!-- zc:heading -->
			<h2 class="zc-block-heading"><?php esc_html_e( 'Our small team is a group of driven, detail-oriented people who are passionate about their customers.', 'twentytwentyfive' ); ?></h2>
			<!-- /zc:heading -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column -->
		<div class="zc-block-column">
			<!-- zc:group {"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":null}} -->
			<div class="zc-block-group">
				<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full"} -->
				<figure class="zc-block-image size-full">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/woman-splashing-water.webp" alt="<?php esc_attr_e( 'Woman on beach, splashing water.', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/>
				</figure>
				<!-- /zc:image -->

				<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full"} -->
				<figure class="zc-block-image size-full">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/nurse.webp" alt="<?php esc_attr_e( 'Portrait of a nurse', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/>
				</figure>
				<!-- /zc:image -->

				<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full"} -->
				<figure class="zc-block-image size-full">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/typewriter.webp" alt="<?php esc_attr_e( 'Picture of a person typing on a typewriter.', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/>
				</figure>
				<!-- /zc:image -->

				<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full"} -->
				<figure class="zc-block-image size-full">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/man-in-hat.webp" alt="<?php esc_attr_e( 'Man in hat, standing in front of a building.', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/>
				</figure>
				<!-- /zc:image -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
