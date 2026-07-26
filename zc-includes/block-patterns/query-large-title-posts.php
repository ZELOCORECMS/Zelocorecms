<?php
/**
 * Query: Large title.
 *
 * @package ZelocoreCMS
 */

return array(
	'title'      => _x( 'Large title', 'Block pattern title' ),
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
	'content'    => '<!-- zc:group {"align":"full","style":{"spacing":{"padding":{"top":"100px","right":"100px","bottom":"100px","left":"100px"}},"color":{"text":"#ffffff","background":"#000000"}}} -->
					<div class="zc-block-group alignfull has-text-color has-background" style="background-color:#000000;color:#ffffff;padding-top:100px;padding-right:100px;padding-bottom:100px;padding-left:100px"><!-- zc:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
					<div class="zc-block-query"><!-- zc:post-template -->
					<!-- zc:separator {"customColor":"#ffffff","align":"wide","className":"is-style-wide"} -->
					<hr class="zc-block-separator alignwide has-text-color has-background is-style-wide" style="background-color:#ffffff;color:#ffffff"/>
					<!-- /zc:separator -->

					<!-- zc:columns {"verticalAlignment":"center","align":"wide"} -->
					<div class="zc-block-columns alignwide are-vertically-aligned-center"><!-- zc:column {"verticalAlignment":"center","width":"20%"} -->
					<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- zc:post-date {"style":{"color":{"text":"#ffffff"}},"fontSize":"extra-small"} /--></div>
					<!-- /zc:column -->

					<!-- zc:column {"verticalAlignment":"center","width":"80%"} -->
					<div class="zc-block-column is-vertically-aligned-center" style="flex-basis:80%"><!-- zc:post-title {"isLink":true,"style":{"typography":{"fontSize":"72px","lineHeight":"1.1"},"color":{"text":"#ffffff","link":"#ffffff"}}} /--></div>
					<!-- /zc:column --></div>
					<!-- /zc:columns -->
					<!-- /zc:post-template --></div>
					<!-- /zc:query --></div>
					<!-- /zc:group -->',
);
