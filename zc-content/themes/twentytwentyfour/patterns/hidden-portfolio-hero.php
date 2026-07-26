<?php
/**
 * Title: Portfolio hero
 * Slug: twentytwentyfour/hidden-portfolio-hero
 * Inserter: no
 */
?>

<!-- zc:spacer {"height":"var:preset|spacing|50","style":{"layout":{}}} -->
<div style="height:var(--zc--preset--spacing--50)" aria-hidden="true" class="zc-block-spacer"></div>
<!-- /zc:spacer -->

<!-- zc:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="zc-block-group alignwide">
	<!-- zc:heading {"level":1,"align":"wide","style":{"typography":{"lineHeight":"1.2"}},"fontSize":"xx-large"} -->
	<h1 class="zc-block-heading alignwide has-xx-large-font-size" style="line-height:1.2"><?php echo zc_kses_post( __( 'I’m <em>Leia Acosta</em>, a passionate photographer who finds inspiration in capturing the fleeting beauty of life.', 'twentytwentyfour' ) ); ?></h1>
	<!-- /zc:heading -->
</div>
<!-- /zc:group -->
