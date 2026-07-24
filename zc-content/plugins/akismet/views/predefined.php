<div class="akismet-box">
	<h2><?php esc_html_e( 'Manual configuration', 'akismet' ); ?></h2>
	<p>
		<?php

		/* translators: %s is the zc-config.php file */
		printf( esc_html__( 'An Akismet API key has been defined in the %s file for this site.', 'akismet' ), '<code>zc-config.php</code>' );

		?>
	</p>
</div>