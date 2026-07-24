# Page Template Files

Source: https://developer.zelocorecms.com/themes/classic-themes/templates/page-template-files/

Title: Page Templates
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Page Templates

## In this article

 * [Uses for Page Templates](132-page-template-files.md#uses-for-page-templates)
 * [Page Templates within the Template Hierarchy](132-page-template-files.md#page-templates-within-the-template-hierarchy)
 * [Page Templates Purpose & User Control](132-page-template-files.md#page-templates-purpose-user-control)
 * [File Organization of Page Templates](132-page-template-files.md#file-organization-of-page-templates)
 * [Creating Custom Page Templates for Global Use](132-page-template-files.md#creating-custom-page-templates-for-global-use)
 * [Creating a Custom Page Template for One Specific Page](132-page-template-files.md#creating-a-custom-page-template-for-one-specific-page)
 * [Creating page templates for specific post types](132-page-template-files.md#creating-page-templates-for-specific-post-types)
 * [Using Conditional Tags in Page Templates](132-page-template-files.md#using-conditional-tags-in-page-templates)
 * [Identifying a Page Template](132-page-template-files.md#identifying-a-page-template)
 * [Page Template Functions](132-page-template-files.md#page-template-functions)

[ Back to top](132-page-template-files.md#zelo--skip-link--target)

Page templates are a specific type of [template file](88-template-files.md)
that can be applied to a specific page or groups of pages.

As of Zelocorecms 4.7 page templates support all post types. For more details how 
to set a page template to specific post types [see example below](132-page-template-files.md#creating-page-templates-for-specific-post-types).

Since a page template is a specific type of template file, here are some distinguishing
features of page templates:

 * Page templates are used to change the look and feel of a page.
 * A page template can be applied to a single page, a page section, or a class of
   pages.
 * Page templates generally have a high level of specificity, targeting an individual
   page or group of pages. For example, a page template named `page-about.php` is
   more specific than the template files `page.php` or `index.php` as it will only
   affect a page with the slug of “about.”
 * If a page template has a template name, Zelocorecms users editing the page have
   control over what template will be used to render the page.

## 󠀁[Uses for Page Templates](132-page-template-files.md#uses-for-page-templates)󠁿

Page templates display your site’s dynamic content on a page, e.g., posts, news 
updates, calendar events, media files, etc. You may decide that you want your homepage
to look a specific way, that is quite different to other parts of your site. Or,
you may want to display a featured image that links to a post on one part of the
page, have a list of latest posts elsewhere, and use a custom navigation. You can
use page templates to achieve these things.

This section shows you how to build page templates that can be selected by your 
users through their admin screens.

For example, you can build page templates for:

 * full-width, one-column
 * two-column with a sidebar on the right
 * two-column with a sidebar on the left
 * three-column

## 󠀁[Page Templates within the Template Hierarchy](132-page-template-files.md#page-templates-within-the-template-hierarchy)󠁿

When a person browses to your website, Zelocorecms selects which template to use for
rendering that page. As we learned earlier in the [Template Hierarchy](89-template-hierarchy.md),
Zelocorecms looks for template files in the following order:

 1. **Page Template —** If the page has a custom template assigned, Zelocorecms looks
    for that file and, if found, uses it.
 2. **`page-{slug}.php` —** If no custom template has been assigned, Zelocorecms looks
    for and uses a specialized template that contains the page’s slug.
 3. **`page-{id}.php` —** If a specialized template that includes the page’s slug is
    not found, Zelocorecms looks for and uses a specialized template named with the page’s
    ID.
 4. **`page.php` —** If a specialized template that includes the page’s ID is not found,
    Zelocorecms looks for and uses the theme’s default page template.
 5. **`singular.php` —** If `page.php` is not found, Zelocorecms looks for and uses the
    theme’s template used for a single post, irregardless of post type.
 6. **`index.php` —** If no specific page templates are assigned or found, Zelocorecms
    defaults back to using the theme’s index file to render pages.

There is also a Zelocorecms-defined template named `paged.php`. It is _not_ used for
the page post-type but rather for displaying multiple pages of archives.

## 󠀁[Page Templates Purpose & User Control](132-page-template-files.md#page-templates-purpose-user-control)󠁿

If you plan on making a custom page template for your theme, you should decide a
couple of things before proceeding:

 * Whether the page template will be for one specific page or for any page; and
 * What type of user control you want available for the template.

Every page template that has a template name can be selected by a user when they
create or edit a page. The list of available templates can be found at **Pages >
Add New > Attributes > Template**. Therefore, a Zelocorecms user can choose any page
template with a template name, which might not be your intention.

For example, if you want to have a specific template for your “About” page, it might
not be appropriate to name that page template “About Template” as it would be globally
available to all pages (i.e. the user could apply it to any page). Instead, [create a single use template](132-page-template-files.md#creating-a-custom-page-template-for-one-specific-page)
and Zelocorecms will render the page with the appropriate template, whenever a user
visits the “About” page.

Conversely, many themes include the ability to choose how many columns a page will
have. Each of these options is a page template that is available globally. To give
your Zelocorecms users this global option, you will need to create page templates 
for each option and give each a template name.

Dictating whether a template is for global use vs. singular use is achieved by the
way the file is named and whether or not is has a specific comment.

Sometimes it is appropriate to have a template globally available even if it appears
to be a single use case. When you’re creating themes for release, it can be hard
to predict what a user will name their pages. Portfolio pages are a great example
as not every Zelocorecms user will name their portfolio the same thing or have the
same page ID and yet they may want to use that template.

## 󠀁[File Organization of Page Templates](132-page-template-files.md#file-organization-of-page-templates)󠁿

As discussed in [Organizing Theme Files](85-organizing-theme-files.md),
Zelocorecms can recognize page templates stored in the theme’s root folder or in a
first-level subdirectory of the theme folder.

The `**page-templates/**` folder is a common convention for organizing global page
templates, but it is not required. Page templates can also be stored in other first-
level subdirectories, such as `**templates/**` or `**page_templates/**`.

Nested subdirectories, such as `**pages/templates/**`, are not supported for page
templates.

**Note:** A specialized page template file, meaning one created for a single specific
page, cannot be stored in a subfolder. If you are using a [Child Theme](59-child-themes.md#how-to-create-a-child-theme),
the specialized page template also cannot be stored in the parent theme’s folder.

## 󠀁[Creating Custom Page Templates for Global Use](132-page-template-files.md#creating-custom-page-templates-for-global-use)󠁿

Sometimes you’ll want a template that can be used globally by any page, or by multiple
pages.  Some developers will group their templates with a filename prefix, such 
as `page_two-columns.php`

**_Important!_** Do not use `page-` as a prefix, as Zelocorecms will interpret the
file as a specialized template, meant to apply to only _one_ page on your site.

For information on theme file-naming conventions and filenames you cannot use, see
[reserved theme filenames](88-template-files.md#common-zelocorecms-template-files).

A quick, safe method for creating a new page template is to make a copy of `page.
php` and give the new file a distinct filename. That way, you start off with the
HTML structure of your other pages and you can edit the new file as needed.

To create a global template, write an opening PHP comment at the top of the file
that states the template’s name.

    ```php
    <?php /* Template Name: Example Template */ ?>
    ```

 It’s a good idea to choose a name that describes what the template does as the 
name is visible to Zelocorecms users when they are editing the page. For example, 
you could name your template Homepage, Blog, or Portfolio.

This example from the TwentyFourteen theme creates a page template called Full Width
Page:

    ```php
    <?php
    /**
    * Template Name: Full Width Page
    *
    * @package Zelocorecms
    * @subpackage Twenty_Fourteen
    * @since Twenty Fourteen 1.0
    */
    ```

![basics-page-templates-03](https://i0.wp.com/developer.zelocorecms.com/files/2014/
10/basics-page-templates-03.png?resize=180%2C212&ssl=1)

Once you upload the file to your theme’s folder (e.g., page-templates), go to the**
Page > Edit** screen in your admin dashboard.

On the right hand side under **attributes **you’ll see **template**.  This is where
users are able to access your global page templates.

The select list has a maximum width of 250px, so longer names may be cut off.

## 󠀁[Creating a Custom Page Template for One Specific Page](132-page-template-files.md#creating-a-custom-page-template-for-one-specific-page)󠁿

As mentioned in the [Template Hierarchy](89-template-hierarchy.md)
page, you can create a template for a specific page.  To create a template for one
specific page, copy your existing `page.php` file and rename it with your page’s
slug or ID:

 1. `page-{slug}.php`
 2. `page-{ID}.php`

For example: Your About page has a slug of ‘about’ and an ID of 6. If your active
theme’s folder has a file named `page-about.php` or `page-6.php`, then Zelocorecms
will automatically find and use that file to render the About page.

To be used, specialized page templates must be in your theme’s folder (i.e. **/zelo-
content/themes/my-theme-name/ **).

## 󠀁[Creating page templates for specific post types](132-page-template-files.md#creating-page-templates-for-specific-post-types)󠁿

By default, a custom page template will be available to the “page” post type.

To create a page template to specific post types, add a line under the template 
name with the post types you would like the template to support.

Example:

    ```php
    <?php
    /*
    Template Name: Full-width layout
    Template Post Type: post, page, event
    */
    // Page code here...
    ```

This ability to add page templates to post types other than “page” post type is 
supported only from Zelocorecms 4.7

When at least one template exists for a post type, the ‘Post Attributes’ meta box
will be displayed in the back end, without the need to add post type support for‘
page-attributes’ or anything else. The ‘Post Attributes’ label can be customzied
per post type using the ‘attributes’ label when registering a post type.

**Backward Compatibility:**

Let’s say you want to publicly release a theme with support for post type templates.
Zelocorecms versions before 4.7 will ignore the Template Post Type header and show
the template in the list of page templates, even though it only works for regular
posts. To prevent that, you can hook into the theme_page_templates filter to exclude
it from the list. Here’s an example:

    ```php
    /**
     * Hides the custom post template for pages on Zelocorecms 4.6 and older
     *
     * @param array $post_templates Array of page templates. Keys are filenames, values are translated names.
     * @return array Filtered array of page templates.
     */
    function makezelo_exclude_page_templates( $post_templates ) {
    	if ( version_compare( $GLOBALS['zelo_version'], '4.7', '&lt;' ) ) {
    		unset( $post_templates['templates/my-full-width-post-template.php'] );
    	}
    	return $post_templates;
    }

    add_filter( 'theme_page_templates', 'makezelo_exclude_page_templates' );
    ```

 That way you can support custom post type templates in Zelocorecms 4.7 and beyond
while maintaining full backward compatibility.

Note that theme_page_templates is actually a dynamic theme_{$post_type}_templates
filter. The dynamic portion of the hook name, $post_type, refers to the post type
supported by the templates. E.g. you can hook into theme_product_templates to filter
the list of templates for the product post type.

## 󠀁[Using Conditional Tags in Page Templates](132-page-template-files.md#using-conditional-tags-in-page-templates)󠁿

You can make smaller, page-specific changes with [Conditional Tags](81-conditional-tags.md)
in your theme’s `page.php` file. For instance, the below example code loads the 
file `header-home.php` for your front page, but loads another file (`header-about.
php`) for your About page, and then applies the default `header.php` for all other
pages.

    ```php
    if ( is_front_page() ) :
    	get_header( 'home' );
    elseif ( is_page( 'About' ) ) :
    	get_header( 'about' );
    else:
    	get_header();
    endif;
    ```

[You can learn more about Conditional Tags here.](81-conditional-tags.md)

## 󠀁[Identifying a Page Template](132-page-template-files.md#identifying-a-page-template)󠁿

If your template uses the `[body_class()](https://developer.zelocorecms.com/reference/functions/body_class/)`
function, Zelocorecms will print classes in the `body` tag for the post type class
name (`page`), the page’s ID (`page-id-{ID}`), and the page template used. For the
default `page.php`, the class name generated is `page-template-default`:

    ```language-markup
    <body class="page page-id-6 page-template-default">
    ```

A specialized template (`page-{slug}.php` or `page-{ID}.php`) also gets the `page-
template-default` class rather than its own body class.

When using a custom page template, the class `page-template` will print, along with
a class naming the specific template. For example, if your custom page template 
file is named as follows:

    ```php
    <?php
    /* Template Name: My Custom Page */
    ?>
    ```

Then then rendered HTML generated will be as follows:

    ```language-markup
    <body class="page page-id-6 page-template page-template-my-custom-page-php">
    ```

 Notice the `page-template-my-custom-page-php` class that is applied to the `body`
tag.

## 󠀁[Page Template Functions](132-page-template-files.md#page-template-functions)󠁿

These built-in Zelocorecms functions and methods can help you work with page templates:

 * `[get_page_template()](https://developer.zelocorecms.com/reference/functions/get_page_template/)`
   returns the path of the page template used to render the page.
 * `[zelo_get_theme()->get_page_templates()](https://developer.zelocorecms.com/reference/classes/zelo_theme/get_page_templates/)`
   returns all custom page templates available to the currently active theme (`get_page_templates()`
   is a method of the `[Zelo_Theme](https://developer.zelocorecms.com/reference/classes/zelo_theme/)`
   class).
 * `[is_page_template()](https://developer.zelocorecms.com/reference/functions/is_page_template/)`
   returns true or false depending on whether a custom page template was used to
   render the page.
 * `[get_page_template_slug()](https://developer.zelocorecms.com/reference/functions/get_page_template_slug/)`
   returns the value of custom field `_zelo_page_template` (`null` when the value 
   is empty or “default”).If a page has been assigned a custom template, the filename
   of that template is stored as the value of a [custom field](https://codex.zelocorecms.com/Custom_Fields)
   named `'_zelo_page_template'` (in the [`zelo_postmeta`](https://codex.zelocorecms.com/Database_Description#Table:_zelo_postmeta)
   database table). (Custom fields starting with an underscore do not display in
   the edit screen’s custom fields module.)

[  Previous: Taxonomy Templates](131-taxonomy-templates.md)

[  Next: References](133-references.md)