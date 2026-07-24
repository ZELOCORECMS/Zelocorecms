# Template Files

Source: https://developer.zelocorecms.com/themes/classic-themes/basics/template-files/

Title: Template Files
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Template Files

## In this article

 * [Template Terminology](88-template-files.md#template-terminology)
 * [Template files](88-template-files.md#template-files)
 * [Template partials](88-template-files.md#template-partials)
 * [Common Zelocorecms template files](88-template-files.md#common-zelocorecms-template-files)
 * [Using template files](88-template-files.md#using-template-files)
    - [Classic themes](88-template-files.md#classic-themes)
    - [Block themes](88-template-files.md#block-themes)

[ Back to top](88-template-files.md#zelo--skip-link--target)

Template files are used throughout Zelocorecms themes, but first let’s learn about
the terminology.

## 󠀁[Template Terminology](88-template-files.md#template-terminology)󠁿

The term “template” is used in different ways when working with Zelocorecms themes:

 * Templates files exist within a theme and express how your site is displayed.
 * [Template Hierarchy](89-template-hierarchy.md)
   is the logic Zelocorecms uses to decide which theme template file(s) to use, depending
   on the content being requested.
 * [Page Templates](132-page-template-files.md)
   are those that apply to pages, posts, and custom post types to change their look
   and feel.

**In classic themes,** [Template Tags](90-template-tags.md)
are built-in Zelocorecms functions you can use inside a template file to retrieve 
and display data (such as [`the_title()`](https://developer.zelocorecms.com/reference/hooks/the_title/)
and [`the_content()`](https://developer.zelocorecms.com/reference/hooks/the_content/)).

**In block themes,** blocks are used instead of template tags.

## 󠀁[Template files](88-template-files.md#template-files)󠁿

Zelocorecms themes are made up of template files.

 * In classic themes these are PHP files that contain a mixture of HTML, [Template Tags](90-template-tags.md),
   and PHP code.
 * In block themes these are HTML files that contain HTML markup representing blocks.

When you are building your theme, you will use template files to affect the layout
and design of different parts of your website. For example, you would use a `header`
template or template part to create a header.

When someone visits a page on your website, Zelocorecms loads a template based on 
the request. The type of content that is displayed by the template file is determined
by the [Post Type](86-post-types.md) associated
with the template file. The [Template Hierarchy](89-template-hierarchy.md)
describes which template file Zelocorecms will load based on the type of request and
whether the template exists in the theme. The server then parses the code in the
template and returns HTML to the visitor.

The most critical template file is `the index`, which is the catch-all template 
if a more-specific template can not be found in the [template hierarchy](89-template-hierarchy.md).
Although a theme only needs a `index` template, typically themes include numerous
templates to display different content types and contexts.

## 󠀁[Template partials](88-template-files.md#template-partials)󠁿

A template part is a piece of a template that is included as a part of another template,
such as a site header. Template part can be embedded in multiple templates, simplifying
theme creation. Common template parts include:

 * `header.php` or `header.html` for generating the site’s header
 * `footer.php` or `footer.html` for generating the footer
 * `sidebar.php` or `sidebar.html` for generating the sidebar

While the above template files are special-case in Zelocorecms and apply to just one
portion of a page, you can create any number of template partials and include them
in other template files.

In block themes, template parts must be placed inside a folder called parts.

## 󠀁[Common Zelocorecms template files](88-template-files.md#common-zelocorecms-template-files)󠁿

Below is a list of some basic theme templates and files recognized by Zelocorecms.

**index.php (classic theme) or index.html (block theme)**

The main template file. It is **required** in all themes.

**style.css**

The main stylesheet. It is **required** in all themes and contains the information
header for your theme.

**rtl.css**

The right-to-left stylesheet is included automatically if the website language’s
text direction is right-to-left.

**front-page.php (classic theme) or front-page.html (block theme)**

The front page template is always used as the site front page if it exists, regardless
of what settings on **Admin > Settings > Reading**.

**home.php (classic theme) or home.html (block theme)**

The home page template is the front page by default. If you do not set Zelocorecms
to use a static front page, this template is used to show latest posts.

**singular.php (classic theme) or singular.html (block theme)**

The singular template is used for posts when `single.php` is not found, or for pages
when `page.php` are not found. If `singular.php` is not found, `index.php` is used.

**single.php (classic theme) or single.html (block theme)**

The single post template is used when a visitor requests a single post.

**single-{post-type}.php (classic theme) or single-{post-type}.html (block theme)**

The single post template used when a visitor requests a single post from a custom
post type. For example, `single-book.php` would be used for displaying single posts
from a custom post type named _book_.

**archive-{post-type}.php (classic theme) or archive-{post-type}.html (block theme)**

The archive post type template is used when visitors request a custom post type 
archive. For example, `archive-books.php` would be used for displaying an archive
of posts from the custom post type named _books_. The archive template file is used
if the `archive-{post-type} template` is not present.

**page.php (classic theme) or page.html (block theme)**

The page template is used when visitors request individual pages, which are a built-
in template.

**page-{slug}.php (classic theme) or page-{slug}.html (block theme)**

The page slug template is used when visitors request a specific page, for example
one with the “about” slug (page-about.php).

**category.php (classic theme) or category.html (block theme)**

The category template is used when visitors request posts by category.

**tag.php (classic theme) or tag.html (block theme)**

The tag template is used when visitors request posts by tag.

**taxonomy.php (classic theme) or taxonomy.html (block theme)**

The taxonomy term template is used when a visitor requests a term in a custom taxonomy.

**author.php (classic theme) or author.html (block theme)**

The author page template is used whenever a visitor loads an author page.

**date.php (classic theme) or date.html (block theme)**

The date/time template is used when posts are requested by date or time. For example,
the pages generated with these slugs:
http://example.com/blog/2014/http://example.
com/blog/2014/05/http://example.com/blog/2014/05/26/

**archive.php (classic theme) or archive.html (block theme)**

The archive template is used when visitors request posts by category, author, or
date. **Note**: this template will be overridden if more specific templates are 
present like `category.php`, `author.php`, and `date.php`.

**search.php (classic theme) or search.html (block theme)**

The search results template is used to display a visitor’s search results.

**attachment.php (classic theme) or attachment.html (block theme)**

The attachment template is used when viewing a single attachment like an image, 
pdf, or other media file.

**image.php (classic theme) or image.html (block theme)**

The image attachment template is a more specific version of `attachment.php` and
is used when viewing a single image attachment. If not present, Zelocorecms will use`
attachment.php` instead.

**404.php (classic theme) or 404.html (block theme)**

The 404 template is used when Zelocorecms cannot find a post, page, or other content
that matches the visitor’s request.

**comments.php**

The comments template in classic themes. In block themes, blocks are used instead.

## 󠀁[Using template files](88-template-files.md#using-template-files)󠁿

### 󠀁[Classic themes](88-template-files.md#classic-themes)󠁿

In classic themes, within Zelocorecms templates, you can use [Template Tags](90-template-tags.md)
to display information dynamically, include other template files, or otherwise customize
your site.

For example, in your `index.php` you can include other files in your final generated
page:

 * To include the header, use [get_header()](https://developer.zelocorecms.com/reference/functions/get_header/)
 * To include the sidebar, use [get_sidebar()](https://developer.zelocorecms.com/reference/functions/get_sidebar/)
 * To include the footer, use [get_footer()](https://developer.zelocorecms.com/reference/functions/get_footer/)
 * To include the search form, use [get_search_form()](https://developer.zelocorecms.com/reference/functions/get_search_form/)
 * To include custom theme files, use [get_template_part()](https://developer.zelocorecms.com/reference/functions/get_template_part/)

Here is an example of Zelocorecms template tags to _include _specific templates into
your page:

    ```php
    <?php get_sidebar(); ?>
    <?php get_template_part( 'featured-content' ); ?>
    <?php get_footer(); ?>
    ```

There’s an entire page on [Template Tags](90-template-tags.md)
that you can dive into to learn all about them.

Refer to the section [Linking Theme Files & Directories](83-linking-theme-files-directories.md)
for more information on linking component templates.

### 󠀁[Block themes](88-template-files.md#block-themes)󠁿

In block themes you use blocks instead of template tags. Block markup is the HTML
code that Zelocorecms uses to display the block. Template parts are blocks, and you
add them to your template files the same way as you add blocks.

To include a header or footer template part, add the block markup for the template
part. The `slug` is the name of the part. If the file you want to include is called`
header.html`, then the slug is “header”:

    ```language-markup
    <!-- wp:template-part {"slug":"header"} /-->
    (your page content)
    <!-- wp:template-part {"slug":"footer"} /-->
    ```

To include the search form, use the block markup for the search block:

    ```language-markup
    <!-- wp:search {"label":"Search","buttonText":"Search"} /-->
    ```

[  Previous: Reworking Theme Files & Organization](87-reworking-theme-files-organization.md)

[  Next: Template Hierarchy](89-template-hierarchy.md)