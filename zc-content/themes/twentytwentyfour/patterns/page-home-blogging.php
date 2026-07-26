<?php
/**
 * Title: Blogging home
 * Slug: twentytwentyfour/page-home-blogging
 * Categories: twentytwentyfour_page
 * Keywords: page, starter
 * Post Types: page, zc_template
 * Viewport width: 1400
 * Description: A blogging home page with a hero section, a text section, a blog section, and a CTA section.
 */
?>

<!-- zc:pattern {"slug":"twentytwentyfour/text-centered-statement-small"}	/-->

<!-- zc:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40)">
	<!-- zc:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"1rem","left":"1rem"}}}} -->
	<div class="zc-block-columns alignwide">
		<!-- zc:column {"width":"10%"} -->
		<div class="zc-block-column" style="flex-basis:10%">
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"60%"} -->
		<div class="zc-block-column" style="flex-basis:60%">
			<!-- zc:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
			<div class="zc-block-query">
				<!-- zc:post-template -->
				<!-- zc:group {"tagName":"article","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
				<article class="zc-block-group">
					<!-- zc:post-featured-image /-->

					<!-- zc:post-title {"isLink":true,"fontSize":"large"} /-->

					<!-- zc:template-part {"slug":"post-meta"} /-->

				</article>
				<!-- /zc:group -->

				<!-- zc:post-excerpt {"moreText":"","excerptLength":40} /-->

				<!-- zc:spacer -->
				<div style="height:100px" aria-hidden="true" class="zc-block-spacer">
				</div>
				<!-- /zc:spacer -->
				<!-- /zc:post-template -->

				<!-- zc:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
				<!-- zc:query-pagination-previous /-->

				<!-- zc:query-pagination-numbers /-->

				<!-- zc:query-pagination-next /-->
				<!-- /zc:query-pagination -->

				<!-- zc:query-no-results -->
				<!-- zc:pattern {"slug":"twentytwentyfour/hidden-no-results"} /-->
				<!-- /zc:query-no-results -->
			</div>
			<!-- /zc:query -->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"10%"} -->
		<div class="zc-block-column" style="flex-basis:10%">
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"30%"} -->
		<div class="zc-block-column" style="flex-basis:30%">
			<!-- zc:template-part {"slug":"sidebar","tagName":"aside"} /-->
		</div>
		<!-- /zc:column -->

		<!-- zc:column {"width":"10%"} -->
		<div class="zc-block-column" style="flex-basis:10%">
		</div>
		<!-- /zc:column -->
	</div>
	<!-- /zc:columns -->
</div>
<!-- /zc:group -->

<!-- zc:pattern {"slug":"twentytwentyfour/cta-subscribe-centered"}	/-->
