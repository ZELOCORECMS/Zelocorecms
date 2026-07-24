<?php
/**
 * Title: Written by
 * Slug: twentytwentyfive/hidden-written-by
 * Inserter: no
 *
 * @package    ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since      Twenty Twenty-Five 1.0
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0.2em","margin":{"bottom":"var:preset|spacing|60"}}},"fontSize":"small","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="zc-block-group has-small-font-size" style="margin-bottom:var(--zc--preset--spacing--60)">
	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Written by ', 'twentytwentyfive' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:post-author-name {"isLink":true} /-->
	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'in', 'twentytwentyfive' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:post-terms {"term":"category","style":{"typography":{"fontWeight":"300"}}} /-->
</div>
<!-- /wp:group -->
