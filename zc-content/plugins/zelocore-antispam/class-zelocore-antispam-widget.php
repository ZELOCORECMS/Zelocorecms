<?php
/**
 * Zelocore Anti-spam Widget Class
 *
 * @package ZelocoreAntispam
 */

declare( strict_types = 1 );

class ZelocoreAntispam_Widget extends ZC_Widget {

	public function __construct() {
		parent::__construct(
			'zelocore_antispam_widget',
			__( 'Zelocore Anti-spam Widget', 'zelocore-antispam' ),
			array( 'description' => __( 'Display the number of spam comments blocked', 'zelocore-antispam' ) )
		);
	}

	public function form( $instance ) {
		if ( $instance && isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Spam Blocked', 'zelocore-antispam' );
		}
		?>
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'zelocore-antispam' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}

	public function widget( $args, $instance ) {
		$count = get_option( 'zelocore_antispam_spam_count' );

		if ( ! isset( $instance['title'] ) ) {
			$instance['title'] = __( 'Spam Blocked', 'zelocore-antispam' );
		}

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'];
			echo esc_html( $instance['title'] );
			echo $args['after_title'];
		}
		?>
<div style="text-align: center; padding: 20px; background: #f0f0f0; border-radius: 5px;">
	<div style="font-size: 32px; font-weight: bold; color: #357b49;">
		<?php echo number_format_i18n( $count ); ?>
	</div>
	<div style="font-size: 14px; color: #666;">
		<?php esc_html_e( 'Spam comments blocked', 'zelocore-antispam' ); ?>
	</div>
</div>
		<?php
		echo $args['after_widget'];
	}
}

function zelocore_antispam_register_widgets() {
	register_widget( 'ZelocoreAntispam_Widget' );
}

add_action( 'widgets_init', 'zelocore_antispam_register_widgets' );
