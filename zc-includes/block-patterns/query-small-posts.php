<?php
/**
 * Query: Small image and title.
 *
 * @package ZelocoreCMS
 */

return array(
	'title'      => _x( 'Small image and title', 'Block pattern title' ),
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
	'content'    => '<!-- zc:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
					<div class="zc-block-query">
					<!-- zc:post-template -->
					<!-- zc:columns {"verticalAlignment":"center"} -->
					<div class="zc-block-columns are-vertically-aligned-center"><!-- zc:column {"verticalAlignment":"center","width":"25%"} -->
					<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:25%"><!-- zc:post-featured-image {"isLink":true} /--></div>
					<!-- /zc:column -->
					<!-- zc:column {"verticalAlignment":"center","width":"75%"} -->
					<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:75%"><!-- zc:post-title {"isLink":true} /--></div>
					<!-- /zc:column --></div>
					<!-- /zc:columns -->
					<!-- /zc:post-template -->
					</div>
					<!-- /zc:query -->',
);
