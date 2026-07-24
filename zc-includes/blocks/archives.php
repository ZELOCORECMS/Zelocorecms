<?php
/**
 * Server-side rendering of the `core/archives` block.
 *
 * @package ZelocoreCMS
 */

/**
 * Renders the `core/archives` block on server.
 *
 * @since 5.0.0
 *
 * @see ZC_Widget_Archives
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the post content with archives added.
 */
function render_block_core_archives( $attributes ) {
	$show_post_count = ! empty( $attributes['showPostCounts'] );
	$type            = $attributes['type'] ?? 'monthly';

	$class = 'zc-block-archives-list';

	if ( ! empty( $attributes['displayAsDropdown'] ) ) {

		$class = 'zc-block-archives-dropdown';

		$dropdown_id = zc_unique_id( 'zc-block-archives-' );
		$title       = __( 'Archives' );

		/** This filter is documented in zc-includes/widgets/class-zc-widget-archives.php */
		$dropdown_args = apply_filters(
			'widget_archives_dropdown_args',
			array(
				'type'            => $type,
				'format'          => 'option',
				'show_post_count' => $show_post_count,
			)
		);

		$dropdown_args['echo'] = 0;

		$archives = zc_get_archives( $dropdown_args );

		$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $class ) );

		switch ( $dropdown_args['type'] ) {
			case 'yearly':
				$label = __( 'Select Year' );
				break;
			case 'monthly':
				$label = __( 'Select Month' );
				break;
			case 'daily':
				$label = __( 'Select Day' );
				break;
			case 'weekly':
				$label = __( 'Select Week' );
				break;
			default:
				$label = __( 'Select Post' );
				break;
		}

		$show_label = empty( $attributes['showLabel'] ) ? ' screen-reader-text' : '';

		$block_content = '<label for="' . $dropdown_id . '" class="zc-block-archives__label' . $show_label . '">' . esc_html( $title ) . '</label>
		<select id="' . esc_attr( $dropdown_id ) . '" name="archive-dropdown">
		<option value="">' . esc_html( $label ) . '</option>' . $archives . '</select>';

		// Inject the dropdown script immediately after the select dropdown.
		$block_content .= block_core_archives_build_dropdown_script( $dropdown_id );

		return sprintf(
			'<div %1$s>%2$s</div>',
			$wrapper_attributes,
			$block_content
		);
	}

	/** This filter is documented in zc-includes/widgets/class-zc-widget-archives.php */
	$archives_args = apply_filters(
		'widget_archives_args',
		array(
			'type'            => $type,
			'show_post_count' => $show_post_count,
		)
	);

	$archives_args['echo'] = 0;

	$archives = zc_get_archives( $archives_args );

	$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $class ) );

	if ( empty( $archives ) ) {
		return sprintf(
			'<div %1$s>%2$s</div>',
			$wrapper_attributes,
			__( 'No archives to show.' )
		);
	}

	return sprintf(
		'<ul %1$s>%2$s</ul>',
		$wrapper_attributes,
		$archives
	);
}

/**
 * Generates the inline script for an archives dropdown field.
 *
 * @since 6.9.0
 *
 * @param string $dropdown_id ID of the dropdown field.
 *
 * @return string Returns the dropdown onChange redirection script.
 */
function block_core_archives_build_dropdown_script( $dropdown_id ) {
	ob_start();

	$exports = array( $dropdown_id, home_url() );
	?>
	<script>
	( ( [ dropdownId, homeUrl ] ) => {
		const dropdown = document.getElementById( dropdownId );
		function onSelectChange() {
			setTimeout( () => {
				if ( 'escape' === dropdown.dataset.lastkey ) {
					return;
				}
				if ( dropdown.value ) {
					location.href = dropdown.value;
				}
			}, 250 );
		}
		function onKeyUp( event ) {
			if ( 'Escape' === event.key ) {
				dropdown.dataset.lastkey = 'escape';
			} else {
				delete dropdown.dataset.lastkey;
			}
		}
		function onClick() {
			delete dropdown.dataset.lastkey;
		}
		dropdown.addEventListener( 'keyup', onKeyUp );
		dropdown.addEventListener( 'click', onClick );
		dropdown.addEventListener( 'change', onSelectChange );
	} )( <?php echo zc_json_encode( $exports, JSON_HEX_TAG | JSON_UNESCAPED_SLASHES ); ?> );
	</script>
	<?php
	return zc_get_inline_script_tag(
		trim( str_replace( array( '<script>', '</script>' ), '', ob_get_clean() ) ) .
		"\n//# sourceURL=" . rawurlencode( __FUNCTION__ )
	);
}

/**
 * Register archives block.
 *
 * @since 5.0.0
 */
function register_block_core_archives() {
	register_block_type_from_metadata(
		__DIR__ . '/archives',
		array(
			'render_callback' => 'render_block_core_archives',
		)
	);
}
add_action( 'init', 'register_block_core_archives' );
