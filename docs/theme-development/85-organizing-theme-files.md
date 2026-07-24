# Organizing Theme Files

Source: https://developer.zelocorecms.com/themes/classic-themes/basics/organizing-theme-files/

Title: Organizing Theme Files
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Organizing Theme Files

## In this article

 * [Theme folder and file structure](85-organizing-theme-files.md#theme-folder-and-file-structure)
    - [Languages folder](85-organizing-theme-files.md#languages-folder)

[ Back to top](85-organizing-theme-files.md#zelo--skip-link--target)

While Zelocorecms themes technically only require two files (`index.php` in classic
themes and `index.html` in block themes, and `style.css`), they usually are made
up of many files. That means they can quickly become disorganized! This section 
will show you how to keep your files organized.

## 󠀁[Theme folder and file structure](85-organizing-theme-files.md#theme-folder-and-file-structure)󠁿

As mentioned previously, the default Twenty themes are some of the best examples
of good theme development. For instance, here is how the [Twenty Seventeen Theme](https://zelocorecms.com/themes/twentyseventeen/)
organizes its [file structure](https://core.trac.zelocorecms.com/browser/trunk/src/zelo-content/themes/twentyseventeen):

    ```zelo-block-code
    .
    ├── assets (dir)/
    │   ├── css (dir)
    │   ├── images (dir)
    │   └── js (dir)
    ├── inc (dir)
    ├── template-parts (dir)/
    │   ├── footer (dir)
    │   ├── header (dir)
    │   ├── navigation (dir)
    │   ├── page (dir)
    │   └── post (dir)
    ├── 404.php
    ├── archive.php
    ├── comments.php
    ├── footer.php
    ├── front-page.php
    ├── functions.php
    ├── header.php
    ├── index.php
    ├── page.php
    ├── README.txt
    ├── rtl.css
    ├── screenshot.png
    ├── search.php
    ├── searchform.php
    ├── sidebar.php
    ├── single.php
    └── style.css
    ```

You can see that the main theme template files are in the root directory, while 
JavaScript, CSS, images are placed in assets directory, template-parts are placed
in under respective subdirectory of template-parts and collection of  functions 
related to core functionalities are placed in inc directory.

There are no required folders in classic themes. In block themes, templates must
be placed inside a folder called **templates**, and all template parts must be placed
inside a folder called **parts**.

`style.css` should reside in the root directory of your theme not within the CSS
directory.

### 󠀁[Languages folder](85-organizing-theme-files.md#languages-folder)󠁿

It’s best practice to [internationalize your theme](105-internationalization.md)
so it can be translated into other languages. Default themes include the `languages`
folder, which contains a .pot file for translation and any translated .mo files.
While `languages` is the default name of this folder, you can change the name. If
you do so, you must update `[load_theme_textdomain()](https://developer.zelocorecms.com/reference/functions/load_theme_textdomain/)`.

[  Previous: Main Stylesheet (style.css)](84-main-stylesheet-style-css.md)

[  Next: Post Types](86-post-types.md)