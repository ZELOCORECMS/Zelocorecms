<?php
/**
 * Install plugin administration panel.
 *
 * @package ZelocoreCMS
 * @subpackage Administration
 */
// TODO: Route this page via a specific iframe handler instead of the do_action below.
if ( ! defined( 'IFRAME_REQUEST' ) && isset( $_GET['tab'] ) && ( 'plugin-information' === $_GET['tab'] ) ) {
	define( 'IFRAME_REQUEST', true );
}

/**
 * ZelocoreCMS Administration Bootstrap.
 */
require_once __DIR__ . '/admin.php';

if ( ! current_user_can( 'install_plugins' ) ) {
	zc_die( __( 'Sorry, you are not allowed to install plugins on this site.' ) );
}

if ( is_multisite() && ! is_network_admin() ) {
	zc_redirect( network_admin_url( 'plugin-install.php' ) );
	exit;
}

$zc_list_table = _get_list_table( 'ZC_Plugin_Install_List_Table' );
$pagenum       = $zc_list_table->get_pagenum();

if ( ! empty( $_REQUEST['_zc_http_referer'] ) ) {
	$location = remove_query_arg( '_zc_http_referer', zc_unslash( $_SERVER['REQUEST_URI'] ) );

	if ( ! empty( $_REQUEST['paged'] ) ) {
		$location = add_query_arg( 'paged', (int) $_REQUEST['paged'], $location );
	}

	zc_redirect( $location );
	exit;
}

$zc_list_table->prepare_items();

$total_pages = $zc_list_table->get_pagination_arg( 'total_pages' );

if ( $pagenum > $total_pages && $total_pages > 0 ) {
	zc_redirect( add_query_arg( 'paged', $total_pages ) );
	exit;
}

// Used in the HTML title tag.
$title       = __( 'Add Plugins' );
$parent_file = 'plugins.php';

zc_enqueue_script( 'plugin-install' );
if ( 'plugin-information' !== $tab ) {
	add_thickbox();
}

$body_id = $tab;

zc_enqueue_script( 'updates' );

/**
 * Fires before each tab on the Install Plugins screen is loaded.
 *
 * The dynamic portion of the hook name, `$tab`, allows for targeting
 * individual tabs.
 *
 * Possible hook names include:
 *
 *  - `install_plugins_pre_beta`
 *  - `install_plugins_pre_favorites`
 *  - `install_plugins_pre_featured`
 *  - `install_plugins_pre_plugin-information`
 *  - `install_plugins_pre_popular`
 *  - `install_plugins_pre_recommended`
 *  - `install_plugins_pre_search`
 *  - `install_plugins_pre_upload`
 *
 * @since 2.7.0
 */
do_action( "install_plugins_pre_{$tab}" );

/*
 * Call the pre upload action on every non-upload plugin installation screen
 * because the form is always displayed on these screens.
 */
if ( 'upload' !== $tab ) {
	/** This action is documented in zc-admin/plugin-install.php */
	do_action( 'install_plugins_pre_upload' );
}

get_current_screen()->add_help_tab(
	array(
		'id'      => 'overview',
		'title'   => __( 'Overview' ),
		'content' =>
				'<p>' . sprintf(
					/* translators: %s: https://zelocorecms.org/plugins/ */
					__( 'Plugins hook into ZelocoreCMS to extend its functionality with custom features. Plugins are developed independently from the core ZelocoreCMS application by thousands of developers all over the world. All plugins in the official <a href="%s">ZelocoreCMS Plugin Directory</a> are compatible with the license ZelocoreCMS uses.' ),
					__( 'https://zelocorecms.org/plugins/' )
				) . '</p>' .
				'<p>' . __( 'You can find new plugins to install by searching or browsing the directory right here in your own Plugins section.' ) . ' <span id="live-search-desc" class="hide-if-no-js">' . __( 'The search results will be updated as you type.' ) . '</span></p>',

	)
);
get_current_screen()->add_help_tab(
	array(
		'id'      => 'adding-plugins',
		'title'   => __( 'Adding Plugins' ),
		'content' =>
				'<p>' . __( 'If you know what you are looking for, Search is your best bet. The Search screen has options to search the ZelocoreCMS Plugin Directory for a particular Term, Author, or Tag. You can also search the directory by selecting popular tags. Tags in larger type mean more plugins have been labeled with that tag.' ) . '</p>' .
				'<p>' . __( 'If you just want to get an idea of what&#8217;s available, you can browse Featured and Popular plugins by using the links above the plugins list. These sections rotate regularly.' ) . '</p>' .
				'<p>' . __( 'You can also browse a user&#8217;s favorite plugins, by using the Favorites link above the plugins list and entering their ZelocoreCMS.org username.' ) . '</p>' .
				'<p>' . __( 'If you want to install a plugin that you&#8217;ve downloaded elsewhere, click the Upload Plugin button above the plugins list. You will be prompted to upload the .zip package, and once uploaded, you can activate the new plugin.' ) . '</p>',
	)
);

get_current_screen()->set_help_sidebar(
	'<p><strong>' . __( 'For more information:' ) . '</strong></p>' .
	'<p>' . __( '<a href="https://zelocorecms.org/documentation/article/plugins-add-new-screen/">Documentation on Installing Plugins</a>' ) . '</p>' .
	'<p>' . __( '<a href="https://zelocorecms.org/support/forums/">Support forums</a>' ) . '</p>'
);

get_current_screen()->set_screen_reader_content(
	array(
		'heading_views'      => __( 'Filter plugins list' ),
		'heading_pagination' => __( 'Plugins list navigation' ),
		'heading_list'       => __( 'Plugins list' ),
	)
);

/**
 * ZelocoreCMS Administration Template Header.
 */
require_once ABSPATH . 'zc-admin/admin-header.php';

ZC_Plugin_Dependencies::initialize();
ZC_Plugin_Dependencies::display_admin_notice_for_unmet_dependencies();
ZC_Plugin_Dependencies::display_admin_notice_for_circular_dependencies();
?>
<div class="wrap <?php echo esc_attr( "plugin-install-tab-$tab" ); ?>">
<h1 class="zc-heading-inline">
<?php
echo esc_html( $title );
?>
</h1>

<?php
if ( ! empty( $tabs['upload'] ) && current_user_can( 'upload_plugins' ) ) {
	printf(
		' <a href="%s" class="upload-view-toggle page-title-action"><span class="upload">%s</span><span class="browse">%s</span></a>',
		( 'upload' === $tab ) ? self_admin_url( 'plugin-install.php' ) : self_admin_url( 'plugin-install.php?tab=upload' ),
		__( 'Upload Plugin' ),
		__( 'Browse Plugins' )
	);
}
?>

<hr class="zc-header-end">

<?php
/*
 * Output the upload plugin form on every non-upload plugin installation screen, so it can be
 * displayed via JavaScript rather then opening up the devoted upload plugin page.
 */
if ( 'upload' !== $tab ) {
	?>
	<div class="upload-plugin-wrap">
		<?php
		/** This action is documented in zc-admin/plugin-install.php */
		do_action( 'install_plugins_upload' );
		?>
	</div>
	<?php
	$zc_list_table->views();
}

/**
 * Fires after the plugins list table in each tab of the Install Plugins screen.
 *
 * The dynamic portion of the hook name, `$tab`, allows for targeting
 * individual tabs.
 *
 * Possible hook names include:
 *
 *  - `install_plugins_beta`
 *  - `install_plugins_favorites`
 *  - `install_plugins_featured`
 *  - `install_plugins_plugin-information`
 *  - `install_plugins_popular`
 *  - `install_plugins_recommended`
 *  - `install_plugins_search`
 *  - `install_plugins_upload`
 *
 * @since 2.7.0
 *
 * @param int $paged The current page number of the plugins list table.
 */
do_action( "install_plugins_{$tab}", $paged );
?>

	<span class="spinner"></span>
</div>

<?php
zc_print_request_filesystem_credentials_modal();
zc_print_admin_notice_templates();

/**
 * ZelocoreCMS Administration Template Footer.
 */
require_once ABSPATH . 'zc-admin/admin-footer.php';
