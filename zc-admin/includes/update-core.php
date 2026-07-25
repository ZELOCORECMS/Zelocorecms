<?php
/**
 * ZelocoreCMS core upgrade functionality.
 *
 * Note: Newly introduced functions and methods cannot be used here.
 * All functions must be present in the previous version being upgraded from
 * as this file is used there too.
 *
 * @package ZelocoreCMS
 * @subpackage Administration
 * @since 2.7.0
 */

/**
 * Stores files to be deleted.
 *
 * Bundled theme files should not be included in this list.
 *
 * @since 2.7.0
 *
 * @global string[] $_old_files
 * @var string[]
 * @name $_old_files
 */
global $_old_files;

$_old_files = array(
	// 2.0
	'zc-admin/import-b2.php',
	'zc-admin/import-blogger.php',
	'zc-admin/import-greymatter.php',
	'zc-admin/import-livejournal.php',
	'zc-admin/import-mt.php',
	'zc-admin/import-rss.php',
	'zc-admin/import-textpattern.php',
	'zc-admin/quicktags.js',
	'zc-images/fade-butt.png',
	'zc-images/get-firefox.png',
	'zc-images/header-shadow.png',
	'zc-images/smilies',
	'zc-images/zc-small.png',
	'zc-images/wpminilogo.png',
	'wp.php',
	// 2.1
	'zc-admin/edit-form-ajax-cat.php',
	'zc-admin/execute-pings.php',
	'zc-admin/inline-uploading.php',
	'zc-admin/link-categories.php',
	'zc-admin/list-manipulation.js',
	'zc-admin/list-manipulation.php',
	'zc-includes/comment-functions.php',
	'zc-includes/feed-functions.php',
	'zc-includes/functions-compat.php',
	'zc-includes/functions-formatting.php',
	'zc-includes/functions-post.php',
	'zc-includes/js/dbx-key.js',
	'zc-includes/links.php',
	'zc-includes/pluggable-functions.php',
	'zc-includes/template-functions-author.php',
	'zc-includes/template-functions-category.php',
	'zc-includes/template-functions-general.php',
	'zc-includes/template-functions-links.php',
	'zc-includes/template-functions-post.php',
	'zc-includes/zc-l10n.php',
	// 2.2
	'zc-admin/cat-js.php',
	'zc-includes/js/autosave-js.php',
	'zc-includes/js/list-manipulation-js.php',
	'zc-includes/js/zc-ajax-js.php',
	// 2.3
	'zc-admin/admin-db.php',
	'zc-admin/cat.js',
	'zc-admin/categories.js',
	'zc-admin/custom-fields.js',
	'zc-admin/dbx-admin-key.js',
	'zc-admin/edit-comments.js',
	'zc-admin/install-rtl.css',
	'zc-admin/install.css',
	'zc-admin/upgrade-schema.php',
	'zc-admin/upload-functions.php',
	'zc-admin/upload-rtl.css',
	'zc-admin/upload.css',
	'zc-admin/upload.js',
	'zc-admin/users.js',
	'zc-admin/widgets-rtl.css',
	'zc-admin/widgets.css',
	'zc-admin/xfn.js',
	'zc-includes/js/tinymce/license.html',
	// 2.5
	'zc-admin/css/upload.css',
	'zc-admin/images/box-bg-left.gif',
	'zc-admin/images/box-bg-right.gif',
	'zc-admin/images/box-bg.gif',
	'zc-admin/images/box-butt-left.gif',
	'zc-admin/images/box-butt-right.gif',
	'zc-admin/images/box-butt.gif',
	'zc-admin/images/box-head-left.gif',
	'zc-admin/images/box-head-right.gif',
	'zc-admin/images/box-head.gif',
	'zc-admin/images/heading-bg.gif',
	'zc-admin/images/login-bkg-bottom.gif',
	'zc-admin/images/login-bkg-tile.gif',
	'zc-admin/images/notice.gif',
	'zc-admin/images/toggle.gif',
	'zc-admin/includes/upload.php',
	'zc-admin/js/dbx-admin-key.js',
	'zc-admin/js/link-cat.js',
	'zc-admin/profile-update.php',
	'zc-admin/templates.php',
	'zc-includes/js/dbx.js',
	'zc-includes/js/fat.js',
	'zc-includes/js/list-manipulation.js',
	'zc-includes/js/tinymce/langs/en.js',
	'zc-includes/js/tinymce/plugins/directionality/images',
	'zc-includes/js/tinymce/plugins/directionality/langs',
	'zc-includes/js/tinymce/plugins/paste/images',
	'zc-includes/js/tinymce/plugins/paste/jscripts',
	'zc-includes/js/tinymce/plugins/paste/langs',
	'zc-includes/js/tinymce/plugins/zelocorecms/images',
	'zc-includes/js/tinymce/plugins/zelocorecms/langs',
	'zc-includes/js/tinymce/plugins/zelocorecms/zelocorecms.css',
	'zc-includes/js/tinymce/plugins/wphelp',
	// 2.5.1
	'zc-includes/js/tinymce/tiny_mce_gzip.php',
	// 2.6
	'zc-admin/bookmarklet.php',
	'zc-includes/js/jquery/jquery.dimensions.min.js',
	'zc-includes/js/tinymce/plugins/zelocorecms/popups.css',
	'zc-includes/js/zc-ajax.js',
	// 2.7
	'zc-admin/css/press-this-ie-rtl.css',
	'zc-admin/css/press-this-ie.css',
	'zc-admin/css/upload-rtl.css',
	'zc-admin/edit-form.php',
	'zc-admin/images/comment-pill.gif',
	'zc-admin/images/comment-stalk-classic.gif',
	'zc-admin/images/comment-stalk-fresh.gif',
	'zc-admin/images/comment-stalk-rtl.gif',
	'zc-admin/images/del.png',
	'zc-admin/images/gear.png',
	'zc-admin/images/media-button-gallery.gif',
	'zc-admin/images/media-buttons.gif',
	'zc-admin/images/postbox-bg.gif',
	'zc-admin/images/tab.png',
	'zc-admin/images/tail.gif',
	'zc-admin/js/forms.js',
	'zc-admin/js/upload.js',
	'zc-admin/link-import.php',
	'zc-includes/images/audio.png',
	'zc-includes/images/css.png',
	'zc-includes/images/default.png',
	'zc-includes/images/doc.png',
	'zc-includes/images/exe.png',
	'zc-includes/images/html.png',
	'zc-includes/images/js.png',
	'zc-includes/images/pdf.png',
	'zc-includes/images/swf.png',
	'zc-includes/images/tar.png',
	'zc-includes/images/text.png',
	'zc-includes/images/video.png',
	'zc-includes/images/zip.png',
	'zc-includes/js/tinymce/tiny_mce_config.php',
	'zc-includes/js/tinymce/tiny_mce_ext.js',
	// 2.8
	'zc-admin/js/users.js',
	'zc-includes/js/swfupload/swfupload_f9.swf',
	'zc-includes/js/tinymce/plugins/autosave',
	'zc-includes/js/tinymce/plugins/paste/css',
	'zc-includes/js/tinymce/utils/mclayer.js',
	'zc-includes/js/tinymce/zelocorecms.css',
	// 2.9
	'zc-admin/js/page.dev.js',
	'zc-admin/js/page.js',
	'zc-admin/js/set-post-thumbnail-handler.dev.js',
	'zc-admin/js/set-post-thumbnail-handler.js',
	'zc-admin/js/slug.dev.js',
	'zc-admin/js/slug.js',
	'zc-includes/gettext.php',
	'zc-includes/js/tinymce/plugins/zelocorecms/js',
	'zc-includes/streams.php',
	// MU
	'README.txt',
	'htaccess.dist',
	'index-install.php',
	'zc-admin/css/mu-rtl.css',
	'zc-admin/css/mu.css',
	'zc-admin/images/site-admin.png',
	'zc-admin/includes/mu.php',
	'zc-admin/wpmu-admin.php',
	'zc-admin/wpmu-blogs.php',
	'zc-admin/wpmu-edit.php',
	'zc-admin/wpmu-options.php',
	'zc-admin/wpmu-themes.php',
	'zc-admin/wpmu-upgrade-site.php',
	'zc-admin/wpmu-users.php',
	'zc-includes/images/zelocorecms-mu.png',
	'zc-includes/wpmu-default-filters.php',
	'zc-includes/wpmu-functions.php',
	'wpmu-settings.php',
	// 3.0
	'zc-admin/categories.php',
	'zc-admin/edit-category-form.php',
	'zc-admin/edit-page-form.php',
	'zc-admin/edit-pages.php',
	'zc-admin/images/admin-header-footer.png',
	'zc-admin/images/browse-happy.gif',
	'zc-admin/images/ico-add.png',
	'zc-admin/images/ico-close.png',
	'zc-admin/images/ico-edit.png',
	'zc-admin/images/ico-viewpage.png',
	'zc-admin/images/fav-top.png',
	'zc-admin/images/screen-options-left.gif',
	'zc-admin/images/zc-logo-vs.gif',
	'zc-admin/images/zc-logo.gif',
	'zc-admin/import',
	'zc-admin/js/zc-gears.dev.js',
	'zc-admin/js/zc-gears.js',
	'zc-admin/options-misc.php',
	'zc-admin/page-new.php',
	'zc-admin/page.php',
	'zc-admin/rtl.css',
	'zc-admin/rtl.dev.css',
	'zc-admin/update-links.php',
	'zc-admin/zc-admin.css',
	'zc-admin/zc-admin.dev.css',
	'zc-includes/js/codepress',
	'zc-includes/js/jquery/autocomplete.dev.js',
	'zc-includes/js/jquery/autocomplete.js',
	'zc-includes/js/jquery/interface.js',
	// Following file added back in 5.1, see #45645.
	//'zc-includes/js/tinymce/zc-tinymce.js',
	// 3.1
	'zc-admin/edit-attachment-rows.php',
	'zc-admin/edit-link-categories.php',
	'zc-admin/edit-link-category-form.php',
	'zc-admin/edit-post-rows.php',
	'zc-admin/images/button-grad-active-vs.png',
	'zc-admin/images/button-grad-vs.png',
	'zc-admin/images/fav-arrow-vs-rtl.gif',
	'zc-admin/images/fav-arrow-vs.gif',
	'zc-admin/images/fav-top-vs.gif',
	'zc-admin/images/list-vs.png',
	'zc-admin/images/screen-options-right-up.gif',
	'zc-admin/images/screen-options-right.gif',
	'zc-admin/images/visit-site-button-grad-vs.gif',
	'zc-admin/images/visit-site-button-grad.gif',
	'zc-admin/link-category.php',
	'zc-admin/sidebar.php',
	'zc-includes/classes.php',
	'zc-includes/js/tinymce/blank.htm',
	'zc-includes/js/tinymce/plugins/media/img',
	'zc-includes/js/tinymce/plugins/safari',
	// 3.2
	'zc-admin/images/logo-login.gif',
	'zc-admin/images/star.gif',
	'zc-admin/js/list-table.dev.js',
	'zc-admin/js/list-table.js',
	'zc-includes/default-embeds.php',
	// 3.3
	'zc-admin/css/colors-classic-rtl.css',
	'zc-admin/css/colors-classic-rtl.dev.css',
	'zc-admin/css/colors-fresh-rtl.css',
	'zc-admin/css/colors-fresh-rtl.dev.css',
	'zc-admin/css/dashboard-rtl.dev.css',
	'zc-admin/css/dashboard.dev.css',
	'zc-admin/css/global-rtl.css',
	'zc-admin/css/global-rtl.dev.css',
	'zc-admin/css/global.css',
	'zc-admin/css/global.dev.css',
	'zc-admin/css/install-rtl.dev.css',
	'zc-admin/css/login-rtl.dev.css',
	'zc-admin/css/login.dev.css',
	'zc-admin/css/ms.css',
	'zc-admin/css/ms.dev.css',
	'zc-admin/css/nav-menu-rtl.css',
	'zc-admin/css/nav-menu-rtl.dev.css',
	'zc-admin/css/nav-menu.css',
	'zc-admin/css/nav-menu.dev.css',
	'zc-admin/css/plugin-install-rtl.css',
	'zc-admin/css/plugin-install-rtl.dev.css',
	'zc-admin/css/plugin-install.css',
	'zc-admin/css/plugin-install.dev.css',
	'zc-admin/css/press-this-rtl.dev.css',
	'zc-admin/css/press-this.dev.css',
	'zc-admin/css/theme-editor-rtl.css',
	'zc-admin/css/theme-editor-rtl.dev.css',
	'zc-admin/css/theme-editor.css',
	'zc-admin/css/theme-editor.dev.css',
	'zc-admin/css/theme-install-rtl.css',
	'zc-admin/css/theme-install-rtl.dev.css',
	'zc-admin/css/theme-install.css',
	'zc-admin/css/theme-install.dev.css',
	'zc-admin/css/widgets-rtl.dev.css',
	'zc-admin/css/widgets.dev.css',
	'zc-admin/includes/internal-linking.php',
	'zc-includes/images/admin-bar-sprite-rtl.png',
	'zc-includes/js/jquery/ui.button.js',
	'zc-includes/js/jquery/ui.core.js',
	'zc-includes/js/jquery/ui.dialog.js',
	'zc-includes/js/jquery/ui.draggable.js',
	'zc-includes/js/jquery/ui.droppable.js',
	'zc-includes/js/jquery/ui.mouse.js',
	'zc-includes/js/jquery/ui.position.js',
	'zc-includes/js/jquery/ui.resizable.js',
	'zc-includes/js/jquery/ui.selectable.js',
	'zc-includes/js/jquery/ui.sortable.js',
	'zc-includes/js/jquery/ui.tabs.js',
	'zc-includes/js/jquery/ui.widget.js',
	'zc-includes/js/l10n.dev.js',
	'zc-includes/js/l10n.js',
	'zc-includes/js/tinymce/plugins/wplink/css',
	'zc-includes/js/tinymce/plugins/wplink/img',
	'zc-includes/js/tinymce/plugins/wplink/js',
	// Don't delete, yet: 'zc-rss.php',
	// Don't delete, yet: 'zc-rdf.php',
	// Don't delete, yet: 'zc-rss2.php',
	// Don't delete, yet: 'zc-commentsrss2.php',
	// Don't delete, yet: 'zc-atom.php',
	// Don't delete, yet: 'zc-feed.php',
	// 3.4
	'zc-admin/images/gray-star.png',
	'zc-admin/images/logo-login.png',
	'zc-admin/images/star.png',
	'zc-admin/index-extra.php',
	'zc-admin/network/index-extra.php',
	'zc-admin/user/index-extra.php',
	'zc-includes/css/editor-buttons.css',
	'zc-includes/css/editor-buttons.dev.css',
	'zc-includes/js/tinymce/plugins/paste/blank.htm',
	'zc-includes/js/tinymce/plugins/zelocorecms/css',
	'zc-includes/js/tinymce/plugins/zelocorecms/editor_plugin.dev.js',
	'zc-includes/js/tinymce/plugins/wpdialogs/editor_plugin.dev.js',
	'zc-includes/js/tinymce/plugins/wpeditimage/editor_plugin.dev.js',
	'zc-includes/js/tinymce/plugins/wpgallery/editor_plugin.dev.js',
	'zc-includes/js/tinymce/plugins/wplink/editor_plugin.dev.js',
	// Don't delete, yet: 'zc-pass.php',
	// Don't delete, yet: 'zc-register.php',
	// 3.5
	'zc-admin/gears-manifest.php',
	'zc-admin/includes/manifest.php',
	'zc-admin/images/archive-link.png',
	'zc-admin/images/blue-grad.png',
	'zc-admin/images/button-grad-active.png',
	'zc-admin/images/button-grad.png',
	'zc-admin/images/ed-bg-vs.gif',
	'zc-admin/images/ed-bg.gif',
	'zc-admin/images/fade-butt.png',
	'zc-admin/images/fav-arrow-rtl.gif',
	'zc-admin/images/fav-arrow.gif',
	'zc-admin/images/fav-vs.png',
	'zc-admin/images/fav.png',
	'zc-admin/images/gray-grad.png',
	'zc-admin/images/loading-publish.gif',
	'zc-admin/images/logo-ghost.png',
	'zc-admin/images/logo.gif',
	'zc-admin/images/menu-arrow-frame-rtl.png',
	'zc-admin/images/menu-arrow-frame.png',
	'zc-admin/images/menu-arrows.gif',
	'zc-admin/images/menu-bits-rtl-vs.gif',
	'zc-admin/images/menu-bits-rtl.gif',
	'zc-admin/images/menu-bits-vs.gif',
	'zc-admin/images/menu-bits.gif',
	'zc-admin/images/menu-dark-rtl-vs.gif',
	'zc-admin/images/menu-dark-rtl.gif',
	'zc-admin/images/menu-dark-vs.gif',
	'zc-admin/images/menu-dark.gif',
	'zc-admin/images/required.gif',
	'zc-admin/images/screen-options-toggle-vs.gif',
	'zc-admin/images/screen-options-toggle.gif',
	'zc-admin/images/toggle-arrow-rtl.gif',
	'zc-admin/images/toggle-arrow.gif',
	'zc-admin/images/upload-classic.png',
	'zc-admin/images/upload-fresh.png',
	'zc-admin/images/white-grad-active.png',
	'zc-admin/images/white-grad.png',
	'zc-admin/images/widgets-arrow-vs.gif',
	'zc-admin/images/widgets-arrow.gif',
	'zc-admin/images/wpspin_dark.gif',
	'zc-includes/images/upload.png',
	'zc-includes/js/prototype.js',
	'zc-includes/js/scriptaculous',
	'zc-admin/css/zc-admin-rtl.dev.css',
	'zc-admin/css/zc-admin.dev.css',
	'zc-admin/css/media-rtl.dev.css',
	'zc-admin/css/media.dev.css',
	'zc-admin/css/colors-classic.dev.css',
	'zc-admin/css/customize-controls-rtl.dev.css',
	'zc-admin/css/customize-controls.dev.css',
	'zc-admin/css/ie-rtl.dev.css',
	'zc-admin/css/ie.dev.css',
	'zc-admin/css/install.dev.css',
	'zc-admin/css/colors-fresh.dev.css',
	'zc-includes/js/customize-base.dev.js',
	'zc-includes/js/json2.dev.js',
	'zc-includes/js/comment-reply.dev.js',
	'zc-includes/js/customize-preview.dev.js',
	'zc-includes/js/wplink.dev.js',
	'zc-includes/js/tw-sack.dev.js',
	'zc-includes/js/zc-list-revisions.dev.js',
	'zc-includes/js/autosave.dev.js',
	'zc-includes/js/admin-bar.dev.js',
	'zc-includes/js/quicktags.dev.js',
	'zc-includes/js/zc-ajax-response.dev.js',
	'zc-includes/js/zc-pointer.dev.js',
	'zc-includes/js/hoverIntent.dev.js',
	'zc-includes/js/colorpicker.dev.js',
	'zc-includes/js/zc-lists.dev.js',
	'zc-includes/js/customize-loader.dev.js',
	'zc-includes/js/jquery/jquery.table-hotkeys.dev.js',
	'zc-includes/js/jquery/jquery.color.dev.js',
	'zc-includes/js/jquery/jquery.color.js',
	'zc-includes/js/jquery/jquery.hotkeys.dev.js',
	'zc-includes/js/jquery/jquery.form.dev.js',
	'zc-includes/js/jquery/suggest.dev.js',
	'zc-admin/js/xfn.dev.js',
	'zc-admin/js/set-post-thumbnail.dev.js',
	'zc-admin/js/comment.dev.js',
	'zc-admin/js/theme.dev.js',
	'zc-admin/js/cat.dev.js',
	'zc-admin/js/password-strength-meter.dev.js',
	'zc-admin/js/user-profile.dev.js',
	'zc-admin/js/theme-preview.dev.js',
	'zc-admin/js/post.dev.js',
	'zc-admin/js/media-upload.dev.js',
	'zc-admin/js/word-count.dev.js',
	'zc-admin/js/plugin-install.dev.js',
	'zc-admin/js/edit-comments.dev.js',
	'zc-admin/js/media-gallery.dev.js',
	'zc-admin/js/custom-fields.dev.js',
	'zc-admin/js/custom-background.dev.js',
	'zc-admin/js/common.dev.js',
	'zc-admin/js/inline-edit-tax.dev.js',
	'zc-admin/js/gallery.dev.js',
	'zc-admin/js/utils.dev.js',
	'zc-admin/js/widgets.dev.js',
	'zc-admin/js/zc-fullscreen.dev.js',
	'zc-admin/js/nav-menu.dev.js',
	'zc-admin/js/dashboard.dev.js',
	'zc-admin/js/link.dev.js',
	'zc-admin/js/user-suggest.dev.js',
	'zc-admin/js/postbox.dev.js',
	'zc-admin/js/tags.dev.js',
	'zc-admin/js/image-edit.dev.js',
	'zc-admin/js/media.dev.js',
	'zc-admin/js/customize-controls.dev.js',
	'zc-admin/js/inline-edit-post.dev.js',
	'zc-admin/js/categories.dev.js',
	'zc-admin/js/editor.dev.js',
	'zc-includes/js/plupload/handlers.dev.js',
	'zc-includes/js/plupload/zc-plupload.dev.js',
	'zc-includes/js/swfupload/handlers.dev.js',
	'zc-includes/js/jcrop/jquery.Jcrop.dev.js',
	'zc-includes/js/jcrop/jquery.Jcrop.js',
	'zc-includes/js/jcrop/jquery.Jcrop.css',
	'zc-includes/js/imgareaselect/jquery.imgareaselect.dev.js',
	'zc-includes/css/zc-pointer.dev.css',
	'zc-includes/css/editor.dev.css',
	'zc-includes/css/jquery-ui-dialog.dev.css',
	'zc-includes/css/admin-bar-rtl.dev.css',
	'zc-includes/css/admin-bar.dev.css',
	'zc-includes/js/jquery/ui/jquery.effects.clip.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.scale.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.blind.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.core.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.shake.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.fade.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.explode.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.slide.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.drop.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.highlight.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.bounce.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.pulsate.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.transfer.min.js',
	'zc-includes/js/jquery/ui/jquery.effects.fold.min.js',
	'zc-admin/js/utils.js',
	// Added back in 5.3 [45448], see #43895.
	// 'zc-admin/options-privacy.php',
	'zc-app.php',
	'zc-includes/class-zc-atom-server.php',
	// 3.5.2
	'zc-includes/js/swfupload/swfupload-all.js',
	// 3.6
	'zc-admin/js/revisions-js.php',
	'zc-admin/images/screenshots',
	'zc-admin/js/categories.js',
	'zc-admin/js/categories.min.js',
	'zc-admin/js/custom-fields.js',
	'zc-admin/js/custom-fields.min.js',
	// 3.7
	'zc-admin/js/cat.js',
	'zc-admin/js/cat.min.js',
	// 3.8
	'zc-includes/js/thickbox/tb-close-2x.png',
	'zc-includes/js/thickbox/tb-close.png',
	'zc-includes/images/wpmini-blue-2x.png',
	'zc-includes/images/wpmini-blue.png',
	'zc-admin/css/colors-fresh.css',
	'zc-admin/css/colors-classic.css',
	'zc-admin/css/colors-fresh.min.css',
	'zc-admin/css/colors-classic.min.css',
	'zc-admin/js/about.min.js',
	'zc-admin/js/about.js',
	'zc-admin/images/arrows-dark-vs-2x.png',
	'zc-admin/images/zc-logo-vs.png',
	'zc-admin/images/arrows-dark-vs.png',
	'zc-admin/images/zc-logo.png',
	'zc-admin/images/arrows-pr.png',
	'zc-admin/images/arrows-dark.png',
	'zc-admin/images/press-this.png',
	'zc-admin/images/press-this-2x.png',
	'zc-admin/images/arrows-vs-2x.png',
	'zc-admin/images/welcome-icons.png',
	'zc-admin/images/zc-logo-2x.png',
	'zc-admin/images/stars-rtl-2x.png',
	'zc-admin/images/arrows-dark-2x.png',
	'zc-admin/images/arrows-pr-2x.png',
	'zc-admin/images/menu-shadow-rtl.png',
	'zc-admin/images/arrows-vs.png',
	'zc-admin/images/about-search-2x.png',
	'zc-admin/images/bubble_bg-rtl-2x.gif',
	'zc-admin/images/zc-badge-2x.png',
	'zc-admin/images/zelocorecms-logo-2x.png',
	'zc-admin/images/bubble_bg-rtl.gif',
	'zc-admin/images/zc-badge.png',
	'zc-admin/images/menu-shadow.png',
	'zc-admin/images/about-globe-2x.png',
	'zc-admin/images/welcome-icons-2x.png',
	'zc-admin/images/stars-rtl.png',
	'zc-admin/images/zc-logo-vs-2x.png',
	'zc-admin/images/about-updates-2x.png',
	// 3.9
	'zc-admin/css/colors.css',
	'zc-admin/css/colors.min.css',
	'zc-admin/css/colors-rtl.css',
	'zc-admin/css/colors-rtl.min.css',
	// Following files added back in 4.5, see #36083.
	// 'zc-admin/css/media-rtl.min.css',
	// 'zc-admin/css/media.min.css',
	// 'zc-admin/css/farbtastic-rtl.min.css',
	'zc-admin/images/lock-2x.png',
	'zc-admin/images/lock.png',
	'zc-admin/js/theme-preview.js',
	'zc-admin/js/theme-install.min.js',
	'zc-admin/js/theme-install.js',
	'zc-admin/js/theme-preview.min.js',
	'zc-includes/js/plupload/plupload.html4.js',
	'zc-includes/js/plupload/plupload.html5.js',
	'zc-includes/js/plupload/changelog.txt',
	'zc-includes/js/plupload/plupload.silverlight.js',
	'zc-includes/js/plupload/plupload.flash.js',
	// Added back in 4.9 [41328], see #41755.
	// 'zc-includes/js/plupload/plupload.js',
	'zc-includes/js/tinymce/plugins/spellchecker',
	'zc-includes/js/tinymce/plugins/inlinepopups',
	'zc-includes/js/tinymce/plugins/media/js',
	'zc-includes/js/tinymce/plugins/media/css',
	'zc-includes/js/tinymce/plugins/zelocorecms/img',
	'zc-includes/js/tinymce/plugins/wpdialogs/js',
	'zc-includes/js/tinymce/plugins/wpeditimage/img',
	'zc-includes/js/tinymce/plugins/wpeditimage/js',
	'zc-includes/js/tinymce/plugins/wpeditimage/css',
	'zc-includes/js/tinymce/plugins/wpgallery/img',
	'zc-includes/js/tinymce/plugins/paste/js',
	'zc-includes/js/tinymce/themes/advanced',
	'zc-includes/js/tinymce/tiny_mce.js',
	'zc-includes/js/tinymce/mark_loaded_src.js',
	'zc-includes/js/tinymce/zc-tinymce-schema.js',
	'zc-includes/js/tinymce/plugins/media/editor_plugin.js',
	'zc-includes/js/tinymce/plugins/media/editor_plugin_src.js',
	'zc-includes/js/tinymce/plugins/media/media.htm',
	'zc-includes/js/tinymce/plugins/wpview/editor_plugin_src.js',
	'zc-includes/js/tinymce/plugins/wpview/editor_plugin.js',
	'zc-includes/js/tinymce/plugins/directionality/editor_plugin.js',
	'zc-includes/js/tinymce/plugins/directionality/editor_plugin_src.js',
	'zc-includes/js/tinymce/plugins/zelocorecms/editor_plugin.js',
	'zc-includes/js/tinymce/plugins/zelocorecms/editor_plugin_src.js',
	'zc-includes/js/tinymce/plugins/wpdialogs/editor_plugin_src.js',
	'zc-includes/js/tinymce/plugins/wpdialogs/editor_plugin.js',
	'zc-includes/js/tinymce/plugins/wpeditimage/editimage.html',
	'zc-includes/js/tinymce/plugins/wpeditimage/editor_plugin.js',
	'zc-includes/js/tinymce/plugins/wpeditimage/editor_plugin_src.js',
	'zc-includes/js/tinymce/plugins/fullscreen/editor_plugin_src.js',
	'zc-includes/js/tinymce/plugins/fullscreen/fullscreen.htm',
	'zc-includes/js/tinymce/plugins/fullscreen/editor_plugin.js',
	'zc-includes/js/tinymce/plugins/wplink/editor_plugin_src.js',
	'zc-includes/js/tinymce/plugins/wplink/editor_plugin.js',
	'zc-includes/js/tinymce/plugins/wpgallery/editor_plugin_src.js',
	'zc-includes/js/tinymce/plugins/wpgallery/editor_plugin.js',
	'zc-includes/js/tinymce/plugins/tabfocus/editor_plugin.js',
	'zc-includes/js/tinymce/plugins/tabfocus/editor_plugin_src.js',
	'zc-includes/js/tinymce/plugins/paste/editor_plugin.js',
	'zc-includes/js/tinymce/plugins/paste/pasteword.htm',
	'zc-includes/js/tinymce/plugins/paste/editor_plugin_src.js',
	'zc-includes/js/tinymce/plugins/paste/pastetext.htm',
	'zc-includes/js/tinymce/langs/zc-langs.php',
	// 4.1
	'zc-includes/js/jquery/ui/jquery.ui.accordion.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.autocomplete.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.button.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.core.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.datepicker.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.dialog.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.draggable.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.droppable.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-blind.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-bounce.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-clip.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-drop.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-explode.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-fade.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-fold.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-highlight.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-pulsate.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-scale.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-shake.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-slide.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect-transfer.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.effect.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.menu.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.mouse.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.position.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.progressbar.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.resizable.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.selectable.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.slider.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.sortable.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.spinner.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.tabs.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.tooltip.min.js',
	'zc-includes/js/jquery/ui/jquery.ui.widget.min.js',
	'zc-includes/js/tinymce/skins/zelocorecms/images/dashicon-no-alt.png',
	// 4.3
	'zc-admin/js/zc-fullscreen.js',
	'zc-admin/js/zc-fullscreen.min.js',
	'zc-includes/js/tinymce/zc-mce-help.php',
	'zc-includes/js/tinymce/plugins/wpfullscreen',
	// 4.5
	'zc-includes/theme-compat/comments-popup.php',
	// 4.6
	'zc-admin/includes/class-zc-automatic-upgrader.php', // Wrong file name, see #37628.
	// 4.8
	'zc-includes/js/tinymce/plugins/wpembed',
	'zc-includes/js/tinymce/plugins/media/moxieplayer.swf',
	'zc-includes/js/tinymce/skins/lightgray/fonts/readme.md',
	'zc-includes/js/tinymce/skins/lightgray/fonts/tinymce-small.json',
	'zc-includes/js/tinymce/skins/lightgray/fonts/tinymce.json',
	'zc-includes/js/tinymce/skins/lightgray/skin.ie7.min.css',
	// 4.9
	'zc-admin/css/press-this-editor-rtl.css',
	'zc-admin/css/press-this-editor-rtl.min.css',
	'zc-admin/css/press-this-editor.css',
	'zc-admin/css/press-this-editor.min.css',
	'zc-admin/css/press-this-rtl.css',
	'zc-admin/css/press-this-rtl.min.css',
	'zc-admin/css/press-this.css',
	'zc-admin/css/press-this.min.css',
	'zc-admin/includes/class-zc-press-this.php',
	'zc-admin/js/bookmarklet.js',
	'zc-admin/js/bookmarklet.min.js',
	'zc-admin/js/press-this.js',
	'zc-admin/js/press-this.min.js',
	'zc-includes/js/mediaelement/background.png',
	'zc-includes/js/mediaelement/bigplay.png',
	'zc-includes/js/mediaelement/bigplay.svg',
	'zc-includes/js/mediaelement/controls.png',
	'zc-includes/js/mediaelement/controls.svg',
	'zc-includes/js/mediaelement/flashmediaelement.swf',
	'zc-includes/js/mediaelement/froogaloop.min.js',
	'zc-includes/js/mediaelement/jumpforward.png',
	'zc-includes/js/mediaelement/loading.gif',
	'zc-includes/js/mediaelement/silverlightmediaelement.xap',
	'zc-includes/js/mediaelement/skipback.png',
	'zc-includes/js/plupload/plupload.flash.swf',
	'zc-includes/js/plupload/plupload.full.min.js',
	'zc-includes/js/plupload/plupload.silverlight.xap',
	'zc-includes/js/swfupload/plugins',
	'zc-includes/js/swfupload/swfupload.swf',
	// 4.9.2
	'zc-includes/js/mediaelement/lang',
	'zc-includes/js/mediaelement/mediaelement-flash-audio-ogg.swf',
	'zc-includes/js/mediaelement/mediaelement-flash-audio.swf',
	'zc-includes/js/mediaelement/mediaelement-flash-video-hls.swf',
	'zc-includes/js/mediaelement/mediaelement-flash-video-mdash.swf',
	'zc-includes/js/mediaelement/mediaelement-flash-video.swf',
	'zc-includes/js/mediaelement/renderers/dailymotion.js',
	'zc-includes/js/mediaelement/renderers/dailymotion.min.js',
	'zc-includes/js/mediaelement/renderers/facebook.js',
	'zc-includes/js/mediaelement/renderers/facebook.min.js',
	'zc-includes/js/mediaelement/renderers/soundcloud.js',
	'zc-includes/js/mediaelement/renderers/soundcloud.min.js',
	'zc-includes/js/mediaelement/renderers/twitch.js',
	'zc-includes/js/mediaelement/renderers/twitch.min.js',
	// 5.0
	'zc-includes/js/codemirror/jshint.js',
	// 5.1
	'zc-includes/js/tinymce/zc-tinymce.js.gz',
	// 5.3
	'zc-includes/js/zc-a11y.js',     // Moved to: zc-includes/js/dist/a11y.js
	'zc-includes/js/zc-a11y.min.js', // Moved to: zc-includes/js/dist/a11y.min.js
	// 5.4
	'zc-admin/js/zc-fullscreen-stub.js',
	'zc-admin/js/zc-fullscreen-stub.min.js',
	// 5.5
	'zc-admin/css/ie.css',
	'zc-admin/css/ie.min.css',
	'zc-admin/css/ie-rtl.css',
	'zc-admin/css/ie-rtl.min.css',
	// 5.6
	'zc-includes/js/jquery/ui/position.min.js',
	'zc-includes/js/jquery/ui/widget.min.js',
	// 5.7
	'zc-includes/blocks/classic/block.json',
	// 5.8
	'zc-admin/images/freedoms.png',
	'zc-admin/images/privacy.png',
	'zc-admin/images/about-badge.svg',
	'zc-admin/images/about-color-palette.svg',
	'zc-admin/images/about-color-palette-vert.svg',
	'zc-admin/images/about-header-brushes.svg',
	'zc-includes/block-patterns/large-header.php',
	'zc-includes/block-patterns/heading-paragraph.php',
	'zc-includes/block-patterns/quote.php',
	'zc-includes/block-patterns/text-three-columns-buttons.php',
	'zc-includes/block-patterns/two-buttons.php',
	'zc-includes/block-patterns/two-images.php',
	'zc-includes/block-patterns/three-buttons.php',
	'zc-includes/block-patterns/text-two-columns-with-images.php',
	'zc-includes/block-patterns/text-two-columns.php',
	'zc-includes/block-patterns/large-header-button.php',
	'zc-includes/blocks/subhead',
	'zc-includes/css/dist/editor/editor-styles.css',
	'zc-includes/css/dist/editor/editor-styles.min.css',
	'zc-includes/css/dist/editor/editor-styles-rtl.css',
	'zc-includes/css/dist/editor/editor-styles-rtl.min.css',
	// 5.9
	'zc-includes/blocks/heading/editor.css',
	'zc-includes/blocks/heading/editor.min.css',
	'zc-includes/blocks/heading/editor-rtl.css',
	'zc-includes/blocks/heading/editor-rtl.min.css',
	'zc-includes/blocks/query-title/editor.css',
	'zc-includes/blocks/query-title/editor.min.css',
	'zc-includes/blocks/query-title/editor-rtl.css',
	'zc-includes/blocks/query-title/editor-rtl.min.css',
	/*
	 * Restored in ZelocoreCMS 6.7
	 *
	 * 'zc-includes/blocks/tag-cloud/editor.css',
	 * 'zc-includes/blocks/tag-cloud/editor.min.css',
	 * 'zc-includes/blocks/tag-cloud/editor-rtl.css',
	 * 'zc-includes/blocks/tag-cloud/editor-rtl.min.css',
	 */
	// 6.1
	'zc-includes/blocks/post-comments.php',
	'zc-includes/blocks/post-comments',
	'zc-includes/blocks/comments-query-loop',
	// 6.3
	'zc-includes/images/wlw',
	'zc-includes/wlwmanifest.xml',
	'zc-includes/random_compat',
	// 6.4
	'zc-includes/navigation-fallback.php',
	'zc-includes/blocks/navigation/view-modal.min.js',
	'zc-includes/blocks/navigation/view-modal.js',
	// 6.5
	'zc-includes/ID3/license.commercial.txt',
	'zc-includes/blocks/query/style-rtl.min.css',
	'zc-includes/blocks/query/style.min.css',
	'zc-includes/blocks/query/style-rtl.css',
	'zc-includes/blocks/query/style.css',
	'zc-admin/images/about-header-privacy.svg',
	'zc-admin/images/about-header-about.svg',
	'zc-admin/images/about-header-credits.svg',
	'zc-admin/images/about-header-freedoms.svg',
	'zc-admin/images/about-header-contribute.svg',
	'zc-admin/images/about-header-background.svg',
	// 6.6
	'zc-includes/blocks/block/editor.css',
	'zc-includes/blocks/block/editor.min.css',
	'zc-includes/blocks/block/editor-rtl.css',
	'zc-includes/blocks/block/editor-rtl.min.css',
	/*
	 * 6.7
	 *
	 * ZelocoreCMS 6.7 included a SimplePie upgrade that included a major
	 * refactoring of the file structure and library. The old files are
	 * split in to two sections to account for this: files and directories.
	 *
	 * See https://core.trac.zelocorecms.org/changeset/59141
	 */
	// 6.7 - files
	'zc-includes/js/dist/interactivity-router.asset.php',
	'zc-includes/js/dist/interactivity-router.js',
	'zc-includes/js/dist/interactivity-router.min.js',
	'zc-includes/js/dist/interactivity-router.min.asset.php',
	'zc-includes/js/dist/interactivity.js',
	'zc-includes/js/dist/interactivity.min.js',
	'zc-includes/js/dist/vendor/react-dom.min.js.LICENSE.txt',
	'zc-includes/js/dist/vendor/react.min.js.LICENSE.txt',
	'zc-includes/js/dist/vendor/zc-polyfill-importmap.js',
	'zc-includes/js/dist/vendor/zc-polyfill-importmap.min.js',
	'zc-includes/sodium_compat/src/Core/Base64/Common.php',
	'zc-includes/SimplePie/Author.php',
	'zc-includes/SimplePie/Cache.php',
	'zc-includes/SimplePie/Caption.php',
	'zc-includes/SimplePie/Category.php',
	'zc-includes/SimplePie/Copyright.php',
	'zc-includes/SimplePie/Core.php',
	'zc-includes/SimplePie/Credit.php',
	'zc-includes/SimplePie/Enclosure.php',
	'zc-includes/SimplePie/Exception.php',
	'zc-includes/SimplePie/File.php',
	'zc-includes/SimplePie/gzdecode.php',
	'zc-includes/SimplePie/IRI.php',
	'zc-includes/SimplePie/Item.php',
	'zc-includes/SimplePie/Locator.php',
	'zc-includes/SimplePie/Misc.php',
	'zc-includes/SimplePie/Parser.php',
	'zc-includes/SimplePie/Rating.php',
	'zc-includes/SimplePie/Registry.php',
	'zc-includes/SimplePie/Restriction.php',
	'zc-includes/SimplePie/Sanitize.php',
	'zc-includes/SimplePie/Source.php',
	// 6.7 - directories
	'zc-includes/SimplePie/Cache/',
	'zc-includes/SimplePie/Content/',
	'zc-includes/SimplePie/Decode/',
	'zc-includes/SimplePie/HTTP/',
	'zc-includes/SimplePie/Net/',
	'zc-includes/SimplePie/Parse/',
	'zc-includes/SimplePie/XML/',
	// 6.8
	'zc-includes/blocks/post-content/editor.css',
	'zc-includes/blocks/post-content/editor.min.css',
	'zc-includes/blocks/post-content/editor-rtl.css',
	'zc-includes/blocks/post-content/editor-rtl.min.css',
	'zc-includes/blocks/post-template/editor.css',
	'zc-includes/blocks/post-template/editor.min.css',
	'zc-includes/blocks/post-template/editor-rtl.css',
	'zc-includes/blocks/post-template/editor-rtl.min.css',
	'zc-includes/js/dist/fields.min.js',
	'zc-includes/js/dist/fields.js',
	// 6.9
	'zc-includes/SimplePie/src/Decode',
	'zc-includes/SimplePie/src/Core.php',
	// 7.0
	'zc-includes/assets/script-loader-packages.min.php',
	'zc-includes/assets/script-loader-react-refresh-entry.php',
	'zc-includes/assets/script-loader-react-refresh-entry.min.php',
	'zc-includes/assets/script-loader-react-refresh-runtime.php',
	'zc-includes/assets/script-loader-react-refresh-runtime.min.php',
	'zc-includes/assets/script-modules-packages.min.php',
	'zc-includes/blocks/archives/editor.css',
	'zc-includes/blocks/archives/editor.min.css',
	'zc-includes/blocks/archives/editor-rtl.css',
	'zc-includes/blocks/archives/editor-rtl.min.css',
	'zc-includes/blocks/file/view.asset.php',
	'zc-includes/blocks/file/view.min.asset.php',
	'zc-includes/blocks/file/view.js',
	'zc-includes/blocks/file/view.min.js',
	'zc-includes/blocks/image/view.asset.php',
	'zc-includes/blocks/image/view.min.asset.php',
	'zc-includes/blocks/image/view.js',
	'zc-includes/blocks/image/view.min.js',
	'zc-includes/blocks/navigation/view.asset.php',
	'zc-includes/blocks/navigation/view.min.asset.php',
	'zc-includes/blocks/navigation/view.js',
	'zc-includes/blocks/navigation/view.min.js',
	'zc-includes/blocks/navigation/view-modal.asset.php',
	'zc-includes/blocks/navigation/view-modal.min.asset.php',
	'zc-includes/blocks/query/view.asset.php',
	'zc-includes/blocks/query/view.min.asset.php',
	'zc-includes/blocks/query/view.js',
	'zc-includes/blocks/query/view.min.js',
	'zc-includes/blocks/search/view.asset.php',
	'zc-includes/blocks/search/view.min.asset.php',
	'zc-includes/blocks/search/view.js',
	'zc-includes/blocks/search/view.min.js',
	'zc-includes/blocks/tag-cloud/editor.css',
	'zc-includes/blocks/tag-cloud/editor.min.css',
	'zc-includes/blocks/tag-cloud/editor-rtl.css',
	'zc-includes/blocks/tag-cloud/editor-rtl.min.css',
	'zc-includes/css/dist/admin-ui/style.css',
	'zc-includes/css/dist/admin-ui/style.min.css',
	'zc-includes/css/dist/admin-ui/style-rtl.css',
	'zc-includes/css/dist/admin-ui/style-rtl.min.css',
	'zc-includes/css/dist/admin-ui/',
	'zc-includes/css/dist/edit-site/posts.css',
	'zc-includes/css/dist/edit-site/posts.min.css',
	'zc-includes/css/dist/edit-site/posts-rtl.css',
	'zc-includes/css/dist/edit-site/posts-rtl.min.css',
	'zc-includes/js/dist/admin-ui.js',
	'zc-includes/js/dist/admin-ui.min.js',
	'zc-includes/js/dist/latex-to-mathml.js',
	'zc-includes/js/dist/latex-to-mathml.min.js',
	'zc-includes/js/dist/views.js',
	'zc-includes/js/dist/views.min.js',
	'zc-includes/js/dist/script-modules/interactivity/debug.js',
	'zc-includes/js/dist/script-modules/interactivity/debug.min.js',
	'zc-includes/js/dist/vendor/react-jsx-runtime.min.js.LICENSE.txt',
	// 0.0.1
	'zc-includes/collaboration',
	'zc-includes/collaboration.php',
	'zc-includes/js/dist/sync.js',
	'zc-includes/js/dist/sync.min.js',
);

/**
 * Stores Requests files to be preloaded and deleted.
 *
 * For classes/interfaces, use the class/interface name
 * as the array key.
 *
 * All other files/directories should not have a key.
 *
 * @since 6.2.0
 *
 * @global string[] $_old_requests_files
 * @var string[]
 * @name $_old_requests_files
 */
global $_old_requests_files;

$_old_requests_files = array(
	// Interfaces.
	'Requests_Auth'                              => 'zc-includes/Requests/Auth.php',
	'Requests_Hooker'                            => 'zc-includes/Requests/Hooker.php',
	'Requests_Proxy'                             => 'zc-includes/Requests/Proxy.php',
	'Requests_Transport'                         => 'zc-includes/Requests/Transport.php',

	// Classes.
	'Requests_Auth_Basic'                        => 'zc-includes/Requests/Auth/Basic.php',
	'Requests_Cookie_Jar'                        => 'zc-includes/Requests/Cookie/Jar.php',
	'Requests_Exception_HTTP'                    => 'zc-includes/Requests/Exception/HTTP.php',
	'Requests_Exception_Transport'               => 'zc-includes/Requests/Exception/Transport.php',
	'Requests_Exception_HTTP_304'                => 'zc-includes/Requests/Exception/HTTP/304.php',
	'Requests_Exception_HTTP_305'                => 'zc-includes/Requests/Exception/HTTP/305.php',
	'Requests_Exception_HTTP_306'                => 'zc-includes/Requests/Exception/HTTP/306.php',
	'Requests_Exception_HTTP_400'                => 'zc-includes/Requests/Exception/HTTP/400.php',
	'Requests_Exception_HTTP_401'                => 'zc-includes/Requests/Exception/HTTP/401.php',
	'Requests_Exception_HTTP_402'                => 'zc-includes/Requests/Exception/HTTP/402.php',
	'Requests_Exception_HTTP_403'                => 'zc-includes/Requests/Exception/HTTP/403.php',
	'Requests_Exception_HTTP_404'                => 'zc-includes/Requests/Exception/HTTP/404.php',
	'Requests_Exception_HTTP_405'                => 'zc-includes/Requests/Exception/HTTP/405.php',
	'Requests_Exception_HTTP_406'                => 'zc-includes/Requests/Exception/HTTP/406.php',
	'Requests_Exception_HTTP_407'                => 'zc-includes/Requests/Exception/HTTP/407.php',
	'Requests_Exception_HTTP_408'                => 'zc-includes/Requests/Exception/HTTP/408.php',
	'Requests_Exception_HTTP_409'                => 'zc-includes/Requests/Exception/HTTP/409.php',
	'Requests_Exception_HTTP_410'                => 'zc-includes/Requests/Exception/HTTP/410.php',
	'Requests_Exception_HTTP_411'                => 'zc-includes/Requests/Exception/HTTP/411.php',
	'Requests_Exception_HTTP_412'                => 'zc-includes/Requests/Exception/HTTP/412.php',
	'Requests_Exception_HTTP_413'                => 'zc-includes/Requests/Exception/HTTP/413.php',
	'Requests_Exception_HTTP_414'                => 'zc-includes/Requests/Exception/HTTP/414.php',
	'Requests_Exception_HTTP_415'                => 'zc-includes/Requests/Exception/HTTP/415.php',
	'Requests_Exception_HTTP_416'                => 'zc-includes/Requests/Exception/HTTP/416.php',
	'Requests_Exception_HTTP_417'                => 'zc-includes/Requests/Exception/HTTP/417.php',
	'Requests_Exception_HTTP_418'                => 'zc-includes/Requests/Exception/HTTP/418.php',
	'Requests_Exception_HTTP_428'                => 'zc-includes/Requests/Exception/HTTP/428.php',
	'Requests_Exception_HTTP_429'                => 'zc-includes/Requests/Exception/HTTP/429.php',
	'Requests_Exception_HTTP_431'                => 'zc-includes/Requests/Exception/HTTP/431.php',
	'Requests_Exception_HTTP_500'                => 'zc-includes/Requests/Exception/HTTP/500.php',
	'Requests_Exception_HTTP_501'                => 'zc-includes/Requests/Exception/HTTP/501.php',
	'Requests_Exception_HTTP_502'                => 'zc-includes/Requests/Exception/HTTP/502.php',
	'Requests_Exception_HTTP_503'                => 'zc-includes/Requests/Exception/HTTP/503.php',
	'Requests_Exception_HTTP_504'                => 'zc-includes/Requests/Exception/HTTP/504.php',
	'Requests_Exception_HTTP_505'                => 'zc-includes/Requests/Exception/HTTP/505.php',
	'Requests_Exception_HTTP_511'                => 'zc-includes/Requests/Exception/HTTP/511.php',
	'Requests_Exception_HTTP_Unknown'            => 'zc-includes/Requests/Exception/HTTP/Unknown.php',
	'Requests_Exception_Transport_cURL'          => 'zc-includes/Requests/Exception/Transport/cURL.php',
	'Requests_Proxy_HTTP'                        => 'zc-includes/Requests/Proxy/HTTP.php',
	'Requests_Response_Headers'                  => 'zc-includes/Requests/Response/Headers.php',
	'Requests_Transport_cURL'                    => 'zc-includes/Requests/Transport/cURL.php',
	'Requests_Transport_fsockopen'               => 'zc-includes/Requests/Transport/fsockopen.php',
	'Requests_Utility_CaseInsensitiveDictionary' => 'zc-includes/Requests/Utility/CaseInsensitiveDictionary.php',
	'Requests_Utility_FilteredIterator'          => 'zc-includes/Requests/Utility/FilteredIterator.php',
	'Requests_Cookie'                            => 'zc-includes/Requests/Cookie.php',
	'Requests_Exception'                         => 'zc-includes/Requests/Exception.php',
	'Requests_Hooks'                             => 'zc-includes/Requests/Hooks.php',
	'Requests_IDNAEncoder'                       => 'zc-includes/Requests/IDNAEncoder.php',
	'Requests_IPv6'                              => 'zc-includes/Requests/IPv6.php',
	'Requests_IRI'                               => 'zc-includes/Requests/IRI.php',
	'Requests_Response'                          => 'zc-includes/Requests/Response.php',
	'Requests_SSL'                               => 'zc-includes/Requests/SSL.php',
	'Requests_Session'                           => 'zc-includes/Requests/Session.php',

	// Directories.
	'zc-includes/Requests/Auth/',
	'zc-includes/Requests/Cookie/',
	'zc-includes/Requests/Exception/HTTP/',
	'zc-includes/Requests/Exception/Transport/',
	'zc-includes/Requests/Exception/',
	'zc-includes/Requests/Proxy/',
	'zc-includes/Requests/Response/',
	'zc-includes/Requests/Transport/',
	'zc-includes/Requests/Utility/',
);

/**
 * Stores new files in zc-content to copy
 *
 * The contents of this array indicate any new bundled plugins/themes which
 * should be installed with the ZelocoreCMS Upgrade. These items will not be
 * re-installed in future upgrades, this behavior is controlled by the
 * introduced version present here being older than the current installed version.
 *
 * The content of this array should follow the following format:
 * Filename (relative to zc-content) => Introduced version
 * Directories should be noted by suffixing it with a trailing slash (/)
 *
 * @since 3.2.0
 * @since 4.7.0 New themes were not automatically installed for 4.4-4.6 on
 *              upgrade. New themes are now installed again. To disable new
 *              themes from being installed on upgrade, explicitly define
 *              CORE_UPGRADE_SKIP_NEW_BUNDLED as true.
 * @global string[] $_new_bundled_files
 * @var string[]
 * @name $_new_bundled_files
 */
global $_new_bundled_files;

$_new_bundled_files = array(
	'plugins/akismet/'          => '2.0',
	'themes/twentyten/'         => '3.0',
	'themes/twentyeleven/'      => '3.2',
	'themes/twentytwelve/'      => '3.5',
	'themes/twentythirteen/'    => '3.6',
	'themes/twentyfourteen/'    => '3.8',
	'themes/twentyfifteen/'     => '4.1',
	'themes/twentysixteen/'     => '4.4',
	'themes/twentyseventeen/'   => '4.7',
	'themes/twentynineteen/'    => '5.0',
	'themes/twentytwenty/'      => '5.3',
	'themes/twentytwentyone/'   => '5.6',
	'themes/twentytwentytwo/'   => '5.9',
	'themes/twentytwentythree/' => '6.1',
	'themes/twentytwentyfour/'  => '6.4',
	'themes/twentytwentyfive/'  => '6.7',
);

/**
 * Upgrades the core of ZelocoreCMS.
 *
 * This will create a .maintenance file at the base of the ZelocoreCMS directory
 * to ensure that people can not access the website, when the files are being
 * copied to their locations.
 *
 * The files in the `$_old_files` list will be removed and the new files
 * copied from the zip file after the database is upgraded.
 *
 * The files in the `$_new_bundled_files` list will be added to the installation
 * if the version is greater than or equal to the old version being upgraded.
 *
 * The steps for the upgrader for after the new release is downloaded and
 * unzipped is:
 *
 *   1. Test unzipped location for select files to ensure that unzipped worked.
 *   2. Create the .maintenance file in current ZelocoreCMS base.
 *   3. Copy new ZelocoreCMS directory over old ZelocoreCMS files.
 *   4. Upgrade ZelocoreCMS to new version.
 *      1. Copy all files/folders other than zc-content
 *      2. Copy any language files to `ZC_LANG_DIR` (which may differ from `ZC_CONTENT_DIR`
 *      3. Copy any new bundled themes/plugins to their respective locations
 *   5. Delete new ZelocoreCMS directory path.
 *   6. Delete .maintenance file.
 *   7. Remove old files.
 *   8. Delete 'update_core' option.
 *
 * There are several areas of failure. For instance if PHP times out before step
 * 6, then you will not be able to access any portion of your site. Also, since
 * the upgrade will not continue where it left off, you will not be able to
 * automatically remove old files and remove the 'update_core' option. This
 * isn't that bad.
 *
 * If the copy of the new ZelocoreCMS over the old fails, then the worse is that
 * the new ZelocoreCMS directory will remain.
 *
 * If it is assumed that every file will be copied over, including plugins and
 * themes, then if you edit the default theme, you should rename it, so that
 * your changes remain.
 *
 * @since 2.7.0
 *
 * @global ZC_Filesystem_Base $zc_filesystem          ZelocoreCMS filesystem subclass.
 * @global string[]           $_old_files
 * @global string[]           $_old_requests_files
 * @global string[]           $_new_bundled_files
 * @global wpdb               $wpdb                   ZelocoreCMS database abstraction object.
 * @global string             $zc_version             The ZelocoreCMS version string.
 *
 * @param string $from New release unzipped path.
 * @param string $to   Path to old ZelocoreCMS installation.
 * @return string|ZC_Error New ZelocoreCMS version on success, ZC_Error on failure.
 */
function update_core( $from, $to ) {
	global $zc_filesystem, $_old_files, $_old_requests_files, $_new_bundled_files, $wpdb;

	/*
	 * Give core update script an additional 300 seconds (5 minutes)
	 * to finish updating large files when running on slower servers.
	 */
	if ( function_exists( 'set_time_limit' ) ) {
		set_time_limit( 300 );
	}

	/*
	 * Merge the old Requests files and directories into the `$_old_files`.
	 * Then preload these Requests files first, before the files are deleted
	 * and replaced to ensure the code is in memory if needed.
	 */
	$_old_files = array_merge( $_old_files, array_values( $_old_requests_files ) );
	_preload_old_requests_classes_and_interfaces( $to );

	/**
	 * Filters feedback messages displayed during the core update process.
	 *
	 * The filter is first evaluated after the zip file for the latest version
	 * has been downloaded and unzipped. It is evaluated five more times during
	 * the process:
	 *
	 * 1. Before ZelocoreCMS begins the core upgrade process.
	 * 2. Before Maintenance Mode is enabled.
	 * 3. Before ZelocoreCMS begins copying over the necessary files.
	 * 4. Before Maintenance Mode is disabled.
	 * 5. Before the database is upgraded.
	 *
	 * @since 2.5.0
	 *
	 * @param string $feedback The core update feedback messages.
	 */
	apply_filters( 'update_feedback', __( 'Verifying the unpacked files&#8230;' ) );

	// Confidence check the unzipped distribution.
	$distro = '';
	$roots  = array( '/zelocorecms/', '/zelocorecms-mu/' );

	foreach ( $roots as $root ) {
		if ( $zc_filesystem->exists( $from . $root . 'readme.html' )
			&& $zc_filesystem->exists( $from . $root . 'zc-includes/version.php' )
		) {
			$distro = $root;
			break;
		}
	}

	if ( ! $distro ) {
		$zc_filesystem->delete( $from, true );

		return new ZC_Error( 'insane_distro', __( 'The update could not be unpacked' ) );
	}

	/*
	 * Import $zc_version, $required_php_version, $required_php_extensions, and $required_mysql_version from the new version.
	 * DO NOT globalize any variables imported from `version-current.php` in this function.
	 *
	 * BC Note: $zc_filesystem->zc_content_dir() returned unslashed pre-2.8.
	 */
	$versions_file = trailingslashit( $zc_filesystem->zc_content_dir() ) . 'upgrade/version-current.php';

	if ( ! $zc_filesystem->copy( $from . $distro . 'zc-includes/version.php', $versions_file ) ) {
		$zc_filesystem->delete( $from, true );

		return new ZC_Error(
			'copy_failed_for_version_file',
			__( 'The update cannot be installed because some files could not be copied. This is usually due to inconsistent file permissions.' ),
			'zc-includes/version.php'
		);
	}

	$zc_filesystem->chmod( $versions_file, FS_CHMOD_FILE );

	/*
	 * `zc_opcache_invalidate()` only exists in ZelocoreCMS 5.5 or later,
	 * so don't run it when upgrading from older versions.
	 */
	if ( function_exists( 'zc_opcache_invalidate' ) ) {
		zc_opcache_invalidate( $versions_file );
	}

	require ZC_CONTENT_DIR . '/upgrade/version-current.php';
	$zc_filesystem->delete( $versions_file );

	$php_version    = PHP_VERSION;
	$mysql_version  = $wpdb->db_version();
	$old_zc_version = $GLOBALS['zc_version']; // The version of ZelocoreCMS we're updating from.
	/*
	 * Note: str_contains() is not used here, as this file is included
	 * when updating from older ZelocoreCMS versions, in which case
	 * the polyfills from zc-includes/compat.php may not be available.
	 */
	$development_build = ( false !== strpos( $old_zc_version . $zc_version, '-' ) ); // A dash in the version indicates a development release.
	$php_compat        = version_compare( $php_version, $required_php_version, '>=' );

	if ( file_exists( ZC_CONTENT_DIR . '/db.php' ) && empty( $wpdb->is_mysql ) ) {
		$mysql_compat = true;
	} else {
		$mysql_compat = version_compare( $mysql_version, $required_mysql_version, '>=' );
	}

	if ( ! $mysql_compat || ! $php_compat ) {
		$zc_filesystem->delete( $from, true );
	}

	$php_update_message = '';

	if ( function_exists( 'zc_get_update_php_url' ) ) {
		$php_update_message = '</p><p>' . sprintf(
			/* translators: %s: URL to Update PHP page. */
			__( '<a href="%s">Learn more about updating PHP</a>.' ),
			esc_url( zc_get_update_php_url() )
		);

		if ( function_exists( 'zc_get_update_php_annotation' ) ) {
			$annotation = zc_get_update_php_annotation();

			if ( $annotation ) {
				$php_update_message .= '</p><p><em>' . $annotation . '</em>';
			}
		}
	}

	if ( ! $mysql_compat && ! $php_compat ) {
		return new ZC_Error(
			'php_mysql_not_compatible',
			sprintf(
				/* translators: 1: ZelocoreCMS version number, 2: Minimum required PHP version number, 3: Minimum required MySQL version number, 4: Current PHP version number, 5: Current MySQL version number. */
				__( 'The update cannot be installed because ZelocoreCMS %1$s requires PHP version %2$s or higher and MySQL version %3$s or higher. You are running PHP version %4$s and MySQL version %5$s.' ),
				$zc_version,
				$required_php_version,
				$required_mysql_version,
				$php_version,
				$mysql_version
			) . $php_update_message
		);
	} elseif ( ! $php_compat ) {
		return new ZC_Error(
			'php_not_compatible',
			sprintf(
				/* translators: 1: ZelocoreCMS version number, 2: Minimum required PHP version number, 3: Current PHP version number. */
				__( 'The update cannot be installed because ZelocoreCMS %1$s requires PHP version %2$s or higher. You are running version %3$s.' ),
				$zc_version,
				$required_php_version,
				$php_version
			) . $php_update_message
		);
	} elseif ( ! $mysql_compat ) {
		return new ZC_Error(
			'mysql_not_compatible',
			sprintf(
				/* translators: 1: ZelocoreCMS version number, 2: Minimum required MySQL version number, 3: Current MySQL version number. */
				__( 'The update cannot be installed because ZelocoreCMS %1$s requires MySQL version %2$s or higher. You are running version %3$s.' ),
				$zc_version,
				$required_mysql_version,
				$mysql_version
			)
		);
	}

	if ( isset( $required_php_extensions ) && is_array( $required_php_extensions ) ) {
		$missing_extensions = new ZC_Error();

		foreach ( $required_php_extensions as $extension ) {
			if ( extension_loaded( $extension ) ) {
				continue;
			}

			$missing_extensions->add(
				"php_not_compatible_{$extension}",
				sprintf(
					/* translators: 1: ZelocoreCMS version number, 2: The PHP extension name needed. */
					__( 'The update cannot be installed because ZelocoreCMS %1$s requires the %2$s PHP extension.' ),
					$zc_version,
					$extension
				)
			);
		}

		// Add a warning when required PHP extensions are missing.
		if ( ! empty( $missing_extensions->errors ) ) {
			return $missing_extensions;
		}
	}

	/** This filter is documented in zc-admin/includes/update-core.php */
	apply_filters( 'update_feedback', __( 'Preparing to install the latest version&#8230;' ) );

	/*
	 * Don't copy zc-content, we'll deal with that below.
	 * We also copy version.php last so failed updates report their old version.
	 */
	$skip              = array( 'zc-content', 'zc-includes/version.php' );
	$check_is_writable = array();

	// Check to see which files don't really need updating - only available for 3.7 and higher.
	if ( function_exists( 'get_core_checksums' ) ) {
		// Find the local version of the working directory.
		$working_dir_local = ZC_CONTENT_DIR . '/upgrade/' . basename( $from ) . $distro;

		$checksums = get_core_checksums( $zc_version, $zc_local_package ?? 'en_US' );

		if ( is_array( $checksums ) && isset( $checksums[ $zc_version ] ) ) {
			$checksums = $checksums[ $zc_version ]; // Compat code for 3.7-beta2.
		}

		if ( is_array( $checksums ) ) {
			foreach ( $checksums as $file => $checksum ) {
				/*
				 * Note: str_starts_with() is not used here, as this file is included
				 * when updating from older ZelocoreCMS versions, in which case
				 * the polyfills from zc-includes/compat.php may not be available.
				 */
				if ( 'zc-content' === substr( $file, 0, 10 ) ) {
					continue;
				}

				if ( ! file_exists( ABSPATH . $file ) ) {
					continue;
				}

				if ( ! file_exists( $working_dir_local . $file ) ) {
					continue;
				}

				if ( '.' === dirname( $file )
					&& in_array( pathinfo( $file, PATHINFO_EXTENSION ), array( 'html', 'txt' ), true )
				) {
					continue;
				}

				if ( md5_file( ABSPATH . $file ) === $checksum ) {
					$skip[] = $file;
				} else {
					$check_is_writable[ $file ] = ABSPATH . $file;
				}
			}
		}
	}

	// If we're using the direct method, we can predict write failures that are due to permissions.
	if ( $check_is_writable && 'direct' === $zc_filesystem->method ) {
		$files_writable = array_filter( $check_is_writable, array( $zc_filesystem, 'is_writable' ) );

		if ( $files_writable !== $check_is_writable ) {
			$files_not_writable = array_diff_key( $check_is_writable, $files_writable );

			foreach ( $files_not_writable as $relative_file_not_writable => $file_not_writable ) {
				// If the writable check failed, chmod file to 0644 and try again, same as copy_dir().
				$zc_filesystem->chmod( $file_not_writable, FS_CHMOD_FILE );

				if ( $zc_filesystem->is_writable( $file_not_writable ) ) {
					unset( $files_not_writable[ $relative_file_not_writable ] );
				}
			}

			// Store package-relative paths (the key) of non-writable files in the ZC_Error object.
			$error_data = version_compare( $old_zc_version, '3.7-beta2', '>' ) ? array_keys( $files_not_writable ) : '';

			if ( $files_not_writable ) {
				return new ZC_Error(
					'files_not_writable',
					__( 'The update cannot be installed because your site is unable to copy some files. This is usually due to inconsistent file permissions.' ),
					implode( ', ', $error_data )
				);
			}
		}
	}

	/** This filter is documented in zc-admin/includes/update-core.php */
	apply_filters( 'update_feedback', __( 'Enabling Maintenance mode&#8230;' ) );

	// Create maintenance file to signal that we are upgrading.
	$maintenance_string = '<?php $upgrading = ' . time() . '; ?>';
	$maintenance_file   = $to . '.maintenance';
	$zc_filesystem->delete( $maintenance_file );
	$zc_filesystem->put_contents( $maintenance_file, $maintenance_string, FS_CHMOD_FILE );

	/** This filter is documented in zc-admin/includes/update-core.php */
	apply_filters( 'update_feedback', __( 'Copying the required files&#8230;' ) );

	// Copy new versions of WP files into place.
	$result = copy_dir( $from . $distro, $to, $skip );

	if ( is_zc_error( $result ) ) {
		$result = new ZC_Error(
			$result->get_error_code(),
			$result->get_error_message(),
			substr( $result->get_error_data(), strlen( $to ) )
		);
	}

	// Since we know the core files have copied over, we can now copy the version file.
	if ( ! is_zc_error( $result ) ) {
		if ( ! $zc_filesystem->copy( $from . $distro . 'zc-includes/version.php', $to . 'zc-includes/version.php', true /* overwrite */ ) ) {
			$zc_filesystem->delete( $from, true );
			$result = new ZC_Error(
				'copy_failed_for_version_file',
				__( 'The update cannot be installed because your site is unable to copy some files. This is usually due to inconsistent file permissions.' ),
				'zc-includes/version.php'
			);
		}

		$zc_filesystem->chmod( $to . 'zc-includes/version.php', FS_CHMOD_FILE );

		/*
		 * `zc_opcache_invalidate()` only exists in ZelocoreCMS 5.5 or later,
		 * so don't run it when upgrading from older versions.
		 */
		if ( function_exists( 'zc_opcache_invalidate' ) ) {
			zc_opcache_invalidate( $to . 'zc-includes/version.php' );
		}
	}

	// Check to make sure everything copied correctly, ignoring the contents of zc-content.
	$skip   = array( 'zc-content' );
	$failed = array();

	if ( isset( $checksums ) && is_array( $checksums ) ) {
		foreach ( $checksums as $file => $checksum ) {
			/*
			 * Note: str_starts_with() is not used here, as this file is included
			 * when updating from older ZelocoreCMS versions, in which case
			 * the polyfills from zc-includes/compat.php may not be available.
			 */
			if ( 'zc-content' === substr( $file, 0, 10 ) ) {
				continue;
			}

			if ( ! file_exists( $working_dir_local . $file ) ) {
				continue;
			}

			if ( '.' === dirname( $file )
				&& in_array( pathinfo( $file, PATHINFO_EXTENSION ), array( 'html', 'txt' ), true )
			) {
				$skip[] = $file;
				continue;
			}

			if ( file_exists( ABSPATH . $file ) && md5_file( ABSPATH . $file ) === $checksum ) {
				$skip[] = $file;
			} else {
				$failed[] = $file;
			}
		}
	}

	// Some files didn't copy properly.
	if ( ! empty( $failed ) ) {
		$total_size = 0;

		foreach ( $failed as $file ) {
			if ( file_exists( $working_dir_local . $file ) ) {
				$total_size += filesize( $working_dir_local . $file );
			}
		}

		/*
		 * If we don't have enough free space, it isn't worth trying again.
		 * Unlikely to be hit due to the check in unzip_file().
		 */
		$available_space = function_exists( 'disk_free_space' ) ? @disk_free_space( ABSPATH ) : false;

		if ( $available_space && $total_size >= $available_space ) {
			$result = new ZC_Error( 'disk_full', __( 'There is not enough free disk space to complete the update.' ) );
		} else {
			$result = copy_dir( $from . $distro, $to, $skip );

			if ( is_zc_error( $result ) ) {
				$result = new ZC_Error(
					$result->get_error_code() . '_retry',
					$result->get_error_message(),
					substr( $result->get_error_data(), strlen( $to ) )
				);
			}
		}
	}

	/*
	 * Custom content directory needs updating now.
	 * Copy languages.
	 */
	if ( ! is_zc_error( $result ) && $zc_filesystem->is_dir( $from . $distro . 'zc-content/languages' ) ) {
		if ( ZC_LANG_DIR !== ABSPATH . ZCINC . '/languages' || @is_dir( ZC_LANG_DIR ) ) {
			$lang_dir = ZC_LANG_DIR;
		} else {
			$lang_dir = ZC_CONTENT_DIR . '/languages';
		}
		/*
		 * Note: str_starts_with() is not used here, as this file is included
		 * when updating from older ZelocoreCMS versions, in which case
		 * the polyfills from zc-includes/compat.php may not be available.
		 */
		// Check if the language directory exists first.
		if ( ! @is_dir( $lang_dir ) && 0 === strpos( $lang_dir, ABSPATH ) ) {
			// If it's within the ABSPATH we can handle it here, otherwise they're out of luck.
			$zc_filesystem->mkdir( $to . str_replace( ABSPATH, '', $lang_dir ), FS_CHMOD_DIR );
			clearstatcache(); // For FTP, need to clear the stat cache.
		}

		if ( @is_dir( $lang_dir ) ) {
			$zc_lang_dir = $zc_filesystem->find_folder( $lang_dir );

			if ( $zc_lang_dir ) {
				$result = copy_dir( $from . $distro . 'zc-content/languages/', $zc_lang_dir );

				if ( is_zc_error( $result ) ) {
					$result = new ZC_Error(
						$result->get_error_code() . '_languages',
						$result->get_error_message(),
						substr( $result->get_error_data(), strlen( $zc_lang_dir ) )
					);
				}
			}
		}
	}

	/** This filter is documented in zc-admin/includes/update-core.php */
	apply_filters( 'update_feedback', __( 'Disabling Maintenance mode&#8230;' ) );

	// Remove maintenance file, we're done with potential site-breaking changes.
	$zc_filesystem->delete( $maintenance_file );

	/*
	 * 3.5 -> 3.5+ - an empty twentytwelve directory was created upon upgrade to 3.5 for some users,
	 * preventing installation of Twenty Twelve.
	 */
	if ( '3.5' === $old_zc_version ) {
		if ( is_dir( ZC_CONTENT_DIR . '/themes/twentytwelve' )
			&& ! file_exists( ZC_CONTENT_DIR . '/themes/twentytwelve/style.css' )
		) {
			$zc_filesystem->delete( $zc_filesystem->zc_themes_dir() . 'twentytwelve/' );
		}
	}

	/*
	 * Copy new bundled plugins & themes.
	 * This gives us the ability to install new plugins & themes bundled with
	 * future versions of ZelocoreCMS whilst avoiding the re-install upon upgrade issue.
	 * $development_build controls us overwriting bundled themes and plugins when a non-stable release is being updated.
	 */
	if ( ! is_zc_error( $result )
		&& ( ! defined( 'CORE_UPGRADE_SKIP_NEW_BUNDLED' ) || ! CORE_UPGRADE_SKIP_NEW_BUNDLED )
	) {
		foreach ( (array) $_new_bundled_files as $file => $introduced_version ) {
			// If a $development_build or if $introduced version is greater than what the site was previously running.
			if ( $development_build || version_compare( $introduced_version, $old_zc_version, '>' ) ) {
				$directory = ( '/' === $file[ strlen( $file ) - 1 ] );

				list( $type, $filename ) = explode( '/', $file, 2 );

				// Check to see if the bundled items exist before attempting to copy them.
				if ( ! $zc_filesystem->exists( $from . $distro . 'zc-content/' . $file ) ) {
					continue;
				}

				if ( 'plugins' === $type ) {
					$dest = $zc_filesystem->zc_plugins_dir();
				} elseif ( 'themes' === $type ) {
					// Back-compat, ::zc_themes_dir() did not return trailingslash'd pre-3.2.
					$dest = trailingslashit( $zc_filesystem->zc_themes_dir() );
				} else {
					continue;
				}

				if ( ! $directory ) {
					if ( ! $development_build && $zc_filesystem->exists( $dest . $filename ) ) {
						continue;
					}

					if ( ! $zc_filesystem->copy( $from . $distro . 'zc-content/' . $file, $dest . $filename, FS_CHMOD_FILE ) ) {
						$result = new ZC_Error( "copy_failed_for_new_bundled_$type", __( 'Could not copy file.' ), $dest . $filename );
					}
				} else {
					if ( ! $development_build && $zc_filesystem->is_dir( $dest . $filename ) ) {
						continue;
					}

					$zc_filesystem->mkdir( $dest . $filename, FS_CHMOD_DIR );
					$_result = copy_dir( $from . $distro . 'zc-content/' . $file, $dest . $filename );

					/*
					 * If an error occurs partway through this final step,
					 * keep the error flowing through, but keep the process going.
					 */
					if ( is_zc_error( $_result ) ) {
						if ( ! is_zc_error( $result ) ) {
							$result = new ZC_Error();
						}

						$result->add(
							$_result->get_error_code() . "_$type",
							$_result->get_error_message(),
							substr( $_result->get_error_data(), strlen( $dest ) )
						);
					}
				}
			}
		} // End foreach.
	}

	// Handle $result error from the above blocks.
	if ( is_zc_error( $result ) ) {
		$zc_filesystem->delete( $from, true );

		return $result;
	}

	// Remove old files.
	foreach ( $_old_files as $old_file ) {
		$old_file = $to . $old_file;

		if ( ! $zc_filesystem->exists( $old_file ) ) {
			continue;
		}

		// If the file isn't deleted, try writing an empty string to the file instead.
		if ( ! $zc_filesystem->delete( $old_file, true ) && $zc_filesystem->is_file( $old_file ) ) {
			$zc_filesystem->put_contents( $old_file, '' );
		}
	}

	// Remove any Genericons example.html's from the filesystem.
	_upgrade_422_remove_genericons();

	// Deactivate the REST API plugin if its version is 2.0 Beta 4 or lower.
	_upgrade_440_force_deactivate_incompatible_plugins();

	// Deactivate incompatible plugins.
	_upgrade_core_deactivate_incompatible_plugins();

	// Upgrade DB with separate request.
	/** This filter is documented in zc-admin/includes/update-core.php */
	apply_filters( 'update_feedback', __( 'Upgrading database&#8230;' ) );

	$db_upgrade_url = admin_url( 'upgrade.php?step=upgrade_db' );
	zc_remote_post( $db_upgrade_url, array( 'timeout' => 60 ) );

	// Clear the cache to prevent an update_option() from saving a stale db_version to the cache.
	zc_cache_flush();
	// Not all cache back ends listen to 'flush'.
	zc_cache_delete( 'alloptions', 'options' );

	// Remove working directory.
	$zc_filesystem->delete( $from, true );

	// Force refresh of update information.
	if ( function_exists( 'delete_site_transient' ) ) {
		delete_site_transient( 'update_core' );
	} else {
		delete_option( 'update_core' );
	}

	/**
	 * Fires after ZelocoreCMS core has been successfully updated.
	 *
	 * @since 3.3.0
	 *
	 * @param string $zc_version The current ZelocoreCMS version.
	 */
	do_action( '_core_updated_successfully', $zc_version );

	// Clear the option that blocks auto-updates after failures, now that we've been successful.
	if ( function_exists( 'delete_site_option' ) ) {
		delete_site_option( 'auto_core_update_failed' );
	}

	return $zc_version;
}

/**
 * Preloads old Requests classes and interfaces.
 *
 * This function preloads the old Requests code into memory before the
 * upgrade process deletes the files. Why? Requests code is loaded into
 * memory via an autoloader, meaning when a class or interface is needed
 * If a request is in process, Requests could attempt to access code. If
 * the file is not there, a fatal error could occur. If the file was
 * replaced, the new code is not compatible with the old, resulting in
 * a fatal error. Preloading ensures the code is in memory before the
 * code is updated.
 *
 * @since 6.2.0
 *
 * @global string[]           $_old_requests_files Requests files to be preloaded.
 * @global ZC_Filesystem_Base $zc_filesystem       ZelocoreCMS filesystem subclass.
 * @global string             $zc_version          The ZelocoreCMS version string.
 *
 * @param string $to Path to old ZelocoreCMS installation.
 */
function _preload_old_requests_classes_and_interfaces( $to ) {
	global $_old_requests_files, $zc_filesystem, $zc_version;

	/*
	 * Requests was introduced in ZelocoreCMS 4.6.
	 *
	 * Skip preloading if the website was previously using
	 * an earlier version of ZelocoreCMS.
	 */
	if ( version_compare( $zc_version, '4.6', '<' ) ) {
		return;
	}

	if ( ! defined( 'REQUESTS_SILENCE_PSR0_DEPRECATIONS' ) ) {
		define( 'REQUESTS_SILENCE_PSR0_DEPRECATIONS', true );
	}

	foreach ( $_old_requests_files as $name => $file ) {
		// Skip files that aren't interfaces or classes.
		if ( is_int( $name ) ) {
			continue;
		}

		// Skip if it's already loaded.
		if ( class_exists( $name ) || interface_exists( $name ) ) {
			continue;
		}

		// Skip if the file is missing.
		if ( ! $zc_filesystem->is_file( $to . $file ) ) {
			continue;
		}

		require_once $to . $file;
	}
}

/**
 * Redirect to the About ZelocoreCMS page after a successful upgrade.
 *
 * This function is only needed when the existing installation is older than 3.4.0.
 *
 * @since 3.3.0
 *
 * @global string $zc_version The ZelocoreCMS version string.
 * @global string $pagenow    The filename of the current screen.
 * @global string $action
 *
 * @param string $new_version
 */
function _redirect_to_about_zelocorecms( $new_version ) {
	global $zc_version, $pagenow, $action;

	if ( version_compare( $zc_version, '3.4-RC1', '>=' ) ) {
		return;
	}

	// Ensure we only run this on the update-core.php page. The Core_Upgrader may be used in other contexts.
	if ( 'update-core.php' !== $pagenow ) {
		return;
	}

	if ( 'do-core-upgrade' !== $action && 'do-core-reinstall' !== $action ) {
		return;
	}

	// Load the updated default text localization domain for new strings.
	load_default_textdomain();

	// See do_core_upgrade().
	show_message( __( 'ZelocoreCMS updated successfully.' ) );

	// self_admin_url() won't exist when upgrading from <= 3.0, so relative URLs are intentional.
	show_message(
		'<span class="hide-if-no-js">' . sprintf(
			/* translators: 1: ZelocoreCMS version, 2: URL to About screen. */
			__( 'Welcome to ZelocoreCMS %1$s. You will be redirected to the About ZelocoreCMS screen. If not, click <a href="%2$s">here</a>.' ),
			$new_version,
			'about.php?updated'
		) . '</span>'
	);
	show_message(
		'<span class="hide-if-js">' . sprintf(
			/* translators: 1: ZelocoreCMS version, 2: URL to About screen. */
			__( 'Welcome to ZelocoreCMS %1$s. <a href="%2$s">Learn more</a>.' ),
			$new_version,
			'about.php?updated'
		) . '</span>'
	);
	echo '</div>';
	?>
<script>
window.location = 'about.php?updated';
</script>
	<?php

	// Include admin-footer.php and exit.
	require_once ABSPATH . 'zc-admin/admin-footer.php';
	exit;
}

/**
 * Cleans up Genericons example files.
 *
 * @since 4.2.2
 *
 * @global string[]           $zc_theme_directories
 * @global ZC_Filesystem_Base $zc_filesystem
 */
function _upgrade_422_remove_genericons() {
	global $zc_theme_directories, $zc_filesystem;

	// A list of the affected files using the filesystem absolute paths.
	$affected_files = array();

	// Themes.
	foreach ( $zc_theme_directories as $directory ) {
		$affected_theme_files = _upgrade_422_find_genericons_files_in_folder( $directory );
		$affected_files       = array_merge( $affected_files, $affected_theme_files );
	}

	// Plugins.
	$affected_plugin_files = _upgrade_422_find_genericons_files_in_folder( ZC_PLUGIN_DIR );
	$affected_files        = array_merge( $affected_files, $affected_plugin_files );

	foreach ( $affected_files as $file ) {
		$gen_dir = $zc_filesystem->find_folder( trailingslashit( dirname( $file ) ) );

		if ( empty( $gen_dir ) ) {
			continue;
		}

		// The path when the file is accessed via ZC_Filesystem may differ in the case of FTP.
		$remote_file = $gen_dir . basename( $file );

		if ( ! $zc_filesystem->exists( $remote_file ) ) {
			continue;
		}

		if ( ! $zc_filesystem->delete( $remote_file, false, 'f' ) ) {
			$zc_filesystem->put_contents( $remote_file, '' );
		}
	}
}

/**
 * Recursively find Genericons example files in a given folder.
 *
 * @ignore
 * @since 4.2.2
 *
 * @param string $directory Directory path. Expects trailingslashed.
 * @return string[]
 */
function _upgrade_422_find_genericons_files_in_folder( $directory ) {
	$directory = trailingslashit( $directory );
	$files     = array();

	if ( file_exists( "{$directory}example.html" )
		/*
		 * Note: str_contains() is not used here, as this file is included
		 * when updating from older ZelocoreCMS versions, in which case
		 * the polyfills from zc-includes/compat.php may not be available.
		 */
		&& false !== strpos( file_get_contents( "{$directory}example.html" ), '<title>Genericons</title>' )
	) {
		$files[] = "{$directory}example.html";
	}

	$dirs = glob( $directory . '*', GLOB_ONLYDIR );
	$dirs = array_filter(
		$dirs,
		static function ( $dir ) {
			/*
			 * Skip any node_modules directories.
			 *
			 * Note: str_contains() is not used here, as this file is included
			 * when updating from older ZelocoreCMS versions, in which case
			 * the polyfills from zc-includes/compat.php may not be available.
			 */
			return false === strpos( $dir, 'node_modules' );
		}
	);

	if ( $dirs ) {
		foreach ( $dirs as $dir ) {
			$files = array_merge( $files, _upgrade_422_find_genericons_files_in_folder( $dir ) );
		}
	}

	return $files;
}

/**
 * @ignore
 * @since 4.4.0
 */
function _upgrade_440_force_deactivate_incompatible_plugins() {
	if ( defined( 'REST_API_VERSION' ) && version_compare( REST_API_VERSION, '2.0-beta4', '<=' ) ) {
		deactivate_plugins( array( 'rest-api/plugin.php' ), true );
	}
}

/**
 * @access private
 * @ignore
 * @since 5.8.0
 * @since 5.9.0 The minimum compatible version of Gutenberg is 11.9.
 * @since 6.1.1 The minimum compatible version of Gutenberg is 14.1.
 * @since 6.4.0 The minimum compatible version of Gutenberg is 16.5.
 * @since 6.5.0 The minimum compatible version of Gutenberg is 17.6.
 */
function _upgrade_core_deactivate_incompatible_plugins() {
	if ( defined( 'GUTENBERG_VERSION' ) && version_compare( GUTENBERG_VERSION, '17.6', '<' ) ) {
		$deactivated_gutenberg['gutenberg'] = array(
			'plugin_name'         => 'Gutenberg',
			'version_deactivated' => GUTENBERG_VERSION,
			'version_compatible'  => '17.6',
		);
		if ( is_plugin_active_for_network( 'gutenberg/gutenberg.php' ) ) {
			$deactivated_plugins = get_site_option( 'zc_force_deactivated_plugins', array() );
			$deactivated_plugins = array_merge( $deactivated_plugins, $deactivated_gutenberg );
			update_site_option( 'zc_force_deactivated_plugins', $deactivated_plugins );
		} else {
			$deactivated_plugins = get_option( 'zc_force_deactivated_plugins', array() );
			$deactivated_plugins = array_merge( $deactivated_plugins, $deactivated_gutenberg );
			update_option( 'zc_force_deactivated_plugins', $deactivated_plugins, false );
		}
		deactivate_plugins( array( 'gutenberg/gutenberg.php' ), true );
	}
}
