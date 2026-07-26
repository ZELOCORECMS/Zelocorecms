<?php
/**
 * Title: Header
 * Slug: twentytwentyfive/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site header with site title and navigation.
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:group {"align":"full","layout":{"type":"default"}} -->
<div class="zc-block-group alignfull">
	<!-- zc:group {"layout":{"type":"constrained"}} -->
	<div class="zc-block-group">
		<!-- zc:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
		<div class="zc-block-group alignwide" style="padding-top:var(--zc--preset--spacing--30);padding-bottom:var(--zc--preset--spacing--30)">
			<!-- zc:site-title {"level":0} /-->
			<!-- zc:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
			<div class="zc-block-group">
				<!-- zc:navigation {"overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap"}} /-->
			</div>
			<!-- /zc:group -->
		</div>
		<!-- /zc:group -->
	</div>
	<!-- /zc:group -->
</div>
<!-- /zc:group -->
