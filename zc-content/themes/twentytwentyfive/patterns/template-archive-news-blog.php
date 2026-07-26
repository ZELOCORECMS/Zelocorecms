<?php
/**
 * Title: News blog archive
 * Slug: twentytwentyfive/template-archive-news-blog
 * Template Types: archive
 * Viewport width: 1400
 * Inserter: no
 *
 * @package ZelocoreCMS
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

?>
<!-- zc:template-part {"slug":"header-large-title"} /-->

<!-- zc:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="zc-block-group">
	<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:spacer {"height":"var:preset|spacing|80"} -->
		<div style="height:var(--zc--preset--spacing--80)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->
		<!-- zc:query-title {"type":"archive"} /-->
		<!-- zc:term-description /-->
		<!-- zc:spacer {"height":"var:preset|spacing|40"} -->
		<div style="height:var(--zc--preset--spacing--40)" aria-hidden="true" class="zc-block-spacer"></div>
		<!-- /zc:spacer -->
	</div>
	<!-- /zc:group -->
	<!-- zc:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="zc-block-group alignwide">
		<!-- zc:pattern {"slug":"twentytwentyfive/template-query-loop-news-blog"} /-->
	</div>
	<!-- /zc:group -->
</main>
<!-- /zc:group -->

<!-- zc:template-part {"slug":"footer-newsletter"} /-->
