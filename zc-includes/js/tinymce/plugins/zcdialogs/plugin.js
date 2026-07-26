/* global tinymce */
/**
 * Included for back-compat.
 * The default WindowManager in TinyMCE 4.0 supports three types of dialogs:
 *	- With HTML created from JS.
 *	- With inline HTML (like WPWindowManager).
 *	- Old type iframe based dialogs.
 * For examples see the default plugins: https://github.com/tinymce/tinymce/tree/master/js/tinymce/plugins
 */
tinymce.WPWindowManager = tinymce.InlineWindowManager = function( editor ) {
	if ( this.zc ) {
		return this;
	}

	this.zc = {};
	this.parent = editor.windowManager;
	this.editor = editor;

	tinymce.extend( this, this.parent );

	this.open = function( args, params ) {
		var $element,
			self = this,
			zc = this.zc;

		if ( ! args.wpDialog ) {
			return this.parent.open.apply( this, arguments );
		} else if ( ! args.id ) {
			return;
		}

		if ( typeof jQuery === 'undefined' || ! jQuery.zc || ! jQuery.zc.wpdialog ) {
			// wpdialog.js is not loaded.
			if ( window.console && window.console.error ) {
				window.console.error('wpdialog.js is not loaded. Please set "wpdialogs" as dependency for your script when calling zc_enqueue_script(). You may also want to enqueue the "zc-jquery-ui-dialog" stylesheet.');
			}

			return;
		}

		zc.$element = $element = jQuery( '#' + args.id );

		if ( ! $element.length ) {
			return;
		}

		if ( window.console && window.console.log ) {
			window.console.log('tinymce.WPWindowManager is deprecated. Use the default editor.windowManager to open dialogs with inline HTML.');
		}

		zc.features = args;
		zc.params = params;

		// Store selection. Takes a snapshot in the FocusManager of the selection before focus is moved to the dialog.
		editor.nodeChanged();

		// Create the dialog if necessary.
		if ( ! $element.data('wpdialog') ) {
			$element.wpdialog({
				title: args.title,
				width: args.width,
				height: args.height,
				modal: true,
				dialogClass: 'zc-dialog',
				zIndex: 300000
			});
		}

		$element.wpdialog('open');

		$element.on( 'wpdialogclose', function() {
			if ( self.zc.$element ) {
				self.zc = {};
			}
		});
	};

	this.close = function() {
		if ( ! this.zc.features || ! this.zc.features.wpDialog ) {
			return this.parent.close.apply( this, arguments );
		}

		this.zc.$element.wpdialog('close');
	};
};

tinymce.PluginManager.add( 'wpdialogs', function( editor ) {
	// Replace window manager.
	editor.on( 'init', function() {
		editor.windowManager = new tinymce.WPWindowManager( editor );
	});
});
