<?php
/**
 * Title: Centered site header
 * Slug: twentytwentyfive/header-centered
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site header with centered site title and navigation.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="zc-block-group">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
	<div class="zc-block-group alignwide" style="padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--30)">
		<!-- wp:site-title {"level":0,"textAlign":"center","align":"wide","fontSize":"x-large"} /-->
		<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
		<div class="zc-block-group alignwide">
			<!-- wp:navigation {"overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"center"}} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
