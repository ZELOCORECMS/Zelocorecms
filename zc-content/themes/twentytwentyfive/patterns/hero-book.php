<?php
/**
 * Title: Hero book
 * Slug: twentytwentyfive/hero-book
 * Categories: banner
 * Keywords: podcast, hero, stories
 * Description: A hero section for the book with a description and pre-order link.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0">
	<!-- zc:columns {"align":"full","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
	<div class="zc-block-columns alignfull">
		<!-- zc:column {"width":"55%"} -->
		<div class="zc-block-column" style="flex-basis:55%">
			<!-- zc:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/book-image-landing.webp","dimRatio":0,"customOverlayColor":"#6b6b6b","isUserOverlayColor":true,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"}},"layout":{"type":"default"}} -->
			<div class="zc-block-cover is-light">
				<span aria-hidden="true" class="zc-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#6b6b6b"></span>
				<img class="zc-block-cover__image-background" alt="<?php esc_attr_e( 'Image of the book', 'twentytwentyfive' ); ?>" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/book-image-landing.webp" data-object-fit="cover"/>
				<div class="zc-block-cover__inner-container">
					<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
					<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
					<!-- /zc:spacer -->
				</div>
			</div>
			<!-- /zc:cover -->
		</div>
		<!-- /zc:column -->

<!-- zc:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}}} -->
<div class="zc-block-column is-vertically-aligned-center" style="padding-top:var(--zc--preset--spacing--60);padding-right:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60);padding-left:var(--zc--preset--spacing--60)">
<!-- zc:heading -->
<h2 class="zc-block-heading has-xx-large-font-size"><?php echo esc_html_x( 'The Stories Book', 'Heading of the hero section.', 'twentytwentyfive' ); ?></h2>
<!-- /zc:heading -->

<!-- zc:paragraph -->
<p><?php echo esc_html_x( 'A fine collection of moments in time featuring photographs from Louis Fleckenstein, Paul Strand and Asahachi Kōno.', 'Content of the hero section.', 'twentytwentyfive' ); ?></p>
<!-- /zc:paragraph -->

<!-- zc:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><?php echo esc_html_x( 'Available for pre-order now.', 'CTA text of the hero section.', 'twentytwentyfive' ); ?></p>
<!-- /zc:paragraph --></div>
<!-- /zc:column --></div>
<!-- /zc:columns --></div>
<!-- /zc:group -->
