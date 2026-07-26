<?php
/**
 * Title: 404
 * Slug: twentytwentyfive/hidden-404
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group" style="padding-right:0;padding-left:0">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column -->
		<div class="zc-block-column">
			<!-- zc:image {"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="zc-block-image size-full">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/404-image.webp" alt="<?php echo esc_attr_x( 'Small totara tree on ridge above Long Point', 'image description', 'twentytwentyfive' ); ?>" style="object-fit:cover"/>
			</figure>
			<!-- /zc:image -->
		</div>
		<!-- /zc:column -->
		<!-- zc:column {"verticalAlignment":"bottom"} -->
		<div class="zc-block-column is-vertically-aligned-bottom">
			<!-- zc:group {"layout":{"type":"default"}} -->
			<div class="zc-block-group">
				<!-- zc:heading {"level":1} -->
				<h1 class="zc-block-heading">
					<?php echo esc_html_x( 'Page not found', '404 error message', 'twentytwentyfive' ); ?>
				</h1>
				<!-- /zc:heading -->
				<!-- zc:paragraph -->
				<p><?php echo esc_html_x( 'The page you are looking for doesn\'t exist, or it has been moved. Please try searching using the form below.', '404 error message', 'twentytwentyfive' ); ?></p>
				<!-- /zc:paragraph -->
				<!-- zc:pattern {"slug":"twentytwentyfive/hidden-search"} /-->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
