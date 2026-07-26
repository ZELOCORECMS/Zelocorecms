<?php
/**
 * Navigation: Overlay with centered navigation.
 *
 * @package ZelocoreCMS
 */

return array(
	'title'      => _x( 'Overlay with centered navigation', 'Block pattern title' ),
	'blockTypes' => array( 'core/template-part/navigation-overlay' ),
	'categories' => array( 'navigation' ),
	'content'    => '<!-- zc:group {"metadata":{"name":"' . esc_attr( __( 'Navigation Overlay' ) ) . '"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"dimensions":{"minHeight":"100vh"},"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"color":{"background":"#eeeeee"}},"textColor":"black","layout":{"type":"default"}} -->
<div class="zc-block-group has-black-color has-text-color has-background has-link-color" style="background-color:#eeeeee;min-height:100vh;padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--40)"><!-- zc:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="zc-block-group alignwide"><!-- zc:navigation-overlay-close /--></div>
<!-- /zc:group -->

<!-- zc:group {"align":"wide","style":{"dimensions":{"minHeight":"90vh"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="zc-block-group alignwide" style="min-height:90vh"><!-- zc:navigation {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} /--></div>
<!-- /zc:group --></div>
<!-- /zc:group -->',
);
