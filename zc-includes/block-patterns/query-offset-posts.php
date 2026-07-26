<?php
/**
 * Query: Offset.
 *
 * @package ZelocoreCMS
 */

return array(
	'title'      => _x( 'Offset', 'Block pattern title' ),
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
	'content'    => '<!-- zc:group {"style":{"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"layout":{"inherit":false}} -->
					<div class="zc-block-group" style="padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- zc:columns -->
					<div class="zc-block-columns"><!-- zc:column {"width":"50%"} -->
					<div class="zc-block-column" style="flex-basis:50%"><!-- zc:query {"query":{"perPage":2,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"list"}} -->
					<div class="zc-block-query"><!-- zc:post-template -->
					<!-- zc:post-featured-image /-->
					<!-- zc:post-title /-->
					<!-- zc:post-date /-->
					<!-- zc:spacer {"height":200} -->
					<div style="height:200px" aria-hidden="true" class="zc-block-spacer"></div>
					<!-- /zc:spacer -->
					<!-- /zc:post-template --></div>
					<!-- /zc:query --></div>
					<!-- /zc:column -->
					<!-- zc:column {"width":"50%"} -->
					<div class="zc-block-column" style="flex-basis:50%"><!-- zc:query {"query":{"perPage":2,"pages":0,"offset":2,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"list"}} -->
					<div class="zc-block-query"><!-- zc:post-template -->
					<!-- zc:spacer {"height":200} -->
					<div style="height:200px" aria-hidden="true" class="zc-block-spacer"></div>
					<!-- /zc:spacer -->
					<!-- zc:post-featured-image /-->
					<!-- zc:post-title /-->
					<!-- zc:post-date /-->
					<!-- /zc:post-template --></div>
					<!-- /zc:query --></div>
					<!-- /zc:column --></div>
					<!-- /zc:columns --></div>
					<!-- /zc:group -->',
);
