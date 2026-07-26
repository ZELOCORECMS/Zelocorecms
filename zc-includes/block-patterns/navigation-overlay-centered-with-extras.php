<?php
/**
 * Navigation: Overlay with site info and CTA.
 *
 * @package ZelocoreCMS
 */

return array(
	'title'      => _x( 'Overlay with site info and CTA', 'Block pattern title' ),
	'blockTypes' => array( 'core/template-part/navigation-overlay' ),
	'categories' => array( 'navigation' ),
	'content'    => '<!-- zc:group {"metadata":{"name":"' . esc_attr( __( 'Navigation Overlay' ) ) . '"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"dimensions":{"minHeight":"100vh"},"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black","layout":{"type":"default"}} -->
<div class="zc-block-group has-black-color has-white-background-color has-text-color has-background has-link-color" style="min-height:100vh;padding-top:var(--zc--preset--spacing--40);padding-right:var(--zc--preset--spacing--40);padding-bottom:var(--zc--preset--spacing--40);padding-left:var(--zc--preset--spacing--40)"><!-- zc:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="zc-block-group alignwide"><!-- zc:navigation-overlay-close /--></div>
<!-- /zc:group -->

<!-- zc:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="zc-block-group alignwide"><!-- zc:site-logo {"width":80,"isLink":false,"align":"center","className":"is-style-rounded"} /-->

<!-- zc:site-title {"textAlign":"center","fontSize":"large"} /-->

<!-- zc:site-tagline {"textAlign":"center","fontSize":"medium"} /-->

<!-- zc:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group" style="padding-top:var(--zc--preset--spacing--50);padding-bottom:var(--zc--preset--spacing--50)"><!-- zc:navigation {"overlayMenu":"never","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-large","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} /--></div>
<!-- /zc:group -->

<!-- zc:group {"align":"full","style":{"border":{"top":{"color":"#eeeeee","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="zc-block-group alignfull" style="border-top-color:#eeeeee;border-top-width:1px;padding-top:var(--zc--preset--spacing--60);padding-bottom:var(--zc--preset--spacing--60)"><!-- zc:paragraph {"style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center">' . esc_html( __( 'Find out how we can help your business.' ) ) . ' <a href="#">' . esc_html( __( 'Learn more' ) ) . '</a></p>
<!-- /zc:paragraph -->

<!-- zc:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="zc-block-buttons"><!-- zc:button {"style":{"typography":{"textTransform":"uppercase"}}} -->
<div class="zc-block-button"><a class="zc-block-button__link zc-element-button" style="text-transform:uppercase">' . esc_html( __( 'Get started today!' ) ) . '</a></div>
<!-- /zc:button -->

<!-- zc:button -->
<div class="zc-block-button"><a class="zc-block-button__link zc-element-button"></a></div>
<!-- /zc:button --></div>
<!-- /zc:buttons --></div>
<!-- /zc:group --></div>
<!-- /zc:group --></div>
<!-- /zc:group -->',
);
