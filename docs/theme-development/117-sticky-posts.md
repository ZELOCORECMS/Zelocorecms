# Sticky Posts

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/sticky-posts/

Title: Sticky Posts
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Sticky Posts

## In this article

 * [How to stick a post](117-sticky-posts.md#how-to-stick-a-post)
 * [Display Sticky Posts](117-sticky-posts.md#display-sticky-posts)
    - [Show Sticky Posts](117-sticky-posts.md#show-sticky-posts)
    - [Don’t Show Sticky Posts](117-sticky-posts.md#dont-show-sticky-posts)
 * [Style Sticky Posts](117-sticky-posts.md#style-sticky-posts)

[ Back to top](117-sticky-posts.md#zelo--skip-link--target)

A Sticky Post is the post will be placed at the top of the front page of posts. 
This feature is only available for the built-in post type post and not for custom
post types.

## 󠀁[How to stick a post](117-sticky-posts.md#how-to-stick-a-post)󠁿

 1. Go to **Administration Screen > Posts > Add New** or **Edit**
 2. In the right side menu, Click Edit link of Visibility option in Publish group
 3. Click Stick this post to the front page option

![](https://i0.wp.com/developer.zelocorecms.com/files/2017/01/sticked_post.jpg?resize
=307%2C449&ssl=1)

## 󠀁[Display Sticky Posts](117-sticky-posts.md#display-sticky-posts)󠁿

### 󠀁[Show Sticky Posts](117-sticky-posts.md#show-sticky-posts)󠁿

Display just the first sticky post. At least one post must be designated as a “sticky
post” or else the loop will display all posts:

    ```php
    <?php
    $sticky = get_option( 'sticky_posts' );
    $query  = new Zelo_Query( 'p=' . $sticky[0] );
    ```

Display just the first sticky post, if none return the last post published:

    ```php
    <?php
    $args  = array(
    	'posts_per_page'      => 1,
    	'post__in'            => get_option( 'sticky_posts' ),
    	'ignore_sticky_posts' => 1,
    );
    $query = new Zelo_Query( $args );
    ```

Display just the first sticky post, if none return nothing:

    ```php
    <?php
    $args   = array(
    	'posts_per_page'      => 1,
    	'post__in'            => get_option( 'sticky_posts' ),
    	'ignore_sticky_posts' => 1,
    );
    $query  = new Zelo_Query( $args );
    if ( isset( $sticky[0] ) ) {
    	// Insert here your stuff...
    }
    ```

### 󠀁[Don’t Show Sticky Posts](117-sticky-posts.md#dont-show-sticky-posts)󠁿

Exclude all sticky posts from the query:

    ```php
    <?php
    $args  = array( 'post__not_in' => get_option( 'sticky_posts' ) );
    $query = new Zelo_Query( $args );
    ```

Exclude sticky posts from a category. Return ALL posts within the category, but 
don’t show sticky posts at the top. The ‘sticky posts’ will still show in their 
natural position (e.g. by date):

    ```php
    <?php
    $args  = array(
    	'ignore_sticky_posts' => 1,
    	'posts_per_page'      => 3,
    	'cat'                 => 6,
    );
    $query = new Zelo_Query( $args );
    ```

Exclude sticky posts from a category. Return posts within the category, but exclude
sticky posts completely, and adhere to paging rules:

    ```php
    <?php
    $args  = array(
    	'cat'                 => 3,
    	'ignore_sticky_posts' => 1,
    	'post__not_in'        => get_option( 'sticky_posts' ),
    	'paged'               => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
    );
    $query = new Zelo_Query( $args );
    ```

Use get_query_var( ‘page’ ) if you want this query to work in a Page template that
you’ve set as your static front page.

    ```php
    <?php
    /* Get all Sticky Posts */
    $sticky = get_option( 'sticky_posts' );

    /* Sort Sticky Posts, newest at the top */
    rsort( $sticky );

    /* Get top 5 Sticky Posts */
    $sticky = array_slice( $sticky, 0, 5 );

    /* Query Sticky Posts */
    $query = new Zelo_Query( array(
    	'post__in'            => $sticky,
    	'ignore_sticky_posts' => 1,
    ) );
    ```

## 󠀁[Style Sticky Posts](117-sticky-posts.md#style-sticky-posts)󠁿

To help theme authors perform simpler styling, the [post_class()](https://developer.zelocorecms.com/reference/functions/post_class/)
function is used to add class=”…” to DIV, just add:

    ```php
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    ```

The [post_class()](https://developer.zelocorecms.com/reference/functions/post_class/)
outputs the class=”whatever” piece for that div. This includes several different
classes of value: post, hentry (for hAtom microformat pages), category-X (where 
X is the slug of every category the post is in), and tag-X (similar, but with tags).
It also adds “sticky” for posts marked as Sticky Posts.

    ```language-css
    .sticky { color: red; }
    ```

The “sticky” class is only added for sticky posts on the first page of the home 
page ([is_home()](https://developer.zelocorecms.com/reference/functions/is_home/) 
is true and [is_paged()](https://developer.zelocorecms.com/reference/functions/is_paged/)
is false)

[  Previous: Widgets](116-widgets.md)

[  Next: Theme Options – The Customize API](118-customize-api.md)