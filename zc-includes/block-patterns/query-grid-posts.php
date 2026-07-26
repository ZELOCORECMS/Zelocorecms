<?php
/**
 * Query: Grid.
 *
 * @package ZelocoreCMS
 */

return array(
	'title'      => _x( 'Grid', 'Block pattern title' ),
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
	'content'    => '<!-- zc:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":3}} -->
					<div class="zc-block-query">
					<!-- zc:post-template -->
					<!-- zc:group {"style":{"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"layout":{"inherit":false}} -->
					<div class="zc-block-group" style="padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- zc:post-title {"isLink":true} /-->
					<!-- zc:post-excerpt /-->
					<!-- zc:post-date /--></div>
					<!-- /zc:group -->
					<!-- /zc:post-template -->
					</div>
					<!-- /zc:query -->',
);
