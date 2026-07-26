<?php
/**
 * Title: 3 column layout with 6 testimonials
 * Slug: twentytwentyfive/testimonials-6-col
 * Keywords: testimonial
 * Categories: testimonials
 * Description: A section with three columns and two rows, each containing a testimonial and citation.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|50","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)">
	<!-- zc:heading {"align":"wide","fontSize":"xx-large"} -->
	<h2 class="zc-block-heading alignwide has-xx-large-font-size"><?php echo esc_html_x( 'What people are saying', 'Testimonial section heading.', 'twentytwentyfive' ); ?></h2>
	<!-- /zc:heading -->

	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|50"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"style":{"border":{"width":"1px","color":"var(--zc--preset--color--accent-6)","radius":"10px"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
		<div class="zc-block-column has-border-color" style="border-color:var(--zc--preset--color--accent-6);border-width:1px;border-radius:10px;padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--40)">
			<!-- zc:quote {"className":"is-style-plain","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|40"}},"fontSize":"x-large"} -->
			<blockquote class="zc-block-quote is-style-plain has-x-large-font-size" style="font-style:normal;font-weight:400">
				<!-- zc:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"400px"}} -->
				<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- zc:paragraph {"style":{"typography":{"lineHeight":"1.1"}}} -->
					<p style="line-height:1.1"><?php echo esc_html_x( '“Amazing quality and care. I love all your products.”', 'Sample testimonial.', 'twentytwentyfive' ); ?></p>
					<!-- /zc:paragraph -->
				</div>
				<!-- /zc:group -->
				<cite><?php echo zc_kses_post( _x( 'Otto Reid <br><sub>Springfield, IL</sub>', 'Sample testimonial citation.', 'twentytwentyfive' ) ); ?></cite>
			</blockquote>
			<!-- /zc:quote -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"style":{"border":{"width":"1px","color":"var(--zc--preset--color--accent-6)","radius":"10px"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
		<div class="zc-block-column has-border-color" style="border-color:var(--zc--preset--color--accent-6);border-width:1px;border-radius:10px;padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--40)">
			<!-- zc:quote {"className":"is-style-plain","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|40"}},"fontSize":"x-large"} -->
			<blockquote class="zc-block-quote is-style-plain has-x-large-font-size" style="font-style:normal;font-weight:400">
				<!-- zc:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"400px"}} -->
				<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- zc:paragraph {"style":{"typography":{"lineHeight":"1.1"}}} -->
					<p style="line-height:1.1"><?php echo esc_html_x( '“Amazing quality and care. I love all your products.”', 'Sample testimonial.', 'twentytwentyfive' ); ?></p>
					<!-- /zc:paragraph -->
				</div>
				<!-- /zc:group -->
				<cite><?php echo zc_kses_post( _x( 'Otto Reid <br><sub>Springfield, IL</sub>', 'Sample testimonial citation.', 'twentytwentyfive' ) ); ?></cite>
			</blockquote>
			<!-- /zc:quote -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"style":{"border":{"width":"1px","color":"var(--zc--preset--color--accent-6)","radius":"10px"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
		<div class="zc-block-column has-border-color" style="border-color:var(--zc--preset--color--accent-6);border-width:1px;border-radius:10px;padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--40)">
			<!-- zc:quote {"className":"is-style-plain","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|40"}},"fontSize":"x-large"} -->
			<blockquote class="zc-block-quote is-style-plain has-x-large-font-size" style="font-style:normal;font-weight:400">
				<!-- zc:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"400px"}} -->
				<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- zc:paragraph {"style":{"typography":{"lineHeight":"1.1"}}} -->
					<p style="line-height:1.1"><?php echo esc_html_x( '“Amazing quality and care. I love all your products.”', 'Sample testimonial.', 'twentytwentyfive' ); ?></p>
					<!-- /zc:paragraph -->
				</div>
				<!-- /zc:group -->
				<cite><?php echo zc_kses_post( _x( 'Otto Reid <br><sub>Springfield, IL</sub>', 'Sample testimonial citation.', 'twentytwentyfive' ) ); ?></cite>
			</blockquote>
			<!-- /zc:quote -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->

	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|50"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"style":{"border":{"width":"1px","color":"var(--zc--preset--color--accent-6)","radius":"10px"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
		<div class="zc-block-column has-border-color" style="border-color:var(--zc--preset--color--accent-6);border-width:1px;border-radius:10px;padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--40)">
			<!-- zc:quote {"className":"is-style-plain","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|40"}},"fontSize":"x-large"} -->
			<blockquote class="zc-block-quote is-style-plain has-x-large-font-size" style="font-style:normal;font-weight:400">
				<!-- zc:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"400px"}} -->
				<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- zc:paragraph {"style":{"typography":{"lineHeight":"1.1"}}} -->
					<p style="line-height:1.1"><?php echo esc_html_x( '“Amazing quality and care. I love all your products.”', 'Sample testimonial.', 'twentytwentyfive' ); ?></p>
					<!-- /zc:paragraph -->
				</div>
				<!-- /zc:group -->
				<cite><?php echo zc_kses_post( _x( 'Otto Reid <br><sub>Springfield, IL</sub>', 'Sample testimonial citation.', 'twentytwentyfive' ) ); ?></cite>
			</blockquote>
			<!-- /zc:quote -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"style":{"border":{"width":"1px","color":"var(--zc--preset--color--accent-6)","radius":"10px"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
		<div class="zc-block-column has-border-color" style="border-color:var(--zc--preset--color--accent-6);border-width:1px;border-radius:10px;padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--40)"><!-- zc:quote {"className":"is-style-plain","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|40"}},"fontSize":"x-large"} -->
			<blockquote class="zc-block-quote is-style-plain has-x-large-font-size" style="font-style:normal;font-weight:400">
				<!-- zc:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"400px"}} -->
				<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- zc:paragraph {"style":{"typography":{"lineHeight":"1.1"}}} -->
					<p style="line-height:1.1"><?php echo esc_html_x( '“Amazing quality and care. I love all your products.”', 'Sample testimonial.', 'twentytwentyfive' ); ?></p>
					<!-- /zc:paragraph -->
				</div>
				<!-- /zc:group --><cite><?php echo zc_kses_post( _x( 'Otto Reid <br><sub>Springfield, IL</sub>', 'Sample testimonial citation.', 'twentytwentyfive' ) ); ?></cite>
			</blockquote>
			<!-- /zc:quote -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"style":{"border":{"width":"1px","color":"var(--zc--preset--color--accent-6)","radius":"10px"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
		<div class="zc-block-column has-border-color" style="border-color:var(--zc--preset--color--accent-6);border-width:1px;border-radius:10px;padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--40)"><!-- zc:quote {"className":"is-style-plain","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|40"}},"fontSize":"x-large"} -->
			<blockquote class="zc-block-quote is-style-plain has-x-large-font-size" style="font-style:normal;font-weight:400">
				<!-- zc:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"400px"}} -->
				<div class="zc-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- zc:paragraph {"style":{"typography":{"lineHeight":"1.1"}}} -->
					<p style="line-height:1.1"><?php echo esc_html_x( '“Amazing quality and care. I love all your products.”', 'Sample testimonial.', 'twentytwentyfive' ); ?></p>
					<!-- /zc:paragraph -->
				</div>
				<!-- /zc:group --><cite><?php echo zc_kses_post( _x( 'Otto Reid <br><sub>Springfield, IL</sub>', 'Sample testimonial citation.', 'twentytwentyfive' ) ); ?></cite>
			</blockquote>
			<!-- /zc:quote -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
