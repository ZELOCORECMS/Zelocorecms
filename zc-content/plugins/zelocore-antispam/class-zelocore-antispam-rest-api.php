<?php
/**
 * Zelocore Anti-spam REST API Class
 *
 * @package ZelocoreAntispam
 */

declare( strict_types = 1 );

class ZelocoreAntispam_REST_API {

	public static function init() {
		if ( ! function_exists( 'register_rest_route' ) ) {
			return false;
		}

		register_rest_route(
			'zelocore-antispam/v1',
			'/key',
			array(
				array(
					'methods'             => ZC_REST_Server::READABLE,
					'permission_callback' => array( 'ZelocoreAntispam_REST_API', 'privileged_permission_callback' ),
					'callback'            => array( 'ZelocoreAntispam_REST_API', 'get_key' ),
				),
				array(
					'methods'             => ZC_REST_Server::EDITABLE,
					'permission_callback' => array( 'ZelocoreAntispam_REST_API', 'privileged_permission_callback' ),
					'callback'            => array( 'ZelocoreAntispam_REST_API', 'set_key' ),
					'args'                => array(
						'key' => array(
							'required'          => true,
							'type'              => 'string',
							'sanitize_callback' => array( 'ZelocoreAntispam_REST_API', 'sanitize_key' ),
							'description'       => __( 'A 12-character Zelocore Anti-spam API key.', 'zelocore-antispam' ),
						),
					),
				),
			)
		);

		register_rest_route(
			'zelocore-antispam/v1',
			'/settings/',
			array(
				array(
					'methods'             => ZC_REST_Server::READABLE,
					'permission_callback' => array( 'ZelocoreAntispam_REST_API', 'privileged_permission_callback' ),
					'callback'            => array( 'ZelocoreAntispam_REST_API', 'get_settings' ),
				),
				array(
					'methods'             => ZC_REST_Server::EDITABLE,
					'permission_callback' => array( 'ZelocoreAntispam_REST_API', 'privileged_permission_callback' ),
					'callback'            => array( 'ZelocoreAntispam_REST_API', 'set_settings' ),
				),
			)
		);
	}

	public static function get_key( $request = null ) {
		return rest_ensure_response( ZelocoreAntispam::get_api_key() );
	}

	public static function set_key( $request ) {
		if ( defined( 'ZELOCORE_ANTISPAM_API_KEY' ) ) {
			return rest_ensure_response( new ZC_Error( 'hardcoded_key', __( 'This site\'s API key is hardcoded and cannot be changed via the API.', 'zelocore-antispam' ), array( 'status' => 409 ) ) );
		}

		$new_api_key = $request->get_param( 'key' );

		if ( ! self::key_is_valid( $new_api_key ) ) {
			return rest_ensure_response( new ZC_Error( 'invalid_key', __( 'The value provided is not a valid API key.', 'zelocore-antispam' ), array( 'status' => 400 ) ) );
		}

		update_option( 'zelocore_antispam_api_key', $new_api_key );

		return self::get_key();
	}

	public static function get_settings( $request = null ) {
		return rest_ensure_response(
			array(
				'zelocore_antispam_strictness' => ( get_option( 'zelocore_antispam_strictness', '1' ) === '1' ),
			)
		);
	}

	public static function set_settings( $request ) {
		$strictness = $request->get_param( 'zelocore_antispam_strictness' );
		if ( ! is_null( $strictness ) ) {
			update_option( 'zelocore_antispam_strictness', $strictness ? '1' : '0' );
		}

		return self::get_settings();
	}

	private static function key_is_valid( $key ) {
		$request_args = array(
			'key'  => $key,
			'blog' => get_option( 'home' ),
		);

		$request_args = apply_filters( 'zelocore_antispam_request_args', $request_args, 'verify-key' );

		$response = ZelocoreAntispam::http_post( ZelocoreAntispam::build_query( $request_args ), 'verify-key' );

		if ( $response[1] == 'valid' ) {
			return true;
		}

		return false;
	}

	public static function privileged_permission_callback() {
		return current_user_can( 'manage_options' );
	}

	public static function sanitize_key( $key, $request, $param ) {
		return trim( $key );
	}
}
