<?php
/**
 * Title: Text with alternating images
 * Slug: twentytwentyfour/text-alternating-images
 * Categories: text, about
 * Viewport width: 1400
 * Description: A text section, then a two-column section with text in one column and an image in the other.
 */
?>

<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:group {"align":"wide","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="zc-block-group">

			<!-- zc:heading {"textAlign":"center","className":"is-style-asterisk"} -->
			<h2 class="zc-block-heading has-text-align-center is-style-asterisk"><?php echo esc_html_x( 'An array of resources', 'Sample heading content', 'twentytwentyfour' ); ?></h2>
			<!-- /zc:heading -->

			<!-- zc:paragraph {"align":"center","style":{"layout":{"selfStretch":"fit","flexSize":null}}} -->
			<p class="has-text-align-center"><?php echo esc_html_x( 'Our comprehensive suite of professional services caters to a diverse clientele, ranging from homeowners to commercial developers.', 'Sample subheading content', 'twentytwentyfour' ); ?></p>
			<!-- /zc:paragraph -->
		</div>
		<!-- /zc:group -->

		<!-- zc:spacer {"height":"var:preset|spacing|40"} -->
		<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->

		<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
		<div class="zc-block-columns alignwide">
			<!-- zc:column {"verticalAlignment":"center","width":"40%"} -->
			<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:40%">
				<!-- zc:heading {"level":3,"className":"is-style-asterisk"} -->
				<h3 class="zc-block-heading is-style-asterisk"><?php echo esc_html_x( 'Études Architect App', 'Sample list heading', 'twentytwentyfour' ); ?></h3>
				<!-- /zc:heading -->

				<!-- zc:list {"style":{"typography":{"lineHeight":"1.75"}},"className":"is-style-checkmark-list"} -->
				<ul class="is-style-checkmark-list" style="line-height:1.75">

					<!-- zc:list-item -->
					<li><?php echo esc_html_x( 'Collaborate with fellow architects.', 'Sample list item', 'twentytwentyfour' ); ?></li>
					<!-- /zc:list-item -->

					<!-- zc:list-item -->
					<li><?php echo esc_html_x( 'Showcase your projects.', 'Sample list item', 'twentytwentyfour' ); ?></li>
					<!-- /zc:list-item -->

					<!-- zc:list-item -->
					<li><?php echo esc_html_x( 'Experience the world of architecture.', 'Sample list item', 'twentytwentyfour' ); ?></li>
					<!-- /zc:list-item -->

				</ul>
				<!-- /zc:list -->
			</div>
			<!-- /zc:column -->

			<!-- zc:column {"width":"50%"} -->
			<div class="zc-block-column" style="flex-basis:50%">
				<!-- zc:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="zc-block-image size-large is-style-rounded">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/tourist-and-building.webp" alt="<?php esc_attr_e( 'Tourist taking photo of a building', 'twentytwentyfour' ); ?>" />
				</figure>
				<!-- /zc:image -->
			</div>
			<!-- /zc:column -->
		</div>
		<!-- /zc:columns -->

		<!-- zc:spacer {"height":"var:preset|spacing|40"} -->
		<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->

		<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
		<div class="zc-block-columns alignwide">
			<!-- zc:column {"width":"50%"} -->
			<div class="zc-block-column" style="flex-basis:50%">
				<!-- zc:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="zc-block-image size-large is-style-rounded">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/windows.webp" alt="<?php esc_attr_e( 'Windows of a building in Nuremberg, Germany', 'twentytwentyfour' ); ?>" />
				</figure>
				<!-- /zc:image -->
			</div>
			<!-- /zc:column -->

			<!-- zc:column {"verticalAlignment":"center","width":"40%"} -->
			<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:40%">
				<!-- zc:heading {"level":3,"className":"is-style-asterisk"} -->
				<h3 class="zc-block-heading is-style-asterisk"><?php echo esc_html_x( 'Études Newsletter', 'Sample heading', 'twentytwentyfour' ); ?></h3>
				<!-- /zc:heading -->

				<!-- zc:list {"style":{"typography":{"lineHeight":"1.75"}},"className":"is-style-checkmark-list"} -->
				<ul class="is-style-checkmark-list" style="line-height:1.75">
					<!-- zc:list-item -->
					<li><?php echo esc_html_x( 'A world of thought-provoking articles.', 'Sample list item', 'twentytwentyfour' ); ?></li>
					<!-- /zc:list-item -->

					<!-- zc:list-item -->
					<li><?php echo esc_html_x( 'Case studies that celebrate architecture.', 'Sample list item', 'twentytwentyfour' ); ?></li>
					<!-- /zc:list-item -->

					<!-- zc:list-item -->
					<li><?php echo esc_html_x( 'Exclusive access to design insights.', 'Sample list item', 'twentytwentyfour' ); ?></li>
					<!-- /zc:list-item -->
				</ul>
				<!-- /zc:list -->
			</div>
			<!-- /zc:column -->
		</div>
		<!-- /zc:columns -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
