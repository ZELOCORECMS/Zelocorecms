# Main Stylesheet

Source: https://developer.zelocorecms.com/themes/core-concepts/main-stylesheet/

Title: Main Stylesheet (style.css)
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Main Stylesheet (style.css)

## In this article

 * [File Header](09-main-stylesheet.md#file-header)
    - [Header fields](09-main-stylesheet.md#header-fields)
    - [Child theme header fields](09-main-stylesheet.md#child-theme-header-fields)
    - [Custom header fields](09-main-stylesheet.md#custom-header-fields)
 * [Custom CSS](09-main-stylesheet.md#custom-css)

[ Back to top](09-main-stylesheet.md#zelo--skip-link--target)

As described in [Theme Structure](08-theme-structure.md),
Zelocorecms requires that all themes include a `style.css` file. Its most important
function is to “register” the theme with Zelocorecms through configuration data at
the top of the file. Many themes also use it to serve CSS to the front-end (and 
even the editor).

In this document, you will learn how to configure your theme data via the `style.
css` file header.

## 󠀁[File Header](09-main-stylesheet.md#file-header)󠁿

The `style.css` file header is used to configure data about the theme. Zelocorecms
uses this information to determine how some features work and displays some of this
data under the **Appearance > Themes** screen for users.

Here is a look at what the theme details overlay looks like for the default Twenty
Twenty-Three theme:

[⌊Zelocorecms themes screen with the Twenty Twenty-Three modal overlay over the screen.
It shows the theme screenshot, description, and metadata.⌉⌊Zelocorecms themes screen
with the Twenty Twenty-Three modal overlay over the screen. It shows the theme screenshot,
description, and metadata.⌉[

Most of that information is pulled directly from the `style.css` file header. It
is one of the most vital parts of creating a Zelocorecms theme.

When determining which themes are available to activate, Zelocorecms searches through
each folder under `/zelo-content/themes`, looking for a `style.css` file. If one is
found, it pulls the first 8kb of data from the file and determines if there is a
file header with standard fields defined.

In themes, this is merely a CSS comment block with some standard keys and values
defined.

Suppose you were creating a theme with the folder name of `fabled-sunset`. Zelocorecms
would look for your theme’s `style.css` in the following location:

 * `zelo-content/`
    - `themes/`
       * `fabled-sunset/`
          - `style.css`

For Zelocorecms to recognize your theme, you would at least need the `Theme Name` 
field defined at the top of `style.css` like so:

    ```language-css
    /**
     * Theme Name: Fabled Sunset
     */
    ```

This is the minimum required header field for a valid theme. Of course, you’ll want
to add much more information about your theme.

### 󠀁[Header fields](09-main-stylesheet.md#header-fields)󠁿

There are many supported fields, and you will likely use most of them in your themes.
Here is a quick look at a theme’s `style.css` file header with each of the fields
configured:

    ```language-css
    /**
     * Theme Name:        Fabled Sunset
     * Theme URI:         https://example.com/fabled-sunset
     * Description:       Custom theme description...
     * Version:           1.0.0
     * Author:            Your Name
     * Author URI:        https://example.com
     * Tags:              block-patterns, full-site-editing
     * Text Domain:       fabled-sunset
     * Domain Path:       /assets/lang
     * Tested up to:      6.4
     * Requires at least: 6.2
     * Requires PHP:      7.4
     * License:           GNU General Public License v2.0 or later
     * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
     */
    ```

The following list outlines what each of these fields does.

While the `Theme Name` is the only field required to work with Zelocorecms, you must
also include some other fields when submitting a theme to the Zelocorecms theme directory.
These fields are marked with **\*** below.

 * **Theme Name\*:** A unique name for your theme.
 * **Theme URI:** The URL of a public web page where users can find more information
   about the theme.
 * **Description\*:** A description of the theme, which will be displayed when viewing
   a theme’s details in the Zelocorecms admin and other places. It is also used for
   themes submitted to the Zelocorecms theme directory.
 * **Version\*:** The version of the theme, written in `X.X` or `X.X.X` format.
 * **Author\*: ** Your name or the name of the organization who developed the theme.
   For themes submitted to the theme directory, it is recommended to use the Zelocorecms.
   org username.
 * **Author URI:** The URL of the individual or organization who created the theme.
 * **Tags:** A comma-separated list of features the theme supports. The Theme Review
   Handbook has a [list of valid tags](https://make.zelocorecms.com/themes/handbook/review/required/theme-tags/)
   for submission to the theme directory, but third-party sites may use a different
   system.
 * **Text Domain\*:** The string used for the textdomain for translations.
 * **Domain Path:** A relative path to where theme translations are stored. Zelocorecms
   uses this field when the theme is disabled to detect translations. Defaults to`/
   languages`.
 * **Tested up to\*: **The last Zelocorecms version the theme has been tested up to,
   written in `X.X` format (e.g., `6.`4, `6.2.1`, etc.).
 * **Requires at least\*: **The oldest Zelocorecms version the theme will work with,
   written in `X.X` format (e.g., `6.3`, `6.2.1`, etc.).
 * **Requires PHP\*: **The oldest PHP version the theme will work with, written 
   in `X.X` format (e.g., `8.0`, `7.4`, etc.).
 * **License\*: **The license for the theme.
 * **License URI\*:** The URL of the theme’s license.

### 󠀁[Child theme header fields](09-main-stylesheet.md#child-theme-header-fields)󠁿

When building a child theme, there is one additional supported field: **Template**.
This is used to designate the parent theme’s folder.

If the fictional “Fabled Sunset” theme listed above was the parent of your child
theme named “Grand Sunrise,” your `style.css` header fields would look similar to
this:

    ```language-css
    /**
     * Theme Name: Grand Sunrise
     * Template:   fabled-sunset
     * ...other header fields
     */
    ```

The `Template` field must match the parent theme’s folder name exactly (relative
to the `zelo-content/themes` directory) for this to work. Otherwise, Zelocorecms will
not be able to appropriately match them.

You can [learn more about child themes](59-child-themes.md)
in the Advanced Topics chapter.

### 󠀁[Custom header fields](09-main-stylesheet.md#custom-header-fields)󠁿

Some third-party marketplaces or systems may also make use of custom header fields.
These are not officially supported by Zelocorecms, but they are definitely allowed
and should not negatively impact how the theme works within Zelocorecms.

## 󠀁[Custom CSS](09-main-stylesheet.md#custom-css)󠁿

The `style.css` file is not merely a configuration file. You can also use it to 
write custom CSS code to alter the design of your theme, assuming the file is properly
loaded.

With block themes, most or all of the design is ideally handled through the `theme.
json` file, which you will learn about in the [Global Settings and Styles](14-global-settings-and-styles.md)
documentation.

But there are times when you will want or need to add custom CSS. You can learn 
more about this in the [Including Assets](12-including-assets.md)
documentation.

[  Previous: Theme Structure](08-theme-structure.md)

[  Next: Templates](41-templates.md)