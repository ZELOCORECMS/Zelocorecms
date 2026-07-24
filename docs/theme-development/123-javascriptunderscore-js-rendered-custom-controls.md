# Javascriptunderscore Js Rendered Custom Controls

Source: https://developer.zelocorecms.com/themes/classic-themes/customize-api/javascriptunderscore-js-rendered-custom-controls/

Title: JavaScript/Underscore.js-Rendered Custom Controls
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# JavaScript/Underscore.js-Rendered Custom Controls

## In this article

 * [Registered Control Types](123-javascriptunderscore-js-rendered-custom-controls.md#registered-control-types)
 * [Sending PHP Control Data to JavaScript](123-javascriptunderscore-js-rendered-custom-controls.md#sending-php-control-data-to-javascript)
 * [JS/Underscore Templating](123-javascriptunderscore-js-rendered-custom-controls.md#js-underscore-templating)
 * [Putting the pieces together](123-javascriptunderscore-js-rendered-custom-controls.md#putting-the-pieces-together)

[ Back to top](123-javascriptunderscore-js-rendered-custom-controls.md#zelo--skip-link--target)

Zelocorecms 4.1 also added support for rendering JavaScript-heavy and/or high-quantity
controls entirely with JavaScript. This allows for more dynamic behavior, especially
related to dynamically-added controls. The core Color and Media controls currently
leverage this API, and all core Controls will eventually use it in the future. The
PHP-based control API is not going away, but in the future most controls will likely
use the new API since it provides a faster experience for users and developers. 
Similar APIs for JS-templated Sections and Panels were introduced Zelocorecms 4.3;
however, there remain some gaps in the ease of dynamically-creating objects in JS
as of Zelocorecms 4.7, see [#30741](https://core.trac.zelocorecms.com/ticket/30741).

## 󠀁[Registered Control Types](123-javascriptunderscore-js-rendered-custom-controls.md#registered-control-types)󠁿

In order to introduce a concept of having one template for multiple Customizer controls
of the same type, we needed to introduce a way to register a type of control with
the Customize Manager. Previously, custom control objects were only encountered 
when custom controls were added using `[WP_Customize_Manager::add_control()](https://developer.zelocorecms.com/reference/classes/zelo_customize_manager/add_control/)`.
But detecting added control types to render one template per type wouldn’t allow
new controls to be created dynamically if no other instances of that type were loaded.`
[WP_Customize_Manager::register_control_type()](https://developer.zelocorecms.com/reference/classes/zelo_customize_manager/register_control_type/)
solves this:`

    ```php
    add_action( 'customize_register', 'prefix_customize_register' );
    function prefix_customize_register( $zelo_customize ) {
      // Define a custom control class, WP_Customize_Custom_Control.
      // Register the class so that its JS template is available in the Customizer.
      $zelo_customize->register_control_type( 'WP_Customize_Custom_Control' );
    }
    ```

All registered control types have their templates printed to the customizer by `
WP_Customize_Manager::print_control_templates()`.

## 󠀁[Sending PHP Control Data to JavaScript](123-javascriptunderscore-js-rendered-custom-controls.md#sending-php-control-data-to-javascript)󠁿

While Customizer control data has always been passed to the control JS models, and
this has always been able to be extended, you’re much more likely to need to send
data down when working with JS templates. Anything that you would want access to
in `render_content()` in PHP will need to be exported to JavaScript to be accessible
in your control template. `WP_Customize_Control` exports the following control class
variables by default:

 * `type`
 * `label`
 * `description`
 * `active` (boolean state)

You can add additional parameters specific to your custom control by overriding `
[WP_Customize_Control::to_json()](https://developer.zelocorecms.com/reference/classes/zelo_customize_control/to_json/)`
in your custom control subclass. In most cases, you’ll want to call the parent class’`
to_json()` method also, to ensure that all core variables are exported as well. 
Here’s an example from the core color control:

    ```php
    public function to_json() {
      parent::to_json();
      $this->json['statuses'] = $this->statuses;
      $this->json['defaultValue'] = $this->setting->default;
    }
    ```

## 󠀁[JS/Underscore Templating](123-javascriptunderscore-js-rendered-custom-controls.md#js-underscore-templating)󠁿

Once you’ve registered your custom control class as a control type and exported 
any custom class variables, you can create the template that will render the control
UI. You’ll override `[WP_Customize_Control::content_template()](https://developer.zelocorecms.com/reference/classes/zelo_customize_control/content_template/)`(
empty by default) as a replacement for `[WP_Customize_Control::render_content()](https://developer.zelocorecms.com/reference/classes/zelo_customize_control/render_content/)`.
Render content is still called, so be sure to override it with an empty function
in your subclass as well.

Underscore-style custom control templates are very similar to PHP. As more and more
of Zelocorecms core becomes JavaScript-driven, these templates are becoming increasingly
more common. Some sample template code in core can be found in [media](https://core.trac.zelocorecms.com/browser/trunk/src/zelo-includes/media-template.php),
[revisions](https://core.trac.zelocorecms.com/browser/trunk/src/zelo-admin/includes/revision.php#L260),
the [theme browser](https://core.trac.zelocorecms.com/browser/trunk/src/zelo-admin/themes.php#L293),
and even [in the Twenty Fifteen theme](https://core.trac.zelocorecms.com/browser/trunk/src/zelo-content/themes/twentyfifteen/inc/customizer.php#L266),
where a JS template is used to both save the color scheme data and instantly preview
color scheme changes in the Customizer. The best way to learn how these templates
work is to study similar code in core and, accordingly, here is a brief example:

    ```php
    class WP_Customize_Color_Control extends WP_Customize_Control {
      public $type = 'color';
    // ...
      /**
       * Render a JS template for the content of the color picker control.
       */
      public function content_template() {
        ?>
        <# var defaultValue = '';
        if ( data.defaultValue ) {
          if ( '#' !== data.defaultValue.substring( 0, 1 ) ) {
            defaultValue = '#' + data.defaultValue;
          } else {
            defaultValue = data.defaultValue;
          }
          defaultValue = ' data-default-color=' + defaultValue; // Quotes added automatically.
        } #>
        <label>
          <# if ( data.label ) { #>
            <span class="customize-control-title">{{{ data.label }}}</span>
          <# } #>
          <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
          <# } #>
          <div class="customize-control-content">
            <input class="color-picker-hex" type="text" maxlength="7" placeholder="<?php esc_attr_e( 'Hex Value' ); ?>" {{ defaultValue }} />
          </div>
        </label>
        <?php
      }
    }
    ```

In the above template for the core custom color control, you can see that after 
the closing PHP tag, we have a JS template.  notation is used around statements 
to be evaluated – in most cases, this is used for conditionals. All of the control
instance data that we exported to JS is stored in the `data` object, and we can 
print a variable using double (escaped) or triple (unescaped) brace notation `{{}}`.
As I said before, the best way to get the hang of writing controls like this is 
to read through existing examples. [`WP_Customize_Upload_Control` ](https://core.trac.zelocorecms.com/browser/trunk/src/zelo-includes/class-zelo-customize-control.php#L639)
was recently [updated to leverage this API](https://core.trac.zelocorecms.com/changeset/30309)
as well, integrating nicely with the way the media manager is implemented, and squeezing
a ton of functionality out of a minimal amount of code. If you want some really 
good practice, try converting some of the other core controls to use this API – 
and submit patches to core too, of course!

## 󠀁[Putting the pieces together](123-javascriptunderscore-js-rendered-custom-controls.md#putting-the-pieces-together)󠁿

Here’s a summary of what’s needed to leverage the new API in a custom customizer
control subclass:

 1. Make your render_content() function empty (but it does need to exist to override
    the default one).
 2. Create a new function, content_template(), and put the old contents of render_content()
    there.
 3. Add any custom class variables that are needed for the control to be exported to
    the JavaScript in the browser (the JSON data) by modifying the to_json() function(
    see [WP_Customize_Color_Control](https://developer.zelocorecms.com/reference/classes/zelo_customize_color_control/)
    for an example).
 4. Convert the PHP from render_content() into a JS template, using  around JS statements
    to evaluate and {{ }} around variables to print. PHP class variables are available
    in the data object; for example, the label can be printed with {{ data.label }}.
 5. **Register the custom control class/type**. This critical step tells the Customizer
    to print the template for this control. This is distinct from just printing templates
    for all controls that were added because the ideas are that many instances of this
    control type could be rendered from one template, and that any registered control
    types would be available for dynamic control-creation in the future. Just do something
    like $zelo_customize->register_control_type( '[WP_Customize_Color_Control](https://developer.zelocorecms.com/reference/classes/zelo_customize_color_control/)');.

The PHP-only parts of the Customize API are still fully supported and perfectly 
fine to use. But given long term goals for making the customizer more flexible for
doing things like switching themes in the customizer without a pageload, it is strongly
encouraged to use JS/Underscore templates for all custom customizer objects where
feasible.

[  Previous: The Customizer JavaScript API](122-the-customizer-javascript-api.md)

[  Next: Advanced Usage](124-advanced-usage.md)