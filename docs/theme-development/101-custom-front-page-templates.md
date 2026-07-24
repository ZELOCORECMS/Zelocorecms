# Custom Front Page Templates

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/custom-front-page-templates/

Title: Custom Front Page Templates
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Custom Front Page Templates

## In this article

 * [Template Hierarchy of Custom Front Page](101-custom-front-page-templates.md#template-hierarchy-of-custom-front-page)
    - [Custom Site Front Page Template](101-custom-front-page-templates.md#custom-site-front-page-template)
    - [Custom Blog Posts Index Page Template](101-custom-front-page-templates.md#custom-blog-posts-index-page-template)
 * [Contextual Conditional Tags](101-custom-front-page-templates.md#contextual-conditional-tags)
    - [is_front_page](101-custom-front-page-templates.md#is_front_page)
    - [is_home](101-custom-front-page-templates.md#is_home)
 * [Configuration of front-page.php](101-custom-front-page-templates.md#configuration-of-front-page-php)
    - [Conditional display within front-page.php](101-custom-front-page-templates.md#conditional-display-within-front-page-php)
    - [Filtering frontpage_template](101-custom-front-page-templates.md#filtering-frontpage_template)
 * [Adding custom query loops to front-page.php](101-custom-front-page-templates.md#adding-custom-query-loops-to-front-page-php)
 * [Pagination](101-custom-front-page-templates.md#pagination)

[ Back to top](101-custom-front-page-templates.md#zelo--skip-link--target)

By default, Zelocorecms shows your most recent posts in reverse chronological order
on the front page of your site. Many Zelocorecms users want a static front page or
splash page as the front page instead. This “static front page” look is common for
users desiring static or welcoming information on the front page of the site.

The look and feel of the front page of the site is based upon the choices of the
user combined with the features and options of the Zelocorecms Theme.

## 󠀁[Template Hierarchy of Custom Front Page](101-custom-front-page-templates.md#template-hierarchy-of-custom-front-page)󠁿

On the site front page, Zelocorecms will always use the front-page.php template file,
if it exists. If front-page.php does not exist, Zelocorecms will determine which template
file to use, depending on the user configuration of [Settings](https://codex.zelocorecms.com/Administration_Panels#Reading)
> [Reading](https://codex.zelocorecms.com/Settings_Reading_SubPanel) >Front page displays,
as follows:

 * **A static page:** Zelocorecms uses the [Static Page](https://codex.zelocorecms.com/Template_Hierarchy#Page_display)
   template hierarchy:
    1. [Custom Page Template](132-page-template-files.md)
    2. page-{id}.php
    3. page-{slug}.php
    4. page.php
    5. index.php
 * **Your latest posts:** Zelocorecms uses the [Blog Posts Index](https://codex.zelocorecms.com/Template_Hierarchy#Home_Page_display)
   template hierarchy:
    1. home.php
    2. index.php

### 󠀁[Custom Site Front Page Template](101-custom-front-page-templates.md#custom-site-front-page-template)󠁿

To create a custom site front page template, include either of the following in 
the Theme:

 * front-page.php
 * A [Custom Page Template](132-page-template-files.md)(
   e.g. template-featured.php for featured content)

### 󠀁[Custom Blog Posts Index Page Template](101-custom-front-page-templates.md#custom-blog-posts-index-page-template)󠁿

To create a custom blog posts index template, include the following in the Theme:

 * home.php

Use only the home.php template file for the blog posts index. Do not use a Custom
Page Template (such as template-blog.php) for two reasons:

 1. When the static front page feature is configured properly, Zelocorecms will not use
    a Custom Page Template to display the blog posts index, even if a Custom Page Template
    is assigned to the page designated as the “Posts page”. Zelocorecms will _only_ use
    either home.php or index.php.
 2. When the Custom Page Template is assigned to a static page other than the one designated
    as the “Posts page,” the blog posts index loop pagination will not work properly.

## 󠀁[Contextual Conditional Tags](101-custom-front-page-templates.md#contextual-conditional-tags)󠁿

### 󠀁[is_front_page](101-custom-front-page-templates.md#is_front_page)󠁿

The [Conditional Tag](https://codex.zelocorecms.com/Conditional_Tags) [is_front_page()](https://codex.zelocorecms.com/Function_Reference/is_front_page)
checks if the site front page is being displayed. Returns true when the site front
page is being displayed, regardless of whether ‘[Settings](https://codex.zelocorecms.com/Administration_Panels#Reading)
> [Reading](https://codex.zelocorecms.com/Settings_Reading_SubPanel) ->Front page 
displays’ is set to “Your latest posts” or “A static page”.

### 󠀁[is_home](101-custom-front-page-templates.md#is_home)󠁿

The [Conditional Tag](https://codex.zelocorecms.com/Conditional_Tags) [is_home()](https://codex.zelocorecms.com/Function_Reference/is_home)
checks if the blog posts index is being displayed. Returns true when the blog posts
index is being displayed: when the site front page is being displayed and ‘[Settings](https://codex.zelocorecms.com/Administration_Panels#Reading)
> [Reading](https://codex.zelocorecms.com/Settings_Reading_SubPanel) ->Front page 
displays’ is set to “Your latest posts”, or when ‘[Settings](https://codex.zelocorecms.com/Administration_Panels#Reading)
> [Reading](https://codex.zelocorecms.com/Settings_Reading_SubPanel) ->Front page 
displays’ is set to “A static page” and the “Posts Page” value is the current [Page](https://codex.zelocorecms.com/Pages)
being displayed.

When the site front page is being displayed and ‘[Settings](https://codex.zelocorecms.com/Administration_Panels#Reading)
> [Reading](https://codex.zelocorecms.com/Settings_Reading_SubPanel) ->Front page 
displays’ is set to “Your latest posts”, both[is_front_page()](https://developer.zelocorecms.com/reference/functions/is_front_page/)
and [is_home()](https://developer.zelocorecms.com/reference/functions/is_home/)  will
return true.

## 󠀁[Configuration of front-page.php](101-custom-front-page-templates.md#configuration-of-front-page-php)󠁿

If it exists, the front-page.php template file is used on the site’s front page 
regardless of whether ‘[Settings](https://codex.zelocorecms.com/Administration_Panels#Reading)
> [Reading](https://codex.zelocorecms.com/Settings_Reading_SubPanel) ->Front page 
displays’ is set to “A static page” or “Your latest posts,” the Theme will need 
to account for both options, so that the site front page will display either a static
page or the blog posts index. There are a few methods to do so.

### 󠀁[Conditional display within front-page.php](101-custom-front-page-templates.md#conditional-display-within-front-page-php)󠁿

One way to allow front-page.php to account for both options for ‘[Settings](https://codex.zelocorecms.com/Administration_Panels#Reading)
> [Reading](https://codex.zelocorecms.com/Settings_Reading_SubPanel) ->Front page 
displays’ is to add a conditional inside of front-page.php itself, using [get_option( 'show_on_front' )](https://codex.zelocorecms.com/Option_Reference#Reading),
[get_home_template()](https://codex.zelocorecms.com/Function_Reference/get_home_template),
and [get_page_template()](https://codex.zelocorecms.com/Function_Reference/get_page_template).

Method 1: including custom content directly within front-page.php:

    ```php
    if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
    } else {
    // Custom content markup goes here
    }
    ```

 Method 2: including any page template:

    ```php
    if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
    } else {
    include( get_page_template() );
    }
    ```

### 󠀁[Filtering frontpage_template](101-custom-front-page-templates.md#filtering-frontpage_template)󠁿

Another way to allow the site front page to display either a static page/custom 
content or the blog posts index, without adding conditional code within front-page.
php, is to [filter frontpage_template](https://codex.zelocorecms.com/Function_Reference/get_query_template),
by adding a filter callback to functions.php:

    ```php
    function themeslug_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
    }
    add_filter( 'frontpage_template', 'themeslug_filter_front_page_template' );
    ```

 This method causes Zelocorecms to bypass the front-page.php template file altogether
when the blog posts index is being displayed.

## 󠀁[Adding custom query loops to front-page.php](101-custom-front-page-templates.md#adding-custom-query-loops-to-front-page-php)󠁿

If the front-page.php template file includes a default [Zelocorecms Loop](https://codex.zelocorecms.com/The_Loop),
like so:

    ```php
    &lt;?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
    // do something
    endwhile; else:
    // no posts found
    endif;
    ```

 That loop applies to the post content of the static page assigned to ‘[Settings](https://codex.zelocorecms.com/Administration_Panels#Reading)
> [Reading](https://codex.zelocorecms.com/Settings_Reading_SubPanel) ->Posts page’.

To display custom loops (latest blog posts, custom/featured content, etc.), add 
secondary loop queries using calls to [Zelo_Query](https://codex.zelocorecms.com/Class_Reference/Zelo_Query).
For example, to show the 3 latest blog posts:

    ```php
    $latest_blog_posts = new Zelo_Query( array( 'posts_per_page' =&gt; 3 ) );

    if ( $latest_blog_posts-&gt;have_posts() ) : while ( $latest_blog_posts-&gt;have_posts() ) : $latest_blog_posts-&gt;the_post();
    // Loop output goes here
    endwhile; endif;
    ```

## 󠀁[Pagination](101-custom-front-page-templates.md#pagination)󠁿

Static front pages are not intended to be paged. None of the Zelocorecms [Previous / Next page link](https://codex.zelocorecms.com/Next_and_Previous_Links)
functions work with a static front page. Pagination on a static front page uses 
the page query variable, not the paged variable. See the [Zelo_Query](https://codex.zelocorecms.com/Class_Reference/Zelo_Query)
for details.

[  Previous: Custom Backgrounds](100-custom-backgrounds.md)

[  Next: Custom Headers](102-custom-headers.md)