<?php
/**
 * Title: Offset posts with featured images only, 4 columns
 * Slug: twentytwentyfour/posts-images-only-offset-4-col
 * Categories: posts
 * Description: A list of posts with featured images only, 4 columns.
 */
?>

<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="padding-top:var(--zc--preset--spacing--50);padding-right:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50);padding-left:var(--zc--preset--spacing--50)">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="zc-block-columns alignwide" style="margin-top:0;margin-bottom:0">
		<!-- zc:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="zc-block-column">
			<!-- zc:query {"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
			<div class="zc-block-query">
				<!-- zc:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
				<!-- zc:post-featured-image {"isLink":true,"align":"wide","style":{"spacing":{"margin":{"bottom":"0"}}}} /-->
				<!-- /zc:post-template -->
			</div>
			<!-- /zc:query -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"style":{"spacing":{"blockGap":"0","padding":{"top":"0"}}}} -->
		<div class="zc-block-column" style="padding-top:0">
			<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
			<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer">
			</div>
			<!-- /zc:spacer -->

			<!-- zc:query {"query":{"perPage":"3","pages":0,"offset":"3","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
			<div class="zc-block-query">
				<!-- zc:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
				<!-- zc:post-featured-image {"isLink":true,"align":"wide","style":{"spacing":{"margin":{"bottom":"0","top":"0"}}}} /-->
				<!-- /zc:post-template -->
			</div>
			<!-- /zc:query -->

			<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
			<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer">
			</div>
			<!-- /zc:spacer -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="zc-block-column">
			<!-- zc:query {"query":{"perPage":"3","pages":0,"offset":"6","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
			<div class="zc-block-query">
				<!-- zc:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
				<!-- zc:post-featured-image {"isLink":true,"align":"wide","style":{"spacing":{"margin":{"bottom":"0"}}}} /-->
				<!-- /zc:post-template -->
			</div>
			<!-- /zc:query -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"style":{"spacing":{"blockGap":"0","padding":{"top":"0"}}}} -->
		<div class="zc-block-column" style="padding-top:0">
			<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
			<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer">
			</div>
			<!-- /zc:spacer -->

			<!-- zc:query {"query":{"perPage":"3","pages":0,"offset":"9","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
			<div class="zc-block-query">
				<!-- zc:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
				<!-- zc:post-featured-image {"isLink":true,"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->
				<!-- /zc:post-template -->
			</div>
			<!-- /zc:query -->

			<!-- zc:spacer {"height":"var:preset|spacing|50"} -->
			<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer">
			</div>
			<!-- /zc:spacer -->
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->
