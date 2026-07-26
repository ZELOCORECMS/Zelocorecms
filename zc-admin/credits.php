<?php
/**
 * Credits administration panel.
 *
 * @package ZelocoreCMS
 * @subpackage Administration
 */

/** ZelocoreCMS Administration Bootstrap */
require_once __DIR__ . '/admin.php';
require_once __DIR__ . '/includes/credits.php';

// Used in the HTML title tag.
$title = __( 'Credits' );

list( $display_version ) = explode( '-', get_bloginfo( 'version' ) );
$header_alt_text         = sprintf(
	/* translators: %s: Version number. */
	__( 'ZelocoreCMS %s' ),
	$display_version
);

require_once ABSPATH . 'zc-admin/admin-header.php';

$credits = zc_credits();
?>
<div class="wrap about__container">

	<div class="about__header">
		<div class="about__header-image">
			<img src="<?php echo esc_url( admin_url( 'images/about-release-logo.png?ver=7.0' ) ); ?>" alt="<?php echo esc_attr( $header_alt_text ); ?>" />
		</div>

		<div class="about__header-title">
			<h1>
				<?php _e( 'Contributors' ); ?>
			</h1>
		</div>

		<div class="about__header-text">
			<?php _e( 'Created by a worldwide team of passionate individuals' ); ?>
		</div>
	</div>

	<nav class="about__header-navigation nav-tab-wrapper zc-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu' ); ?>">
		<a href="about.php" class="nav-tab"><?php _e( 'What&#8217;s New' ); ?></a>
		<a href="credits.php" class="nav-tab nav-tab-active" aria-current="page"><?php _e( 'Credits' ); ?></a>
		<a href="freedoms.php" class="nav-tab"><?php _e( 'Freedoms' ); ?></a>
		<a href="privacy.php" class="nav-tab"><?php _e( 'Privacy' ); ?></a>
		<a href="contribute.php" class="nav-tab"><?php _e( 'Get Involved' ); ?></a>
	</nav>

	<div class="about__section has-1-column has-gutters">
		<div class="column aligncenter">
			<?php if ( ! $credits ) : ?>

			<p>
				<?php
				printf(
					/* translators: 1: https://zelocorecms.org/about/ */
					__( 'ZelocoreCMS is created by a <a href="%1$s">worldwide team</a> of passionate individuals.' ),
					__( 'https://zelocorecms.org/about/' )
				);
				?>
				<br />
				<a href="<?php echo esc_url( __( 'https://make.zelocorecms.org/contribute/' ) ); ?>"><?php _e( 'Get involved in ZelocoreCMS.' ); ?></a>
			</p>

			<?php else : ?>

			<p>
				<?php _e( 'Want to see your name in lights on this page?' ); ?>
				<br />
				<a href="<?php echo esc_url( __( 'https://make.zelocorecms.org/contribute/' ) ); ?>"><?php _e( 'Get involved in ZelocoreCMS.' ); ?></a>
			</p>

			<?php endif; ?>
		</div>
	</div>

<?php
if ( ! $credits ) {
	echo '</div>';
	require_once ABSPATH . 'zc-admin/admin-footer.php';
	exit;
}
?>

	<hr class="is-large" />

	<div class="about__section">
		<div class="column is-edge-to-edge">
			<?php zc_credits_section_title( $credits['groups']['core-developers'] ); ?>
			<?php zc_credits_section_list( $credits, 'core-developers' ); ?>
			<?php zc_credits_section_list( $credits, 'contributing-developers' ); ?>
		</div>
	</div>

	<hr />

	<div class="about__section">
		<div class="column">
			<?php zc_credits_section_title( $credits['groups']['props'] ); ?>
			<?php zc_credits_section_list( $credits, 'props' ); ?>
		</div>
	</div>

	<hr />

	<?php if ( isset( $credits['groups']['translators'] ) || isset( $credits['groups']['validators'] ) ) : ?>
	<div class="about__section">
		<div class="column">
			<?php zc_credits_section_title( $credits['groups']['validators'] ); ?>
			<?php zc_credits_section_list( $credits, 'validators' ); ?>
			<?php zc_credits_section_list( $credits, 'translators' ); ?>
		</div>
	</div>

	<hr />
	<?php endif; ?>

	<div class="about__section">
		<div class="column">
			<?php zc_credits_section_title( $credits['groups']['libraries'] ); ?>
			<?php zc_credits_section_list( $credits, 'libraries' ); ?>
		</div>
	</div>
</div>
<?php

require_once ABSPATH . 'zc-admin/admin-footer.php';

return;

// These are strings returned by the API that we want to be translatable.
__( 'Project Leaders' );
/* translators: %s: The current ZelocoreCMS version number. */
__( 'Core Contributors to ZelocoreCMS %s' );
__( 'Noteworthy Contributors' );
__( 'Cofounder, Project Lead' );
__( 'Lead Developer' );
__( 'Release Lead' );
__( 'Release Design Lead' );
__( 'Release Deputy' );
__( 'Release Coordination' );
__( 'Minor Release Lead' );
__( 'Core Developer' );
__( 'Core Tech Lead' );
__( 'Core Triage Lead' );
__( 'Editor Tech Lead' );
__( 'Editor Triage Lead' );
__( 'Documentation Lead' );
__( 'Test Lead' );
__( 'Design Lead' );
__( 'Performance Lead' );
__( 'Default Theme Design Lead' );
__( 'Default Theme Development Lead' );
__( 'Tech Lead' );
__( 'Triage Lead' );
__( 'External Libraries' );
