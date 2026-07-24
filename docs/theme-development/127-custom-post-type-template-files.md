# Custom Post Type Template Files

Source: https://developer.zelocorecms.com/themes/classic-themes/templates/custom-post-type-template-files/

Title: Custom Post Type Template Files
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Custom Post Type Template Files

## In this article

 * [Custom Post Type – Template Hierarchy](127-custom-post-type-template-files.md#custom-post-type-template-hierarchy)
 * [Custom Post Type templates](127-custom-post-type-template-files.md#custom-post-type-templates)
 * [Function Reference](127-custom-post-type-template-files.md#function-reference)

[ Back to top](127-custom-post-type-template-files.md#zelo--skip-link--target)

The Zelocorecms theme system supports custom [templates](88-template-files.md)
for custom post types. Custom templates for the single display of posts belonging
to custom post types have been supported since Zelocorecms [Version 3.0](https://codex.zelocorecms.com/Version_3.0)
and the support for custom templates for archive displays was added in [Version 3.1](https://codex.zelocorecms.com/Version_3.1).

## 󠀁[Custom Post Type – Template Hierarchy](127-custom-post-type-template-files.md#custom-post-type-template-hierarchy)󠁿

Zelocorecms will work through the [template hierarchy](89-template-hierarchy.md)
and use the template file it comes across first. So if you want to create a custom
template for your `acme_product` custom post type, a good place to start is by copying
the `single.php` file, saving it as `single-acme_product.php` and editing that.

However if you don’t want to create custom template files, Zelocorecms will use the
files already present in your theme, which would be `archive.php` and `single.php`
and `index.php` files.

Single posts and their archives can be displayed using the `single.php` and `archive.
php` template files respectively,

 * single posts of a custom post type will use **single-{post_type}.php**
 * and their archives will use **archive-{post_type}.php**
 * and if you don’t have this post type archive page you can pass **BLOG_URL?post_type
   ={post_type}**

where `{post_type}` is the `$post_type` argument of the [register_post_type()](https://developer.zelocorecms.com/reference/functions/register_post_type/)
function.

So for the above example, you could create `single-acme_product.php` and `archive-
acme_product.php` template files for single product posts and their archives.

Alternatively, you can use the `is_post_type_archive()` function in any template
file to check if the query shows an archive page of a given post types(s), and the`
post_type_archive_title()` to display the post type title.

## 󠀁[Custom Post Type templates](127-custom-post-type-template-files.md#custom-post-type-templates)󠁿

 * **single-{post-type}.php**
   The single post template used when a visitor requests
   a single post from a custom post type. For example, `single-acme_product.php`
   would be used for displaying single posts from a custom post type named `acme_product`.
 * **archive-{post-type}.php**
   The archive post type template is used when visitors
   request a custom post type archive. For example, `archive-acme_product.php` would
   be used for displaying an archive of posts from the custom post type named `acme_product`.
   The `archive.php` template file is used if the `archive-{post-type}.php` is not
   present.
 * **index.php**
   The `index.php` is used if a specific query template (`single-{
   post-type}.php, single.php, archive-{post-type}.php, archive.php, search.php`)
   for the custom post type is not present.

## 󠀁[Function Reference](127-custom-post-type-template-files.md#function-reference)󠁿

 * [register_post_type()](https://developer.zelocorecms.com/reference/functions/register_post_type/):
   Registers a post type.
 * [is_post_type_archive()](https://developer.zelocorecms.com/reference/functions/is_post_type_archive/):
   Checks if the query for an existing post type archive page.
 * [post_type_archive_title()](https://developer.zelocorecms.com/reference/functions/post_type_archive_title/):
   Display or retrieve title for a post type archive.

[  Previous: Attachment Template Files](126-attachment-template-files.md)

[  Next: Partial and Miscellaneous Template Files](128-partial-and-miscellaneous-template-files.md)