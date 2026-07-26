<?php
/**
 * Title: Offset gallery, 2 columns
 * Slug: twentytwentyfour/gallery-offset-images-grid-2-col
 * Categories: gallery, portfolio
 * Keywords: project, images, media, masonry, columns
 * Viewport width: 1400
 * Description: A gallery section with 2 columns and offset images.
 */
?>
<!-- zc:group {"metadata":{"name":"Portfolio Images"},"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="zc-block-columns alignwide" style="margin-top:0;margin-bottom:0">
		<!-- zc:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="zc-block-column">
			<!-- zc:image {"aspectRatio":"4/3","scale":"cover","className":"is-style-rounded"} -->
			<figure class="zc-block-image is-style-rounded">
				<img alt="" style="aspect-ratio:4/3;object-fit:cover" />
			</figure>
			<!-- /zc:image -->

			<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
			<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
			<!-- /zc:spacer -->

			<!-- zc:image {"aspectRatio":"3/4","scale":"cover","className":"is-style-rounded"} -->
			<figure class="zc-block-image is-style-rounded">
				<img alt="" style="aspect-ratio:3/4;object-fit:cover" />
			</figure>
			<!-- /zc:image -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="zc-block-column">
			<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
			<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
			<!-- /zc:spacer -->

			<!-- zc:image {"aspectRatio":"3/4","scale":"cover","className":"is-style-rounded"} -->
			<figure class="zc-block-image is-style-rounded"><img alt="" style="aspect-ratio:3/4;object-fit:cover" />
			</figure>
			<!-- /zc:image -->

			<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
			<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
			<!-- /zc:spacer -->

			<!-- zc:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded"} -->
			<figure class="zc-block-image is-style-rounded"><img alt="" style="aspect-ratio:1;object-fit:cover" />
			</figure>
			<!-- /zc:image -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
