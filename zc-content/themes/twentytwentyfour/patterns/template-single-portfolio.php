<?php
/**
 * Title: Portfolio single post template
 * Slug: twentytwentyfour/template-single-portfolio
 * Template Types: posts, single
 * Viewport width: 1400
 * Inserter: no
 */
?>

<!-- zc:template-part {"slug":"header","area":"header","tagName":"header"} /-->

<!-- zc:group {"tagName":"main","align":"full","layout":{"type":"constrained"}} -->
<main class="zc-block-group alignfull">
	<!-- zc:spacer {"height":"var:preset|spacing|40"} -->
	<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer">
	</div>
	<!-- /zc:spacer -->

	<!-- zc:post-featured-image {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

	<!-- zc:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:template-part {"slug":"post-meta"} /-->
	</div>
	<!-- /zc:group -->

	<!-- zc:spacer {"height":"var:preset|spacing|40"} -->
	<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer">
	</div>
	<!-- /zc:spacer -->

</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer","area":"footer","tagName":"footer"} /-->
