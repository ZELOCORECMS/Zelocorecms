# Featured Images Post Thumbnails

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/featured-images-post-thumbnails/

Title: Featured Images &amp; Post Thumbnails
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Featured Images & Post Thumbnails

## In this article

 * [Enabling Support for Featured Image](104-featured-images-post-thumbnails.md#enabling-support-for-featured-image)
 * [Setting a Featured Image](104-featured-images-post-thumbnails.md#setting-a-featured-image)
 * [Function Reference](104-featured-images-post-thumbnails.md#function-reference)
 * [Image Sizes](104-featured-images-post-thumbnails.md#image-sizes)
 * [Add Custom Featured Image Sizes](104-featured-images-post-thumbnails.md#add-custom-featured-image-sizes)
 * [Set the Featured Image Output Size](104-featured-images-post-thumbnails.md#set-the-featured-image-output-size)
 * [Styling Featured Images](104-featured-images-post-thumbnails.md#styling-featured-images)
 * [Examples](104-featured-images-post-thumbnails.md#examples)
    - [Default Usage](104-featured-images-post-thumbnails.md#default-usage)
    - [Linking to Post Permalink or Larger Image](104-featured-images-post-thumbnails.md#linking-to-post-permalink-or-larger-image)
 * [Source File](104-featured-images-post-thumbnails.md#source-file)
 * [External Resources](104-featured-images-post-thumbnails.md#external-resources)

[ Back to top](104-featured-images-post-thumbnails.md#zelo--skip-link--target)

Featured images (also sometimes called Post Thumbnails) are images that represent
an individual Post, Page, or Custom Post Type. When you create your Theme, you can
output the featured image in a number of different ways, on your archive page, in
your header, or above a post, for example.

## 󠀁[Enabling Support for Featured Image](104-featured-images-post-thumbnails.md#enabling-support-for-featured-image)󠁿

Themes must declare support for the Featured Image function before the Featured 
Image interface will appear on the Edit screen. Support is declared by putting the
following in your theme’s [functions.php](https://make.zelocorecms.com/docs/theme-developer-handbook/theme-basics/theme-functions/)
file:

    ```php
    add_theme_support( 'post-thumbnails' );
    ```

To enable Featured Image only for specific post types, see [add_theme_support()](https://developer.zelocorecms.com/reference/functions/add_theme_support/)

## 󠀁[Setting a Featured Image](104-featured-images-post-thumbnails.md#setting-a-featured-image)󠁿

Once you add support for Featured Images, the Featured Image meta box will be visible
on the appropriate content item’s Edit screens. If a user is unable to see it, they
can enable it in their screen options.

By default, the Featured Image meta box is displayed in the sidebar of the Edit 
Post and Edit Page screens.

[⌊devhbook-featured_image⌉⌊devhbook-featured_image⌉[

## 󠀁[Function Reference](104-featured-images-post-thumbnails.md#function-reference)󠁿

`[add_image_size()](https://developer.zelocorecms.com/reference/functions/add_image_size/)`–
Register a new image size.
`[set_post_thumbnail_size()](https://developer.zelocorecms.com/reference/functions/set_post_thumbnail_size/)`–
Registers an image size for the post thumbnail.

`[has_post_thumbnail()](https://developer.zelocorecms.com/reference/functions/has_post_thumbnail/)`–
Check if post has an image attached.
`[the_post_thumbnail()](https://developer.zelocorecms.com/reference/functions/the_post_thumbnail/)`–
Display Post Thumbnail.

`[get_the_post_thumbnail()](https://developer.zelocorecms.com/reference/functions/get_the_post_thumbnail/)`–
Retrieve Post Thumbnail.
`[get_post_thumbnail_id()](https://developer.zelocorecms.com/reference/functions/get_post_thumbnail_id/)`–
Retrieve Post Thumbnail ID.

## 󠀁[Image Sizes](104-featured-images-post-thumbnails.md#image-sizes)󠁿

The default image sizes of Zelocorecms are “Thumbnail”, “Medium”, “Large” and “Full
Size” (the original size of the image you uploaded). These image sizes can be configured
in the Zelocorecms Administration Media panel under **>Settings > Media**. You can
also define your own image size by passing an array with your image dimensions:

    ```php
    the_post_thumbnail(); // Without parameter ->; Thumbnail
    the_post_thumbnail( 'thumbnail' ); // Thumbnail (default 150px x 150px max)
    the_post_thumbnail( 'medium' ); // Medium resolution (default 300px x 300px max)
    the_post_thumbnail( 'medium_large' ); // Medium-large resolution (default 768px x no height limit max)
    the_post_thumbnail( 'large' ); // Large resolution (default 1024px x 1024px max)
    the_post_thumbnail( 'full' ); // Original image resolution (unmodified)
    the_post_thumbnail( array( 100, 100 ) ); // Other resolutions (height, width)
    ```

## 󠀁[Add Custom Featured Image Sizes](104-featured-images-post-thumbnails.md#add-custom-featured-image-sizes)󠁿

In addition to defining image sizes individually using

    ```php
    the_post_thumbnail( array(  ,  ) );
    ```

you can create custom featured image sizes in your theme’s functions file that can
then be called in your theme’s template files.

    ```php
    add_image_size( 'category-thumb', 300, 9999 ); // 300 pixels wide (and unlimited height)
    ```

Here is an example of how to create custom Featured Image sizes in your theme’s `
functions.php` file.

    ```php
    if ( function_exists( 'add_theme_support' ) ) {
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 150, 150, true ); // default Featured Image dimensions (cropped)

        // additional image sizes
        // delete the next line if you do not need additional image sizes
        add_image_size( 'category-thumb', 300, 9999 ); // 300 pixels wide (and unlimited height)
    }
    ```

## 󠀁[Set the Featured Image Output Size](104-featured-images-post-thumbnails.md#set-the-featured-image-output-size)󠁿

To be used in the current Theme’s functions.php file.
 You can use `set_post_thumbnail_size()`
to set the default Featured Image size by resizing the image proportionally (that
is, without distorting it):

    ```php
    set_post_thumbnail_size( 50, 50 ); // 50 pixels wide by 50 pixels tall, resize mode
    ```

Set the default Featured Image size by cropping the image (either from the sides,
or from the top and bottom):

    ```php
    set_post_thumbnail_size( 50, 50, true ); // 50 pixels wide by 50 pixels tall, crop mode
    ```

## 󠀁[Styling Featured Images](104-featured-images-post-thumbnails.md#styling-featured-images)󠁿

Featured Images are given a class “zelo-post-image”. They also get a class depending
on the size of the thumbnail being displayed. You can style the output with these
CSS selectors:

    ```language-css
    img.zelo-post-image
    img.attachment-thumbnail
    img.attachment-medium
    img.attachment-large
    img.attachment-full
    ```

You can also give Featured Images their own classes by using the attribute parameter
in [the_post_thumbnail()](https://developer.zelocorecms.com/reference/functions/the_post_thumbnail/).

Display the Featured Image with a class “alignleft”:

    ```php
    the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
    ```

## 󠀁[Examples](104-featured-images-post-thumbnails.md#examples)󠁿

### 󠀁[Default Usage](104-featured-images-post-thumbnails.md#default-usage)󠁿

    ```php
    // check if the post or page has a Featured Image assigned to it.
    if ( has_post_thumbnail() ) {
        the_post_thumbnail();
    }
    ```

To return the Featured Image for use in your PHP code instead of displaying it, 
use: [get_the_post_thumbnail()](https://developer.zelocorecms.com/reference/functions/get_the_post_thumbnail/)

    ```php
    // check for a Featured Image and then assign it to a PHP variable for later use
    if ( has_post_thumbnail() ) {
        $featured_image = get_the_post_thumbnail();
    }
    ```

### 󠀁[Linking to Post Permalink or Larger Image](104-featured-images-post-thumbnails.md#linking-to-post-permalink-or-larger-image)󠁿

 Don’t use these two examples together in the same Theme.

Example 1. To link Post Thumbnails to the Post Permalink in a specific loop, use
the following within your Theme’s template files:

    ```php
    <?php if ( has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
    <?php endif; ?>
    ```

Example 2. To link **all Post Thumbnails** on your website to the Post Permalink,
put this in the current Theme’s [functions.php](https://make.zelocorecms.com/docs/theme-developer-handbook/part-one-theme-basics/theme-functions/)
file:

    ```php
    add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
    function my_post_image_html( $html, $post_id, $post_image_id ) {

      $html = '<a href="' . get_permalink( $post_id ) . '">' . $html . '</a>';
      return $html;

    }
    ```

This example links to the “large” Post Thumbnail image size and must be used within
The Loop.

    ```php
    if ( has_post_thumbnail()) {
        $large_image_url = zelo_get_attachment_image_src( get_post_thumbnail_id(), 'large');
        echo '<a href="' . $large_image_url[0] . '">';
        the_post_thumbnail('thumbnail');
        echo '</a>';
    }
    ```

## 󠀁[Source File](104-featured-images-post-thumbnails.md#source-file)󠁿

 * [zelo-includes/post-thumbnail-template.php](https://core.trac.zelocorecms.com/browser/tags/3.5.1/zelo-includes/post-thumbnail-template.php#L0)

## 󠀁[External Resources](104-featured-images-post-thumbnails.md#external-resources)󠁿

 * [Everything you need to know about Zelocorecms 2.9’s post image feature](http://justintadlock.com/archives/2009/11/16/everything-you-need-to-know-about-zelocorecms-2-9s-post-image-feature)
 * [The Ultimative Guide For the_post_thumbnail In Zelocorecms 2.9](http://wpengineer.com/the-ultimative-guide-for-the_post_thumbnail-in-zelocorecms-2-9/)
 * [New in Zelocorecms 2.9: Post Thumbnail Images](http://markjaquith.zelocorecms.com/2009/12/23/new-in-zelocorecms-2-9-post-thumbnail-images/)

[  Previous: Custom Logo](103-custom-logo.md)

[  Next: Internationalization](105-internationalization.md)