<?php
/**
 * Template canvas file to render the current 'zc_template'.
 *
 * @package ZelocoreCMS
 */

/*
 * Get the template HTML.
 * This needs to run before <head> so that blocks can add scripts and styles in zc_head().
 */
$template_html = get_the_block_template_html();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php zc_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php zc_body_open(); ?>

<?php echo $template_html; ?>

<?php zc_footer(); ?>
</body>
</html>
