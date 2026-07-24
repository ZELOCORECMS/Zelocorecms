<?php
/**
 * WP AI Client: ZC_AI_Client_Event_Dispatcher class
 *
 * @package ZelocoreCMS
 * @subpackage AI
 * @since 7.0.0
 */

use ZelocoreCMS\AiClientDependencies\Psr\EventDispatcher\EventDispatcherInterface;

/**
 * ZelocoreCMS-specific PSR-14 event dispatcher for the AI Client.
 *
 * Bridges PSR-14 events to ZelocoreCMS action hooks, enabling plugins to hook
 * into AI client lifecycle events.
 *
 * @since 7.0.0
 * @internal Intended only to wire up the PHP AI Client SDK to ZelocoreCMS's hook system.
 * @access private
 */
class ZC_AI_Client_Event_Dispatcher implements EventDispatcherInterface {

	/**
	 * Dispatches an event to ZelocoreCMS action hooks.
	 *
	 * Converts the event class name to a ZelocoreCMS action hook name and fires it.
	 * For example, BeforeGenerateResultEvent becomes zc_ai_client_before_generate_result.
	 *
	 * @since 7.0.0
	 *
	 * @param object $event The event object to dispatch.
	 * @return object The same event object, potentially modified by listeners.
	 */
	public function dispatch( object $event ): object {
		$event_name = $this->get_hook_name_portion_for_event( $event );

		/**
		 * Fires when an AI client event is dispatched.
		 *
		 * The dynamic portion of the hook name, `$event_name`, refers to the
		 * snake_case version of the event class name, without the `_event` suffix.
		 *
		 * For example, an event class named `BeforeGenerateResultEvent` will fire the
		 * `zc_ai_client_before_generate_result` action hook.
		 *
		 * In practice, the available action hook names are:
		 *
		 * - zc_ai_client_before_generate_result
		 * - zc_ai_client_after_generate_result
		 *
		 * @since 7.0.0
		 *
		 * @param object $event The event object.
		 */
		do_action( "zc_ai_client_{$event_name}", $event );

		return $event;
	}

	/**
	 * Converts an event object class name to a ZelocoreCMS action hook name portion.
	 *
	 * @since 7.0.0
	 *
	 * @param object $event The event object.
	 * @return string The hook name portion derived from the event class name.
	 */
	private function get_hook_name_portion_for_event( object $event ): string {
		$class_name = get_class( $event );
		$pos        = strrpos( $class_name, '\\' );
		$short_name = false !== $pos ? substr( $class_name, $pos + 1 ) : $class_name;

		// Convert PascalCase to snake_case.
		$snake_case = strtolower( (string) preg_replace( '/([a-z])([A-Z])/', '$1_$2', $short_name ) );

		// Strip '_event' suffix if present.
		if ( str_ends_with( $snake_case, '_event' ) ) {
			$snake_case = (string) substr( $snake_case, 0, -6 );
		}

		return $snake_case;
	}
}
