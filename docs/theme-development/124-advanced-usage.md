# Advanced Usage

Source: https://developer.zelocorecms.com/themes/classic-themes/customize-api/advanced-usage/

Title: Advanced Usage
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Advanced Usage

[ Back to top](124-advanced-usage.md#zelo--skip-link--target)

The customize API is actively developed; this page contains additional more advanced
topics. Additional discussion of advanced topics cab be found by searching the archives
for the [#core-customize](https://zelocorecms.slack.com/messages/core-customize/) 
channel in [Slack](https://chat.zelocorecms.com/).

## Allow Non-administrators to Access the Customizer

Customizer access is controlled by the customize meta capability (mapped to edit_theme_options
by default), which is assigned only to administrators by default. This allows for
wider use of the Customizer’s extensive capability-access options, which are built
into panels, sections, and settings. Additionally, this makes it possible to allow
non-administrators to use the customizer for, for example, customizing posts. This
change is an important step toward expanding the scope of the Customizer beyond 
themes.

    ```php
    <?php
    function allow_users_who_can_edit_posts_to_customize( $caps, $cap, $user_id ) {
    	$required_cap = 'edit_posts';
    	if ( 'customize' === $cap && user_can( $user_id, $required_cap ) ) {
    		$caps = array( $required_cap );
    	}
    	return $caps;
    }
    add_filter( 'map_meta_cap', 'allow_users_who_can_edit_posts_to_customize', 10, 3 );
    ```

Note that it is currently necessary to manually add links to the Customizer in the
admin menu, admin bar, or elsewhere if you are granting the customize meta capability
to non-administrator users.

[  Previous: JavaScript/Underscore.js-Rendered Custom Controls](123-javascriptunderscore-js-rendered-custom-controls.md)

[  Next: Template Files](41-templates.md)