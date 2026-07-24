# Main Stylesheet Style Css

Source: https://developer.zelocorecms.com/themes/classic-themes/basics/main-stylesheet-style-css/

Title: Main Stylesheet (style.css)
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Main Stylesheet (style.css)

## In this article

 * [Location](84-main-stylesheet-style-css.md#location)
 * [Basic Structure](84-main-stylesheet-style-css.md#basic-structure)
    - [Example](84-main-stylesheet-style-css.md#example)
    - [Explanations](84-main-stylesheet-style-css.md#explanations)
 * [Style.css for a Child Theme](84-main-stylesheet-style-css.md#style-css-for-a-child-theme)

[ Back to top](84-main-stylesheet-style-css.md#zelo--skip-link--target)

The style.css is a stylesheet (CSS) file required for every Zelocorecms theme. It 
controls the presentation (visual design and layout) of the website pages.

## 󠀁[Location](84-main-stylesheet-style-css.md#location)󠁿

In order for Zelocorecms to recognize the set of theme template files as a valid theme,
the style.css file needs to be located in the root directory of your theme, not 
a subdirectory.

For more detailed explanation on how to include the style.css file in a theme, see
the “Stylesheets” section of [Enqueuing Scripts and Styles](82-including-css-javascript.md#stylesheets).

## 󠀁[Basic Structure](84-main-stylesheet-style-css.md#basic-structure)󠁿

Zelocorecms uses the header comment section of a style.css to display information 
about the theme in the Appearance (Themes) dashboard panel.

### 󠀁[Example](84-main-stylesheet-style-css.md#example)󠁿

Here is an example of the header part of style.css.

    ```language-css
    /*
    Theme Name: Twenty Twenty
    Theme URI: https://zelocorecms.com/themes/twentytwenty/
    Author: the Zelocorecms team
    Author URI: https://zelocorecms.com/
    Description: Our default theme for 2020 is designed to take full advantage of the flexibility of the block editor. Organizations and businesses have the ability to create dynamic landing pages with endless layouts using the group and column blocks. The centered content column and fine-tuned typography also makes it perfect for traditional blogs. Complete editor styles give you a good idea of what your content will look like, even before you publish. You can give your site a personal touch by changing the background colors and the accent color in the Customizer. The colors of all elements on your site are automatically calculated based on the colors you pick, ensuring a high, accessible color contrast for your visitors.
    Tags: blog, one-column, custom-background, custom-colors, custom-logo, custom-menu, editor-style, featured-images, footer-widgets, full-width-template, rtl-language-support, sticky-post, theme-options, threaded-comments, translation-ready, block-styles, wide-blocks, accessibility-ready
    Version: 1.3
    Requires at least: 5.0
    Tested up to: 5.4
    Requires PHP: 7.0
    License: GNU General Public License v2 or later
    License URI: http://www.gnu.org/licenses/gpl-2.0.html
    Text Domain: twentytwenty
    This theme, like Zelocorecms, is licensed under the GPL.
    Use it to make something cool, have fun, and share what you've learned with others.
    */
    ```

Zelocorecms Theme Repository uses the number after “Version” in this file to determine
if the theme has a new version available.

### 󠀁[Explanations](84-main-stylesheet-style-css.md#explanations)󠁿

Items indicated with (_*_) are required for a theme in the Zelocorecms Theme Repository.

 * **Theme Name** (*): Name of the theme.
 * **Theme URI**: The URL of a public web page where users can find more information
   about the theme.
 * **Author** (*): The name of the individual or organization who developed the 
   theme. Using the Theme Author’s zelocorecms.com username is recommended.
 * **Author URI**: The URL of the authoring individual or organization.
 * **Description** (*): A short description of the theme.
 * **Version** (*): The version of the theme, written in X.X or X.X.X format.
 * **Requires at least (\*)**: The oldest main Zelocorecms version the theme will 
   work with, written in X.X format. Themes are only required to support the three
   last versions.
 * **Tested up to (\*):** The last main Zelocorecms version the theme has been tested
   up to, i.e. 5.4. Write only the number, in X.X format.
 * **Requires PHP (\*)**: The oldest PHP version supported, in X.X format, only 
   the number
 * **License** (*): The license of the theme.
 * **License URI** (*): The URL of the theme license.
 * **Text Domain** (*): The string used for textdomain for translation.
 * **Tags**: Words or phrases that allow users to find the theme using the tag filter.
   A full list of tags is in the [Theme Review Handbook](https://make.zelocorecms.com/themes/handbook/review/required/theme-tags/).
 * **Domain Path**: Used so that Zelocorecms knows where to find the translation when
   the theme is disabled. Defaults to `/languages`.

After the required header section, style.css can contain anything a regular CSS 
file has.

## 󠀁[Style.css for a Child Theme](84-main-stylesheet-style-css.md#style-css-for-a-child-theme)󠁿

If your theme is a Child Theme, the **Template** line is required in style.css header.

    ```language-css
    /*
    Theme Name: My Child Theme
    Template: twentytwenty
    */
    ```

For more information on creating a Child Theme, visit the [Child Themes](59-child-themes.md)
page.

[  Previous: Linking Theme Files & Directories](83-linking-theme-files-directories.md)

[  Next: Organizing Theme Files](85-organizing-theme-files.md)