<?php
/**
 * Title: Header with columns
 * Slug: twentytwentyfive/header-columns
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site header with site title and navigation in columns.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"layout":{"type":"constrained"}} -->
<div class="zc-block-group">
	<!-- zc:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
	<div class="zc-block-group alignwide" style="padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--60)">
		<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
		<div class="zc-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- zc:site-title {"level":0} /-->
			<!-- zc:site-tagline /-->
		</div>
		<!-- /zc:group -->
		<!-- zc:group {"layout":{"type":"constrained","justifyContent":"left"}} -->
		<div class="zc-block-group">
			<!-- zc:navigation {"overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","orientation":"vertical"}} /-->
		</div>
		<!-- /zc:group -->
		<!-- zc:site-logo /-->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
