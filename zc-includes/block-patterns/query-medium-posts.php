<?php
/**
 * Query: Image at left.
 *
 * @package ZelocoreCMS
 */

return array(
	'title'      => _x( 'Image at left', 'Block pattern title' ),
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
	'content'    => '<!-- zc:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
					<div class="zc-block-query">
					<!-- zc:post-template -->
					<!-- zc:columns {"align":"wide"} -->
					<div class="zc-block-columns alignwide"><!-- zc:column {"width":"66.66%"} -->
					<div class="zc-block-column" style="flex-basis:66.66%"><!-- zc:post-featured-image {"isLink":true} /--></div>
					<!-- /zc:column -->
					<!-- zc:column {"width":"33.33%"} -->
					<div class="zc-block-column" style="flex-basis:33.33%"><!-- zc:post-title {"isLink":true} /-->
					<!-- zc:post-excerpt /--></div>
					<!-- /zc:column --></div>
					<!-- /zc:columns -->
					<!-- /zc:post-template -->
					</div>
					<!-- /zc:query -->',
);
