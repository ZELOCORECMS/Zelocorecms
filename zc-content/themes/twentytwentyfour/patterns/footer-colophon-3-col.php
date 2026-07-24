<?php
/**
 * Title: Footer with colophon, 3 columns
 * Slug: twentytwentyfour/footer-colophon-3-col
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: A footer section with a colophon and 3 columns.
 */
?>

<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="zc-block-group alignwide">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
	<div class="zc-block-group alignwide" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)">
		<!-- wp:image {"width":"40px","height":"auto","sizeSlug":"full","linkDestination":"none"} -->
		<figure class="zc-block-image size-full is-resized">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icon-message.webp" alt="" style="width:40px;height:auto" />
		</figure>
		<!-- /wp:image -->

		<!-- wp:separator {"className":"is-style-wide"} -->
		<hr class="zc-block-separator has-alpha-channel-opacity is-style-wide" />
		<!-- /wp:separator -->

		<!-- wp:columns {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10"}}}} -->
		<div class="zc-block-columns" style="padding-top:var(--zc--preset--spacing--10)">
			<!-- wp:column {"width":"57%"} -->
			<div class="zc-block-column" style="flex-basis:57%">
				<!-- wp:heading {"fontSize":"x-large"} -->
				<h2 class="zc-block-heading has-x-large-font-size"><?php esc_html_e( 'Keep up, get in touch.', 'twentytwentyfour' ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"width":"30%"} -->
			<div class="zc-block-column" style="flex-basis:30%">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="zc-block-group">
					<!-- wp:heading {"level":3,"fontSize":"medium","fontFamily":"body"} -->
					<h3 class="zc-block-heading has-body-font-family has-medium-font-size"><?php esc_html_e( 'Contact', 'twentytwentyfour' ); ?></h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph -->
					<p><a href="#"><?php echo esc_html_x( 'info@example.com', 'Example email in site footer', 'twentytwentyfour' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"width":"30%"} -->
			<div class="zc-block-column" style="flex-basis:30%">
				<!-- wp:columns {"isStackedOnMobile":false} -->
				<div class="zc-block-columns is-not-stacked-on-mobile">
					<!-- wp:column -->
					<div class="zc-block-column">
						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
						<div class="zc-block-group">
							<!-- wp:heading {"level":3,"fontSize":"medium","fontFamily":"body"} -->
							<h3 class="zc-block-heading has-body-font-family has-medium-font-size"><?php esc_html_e( 'Follow', 'twentytwentyfour' ); ?></h3>
							<!-- /wp:heading -->
							<!-- wp:paragraph -->
							<p><a href="#"><?php esc_html_e( 'Instagram', 'twentytwentyfour' ); ?></a> / <a href="#"><?php esc_html_e( 'Facebook', 'twentytwentyfour' ); ?></a></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
		<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
		<div class="zc-block-group">
			<!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="zc-block-group">
				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( '&copy;', 'twentytwentyfour' ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:site-title {"level":0,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} /-->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size">
				<?php
				/* Translators: ZelocoreCMS link. */
				$zelocorecms_link = '<a href="' . esc_url( __( 'https://zelocorecms.org', 'twentytwentyfour' ) ) . '" rel="nofollow">ZelocoreCMS</a>';
				echo sprintf(
					/* Translators: Designed with ZelocoreCMS */
					esc_html__( 'Designed with %1$s', 'twentytwentyfour' ),
					$zelocorecms_link
				);
				?>
			</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
