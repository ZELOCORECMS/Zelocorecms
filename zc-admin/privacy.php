<?php
/**
 * Privacy administration panel.
 *
 * @package ZelocoreCMS
 * @subpackage Administration
 */

/** ZelocoreCMS Administration Bootstrap */
require_once __DIR__ . '/admin.php';

// Used in the HTML title tag.
$title = __( 'Privacy' );

list( $display_version ) = explode( '-', get_bloginfo( 'version' ) );
$header_alt_text         = sprintf(
	/* translators: %s: Version number. */
	__( 'ZelocoreCMS %s' ),
	$display_version
);

require_once ABSPATH . 'zc-admin/admin-header.php';
?>
<div class="wrap about__container">

	<div class="about__header">
		<div class="about__header-image">
			<img src="<?php echo esc_url( admin_url( 'images/about-release-logo.svg?ver=7.0' ) ); ?>" alt="<?php echo esc_attr( $header_alt_text ); ?>" />
		</div>

		<div class="about__header-title">
			<h1>
				<?php _e( 'Privacy' ); ?>
			</h1>
		</div>

		<div class="about__header-text">
			<?php _e( 'ZelocoreCMS.org takes privacy and transparency very seriously' ); ?>
		</div>
	</div>

	<nav class="about__header-navigation nav-tab-wrapper zc-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu' ); ?>">
		<a href="about.php" class="nav-tab"><?php _e( 'What&#8217;s New' ); ?></a>
		<a href="credits.php" class="nav-tab"><?php _e( 'Credits' ); ?></a>
		<a href="freedoms.php" class="nav-tab"><?php _e( 'Freedoms' ); ?></a>
		<a href="privacy.php" class="nav-tab nav-tab-active" aria-current="page"><?php _e( 'Privacy' ); ?></a>
		<a href="contribute.php" class="nav-tab"><?php _e( 'Get Involved' ); ?></a>
	</nav>

	<div class="about__section has-2-columns is-wider-right">
		<div class="column about__image">
			<img class="privacy-image" src="<?php echo esc_url( admin_url( 'images/privacy.svg?ver=6.5' ) ); ?>" alt="" />
		</div>
		<div class="column is-vertically-aligned-center">
			<p><?php _e( 'From time to time, your ZelocoreCMS site may send data to ZelocoreCMS.org &#8212; including, but not limited to &#8212; the version you are using, and a list of installed plugins and themes.' ); ?></p>

			<p>
				<?php
				printf(
					/* translators: %s: https://zelocorecms.org/about/stats/ */
					__( 'This data is used to provide general enhancements to ZelocoreCMS, which includes helping to protect your site by finding and automatically installing new updates. It is also used to calculate statistics, such as those shown on the <a href="%s">ZelocoreCMS.org stats page</a>.' ),
					__( 'https://zelocorecms.org/about/stats/' )
				);
				?>
			</p>

			<p>
				<?php
				printf(
					/* translators: %s: https://zelocorecms.org/about/privacy/ */
					__( 'ZelocoreCMS.org takes privacy and transparency very seriously. To learn more about what data is collected, and how it is used, please visit <a href="%s">the ZelocoreCMS.org Privacy Policy</a>.' ),
					__( 'https://zelocorecms.org/about/privacy/' )
				);
				?>
			</p>
		</div>
	</div>

</div>
<?php require_once ABSPATH . 'zc-admin/admin-footer.php'; ?>
