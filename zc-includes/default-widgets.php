<?php
/**
 * Widget API: Default core widgets
 *
 * @package ZelocoreCMS
 * @subpackage Widgets
 * @since 2.8.0
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/** ZC_Widget_Pages class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-pages.php';

/** ZC_Widget_Links class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-links.php';

/** ZC_Widget_Search class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-search.php';

/** ZC_Widget_Archives class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-archives.php';

/** ZC_Widget_Media class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-media.php';

/** ZC_Widget_Media_Audio class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-media-audio.php';

/** ZC_Widget_Media_Image class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-media-image.php';

/** ZC_Widget_Media_Video class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-media-video.php';

/** ZC_Widget_Media_Gallery class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-media-gallery.php';

/** ZC_Widget_Meta class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-meta.php';

/** ZC_Widget_Calendar class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-calendar.php';

/** ZC_Widget_Text class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-text.php';

/** ZC_Widget_Categories class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-categories.php';

/** ZC_Widget_Recent_Posts class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-recent-posts.php';

/** ZC_Widget_Recent_Comments class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-recent-comments.php';

/** ZC_Widget_RSS class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-rss.php';

/** ZC_Widget_Tag_Cloud class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-tag-cloud.php';

/** ZC_Nav_Menu_Widget class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-nav-menu-widget.php';

/** ZC_Widget_Custom_HTML class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-custom-html.php';

/** ZC_Widget_Block class */
require_once ABSPATH . ZCINC . '/widgets/class-zc-widget-block.php';
