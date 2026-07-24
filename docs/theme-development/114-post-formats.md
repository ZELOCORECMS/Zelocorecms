# Post Formats

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/post-formats/

Title: Post Formats
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Post Formats

## In this article

 * [Supported Formats](114-post-formats.md#supported-formats)
 * [Function Reference](114-post-formats.md#function-reference)
    - [Main Functions](114-post-formats.md#main-functions)
    - [Other Functions](114-post-formats.md#other-functions)
 * [Adding Theme Support](114-post-formats.md#adding-theme-support)
 * [Adding Post Type Support](114-post-formats.md#adding-post-type-support)
 * [Using Formats](114-post-formats.md#using-formats)
    - [Suggested Styling](114-post-formats.md#suggested-styling)
    - [Formats in a Child Theme](114-post-formats.md#formats-in-a-child-theme)

[ Back to top](114-post-formats.md#zelo--skip-link--target)

A Post Format is used by a theme for presenting posts in a certain format and style.
The Post Formats feature provides a standardized list of formats available to all
themes that support the feature. A theme may not support every format on the list;
in such a case, it is good form to make this known to users.

A theme cannot introduce formats not on the standardized list, even through plugins.
This standardization ensures compatibility between themes and a way for external
tools to use the feature in a consistent fashion.

In short, with a theme that supports Post Formats, a blogger can change how a post
looks by choosing a Post Format.

Using **Asides** as an example, in the past, a category called Asides was created,
and posts were assigned that category, and then displayed differently based on styling
rules from [post_class()](https://developer.zelocorecms.com/reference/functions/post_class/)
or from [in_category(‘asides’)](https://developer.zelocorecms.com/reference/functions/in_category/).

With **Post Formats**, the new approach allows a theme to add support for a Post
Format (e.g. [add_theme_support(‘post-formats’, array(‘aside’))](https://developer.zelocorecms.com/reference/functions/add_theme_support/)),
and then the post format can be selected in the Publish meta box when saving the
post. A function call of [get_post_format($post->ID)](https://developer.zelocorecms.com/reference/functions/get_post_format/)
can be used to determine the format, and [post_class()](https://developer.zelocorecms.com/reference/functions/post_class/)
will also create the “format-asides” class, for pure-css styling.

## 󠀁[Supported Formats](114-post-formats.md#supported-formats)󠁿

The following Post Formats are available, if supported by the theme.

Note that while actual post content won’t change, the theme can display a post differently
based on the format chosen. How posts are displayed is entirely up to the theme,
but here are some general guidelines on typical uses for the different Post Formats.

 * **aside** – Typically styled without a title. Similar to a Facebook note update.
 * **gallery** – A gallery of images. Post will likely contain a gallery shortcode
   and will have image attachments.
 * **link** – A link to another site. Themes may wish to use the first <a href=””
   > tag in the post content as the external link for that post. An alternative 
   approach could be if the post consists only of a URL, then that will be the URL
   and the title (post_title) will be the name attached to the anchor for it.
 * **image** – A single image. The first <img /> tag in the post could be considered
   the image. Alternatively, if the post consists only of a URL, that will be the
   image URL and the title of the post (post_title) will be the title attribute 
   for the image.
 * **quote** – A quotation. Probably will contain a blockquote holding the quote
   content. Alternatively, the quote may be just the content, with the source/author
   being the title.
 * **status** – A short status update, similar to a Twitter status update.
 * **video** – A single video. The first <video /> tag or object/embed in the post
   content could be considered the video. Alternatively, if the post consists only
   of a URL, that will be the video URL. May also contain the video as an attachment
   to the post, if video support is enabled on the blog (like via a plugin).
 * **audio** – An audio file. Could be used for Podcasting.
 * **chat** – A chat transcript, like so:

    ```bash
    John: foo
    Mary: bar
    John: foo 2
    ```

When writing or editing a Post, “Standard” designates that no Post Format is specified.
Also if an invalid format is specified, “Standard” (no format) is applied by default.

## 󠀁[Function Reference](114-post-formats.md#function-reference)󠁿

### 󠀁[Main Functions](114-post-formats.md#main-functions)󠁿

 * [set_post_format()](https://developer.zelocorecms.com/reference/functions/set_post_format/)
 * [get_post_format()](https://developer.zelocorecms.com/reference/functions/get_post_format/)
 * [has_post_format()](https://developer.zelocorecms.com/reference/functions/has_post_format/)

### 󠀁[Other Functions](114-post-formats.md#other-functions)󠁿

 * [get_post_format_link()](https://developer.zelocorecms.com/reference/functions/get_post_format_link/)
 * [get_post_format_string()](https://developer.zelocorecms.com/reference/functions/get_post_format_string/)

## 󠀁[Adding Theme Support](114-post-formats.md#adding-theme-support)󠁿

Themes need to use [add_theme_support()](https://developer.zelocorecms.com/reference/functions/add_theme_support/)
in the _functions.php_ file to tell Zelocorecms which post formats to support by passing
an array of formats like so:

    ```php
    <?php
    function themename_post_formats_setup() {
    	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
    }
    add_action( 'after_setup_theme', 'themename_post_formats_setup' );
    ```

The [after_setup_theme](https://developer.zelocorecms.com/reference/hooks/after_setup_theme/)
hook is used so that the post formats support is registered after the theme has 
loaded.

## 󠀁[Adding Post Type Support](114-post-formats.md#adding-post-type-support)󠁿

Post Types need to use [add_post_type_support()](https://developer.zelocorecms.com/reference/functions/add_post_type_support/)
in the _functions.php_ file to tell Zelocorecms which post formats to support:

    ```php
    <?php
    function themename_custom_post_formats_setup() {
    	// add post-formats to post_type 'page'
    	add_post_type_support( 'page', 'post-formats' );
    	// add post-formats to post_type 'my_custom_post_type'
    	add_post_type_support( 'my_custom_post_type', 'post-formats' );
    }
    add_action( 'init', 'themename_custom_post_formats_setup' );
    ```

Or in the function [register_post_type()](https://developer.zelocorecms.com/reference/functions/register_post_type/),
add ‘post-formats’, in ‘supports’ parameter array:

    ```php
    <?php
    $args = array(
    	'supports' => array( 'title', 'editor', 'author', 'post-formats' ),
    );
    register_post_type( 'book', $args );
    ```

[add_post_type_support](https://developer.zelocorecms.com/reference/functions/add_post_type_support/)
should be hooked to [init](https://developer.zelocorecms.com/reference/hooks/init/)
hook, as custom post types may not have been registered at [after_setup_theme](https://developer.zelocorecms.com/reference/hooks/after_setup_theme/).

## 󠀁[Using Formats](114-post-formats.md#using-formats)󠁿

In the theme, use [get_post_format()](https://developer.zelocorecms.com/reference/functions/get_post_format/)
to check the format for a post, and change its presentation accordingly. Note that
posts with the default format will return a value of FALSE. Alternatively, use the
[has_post_format()](https://developer.zelocorecms.com/reference/functions/has_post_format/)
[conditional tag](81-conditional-tags.md):

    ```php
    <?php
    if ( has_post_format( 'video' ) ) {
    	echo 'This is the video format.';
    }
    ```

### 󠀁[Suggested Styling](114-post-formats.md#suggested-styling)󠁿

An alternate approach to formats is through styling rules. Themes should use the
[post_class()](https://developer.zelocorecms.com/reference/functions/post_class/) 
function in the wrapper code that surrounds the post to add dynamic styling classes.
Post formats will cause extra classes to be added in this manner, using the “format-
foo” name.

For example, one could hide post titles from status format posts by putting this
in your theme’s stylesheet:

    ```language-css
    .format-status .post-title {
         display: none;
    }
    ```

Each of the formats lend themselves to a certain type of “style”, as dictated by
modern usage. It is well to keep in mind the intended usage for each format when
applying styles.

For example, the aside, link, and status formats are simple, short, and minor. These
will typically be displayed without title or author information. The aside could
contain perhaps a paragraph or two, while the link would be only a sentence with
a link to a URL in it. Both the link and aside might have a link to the single post
page (using [the_permalink()](https://developer.zelocorecms.com/reference/functions/the_permalink/))
and would thus allow comments, but the status format very likely would not have 
such a link.

An image post, on the other hand, would typically just contain a single image, with
or without a caption/text to go along with it. An audio/video post would be the 
same but with audio/video added in. Any of these three could use either plugins 
or standard [Embeds](https://codex.zelocorecms.com/Embeds) to display their content.
Titles and authorship might not be displayed for them either, as the content could
be self-explanatory.

The quote format is especially well suited to posting a simple quote from a person
with no extra information. If you were to put the quote into the post content alone,
and put the quoted person’s name into the title of the post, then you could style
the post so as to display [the_content()](https://developer.zelocorecms.com/reference/functions/the_content/)
by itself but restyled into a blockquote format, and use [the_title()](https://developer.zelocorecms.com/reference/functions/the_title/)
to display the quoted person’s name as the byline.

A chat in particular will probably tend towards a monospaced type display, in many
cases. With some styling on the .format-chat, you can make it display the content
of the post using a monospaced font, perhaps inside a gray background div or similar,
thus distinguishing it visually as a chat session.

### 󠀁[Formats in a Child Theme](114-post-formats.md#formats-in-a-child-theme)󠁿

[Child Themes](59-child-themes.md)
inherit the post formats defined by the parent theme. Calling [add_theme_support()](https://developer.zelocorecms.com/reference/functions/add_theme_support/)
for post formats in a child theme must be done at a later priority than that of 
the parent theme and will **override** the existing list, not add to it.

    ```php
    <?php
    add_action( 'after_setup_theme', 'childtheme_formats', 11 );
    function childtheme_formats() {
    	 add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link' ) );
    }
    ```

Calling [remove_theme_support(‘post-formats’)](https://developer.zelocorecms.com/reference/functions/remove_theme_support/)
will remove it all together.

[  Previous: Pagination](113-pagination.md)

[  Next: Sidebars](115-sidebars.md)