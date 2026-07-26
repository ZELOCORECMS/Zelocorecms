<?php
/**
 * Title: Call to action with grid layout with products and link
 * Slug: twentytwentyfive/cta-grid-products-link
 * Categories: call-to-action, featured
 * Viewport width: 1400
 * Description: A call to action featuring product images.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
	<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:heading {"style":{"typography":{"fontSize":"9.6rem","letterSpacing":"-0.02em"}}} -->
		<h2 class="zc-block-heading" style="font-size:9.6rem;letter-spacing:-0.02em"><?php esc_html_e( 'Our online store.', 'twentytwentyfive' ); ?></h2>
		<!-- /zc:heading -->

		<!-- zc:group {"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"10rem"}} -->
		<div class="zc-block-group">
			<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
			<figure class="zc-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/grid-flower-2.webp' ); ?>" alt="<?php esc_attr_e( 'Black and white flower', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /zc:image -->

			<!-- zc:cover {"dimRatio":0,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"medium"} -->
			<div class="zc-block-cover is-light has-contrast-color has-text-color has-link-color has-medium-font-size"><span aria-hidden="true" class="zc-block-cover__background has-background-dim-0 has-background-dim"></span><div class="zc-block-cover__inner-container">
				<!-- zc:paragraph {"align":"center"} -->
				<p class="has-text-align-center"><?php esc_html_e( 'Delivered every week', 'twentytwentyfive' ); ?></p>
				<!-- /zc:paragraph -->
			</div></div>
			<!-- /zc:cover -->

			<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
			<figure class="zc-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/malibu-plantlife.webp' ); ?>" alt="<?php esc_attr_e( 'Closeup of plantlife in the Malibu Canyon area', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /zc:image -->

			<!-- zc:cover {"overlayColor":"contrast","isUserOverlayColor":true,"style":{"dimensions":{"aspectRatio":"1"}},"layout":{"type":"constrained"}} -->
			<div class="zc-block-cover"><span aria-hidden="true" class="zc-block-cover__background has-contrast-background-color has-background-dim-100 has-background-dim"></span><div class="zc-block-cover__inner-container">
				<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
				<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
			</div></div>
			<!-- /zc:cover -->

			<!-- zc:cover {"dimRatio":0,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
			<div class="zc-block-cover is-light has-contrast-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="zc-block-cover__background has-background-dim-0 has-background-dim"></span><div class="zc-block-cover__inner-container">
				<!-- zc:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"fontSize":"medium","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
				<div class="zc-block-group has-medium-font-size" style="padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--40)">
					<!-- zc:paragraph {"align":"center"} -->
					<p class="has-text-align-center">
						<?php
						printf(
							/* translators: %s: Starting price, split into three rows using HTML <br> tags. The price value has a font size set.*/
							esc_html__( 'Starting at%s/month', 'twentytwentyfive' ),
							'<br /><span style="font-size:2.63rem;">' . esc_html__( '30€', 'twentytwentyfive' ) . '</span><br />'
						);
						?>
					</p>
					<!-- /zc:paragraph -->
				</div>
				<!-- /zc:group -->
			</div></div>
			<!-- /zc:cover -->

			<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
			<figure class="zc-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/akaka-falls-state-park-flora.webp' ); ?>" alt="<?php esc_attr_e( 'Flora of Akaka Falls State Park', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /zc:image -->

			<!-- zc:cover {"dimRatio":0,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"medium"} -->
			<div class="zc-block-cover is-light has-contrast-color has-text-color has-link-color has-medium-font-size"><span aria-hidden="true" class="zc-block-cover__background has-background-dim-0 has-background-dim"></span><div class="zc-block-cover__inner-container">
				<!-- zc:paragraph {"align":"center"} -->
				<p class="has-text-align-center"><?php esc_html_e( 'Tailored to your needs', 'twentytwentyfive' ); ?></p>
				<!-- /zc:paragraph -->
			</div></div>
			<!-- /zc:cover -->

			<!-- zc:cover {"dimRatio":0,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"medium"} -->
			<div class="zc-block-cover is-light has-contrast-color has-text-color has-link-color has-medium-font-size"><span aria-hidden="true" class="zc-block-cover__background has-background-dim-0 has-background-dim"></span><div class="zc-block-cover__inner-container">
				<!-- zc:paragraph {"align":"center"} -->
				<p class="has-text-align-center"><?php esc_html_e( 'Free shipping', 'twentytwentyfive' ); ?></p>
				<!-- /zc:paragraph -->
			</div></div>
			<!-- /zc:cover -->

			<!-- zc:cover {"overlayColor":"accent-2","isUserOverlayColor":true,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"}},"layout":{"type":"constrained"}} -->
			<div class="zc-block-cover is-light"><span aria-hidden="true" class="zc-block-cover__background has-accent-2-background-color has-background-dim-100 has-background-dim"></span><div class="zc-block-cover__inner-container">
				<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
				<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
			</div></div>
			<!-- /zc:cover -->

			<!-- zc:cover {"dimRatio":0,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","fontSize":"medium"} -->
			<div class="zc-block-cover is-light has-contrast-color has-text-color has-link-color has-medium-font-size"><span aria-hidden="true" class="zc-block-cover__background has-background-dim-0 has-background-dim"></span><div class="zc-block-cover__inner-container">
				<!-- zc:paragraph {"align":"center"} -->
				<p class="has-text-align-center"><?php esc_html_e( 'Cancel anytime', 'twentytwentyfive' ); ?></p>
				<!-- /zc:paragraph -->
			</div></div>
			<!-- /zc:cover -->

			<!-- zc:cover {"overlayColor":"accent-3","isUserOverlayColor":true,"style":{"dimensions":{"aspectRatio":"1"}},"layout":{"type":"constrained"}} -->
			<div class="zc-block-cover"><span aria-hidden="true" class="zc-block-cover__background has-accent-3-background-color has-background-dim-100 has-background-dim"></span><div class="zc-block-cover__inner-container">
				<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
				<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
			</div></div>
			<!-- /zc:cover -->

			<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
			<figure class="zc-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/botany-flowers.webp' ); ?>" alt="<?php esc_attr_e( 'Botany flowers', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /zc:image -->

			<!-- zc:cover {"overlayColor":"accent-1","isUserOverlayColor":true,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"}},"layout":{"type":"constrained"}} -->
			<div class="zc-block-cover is-light"><span aria-hidden="true" class="zc-block-cover__background has-accent-1-background-color has-background-dim-100 has-background-dim"></span><div class="zc-block-cover__inner-container">
				<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
				<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
			</div></div>
			<!-- /zc:cover -->

			<!-- zc:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
			<figure class="zc-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/star-thristle-flower.webp' ); ?>" alt="<?php esc_attr_e( 'Black and white flower', 'twentytwentyfive' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /zc:image -->
		</div>
		<!-- /zc:group -->

		<!-- zc:buttons -->
		<div class="zc-block-buttons">
			<!-- zc:button {"width":100} -->
			<div class="zc-block-button has-custom-width zc-block-button__width-100"><a class="zc-block-button__link zc-element-button"><?php esc_html_e( 'Shop now', 'twentytwentyfive' ); ?></a></div>
			<!-- /zc:button -->
		</div>
		<!-- /zc:buttons -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
