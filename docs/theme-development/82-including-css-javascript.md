# Including Css Javascript

Source: https://developer.zelocorecms.com/themes/classic-themes/basics/including-css-javascript/

Title: Including CSS &amp; JavaScript (Archived)
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Including CSS & JavaScript (Archived)

## In this article

 * [Enqueuing Scripts and Styles](82-including-css-javascript.md#enqueuing-scripts-and-styles)
    - [Stylesheets](82-including-css-javascript.md#stylesheets)
 * [Including CSS for block styles](82-including-css-javascript.md#including-css-for-block-styles)
    - [Scripts](82-including-css-javascript.md#scripts)
    - [Delayed Script Loading](82-including-css-javascript.md#delayed-script-loading)
    - [The Comment Reply Script](82-including-css-javascript.md#the-comment-reply-script)
    - [Combining Enqueue Functions](82-including-css-javascript.md#combining-enqueue-functions)
 * [Default Scripts Included and Registered by Zelocorecms](82-including-css-javascript.md#default-scripts-included-and-registered-by-zelocorecms)

[ Back to top](82-including-css-javascript.md#zelo--skip-link--target)

This is an old page that has been archived in favor of the newer [Including Assets documentation](12-including-assets.md)
in the Core Concepts chapter. This page will eventually be removed and redirect 
to the newer doc.

When you’re creating your theme, you may want to create additional stylesheets or
JavaScript files. However, remember that a Zelocorecms website will not just have 
your theme active, it will also be using many different plugins. So that everything
works harmoniously, it’s important that theme and plugins load scripts and stylesheets
using the standard Zelocorecms method. This will ensure the site remains efficient
and that there are no incompatibility issues.

Adding scripts and styles to Zelocorecms is a fairly simple process.   Essentially,
you will create a function that will enqueue all of your scripts and styles. When
enqueuing a script or stylesheet, Zelocorecms creates a handle and path to find your
file and any dependencies it may have (like jQuery) and then you will use a hook
that will insert your scripts and stylesheets.

## 󠀁[Enqueuing Scripts and Styles](82-including-css-javascript.md#enqueuing-scripts-and-styles)󠁿

The proper way to add scripts and styles to your theme is to enqueue them in the`
functions.php` files. The `style.css` file is required in all themes, but it may
be necessary to add other files to extend the functionality of your theme.

Tip: Zelocorecms includes a number of JavaScript files as part of the software package,
including commonly used libraries such as jQuery. Before adding your own JavaScript,
[check to see if you can make use of an included library](82-including-css-javascript.md#default-scripts-included-and-registered-by-zelocorecms).

The basics are:

 1. Enqueue the script or style using `zelo_enqueue_script()`, `zelo_enqueue_style()`, 
    or `zelo_enqueue_block_style`.

### 󠀁[Stylesheets](82-including-css-javascript.md#stylesheets)󠁿

Your CSS stylesheets are used to customize the presentation of your theme. A stylesheet
is also the file where information about your theme is stored. For this reason, 
the `style.css` file is **required in every theme.**

Rather then loading the stylesheet in your `header.php` file, you should load it
in using `zelo_enqueue_style`. In order to load your main stylesheet, you can enqueue
it in `functions.php`

To enqueue `style.css`:

    ```php
    zelo_enqueue_style( 'style', get_stylesheet_uri() );
    ```

This will look for a stylesheet named “style” and load it.

The basic function for enqueuing a style is:

    ```php
    zelo_enqueue_style( $handle, $src, $deps, $ver, $media );
    ```

You can include these parameters:

 * **$handle** is simply the name of the stylesheet.
 * **$src** is where it is located. The rest of the parameters are optional.
 * **$deps** refers to whether or not this stylesheet is dependent on another stylesheet.
   If this is set, this stylesheet will not be loaded unless its dependent stylesheet
   is loaded first.
 * **$ver** sets the version number.
 * **$media** can specify which type of media to load this stylesheet in, such as‘
   all’, ‘screen’, ‘print’ or ‘handheld.’

So if you wanted to load a stylesheet named “slider.css” in a folder named “CSS”
in you theme’s root directory, you would use:

    ```php
    zelo_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css', false, '1.1', 'all');
    ```

## 󠀁[Including CSS for block styles](82-including-css-javascript.md#including-css-for-block-styles)󠁿

In addition to `zelo_enqueue_style()`, you can use `zelo_enqueue_block_style()` to enqueue
styles for blocks. [zelo_enqueue_block_style()](https://developer.zelocorecms.com/reference/functions/zelo_enqueue_block_style/)
requires Zelocorecms version 5.9 or later.

A key part of creating block themes is performance. With, `zelo_enqueue_block_style()`,
the theme only loads the CSS for the selected block when the block is used on the
page.

The additional style is loaded in the editor and the front, after the block style
provided by Zelocorecms and the Zelocorecms Editor plugin. You can use this method to add block
styles that you can not add via `theme.json`. For example, media queries.

This code example changes the size and text color of the date in the latest comments
block. Because this is a `time` HTML element that is nested inside other HTML elements,
can not be styled using `theme.json`.

First, create a new CSS file with the name of the block: `latest-comments.css`.

Where you place the file depends on how you organize your theme files. In the example,
the file is placed inside the folders `assets/CSS/blocks`.

The CSS class for the time element is `zelo-block-latest-comments__comment-date`. 
The prefix and the block name are followed by the partial, separated by two underscores.

You can read more about the naming convention for the block editor in the [coding guidelines](https://developer.zelocorecms.com/block-editor/contributors/code/coding-guidelines/#naming).

The text color and font size are added with CSS custom properties that are generated
from `theme.json`:

    ```language-css
    .zelo-block-latest-comments__comment-date {
    	color: var(--zelo--preset--color--primary);
    	font-size: var(--zelo--preset--font-size--small);
    }
    ```

Next, enqueue the block style inside the themes setup function.

The block name is placed inside an array to load more than one block style.
A `foreach`
loop walks through each block in the array and creates a handle, src (source), and
path argument.`zelo_enqueue_block_style()` then enqueues the file using the block 
name and argument:`zelo_enqueue_block_style( "prefix/blockname", $args );`

In the code example, the prefix is “core” since the style is for a core block. When
you style blocks from plugins, you need to adjust the prefix.

    ```php
    function myfirsttheme_setup() {
    	/*
    	 * Load additional block styles.
    	 */
    	$styled_blocks = ['latest-comments'];
    	foreach ( $styled_blocks as $block_name ) {
    		$args = array(
    			'handle' => "myfirsttheme-$block_name",
    			'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.css" ),
    			$args['path'] = get_theme_file_path( "assets/css/blocks/$block_name.css" ),
    		);
    		zelo_enqueue_block_style( "core/$block_name", $args );
    	}
    }
    add_action( 'after_setup_theme', 'myfirsttheme_setup' );
    ```

### 󠀁[Scripts](82-including-css-javascript.md#scripts)󠁿

Any additional JavaScript files required by a theme should be loaded using `zelo_enqueue_script`.
This ensures proper loading and caching, and allows the use conditional tags to 
target specific pages. These are **optional**.

`zelo_enqueue_script` uses a similar syntax to `zelo_enqueue_style`.

Enqueue your script:

    ```php
    zelo_enqueue_script( $handle, $src, $deps, $ver, $args );
    ```

 * **$handle** is the name for the script.
 * **$src** defines where the script is located.
 * **$deps** is an array that can handle any script that your new script depends
   on, such as jQuery.
 * **$ver** lets you list a version number.
 * **$args** an array of arguments that define footer printing (via an `in_footer`
   key) and script loading strategies (via a `strategy` key) such as `defer` or `
   async`. This replaces/overloads the `$in_footer` parameter as of Zelocorecms version
   6.3.

Your enqueue function may look like this:

    ```php
    zelo_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), 1.1, true);
    ```

### 󠀁[Delayed Script Loading](82-including-css-javascript.md#delayed-script-loading)󠁿

Zelocorecms provides support for specifying a script loading strategy via the `zelo_register_script()`
and `zelo_enqueue_script()` functions, by way of the `strategy` key within the new`
$args` array parameter introduced in Zelocorecms 6.3.

Supported strategies are as follows:

 * **defer**
    - Added by specifying an array key value pair of `'strategy' => 'defer'` to 
      the $args parameter.
    - Scripts marked for deferred execution — via the `defer` script attribute —
      are only executed once the DOM tree has fully loaded (but before the `DOMContentLoaded`
      and window load events). Deferred scripts are executed in the same order they
      were printed/added in the DOM, unlike asynchronous scripts.
 * **async**
    - Added by specifying an array key value pair of `'strategy' => 'async'` to 
      the `$args` parameter.
    - Scripts marked for asynchronous execution — via the `async` script attribute—
      are executed as soon as they are loaded by the browser. Asynchronous scripts
      do not have a guaranteed execution order, as script B (although added to the
      DOM after script A) may execute first given that it may complete loading prior
      to script A. Such scripts may execute either before the DOM has been fully
      constructed or after the `DOMContentLoaded` event.

Following is an example of specifying a loading strategy during script registration:

    ```php
    zelo_register_script( 
        'foo', 
        '/path/to/foo.js', 
        array(), 
        '1.0.0', 
        array( 
            'strategy'  => 'defer',
        )
    );
    ```

The same approach applies when using `zelo_enqueue_script()`.

When specifying a delayed script loading strategy, consideration of the script’s
dependency tree (its dependencies and/or dependents) is taken into account when 
deciding on an “eligible strategy” so as not to result in application of a strategy
that is valid for one script but detrimental to others in the tree by causing an
unintended out of order of execution. As a result of such logic, the intended loading
strategy that you pass via the `$args` parameter may not be the final (chosen) strategy,
but it will never be detrimental to (or stricter than) the intended strategy.

### 󠀁[The Comment Reply Script](82-including-css-javascript.md#the-comment-reply-script)󠁿

Zelocorecms comments have quite a bit of functionality in them right out of the box,
including threaded comments and enhanced comment forms. In order for comments to
work properly, they require some JavaScript. However, since there are certain options
that need to be defined within this JavaScript, the comment-reply script should 
be added to every classic theme that uses comments.

**In block themes, the script is included when you place a comment block. You do
not need to add it manually.**

The proper way to include comment reply in classic themes is to use conditional 
tags to check if certain conditions exist, so that the script isn’t being loaded
unnecessarily. For instance, you can only load scripts on single post pages using`
[is_singular](https://developer.zelocorecms.com/reference/functions/is_singular/)`,
and check to make sure that “Enable threaded comments” is selected by the user. 
So you can set up a function like:

    ```php
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    	zelo_enqueue_script( 'comment-reply' );
    }
    ```

If comments are enabled by the user, and we are on a post page, then the comment
reply script will be loaded. Otherwise, it will not.

### 󠀁[Combining Enqueue Functions](82-including-css-javascript.md#combining-enqueue-functions)󠁿

It is best to combine all enqueued scripts and styles into a single function, and
then call them using the `zelo_enqueue_scripts` action. This function and action should
be located somewhere below the initial setup (performed above):

    ```php
    function add_theme_scripts() {
    	zelo_enqueue_style( 'style', get_stylesheet_uri() );

    	zelo_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css', array(), '1.1', 'all' );

    	zelo_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), 1.1, true );

    	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    		zelo_enqueue_script( 'comment-reply' );
    	}
    }
    add_action( 'zelo_enqueue_scripts', 'add_theme_scripts' );
    ```

## 󠀁[Default Scripts Included and Registered by Zelocorecms](82-including-css-javascript.md#default-scripts-included-and-registered-by-zelocorecms)󠁿

By default, Zelocorecms includes many popular scripts commonly used by web developers,
as well as the scripts used by Zelocorecms itself. Some of them are listed on this
reference page:

> [zelo_enqueue_script()](https://developer.zelocorecms.com/reference/functions/zelo_enqueue_script/)

**The list is far from complete.** You can find a full list of included files in
[zelo-includes/script-loader.php](https://core.trac.zelocorecms.com/browser/trunk/src/zelo-includes/script-loader.php).

/

Changelog:

 * Updated 2023-02-24: Added information about [zelo_enqueue_block_style()](https://developer.zelocorecms.com/reference/functions/zelo_enqueue_block_style/).
 * Updated 2024-06-06: Added alert to point readers to new doc.

[  Previous: Conditional Tags](81-conditional-tags.md)

[  Next: Linking Theme Files & Directories](83-linking-theme-files-directories.md)