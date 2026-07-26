<?php
/**
 * Title: Event RSVP
 * Slug: twentytwentyfive/event-rsvp
 * Keywords: call-to-action, rsvp, event
 * Categories: call-to-action
 * Block Types: core/post-content
 * Viewport width: 1400
 * Description: RSVP for an upcoming event with a cover image and event details.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0">
	<!-- zc:columns {"isStackedOnMobile":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="zc-block-columns alignfull is-not-stacked-on-mobile" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--80);padding-left:var(--zc--preset--spacing--40)">
		<!-- zc:column {"width":"66.66%"} -->
		<div class="zc-block-column" style="flex-basis:66.66%">
			<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="zc-block-group">
				<!-- zc:heading {"fontSize":"xx-large"} -->
				<h2 class="zc-block-heading has-xx-large-font-size">
					<?php
					echo zc_kses_post(
						/* translators: This string contains the word "Stories" in four different languages with the first item in the locale's language. */
						_x( '“Stories, <span lang="es">historias</span>, <span lang="uk">iсторії</span>, <span lang="el">iστορίες</span>”', 'Placeholder heading in four languages.', 'twentytwentyfive' )
					);
					?>
				</h2>
				<!-- /zc:heading -->

				<!-- zc:paragraph {"fontSize":"x-large"} -->
				<p class="has-x-large-font-size"><?php echo esc_html_x( 'Mon, Jan 1', 'Example event date in pattern.', 'twentytwentyfive' ); ?></p>
				<!-- /zc:paragraph -->

				<!-- zc:spacer {"height":"0px","style":{"layout":{"selfStretch":"fixed","flexSize":"140px"}}} -->
				<div style="height:0px" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"12vw"} -->
		<div class="zc-block-column" style="flex-basis:12vw"></div>
		<!-- /zc:column -->

		<!-- zc:column -->
		<div class="zc-block-column">
			<!-- zc:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
			<div class="zc-block-group">
				<!-- zc:paragraph {"align":"left","style":{"typography":{"writingMode":"vertical-rl","textTransform":"uppercase","lineHeight":"0.6"}}} -->
				<p class="has-text-align-left" style="line-height:0.6;text-transform:uppercase;writing-mode:vertical-rl"><?php esc_html_e( 'Free Workshop', 'twentytwentyfive' ); ?></p>
				<!-- /zc:paragraph -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->

	<!-- zc:columns {"align":"full","className":"is-style-section-2","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"0","bottom":"0"}}}} -->
	<div class="zc-block-columns alignfull is-style-section-2" style="padding-top:0;padding-bottom:0">
		<!-- zc:column {"width":"50%"} -->
		<div class="zc-block-column" style="flex-basis:50%">
			<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"dimensions":{"minHeight":"33vh"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
			<div class="zc-block-group" style="min-height:33vh;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
				<!-- zc:paragraph -->
				<p><?php esc_html_e( 'This immersive event celebrates the universal human experience through the lenses of history and ancestry, featuring a diverse array of photographers whose works capture the essence of different cultures and historical moments.', 'twentytwentyfive' ); ?></p>
				<!-- /zc:paragraph -->

				<!-- zc:spacer {"height":"0px","style":{"layout":{"flexSize":"100px","selfStretch":"fixed"}}} -->
				<div style="height:0px" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->

				<!-- zc:heading {"fontSize":"xx-large"} -->
				<h2 class="zc-block-heading has-xx-large-font-size"><a href="#"><?php echo esc_html_x( 'RSVP', 'Abbreviation for "Please respond".', 'twentytwentyfive' ); ?></a></h2>
				<!-- /zc:heading -->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"50%"} -->
		<div class="zc-block-column" style="flex-basis:50%">
			<!-- zc:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/botany-flowers-closeup.webp","dimRatio":0,"isDark":false} -->
			<div class="zc-block-cover is-light"><span aria-hidden="true" class="zc-block-cover__background has-background-dim-0 has-background-dim"></span><img class="zc-block-cover__image-background" alt="<?php esc_attr_e( 'Close up photo of white flowers on a grey background', 'twentytwentyfive' ); ?>" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/botany-flowers-closeup.webp" data-object-fit="cover"/>
			<div class="zc-block-cover__inner-container">
				<!-- zc:spacer {"height":"var:preset|spacing|20"} -->
				<div style="height:var(--zc--preset--spacing--20)" aria-hidden="true" class="zc-block-spacer"></div>
				<!-- /zc:spacer -->
			</div></div>
			<!-- /zc:cover -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
