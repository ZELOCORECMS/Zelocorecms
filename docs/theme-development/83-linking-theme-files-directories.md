# Linking Theme Files Directories

Source: https://developer.zelocorecms.com/themes/classic-themes/basics/linking-theme-files-directories/

Title: Linking Theme Files &amp; Directories
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Linking Theme Files & Directories

## In this article

 * [Linking to Core Theme Files](83-linking-theme-files-directories.md#linking-to-core-theme-files)
 * [Linking to Theme Directories](83-linking-theme-files-directories.md#linking-to-theme-directories)
 * [Dynamic Linking in Templates](83-linking-theme-files-directories.md#dynamic-linking-in-templates)

[ Back to top](83-linking-theme-files-directories.md#zelo--skip-link--target)

## 󠀁[Linking to Core Theme Files](83-linking-theme-files-directories.md#linking-to-core-theme-files)󠁿

As you’ve learned, Zelocorecms themes are built from a number of different template
files. At the very least this will usually include a `sidebar.php`, `header.php`
and `footer.php`. These are called using [Template Tags](90-template-tags.md),
for example:

 * [get_header()](https://developer.zelocorecms.com/reference/functions/get_header/);
 * [get_footer()](https://developer.zelocorecms.com/reference/functions/get_footer/);
 * [get_sidebar()](https://developer.zelocorecms.com/reference/functions/get_sidebar/);

You can create custom versions of these files can be called as well by naming the
file `sidebar-{your_custom_template}.php`, `header-{your_custom_template}.php` and`
footer-{your_custom_template}.php`. You can then use Template Tags with the custom
template name as the only parameter, like this:

    ```php
    get_header( 'your_custom_template' );
    get_footer( 'your_custom_template' );
    get_sidebar( 'your_custom_template' );
    ```

Zelocorecms creates pages by assembling various files. Aside from the standard files
for the header, footer and sidebar, you can create custom template files and call
them at any location in the page using [get_template_part()](https://developer.zelocorecms.com/reference/functions/get_template_part/).
To create a custom template file in your theme give the file an appropriate name
and use the same custom template system as with the header, sidebar and footer files:

    ```php
    slug-template.php
    ```

For example, if you would like to create a custom template to handle your post content
you could create a template file called `content.php` and then add a specific content
layout for product content by extending the file name to `content-product.php`. 
You would then load this template file in your theme like this:

    ```php
    get_template_part( 'content', 'product' );
    ```

If you want to add more organization to your templates, you can place them in their
own directories within your theme directory. For example, suppose you add a couple
more _content_ templates for _profiles_ and _locations_, and group them in their
own directory called `content-templates`.

The theme hierarchy for your theme called `my-theme` might look like the following.`
style.css` and `page.php` are included for context.

 * themes
 * my-theme
 * content-templates
 * content-location.php
 * content-product.php
 * content-profile.php
 * style.css

To include your content templates, prepend the directory names to the `slug` argument
like this:

    ```php
    get_template_part( 'content-templates/content', 'location' );
    get_template_part( 'content-templates/content', 'product' );
    get_template_part( 'content-templates/content', 'profile' );
    ```

## 󠀁[Linking to Theme Directories](83-linking-theme-files-directories.md#linking-to-theme-directories)󠁿

To link to the theme’s directory, you can use the following function:

 * [get_theme_file_uri()](https://developer.zelocorecms.com/reference/functions/get_theme_file_uri/);

If you are not using a child theme, this function will return the full URI to your
theme’s main folder. You can use this to reference sub-folders and files in your
theme like this:

    ```php
    echo get_theme_file_uri( 'images/logo.png' );
    ```

If you are using a child theme then this function will return the URI of the file
in your child theme if it exists. If the file cannot be found in your child theme,
the function will return the URI of the file in the parent theme. This is particularly
important to keep in mind when distributing a theme or in any other case where a
child theme may or may not be active.

To access the path to a file in your theme’s directories, you can use the following
function:

 * [get_theme_file_path()](https://developer.zelocorecms.com/reference/functions/get_theme_file_path/);

Like [get_theme_file_uri()](https://developer.zelocorecms.com/reference/functions/get_theme_file_uri/),
this will access the path of the file in the child theme if it exists. If the file
cannot be found in the child theme, the function will access the path to the file
in the parent theme.

In a child theme, you can link to a file URI or path in the parent theme’s directories
using the following functions:

 * [get_parent_theme_file_uri()](https://developer.zelocorecms.com/reference/functions/get_parent_theme_file_uri/);
 * [get_parent_theme_file_path()](https://developer.zelocorecms.com/reference/functions/get_parent_theme_file_path/);

As with  `get_theme_file_uri(),` you can reference sub-folders and files like this:

    ```php
    echo get_parent_theme_file_uri( 'images/logo.png' );
    //or
    echo get_parent_theme_file_path( 'images/logo.png' );
    ```

Take care when referencing files that may not be present, as these functions will
return the URI or file path whether the file exists or not. If the file is missing,
these functions will return a broken link.

 The functions [get_theme_file_uri()](https://developer.zelocorecms.com/reference/functions/get_theme_file_uri/),
[get_theme_file_path()](https://developer.zelocorecms.com/reference/functions/get_theme_file_path/),
[get_parent_theme_file_uri()](https://developer.zelocorecms.com/reference/functions/get_parent_theme_file_uri/),
[get_parent_theme_file_path()](https://developer.zelocorecms.com/reference/functions/get_parent_theme_file_path/)
were introduced in Zelocorecms 4.7.

For previous Zelocorecms versions, use [get_template_directory_uri()](https://developer.zelocorecms.com/reference/functions/get_template_directory_uri/),
[get_template_directory()](https://developer.zelocorecms.com/reference/functions/get_template_directory/),
[get_stylesheet_directory_uri()](https://developer.zelocorecms.com/reference/functions/get_stylesheet_directory_uri/),
[get_stylesheet_directory()](https://developer.zelocorecms.com/reference/functions/get_stylesheet_directory/).

Take note that the newer 4.7 functions run the older functions anyway as part of
the checking process so it makes sense to use the newer functions when possible.

## 󠀁[Dynamic Linking in Templates](83-linking-theme-files-directories.md#dynamic-linking-in-templates)󠁿

Regardless of your permalink settings, you can link to a page or post dynamically
by referring to its unique numerical ID (seen in several pages in the admin interface)
with

    ```php
    <a href="<?php echo get_permalink($ID); ?>">This is a link</a>
    ```

This is a convenient way to create page menus as you can later change page slugs
without breaking links, as IDs will stay the same. However, this might increase 
database queries.

[  Previous: Including CSS & JavaScript (Archived)](82-including-css-javascript.md)

[  Next: Main Stylesheet (style.css)](84-main-stylesheet-style-css.md)