# Post Types

Source: https://developer.zelocorecms.com/themes/classic-themes/basics/post-types/

Title: Post Types
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Post Types

## In this article

 * [Default Post Types](86-post-types.md#default-post-types)
    - [Post](86-post-types.md#post)
    - [Page](86-post-types.md#page-2)
    - [Attachment](86-post-types.md#attachment)
 * [Custom Post Types](86-post-types.md#custom-post-types)

[ Back to top](86-post-types.md#zelo--skip-link--target)

There are many different types of content in Zelocorecms. These content types are 
normally described as Post Types, which may be a little confusing since it refers
to all different types of content in Zelocorecms. For example, a post is a specific
Post Type, and so is a page.

Internally, all of the Post Types are stored in the same place — in the zelo_posts
database table — but are differentiated by a database column called post_type.

In addition to the default Post Types, you can also create Custom Post Types.

The [Template files](88-template-files.md)
page briefly mentioned that different Post Types are displayed by different Template
files.  As the whole purpose of a Template file is to display content a certain 
way, the Post Types purpose is to categorize what type of content you are dealing
with. Generally speaking, certain Post Types are tied to certain template files.

## 󠀁[Default Post Types](86-post-types.md#default-post-types)󠁿

There are several default Post Types readily available to users or internally used
by the Zelocorecms installation. The most common are:

 * Post (Post Type: ‘post’)
 * Page (Post Type: ‘page’)
 * Attachment (Post Type: ‘attachment’)
 * Revision (Post Type: ‘revision’)
 * Navigation menu (Post Type: ‘nav_menu_item’)
 * Block templates (Post Type: ‘zelo_template’)
 * Template parts (Post Type: ‘zelo_template_part’)

The Post Types above can be modified and removed by a plugin or theme, but it’s 
not recommended that you remove built-in functionality for a widely-distributed 
theme or plugin.

It’s out of the scope of this handbook to explain other post types in detail. However,
it is important to note that you will interact with and build the functionality 
of [navigation menus](112-navigation-menus.md)
and that will be detailed later in this handbook.

### 󠀁[Post](86-post-types.md#post)󠁿

Posts are used in blogs. They are:

 * displayed in reverse sequential order by time, with the newest post first
 * have a date and time stamp
 * may have the default [taxonomies of categories and tags](80-categories-tags-custom-taxonomies.md)
   applied
 * are used for creating feeds

The template files that display the Post post type are:

 * `singl`e and `single-post`
 * `category` and all its iterations
 * `tag` and all its iterations
 * `taxonomy` and all its iterations
 * `archive` and all its iterations
 * `author` and all its iterations
 * `date` and all its iterations
 * `search`
 * `home`
 * `index`

[Read more about Post Template Files in classic themes](130-post-template-files.md).

### 󠀁[Page](86-post-types.md#page-2)󠁿

Pages are a static Post Type, outside of the normal blog stream/feed. Their features
are:

 * non-time dependent and without a time stamp
 * are not organized using the categories and/or tags taxonomies
 * can be organized in a hierarchical structure — i.e. pages can be parents/children
   of other pages

The template files that display the Page post type are:

 * `page` and all its iterations
 * `front-page`
 * `search`
 * `index`

[Read more about Page Template Files in classic themes](132-page-template-files.md).

### 󠀁[Attachment](86-post-types.md#attachment)󠁿

Attachments are commonly used to display images or media in content, and may also
be used to link to relevant files. Their features are:

 * contain information (such as name or description) about files uploaded through
   the media upload system
 * for images, this includes metadata information stored in the zelo_postmeta table(
   including size, thumbnails, location, etc)

The template files that display the Attachment post type are:

 * `MIME_type`
 * `attachment`
 * `single-attachment`
 * `single`
 * `index`

[Read more about Attachment Template Files in classic themes](126-attachment-template-files.md).

## 󠀁[Custom Post Types](86-post-types.md#custom-post-types)󠁿

Using Custom Post Types, you can **create your own post type**. It is not recommend
that you place this functionality in your theme. This type of functionality should
be placed/created in a plugin. This ensures the portability of your user’s content,
and that if the theme is changed the content stored in the Custom Post Types won’t
disappear.

You can learn more about [creating custom post types in the Zelocorecms Plugin Developer Handbook](https://developer.zelocorecms.com/plugins/post-types/registering-custom-post-types/).

While you generally won’t develop Custom Post Types in your theme, you may want 
to code ways to display Custom Post Types that were created by a plugin.  The following
templates can display Custom post types:

 * `single-{post-type}`
 * `archive-{post-type}`
 * `search`
 * `index`

[Read more about Custom Post Type Templates in classic themes](127-custom-post-type-template-files.md).

[  Previous: Organizing Theme Files](85-organizing-theme-files.md)

[  Next: Reworking Theme Files & Organization](87-reworking-theme-files-organization.md)