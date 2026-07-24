# List Of Conditional Tags

Source: https://developer.zelocorecms.com/themes/classic-themes/references/list-of-conditional-tags/

Title: List of Conditional Tags
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# List of Conditional Tags

## In this article

 * [Complete List of Conditional Tags](135-list-of-conditional-tags.md#complete-list-of-conditional-tags)
 * [The Conditions For …](135-list-of-conditional-tags.md#the-conditions-for)
    - [The Main Page](135-list-of-conditional-tags.md#the-main-page)
    - [The Front Page](135-list-of-conditional-tags.md#the-front-page)
    - [The Blog Page](135-list-of-conditional-tags.md#the-blog-page)
    - [A Single Post Page](135-list-of-conditional-tags.md#a-single-post-page)
    - [A PAGE Page](135-list-of-conditional-tags.md#a-page-page)
    - [Has Post Thumbnail](135-list-of-conditional-tags.md#has-post-thumbnail)
    - [A Single Page, a Single Post, an Attachment or Any Other Custom Post Type](135-list-of-conditional-tags.md#a-single-page-a-single-post-an-attachment-or-any-other-custom-post-type)
    - [A Category Page](135-list-of-conditional-tags.md#a-category-page)
    - [A Tag Page](135-list-of-conditional-tags.md#a-tag-page)
    - [A Taxonomy Page (and related)](135-list-of-conditional-tags.md#a-taxonomy-page-and-related)
    - [An Author Page](135-list-of-conditional-tags.md#an-author-page)
    - [A Date Page](135-list-of-conditional-tags.md#a-date-page)
    - [Any Archive Page](135-list-of-conditional-tags.md#any-archive-page)
    - [A Search Result Page](135-list-of-conditional-tags.md#a-search-result-page)
    - [A 404 Not Found Page](135-list-of-conditional-tags.md#a-404-not-found-page)
    - [Is Dynamic SideBar](135-list-of-conditional-tags.md#is-dynamic-sidebar)
    - [Is Sidebar Active](135-list-of-conditional-tags.md#is-sidebar-active)
    - [Is Widget Active](135-list-of-conditional-tags.md#is-widget-active)
    - [Is User Logged in](135-list-of-conditional-tags.md#is-user-logged-in)
    - [Email Exists](135-list-of-conditional-tags.md#email-exists)
    - [Username Exists](135-list-of-conditional-tags.md#username-exists)
    - [A Paged Page](135-list-of-conditional-tags.md#a-paged-page)
    - [Right To Left Reading](135-list-of-conditional-tags.md#right-to-left-reading)
    - [An Attachment](135-list-of-conditional-tags.md#an-attachment)
    - [Attachment Is Image](135-list-of-conditional-tags.md#attachment-is-image)
    - [A Local Attachment](135-list-of-conditional-tags.md#a-local-attachment)
    - [Post Type Exists](135-list-of-conditional-tags.md#post-type-exists)
    - [Is Main Query](135-list-of-conditional-tags.md#is-main-query)
    - [A New Day](135-list-of-conditional-tags.md#a-new-day)
    - [A Syndication](135-list-of-conditional-tags.md#a-syndication)
    - [A Trackback](135-list-of-conditional-tags.md#a-trackback)
    - [A Preview](135-list-of-conditional-tags.md#a-preview)
    - [Has An Excerpt](135-list-of-conditional-tags.md#has-an-excerpt)
    - [Has A Nav Menu Assigned](135-list-of-conditional-tags.md#has-a-nav-menu-assigned)
    - [Is Blog Installed](135-list-of-conditional-tags.md#is-blog-installed)
    - [Part of a Network (Multisite)](135-list-of-conditional-tags.md#part-of-a-network-multisite)
    - [An Active Plugin](135-list-of-conditional-tags.md#an-active-plugin)
    - [A Child Theme](135-list-of-conditional-tags.md#a-child-theme)
    - [Theme supports a feature](135-list-of-conditional-tags.md#theme-supports-a-feature)
    - [Is Previewed in the Customizer](135-list-of-conditional-tags.md#is-previewed-in-the-customizer)

[ Back to top](135-list-of-conditional-tags.md#zelo--skip-link--target)

Conditional Tags are a boolean data type that can be used in your Template Files
to alter the display of content depending on the conditions that the current page
matches. They tell Zelocorecms what code to display under specific conditions. Conditional
Tags usually work with PHP [if](http://php.net/manual/en/control-structures.if.php)/
[else](http://php.net/manual/en/control-structures.else.php) Conditional Statements
and have a close relation with Zelocorecms [Template Hierarchy](https://codex.zelocorecms.com/Template_Hierarchy).

**Warning: You can only use conditional query tags after the [Zelo_Query](https://developer.zelocorecms.com/reference/classes/zelo_query/)
is set up or with an [action hook](https://codex.zelocorecms.com/Plugin_API/Action_Reference#Actions_Run_During_a_Typical_Request).**

## 󠀁[Complete List of Conditional Tags](135-list-of-conditional-tags.md#complete-list-of-conditional-tags)󠁿

 * [is_front_page()](https://codex.zelocorecms.com/Function_Reference/is_front_page)
 * [is_home()](https://codex.zelocorecms.com/Function_Reference/is_home)
 * [is_front_page()](https://codex.zelocorecms.com/Function_Reference/is_front_page)
 * [is_home()](https://codex.zelocorecms.com/Function_Reference/is_home)
 * [is_admin()](https://codex.zelocorecms.com/Function_Reference/is_admin)
 * [is_network_admin()](https://codex.zelocorecms.com/Function_Reference/is_network_admin)
 * [is_admin_bar_showing()](https://codex.zelocorecms.com/Function_Reference/is_admin_bar_showing)
 * [is_single()](https://codex.zelocorecms.com/Function_Reference/is_single)
 * [is_sticky()](https://codex.zelocorecms.com/Function_Reference/is_sticky)
 * [is_post_type_hierarchical( $post_type )](https://codex.zelocorecms.com/Function_Reference/is_post_type_hierarchical)
 * [is_post_type_archive()](https://codex.zelocorecms.com/Function_Reference/is_post_type_archive)
 * [is_comments_popup()](https://codex.zelocorecms.com/Function_Reference/is_comments_popup)
 * [comments_open()](https://codex.zelocorecms.com/Function_Reference/comments_open)
 * [pings_open()](https://codex.zelocorecms.com/Function_Reference/pings_open)
 * [is_page()](https://codex.zelocorecms.com/Function_Reference/is_page)
 * [is_page_template()](https://codex.zelocorecms.com/Function_Reference/is_page_template)
 * [is_category( $category )](https://codex.zelocorecms.com/Function_Reference/is_category)
 * [is_tag()](https://codex.zelocorecms.com/Function_Reference/is_tag)
 * [is_tax()](https://codex.zelocorecms.com/Function_Reference/is_tax)
 * [has_term()](https://codex.zelocorecms.com/Function_Reference/has_term)
 * [term_exists( $term, $taxonomy, $parent )](https://codex.zelocorecms.com/Function_Reference/term_exists)
 * [is_taxonomy_hierarchical( $taxonomy )](https://codex.zelocorecms.com/Function_Reference/is_taxonomy_hierarchical)
 * [taxonomy_exists( $taxonomy )](https://codex.zelocorecms.com/Function_Reference/taxonomy_exists)
 * [is_author()](https://codex.zelocorecms.com/Function_Reference/is_author)
 * [is_date()](https://codex.zelocorecms.com/Function_Reference/is_date)
 * [is_year()](https://codex.zelocorecms.com/Function_Reference/is_year)
 * [is_month()](https://codex.zelocorecms.com/Function_Reference/is_month)
 * [is_day()](https://codex.zelocorecms.com/Function_Reference/is_day)
 * [is_time()](https://codex.zelocorecms.com/Function_Reference/is_time)
 * [is_new_day()](https://codex.zelocorecms.com/Function_Reference/is_new_day)
 * [is_archive()](https://codex.zelocorecms.com/Function_Reference/is_archive)
 * [is_search()](https://codex.zelocorecms.com/Function_Reference/is_search)
 * [is_404()](https://codex.zelocorecms.com/Function_Reference/is_404)
 * [is_paged()](https://codex.zelocorecms.com/Function_Reference/is_paged)
 * [is_attachment()](https://codex.zelocorecms.com/Function_Reference/is_attachment)
 * [zelo_attachment_is_image( $post_id )](https://codex.zelocorecms.com/Function_Reference/zelo_attachment_is_image)
 * [is_local_attachment( $url )](https://codex.zelocorecms.com/Function_Reference/is_local_attachment)
 * [is_singular()](https://codex.zelocorecms.com/Function_Reference/is_singular)
 * [post_type_exists( $post_type )](https://codex.zelocorecms.com/Function_Reference/post_type_exists)
 * [is_main_query()](https://codex.zelocorecms.com/Function_Reference/is_main_query)
 * [is_new_day()](https://codex.zelocorecms.com/Function_Reference/is_new_day)
 * [is_feed()](https://codex.zelocorecms.com/Function_Reference/is_feed)
 * [is_trackback()](https://codex.zelocorecms.com/Function_Reference/is_trackback)
 * [is_preview()](https://codex.zelocorecms.com/Function_Reference/is_preview)
 * [in_the_loop()](https://codex.zelocorecms.com/Function_Reference/in_the_loop)
 * [is_dynamic_sidebar()](https://codex.zelocorecms.com/Function_Reference/is_dynamic_sidebar)
 * [is_active_sidebar()](https://codex.zelocorecms.com/Function_Reference/is_active_sidebar)
 * [is_active_widget( $widget_callback, $widget_id )](https://codex.zelocorecms.com/Function_Reference/is_active_widget)
 * [is_blog_installed()](https://codex.zelocorecms.com/Function_Reference/is_blog_installed)
 * [is_rtl()](https://codex.zelocorecms.com/Function_Reference/is_rtl)
 * [is_multisite()](https://codex.zelocorecms.com/Function_Reference/is_multisite)
 * [is_main_site()](https://codex.zelocorecms.com/Function_Reference/is_main_site)
 * [is_super_admin()](https://codex.zelocorecms.com/Function_Reference/is_super_admin)
 * [is_user_logged_in()](https://codex.zelocorecms.com/Function_Reference/is_user_logged_in)
 * [email_exists( $email )](https://codex.zelocorecms.com/Function_Reference/email_exists)
 * [username_exists( $username )](https://codex.zelocorecms.com/Function_Reference/username_exists)
 * [is_plugin_active( $path )](https://codex.zelocorecms.com/Function_Reference/is_plugin_active)
 * [is_plugin_inactive( $path )](https://codex.zelocorecms.com/Function_Reference/is_plugin_inactive)
 * [is_plugin_active_for_network( $path )](https://codex.zelocorecms.com/Function_Reference/is_plugin_active_for_network)
 * [is_plugin_page()](https://codex.zelocorecms.com/Function_Reference/is_plugin_page)
 * [is_child_theme()](https://codex.zelocorecms.com/Function_Reference/is_child_theme)
 * [current_theme_supports()](https://codex.zelocorecms.com/Function_Reference/current_theme_supports)
 * [has_post_thumbnail( $post_id )](https://codex.zelocorecms.com/Function_Reference/has_post_thumbnail)
 * [zelo_script_is( $handle, $list )](https://codex.zelocorecms.com/Function_Reference/zelo_script_is)

## 󠀁[The Conditions For …](135-list-of-conditional-tags.md#the-conditions-for)󠁿

All of the Conditional Tags test to see whether a certain condition is met, and 
then returns either TRUE or FALSE. The conditions under which various tags output
TRUE is listed below. Those tags which can accept parameters are so noted.

### 󠀁[The Main Page](135-list-of-conditional-tags.md#the-main-page)󠁿

 * [is_home()](https://codex.zelocorecms.com/Function_Reference/is_home)

### 󠀁[The Front Page](135-list-of-conditional-tags.md#the-front-page)󠁿

 * [is_front_page()](https://codex.zelocorecms.com/Function_Reference/is_front_page)

### 󠀁[The Blog Page](135-list-of-conditional-tags.md#the-blog-page)󠁿

 * [is_front_page()](https://codex.zelocorecms.com/Function_Reference/is_front_page)
 * [is_home()](https://codex.zelocorecms.com/Function_Reference/is_home)

### 󠀁[A Single Post Page](135-list-of-conditional-tags.md#a-single-post-page)󠁿

 * [is_single()](https://codex.zelocorecms.com/Function_Reference/is_single)

### 󠀁[A PAGE Page](135-list-of-conditional-tags.md#a-page-page)󠁿

 * [is_page()](https://codex.zelocorecms.com/Function_Reference/is_page)
 * [is_page_template()](https://codex.zelocorecms.com/Function_Reference/is_page_template)

### 󠀁[Has Post Thumbnail](135-list-of-conditional-tags.md#has-post-thumbnail)󠁿

 * [has_post_thumbnail( $post_id )](https://codex.zelocorecms.com/Function_Reference/has_post_thumbnail)

### 󠀁[A Single Page, a Single Post, an Attachment or Any Other Custom Post Type](135-list-of-conditional-tags.md#a-single-page-a-single-post-an-attachment-or-any-other-custom-post-type)󠁿

 * [is_singular()](https://codex.zelocorecms.com/Function_Reference/is_singular)

### 󠀁[A Category Page](135-list-of-conditional-tags.md#a-category-page)󠁿

 * [is_category( $category )](https://codex.zelocorecms.com/Function_Reference/is_category)

### 󠀁[A Tag Page](135-list-of-conditional-tags.md#a-tag-page)󠁿

 * [is_tag()](https://codex.zelocorecms.com/Function_Reference/is_tag)
 * [has_tag()](https://codex.zelocorecms.com/Function_Reference/has_tag)

### 󠀁[A Taxonomy Page (and related)](135-list-of-conditional-tags.md#a-taxonomy-page-and-related)󠁿

 * [is_tax()](https://codex.zelocorecms.com/Function_Reference/is_tax)
 * [has_term()](https://codex.zelocorecms.com/Function_Reference/has_term)
 * [term_exists( $term, $taxonomy, $parent )](https://codex.zelocorecms.com/Function_Reference/term_exists)
 * [is_taxonomy_hierarchical( $taxonomy )](https://codex.zelocorecms.com/Function_Reference/is_taxonomy_hierarchical)
 * [taxonomy_exists( $taxonomy )](https://codex.zelocorecms.com/Function_Reference/taxonomy_exists)

### 󠀁[An Author Page](135-list-of-conditional-tags.md#an-author-page)󠁿

 * [is_author()](https://codex.zelocorecms.com/Function_Reference/is_author)

### 󠀁[A Date Page](135-list-of-conditional-tags.md#a-date-page)󠁿

 * [is_date()](https://codex.zelocorecms.com/Function_Reference/is_date)
 * [is_year()](https://codex.zelocorecms.com/Function_Reference/is_year)
 * [is_month()](https://codex.zelocorecms.com/Function_Reference/is_month)
 * [is_day()](https://codex.zelocorecms.com/Function_Reference/is_day)
 * [is_time()](https://codex.zelocorecms.com/Function_Reference/is_time)
 * [is_new_day()](https://codex.zelocorecms.com/Function_Reference/is_new_day)

### 󠀁[Any Archive Page](135-list-of-conditional-tags.md#any-archive-page)󠁿

 * [is_archive()](https://codex.zelocorecms.com/Function_Reference/is_archive)

### 󠀁[A Search Result Page](135-list-of-conditional-tags.md#a-search-result-page)󠁿

 * [is_search()](https://codex.zelocorecms.com/Function_Reference/is_search)

### 󠀁[A 404 Not Found Page](135-list-of-conditional-tags.md#a-404-not-found-page)󠁿

 * [is_404()](https://codex.zelocorecms.com/Function_Reference/is_404)

### 󠀁[Is Dynamic SideBar](135-list-of-conditional-tags.md#is-dynamic-sidebar)󠁿

 * [is_dynamic_sidebar()](https://codex.zelocorecms.com/Function_Reference/is_dynamic_sidebar)

### 󠀁[Is Sidebar Active](135-list-of-conditional-tags.md#is-sidebar-active)󠁿

 * [is_active_sidebar()](https://codex.zelocorecms.com/Function_Reference/is_active_sidebar)

### 󠀁[Is Widget Active](135-list-of-conditional-tags.md#is-widget-active)󠁿

 * [is_active_widget( $widget_callback, $widget_id )](https://codex.zelocorecms.com/Function_Reference/is_active_widget)

### 󠀁[Is User Logged in](135-list-of-conditional-tags.md#is-user-logged-in)󠁿

 * [is_user_logged_in()](https://codex.zelocorecms.com/Function_Reference/is_user_logged_in)

### 󠀁[Email Exists](135-list-of-conditional-tags.md#email-exists)󠁿

 * [email_exists( $email )](https://codex.zelocorecms.com/Function_Reference/email_exists)

### 󠀁[Username Exists](135-list-of-conditional-tags.md#username-exists)󠁿

 * [username_exists( $username )](https://codex.zelocorecms.com/Function_Reference/username_exists)

### 󠀁[A Paged Page](135-list-of-conditional-tags.md#a-paged-page)󠁿

 * [is_paged()](https://codex.zelocorecms.com/Function_Reference/is_paged)

### 󠀁[Right To Left Reading](135-list-of-conditional-tags.md#right-to-left-reading)󠁿

 * [is_rtl()](https://codex.zelocorecms.com/Function_Reference/is_rtl)

### 󠀁[An Attachment](135-list-of-conditional-tags.md#an-attachment)󠁿

 * [is_attachment()](https://codex.zelocorecms.com/Function_Reference/is_attachment)

### 󠀁[Attachment Is Image](135-list-of-conditional-tags.md#attachment-is-image)󠁿

 * [zelo_attachment_is_image( $post_id )](https://codex.zelocorecms.com/Function_Reference/zelo_attachment_is_image)

### 󠀁[A Local Attachment](135-list-of-conditional-tags.md#a-local-attachment)󠁿

 * [is_local_attachment( $url )](https://codex.zelocorecms.com/Function_Reference/is_local_attachment)

### 󠀁[Post Type Exists](135-list-of-conditional-tags.md#post-type-exists)󠁿

 * [post_type_exists( $post_type )](https://codex.zelocorecms.com/Function_Reference/post_type_exists)

### 󠀁[Is Main Query](135-list-of-conditional-tags.md#is-main-query)󠁿

 * [is_main_query()](https://codex.zelocorecms.com/Function_Reference/is_main_query)

### 󠀁[A New Day](135-list-of-conditional-tags.md#a-new-day)󠁿

 * [is_new_day()](https://codex.zelocorecms.com/Function_Reference/is_new_day)

### 󠀁[A Syndication](135-list-of-conditional-tags.md#a-syndication)󠁿

 * [is_feed()](https://codex.zelocorecms.com/Function_Reference/is_feed)

### 󠀁[A Trackback](135-list-of-conditional-tags.md#a-trackback)󠁿

 * [is_trackback()](https://codex.zelocorecms.com/Function_Reference/is_trackback)

### 󠀁[A Preview](135-list-of-conditional-tags.md#a-preview)󠁿

 * [is_preview()](https://codex.zelocorecms.com/Function_Reference/is_preview)

### 󠀁[Has An Excerpt](135-list-of-conditional-tags.md#has-an-excerpt)󠁿

 * [has_excerpt()](https://codex.zelocorecms.com/Function_Reference/has_excerpt)

### 󠀁[Has A Nav Menu Assigned](135-list-of-conditional-tags.md#has-a-nav-menu-assigned)󠁿

 * [has_nav_menu()](https://codex.zelocorecms.com/Function_Reference/has_nav_menu)

### 󠀁[Is Blog Installed](135-list-of-conditional-tags.md#is-blog-installed)󠁿

 * [is_blog_installed()](https://codex.zelocorecms.com/Function_Reference/is_blog_installed)

### 󠀁[Part of a Network (Multisite)](135-list-of-conditional-tags.md#part-of-a-network-multisite)󠁿

 * [is_multisite()](https://codex.zelocorecms.com/Function_Reference/is_multisite)
 * [is_main_site()](https://codex.zelocorecms.com/Function_Reference/is_main_site)
 * [is_super_admin()](https://codex.zelocorecms.com/Function_Reference/is_super_admin)

### 󠀁[An Active Plugin](135-list-of-conditional-tags.md#an-active-plugin)󠁿

 * [is_plugin_active( $path )](https://codex.zelocorecms.com/Function_Reference/is_plugin_active)
 * [is_plugin_inactive( $path )](https://codex.zelocorecms.com/Function_Reference/is_plugin_inactive)
 * [is_plugin_active_for_network( $path )](https://codex.zelocorecms.com/Function_Reference/is_plugin_active_for_network)
 * [is_plugin_page()](https://codex.zelocorecms.com/Function_Reference/is_plugin_page)

### 󠀁[A Child Theme](135-list-of-conditional-tags.md#a-child-theme)󠁿

 * [is_child_theme()](https://codex.zelocorecms.com/Function_Reference/is_child_theme)

### 󠀁[Theme supports a feature](135-list-of-conditional-tags.md#theme-supports-a-feature)󠁿

 * [current_theme_supports()](https://codex.zelocorecms.com/Function_Reference/current_theme_supports)

### 󠀁[Is Previewed in the Customizer](135-list-of-conditional-tags.md#is-previewed-in-the-customizer)󠁿

 * [is_customize_preview()](https://codex.zelocorecms.com/Function_Reference/is_customize_preview)

[  Previous: List of Template Tags](134-list-of-template-tags.md)

[  Next: Credits](136-credits.md)