<?php
/**
 * Comment Moderation Administration Screen.
 *
 * Redirects to edit-comments.php?comment_status=moderated.
 *
 * @package ZelocoreCMS
 * @subpackage Administration
 */
require_once dirname( __DIR__ ) . '/zc-load.php';
zc_redirect( admin_url( 'edit-comments.php?comment_status=moderated' ) );
exit;
