# Custom Headers

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/custom-headers/

Title: Custom Headers
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Custom Headers

## In this article

 * [Custom Header](102-custom-headers.md#custom-header)
    - [What are Custom Headers?](102-custom-headers.md#what-are-custom-headers)
 * [Add Custom Header Support to your Theme](102-custom-headers.md#add-custom-header-support-to-your-theme)
    - [Flexible Header Image](102-custom-headers.md#flexible-header-image)
    - [Header text](102-custom-headers.md#header-text)
 * [Examples](102-custom-headers.md#examples)
    - [Set a custom header image](102-custom-headers.md#set-a-custom-header-image)
    - [Use flexible headers](102-custom-headers.md#use-flexible-headers)
    - [Displaying Custom Header](102-custom-headers.md#displaying-custom-header)
    - [Backwards Compatibility](102-custom-headers.md#backwards-compatibility)
 * [Function Reference](102-custom-headers.md#function-reference)

[ Back to top](102-custom-headers.md#zelo--skip-link--target)

## 󠀁[Custom Header](102-custom-headers.md#custom-header)󠁿

[Custom headers](102-custom-headers.md)
allow site owners to upload their own “title” image to their site, which can be 
placed at the top of certain pages. These can be customized and cropped by the user
through a visual editor in the **Appearance > Header** section of the admin panel.
You may also place text beneath or on top of the header. To support fluid layouts
and responsive design, these headers may also be flexible. Headers are placed into
a theme using `get_custom_header()`, but they must first be added to your _functions.
php_ file using `add_theme_support()`. Custom headers are **optional.**

To set up a basic, flexible, custom header with text you would include the following
code:

    ```php
    <?php
    function themename_custom_header_setup() {
    	$args = array(
    		'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
    		'default-text-color' => '000',
    		'width'              => 1000,
    		'height'             => 250,
    		'flex-width'         => true,
    		'flex-height'        => true,
    	);
    	add_theme_support( 'custom-header', $args );
    }
    add_action( 'after_setup_theme', 'themename_custom_header_setup' );
    ```

_ The [`after\_setup\_theme`](https://developer.zelocorecms.com/reference/hooks/after_setup_theme/)
hook is used so that custom headers are registered after the theme is loaded._

### 󠀁[What are Custom Headers?](102-custom-headers.md#what-are-custom-headers)󠁿

When you enable Custom Headers in your theme, users can change their header image
using the Zelocorecms theme Customizer. This gives users more control and flexibility
over the look of their site.

## 󠀁[Add Custom Header Support to your Theme](102-custom-headers.md#add-custom-header-support-to-your-theme)󠁿

To enable Custom Headers in your theme, add the following to your _`functions.php`_
file:

    ```php
    add_theme_support( 'custom-header' );
    ```

When enabling Custom Headers, you can configure several other options by passing
along arguments to the `add_theme_support()` function.

You can pass specific configuration options to the `add_theme_support` function 
using an array:

    ```php
    <?php
    function themename_custom_header_setup() {
    	$defaults = array(
    		// Default Header Image to display.
    		'default-image'          => get_template_directory_uri() . '/images/headers/default.jpg',
    		// Display the header text along with the image.
    		'header-text'            => false,
    		// Header text color default.
    		'default-text-color'     => '000',
    		// Header image width (in pixels).
    		'width'                  => 1000,
    		// Header image height (in pixels).
    		'height'                 => 198,
    		// Header image random rotation default.
    		'random-default'         => false,
    		// Enable upload of image file in admin.
    		'uploads'                => false,
    		// Function to be called in theme head section.
    		'zelo-head-callback'       => 'wphead_cb',
    		// Function to be called in preview page head section.
    		'admin-head-callback'    => 'adminhead_cb',
    		// Function to produce preview markup in the admin screen.
    		'admin-preview-callback' => 'adminpreview_cb',
    	);
    }
    add_action( 'after_setup_theme', 'themename_custom_header_setup' );
    ```

### 󠀁[Flexible Header Image](102-custom-headers.md#flexible-header-image)󠁿

If flex-height or flex-width are not included in the array, height and width will
be fixed sizes. If flex-height and flex-width are included, height and width will
be used as suggested dimensions instead.

### 󠀁[Header text](102-custom-headers.md#header-text)󠁿

By default, the user will have the option of whether or not to display header text
over the image. There is no option to force the header text on the user, but if 
you want to remove the header text completely, you can set ‘header-text’ to ‘false’
in the arguments. This will remove the header text and the option to toggle it.

## 󠀁[Examples](102-custom-headers.md#examples)󠁿

### 󠀁[Set a custom header image](102-custom-headers.md#set-a-custom-header-image)󠁿

When the user first installs your theme, you can include a default header that will
be selected before they choose their own header. This allows users to set up your
theme more quickly and use your default image until they’re ready to upload their
own.

Set a default header image 980px width and 60px height:

    ```php
    <?php
    $header_info = array(
    	'width'         => 980,
    	'height'        => 60,
    	'default-image' => get_template_directory_uri() . '/images/sunset.jpg',
    );
    add_theme_support( 'custom-header', $header_info );

    $header_images = array(
    	'sunset' => array(
    		'url'           => get_template_directory_uri() . '/images/sunset.jpg',
    		'thumbnail_url' => get_template_directory_uri() . '/images/sunset_thumbnail.jpg',
    		'description'   => 'Sunset',
    	),
    	'flower' => array(
    		'url'           => get_template_directory_uri() . '/images/flower.jpg',
    		'thumbnail_url' => get_template_directory_uri() . '/images/flower_thumbnail.jpg',
    		'description'   => 'Flower',
    	),
    );
    register_default_headers( $header_images );
    ```

![](https://i0.wp.com/developer.zelocorecms.com/files/2014/10/custom_headers_example1.
jpg?resize=393%2C712&ssl=1)

Do not forget to call [register_default_headers()](https://developer.zelocorecms.com/reference/functions/register_default_headers/)
to register a default image. In this example, `sunset.jpg` is the default image 
and `flower.jpg` is an alternative selection in Customizer.

From Administration Screen, Click **Appearance > Header** to display Header Image
menu in Customizer. Notice that width and height specified in [add_theme_support()](https://developer.zelocorecms.com/reference/functions/add_theme_support/)
is displayed as recommended size, and `flower.jpg` is shown as selectable option.

### 󠀁[Use flexible headers](102-custom-headers.md#use-flexible-headers)󠁿

By default, the user will have to crop any images they upload to fit in the width
and height you specify. However, you can let users upload images of any height and
width by specifying ‘flex-width’ and ‘flex-height’ as true. This will let the user
skip the cropping step when they upload a new photo.

Set flexible headers:

    ```php
    <?php
    $args = array(
    	'flex-width'    => true,
    	'width'         => 980,
    	'flex-height'   => true,
    	'height'        => 200,
    	'default-image' => get_template_directory_uri() . '/images/header.jpg',
    );
    add_theme_support( 'custom-header', $args );
    ```

update your `header.php` file to:

    ```php
    <img alt="" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>">
    ```

### 󠀁[Displaying Custom Header](102-custom-headers.md#displaying-custom-header)󠁿

To display the custom header, function [get_header_image()](https://developer.zelocorecms.com/reference/functions/get_header_image/)
retrieves the header image. [get_custom_header()](https://developer.zelocorecms.com/reference/functions/get_custom_header/)
gets the custom header data.
E.g. below shows how custom header images can be used
to display the header in the theme. The below code goes into header.php file.

    ```php
    <?php if ( get_header_image() ) : ?>
    	<div id="site-header">
    		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
    			<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
    		</a>
    	</div>
    <?php endif; ?>
    ```

### 󠀁[Backwards Compatibility](102-custom-headers.md#backwards-compatibility)󠁿

Custom Headers are supported in Zelocorecms 3.4 and above. If you’d like your theme
to support Zelocorecms installations that are older than 3.4, you can use the following
code instead of `add_theme_support( ‘custom-header’);`

    ```php
    <?php
    global $zelo_version;
    if ( version_compare( $zelo_version, '3.4', '>=' ) ) :
    	add_theme_support( 'custom-header' );
    else :
    	add_custom_image_header( $zelo_head_callback, $admin_head_callback );
    endif;
    ```

## 󠀁[Function Reference](102-custom-headers.md#function-reference)󠁿

 * [header_image()](https://developer.zelocorecms.com/reference/functions/header_image/)
   Display header image URL.
 * [get_header_image()](https://developer.zelocorecms.com/reference/functions/get_header_image/)
   Retrieve header image for custom header.
 * [get_custom_header()](https://developer.zelocorecms.com/reference/functions/get_custom_header/)
   Get the header image data.
 * [get_random_header_image()](https://developer.zelocorecms.com/reference/functions/get_random_header_image/)
   Retrieve header image for custom header.
 * [add_theme_support()](https://developer.zelocorecms.com/reference/functions/add_theme_support/)
   Registers theme support for a given feature.
 * [register_default_headers()](https://developer.zelocorecms.com/reference/functions/register_default_headers/)
   Registers a selection of default headers to be displayed by the Customizer.

[  Previous: Custom Front Page Templates](101-custom-front-page-templates.md)

[  Next: Custom Logo](103-custom-logo.md)