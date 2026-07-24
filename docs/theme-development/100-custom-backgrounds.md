# Custom Backgrounds

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/custom-backgrounds/

Title: Custom Backgrounds
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Custom Backgrounds

## In this article

 * [Enable Custom Backgrounds](100-custom-backgrounds.md#enable-custom-backgrounds)
 * [Display Custom Backgrounds](100-custom-backgrounds.md#display-custom-backgrounds)
 * [Another default example](100-custom-backgrounds.md#another-default-example)

[ Back to top](100-custom-backgrounds.md#zelo--skip-link--target)

Custom Backgrounds is a theme feature that provides for customization of the background
color and image.
Theme developer needs 2 steps to implement it.

 1. Enable Custom Background – [add_theme_support()](https://developer.zelocorecms.com/reference/functions/add_theme_support/)
 2. Display Custom Background – [zelo_head()](https://developer.zelocorecms.com/reference/functions/zelo_head/)
    and [body_class()](https://developer.zelocorecms.com/reference/functions/body_class/)

## 󠀁[Enable Custom Backgrounds](100-custom-backgrounds.md#enable-custom-backgrounds)󠁿

Use [add_theme_support()](https://developer.zelocorecms.com/reference/functions/add_theme_support/)
in the `functions.php` file to enable custom backgrounds.

    ```php
    add_theme_support( 'custom-background' );
    ```

You can specify default parameters. In below example using default ‘#0000ff’ background
color (blue) with ‘wapuu.jpg’ background image that was stored under the /images
folder.

    ```php
    $args = array(
        'default-color' => '0000ff',
        'default-image' => get_template_directory_uri() . '/images/wapuu.jpg',
    );
    add_theme_support( 'custom-background', $args );
    ```

By calling [add_theme_support()](https://developer.zelocorecms.com/reference/functions/add_theme_support/),
Customizer displays ‘Background Image’ menu and ‘Background Color’ section in Colors
menu.

## 󠀁[Display Custom Backgrounds](100-custom-backgrounds.md#display-custom-backgrounds)󠁿

In general, invokes [zelo_head()](https://developer.zelocorecms.com/reference/functions/zelo_head/)
and [body_class()](https://developer.zelocorecms.com/reference/functions/body_class/)
in `header.php` file to display the custom backgrounds.

    ```php
    <!DOCTYPE html>
    <html>
    <head>
        <?php zelo_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    ```

[zelo_head()](https://developer.zelocorecms.com/reference/functions/zelo_head/) generates
an extra style sheet in-line with the HTML headers, usually right before the end
of the document’s HEAD element. The extra style sheet overrides the background values
from the theme’s style sheet.
In our example, following code will be generated in
the HTML. Notice that body tag includes “custom-background ” class.

    ```php
    <!DOCTYPE html>
    <html lang="en-US" class="no-js">

    <head>
    	...
    <style type="text/css" id="custom-background-css">
    body.custom-background {
      background-image: url("http://example.com/zelocorecms/zelo-content/themes/my-first-theme/images/wapuu.jpg");
      background-position: left top;
      background-size: auto;
      background-repeat: repeat;
      background-attachment: scroll;
    }
    </style>
    	...
    </head>

    <body class="home page-template-default page page-id-211 logged-in admin-bar no-customize-support custom-background">

    	...
    ```

Now you’ll see repeated background images

![](https://i0.wp.com/developer.zelocorecms.com/files/2017/03/custom_background_1.
jpg?resize=733%2C302&ssl=1)

## 󠀁[Another default example](100-custom-backgrounds.md#another-default-example)󠁿

This is another example of default value set.

    ```php
    $another_args = array(
        'default-color'      => '0000ff',
        'default-image'      => get_template_directory_uri() . '/images/wapuu.jpg',
        'default-position-x' => 'right',
        'default-position-y' => 'top',
        'default-repeat'     => 'no-repeat',
    );
    add_theme_support( 'custom-background', $another_args );
    ```

This will show single image at the top right corner as below.

![](https://i0.wp.com/developer.zelocorecms.com/files/2017/03/custom_background_2.
jpg?resize=735%2C310&ssl=1)

 Even if we specified the ‘default-color’ as ‘#0000ff’ (blue), the background color
is not blue. Setting the default-image parameter will instantly cause that value
to become the effective Custom Background, whereas setting the default-color has
no effect. It is just set as default background color in Color menu of Customizer,
and enhanced when Administrator save it.


[  Previous: Core-Supported Features](99-core-supported.md)

[  Next: Custom Front Page Templates](101-custom-front-page-templates.md)