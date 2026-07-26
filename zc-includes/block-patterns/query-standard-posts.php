<?php
/**
 * Query: Standard.
 *
 * @package ZelocoreCMS
 */

return array(
	'title'      => _x( 'Standard', 'Block pattern title' ),
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
	'content'    => '<!-- zc:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
					<div class="zc-block-query">
					<!-- zc:post-template -->
					<!-- zc:post-title {"isLink":true} /-->
					<!-- zc:post-featured-image  {"isLink":true,"align":"wide"} /-->
					<!-- zc:post-excerpt /-->
					<!-- zc:separator -->
					<hr class="zc-block-separator"/>
					<!-- /zc:separator -->
					<!-- zc:post-date /-->
					<!-- /zc:post-template -->
					</div>
					<!-- /zc:query -->',
);
