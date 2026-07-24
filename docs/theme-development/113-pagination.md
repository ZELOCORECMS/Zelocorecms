# Pagination

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/pagination/

Title: Pagination
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Pagination

## In this article

 * [Using Pagination to Navigate Post Lists](113-pagination.md#using-pagination-to-navigate-post-lists)
 * [Examples](113-pagination.md#examples)
    - [Loop with Pagination](113-pagination.md#loop-with-pagination)
    - [Methods for displaying pagination links](113-pagination.md#methods-for-displaying-pagination-links)
    - [Pagination within a post](113-pagination.md#pagination-within-a-post)

[ Back to top](113-pagination.md#zelo--skip-link--target)

Pagination allows your user to _page_ back and forth through multiple pages of content.

Zelocorecms can use pagination when:

 * Viewing lists of posts when more posts exist than can fit on one page, or
 * Breaking up longer posts by manually by using the following tag: `<!--nextpage--
   >`

## 󠀁[Using Pagination to Navigate Post Lists](113-pagination.md#using-pagination-to-navigate-post-lists)󠁿

The most common use for pagination in Zelocorecms sites is to break up long lists 
of posts into separate pages. Whether you’re viewing a category, archive, or default
index page for a blog or site, Zelocorecms only shows 10 posts per page by default.
Users can change the number of posts that appear on each page on the Reading screen:**
Admin > Settings > Reading**.

## 󠀁[Examples](113-pagination.md#examples)󠁿

### 󠀁[Loop with Pagination](113-pagination.md#loop-with-pagination)󠁿

This simplified example shows where you can add pagination functions for the main
loop. Add the functions just before or after the loop.

    ```php
    <?php if ( have_posts() ) : ?>

        <!-- Start the pagination functions before the loop. -->
        <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
        <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
        <!-- End the pagination functions before the loop. -->

    	<!-- Start of the main loop. -->
    	<?php while ( have_posts() ) : the_post();  ?>

    	<!-- the rest of your theme's main loop -->

        <?php endwhile; ?>
        <!-- End of the main loop -->

        <!-- Start the pagination functions after the loop. -->
        <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
        <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
        <!-- End the pagination functions after the loop. -->

    <?php else : ?>

    	<?php _e( 'Sorry, no posts matched your criteria.' ); ?>

    <?php endif; ?>
    ```

### 󠀁[Methods for displaying pagination links](113-pagination.md#methods-for-displaying-pagination-links)󠁿

When using any of these pagination functions outside the template file with the 
loop that is being paginated, you must call the global variable $zelo_query.

    ```php
    function your_themes_pagination() {
    	global $zelo_query;
    	echo paginate_links();
    }
    ```

Zelocorecms has numerous functions for displaying links to other pages in your loop.
Some of these functions are only used in very specific contexts. You would use a
different function on a single post page then you would on a archive page. The following
section covers archive template pagination functions. The section after that cover
single post pagination.

#### 󠀁[Simple Pagination](113-pagination.md#simple-pagination)󠁿

**posts_nav_link**

One of the simplest methods is [posts_nav_link()](https://developer.zelocorecms.com/reference/functions/posts_nav_link/).
Simply place the function in your template after your loop. This generates both 
links to the next page of posts and previous page of posts where applicable. This
function is ideal for themes that have simple pagination requirements.

    ```php
    posts_nav_link();
    ```

**next_posts_link & prev_posts_link**

When building a theme, use [next_posts_link()](https://developer.zelocorecms.com/reference/functions/next_posts_link/)
and [prev_posts_link()](https://developer.zelocorecms.com/reference/functions/previous_posts_link/).
to have control over where the previous and next posts page link appears.

    ```php
    next_posts_link();
    previous_posts_link();
    ```

If you need to pass the pagination links to a PHP variable, you can use [get_next_posts_link()](https://developer.zelocorecms.com/reference/functions/get_next_posts_link/)
and [get_previous_posts_link()](https://developer.zelocorecms.com/reference/functions/get_previous_posts_link/).

    ```php
    $next_posts = get_next_posts_link();
    $prev_posts = get_previous_posts_link();
    ```

#### 󠀁[Numerical Pagination](113-pagination.md#numerical-pagination)󠁿

When you have many pages of content it is a better experience to display a list 
of page numbers so the user can click on any one of the page links rather then having
to repeatedly click next or previous posts. Zelocorecms provides several functions
for automatically displaying a numerical pagination list.

**For Zelocorecms 4.1+**

If you want more robust pagination options, you can use [the_posts_pagination()](https://developer.zelocorecms.com/reference/functions/the_posts_pagination/)
for Zelocorecms 4.1 and higher. This will output a set of page numbers with links 
to previous and next pages of posts.

    ```php
    the_posts_pagination();
    ```

**For Zelocorecms prior to 4.1**

If you want your pagination to support older versions of Zelocorecms, you must use
[paginate_links()](https://developer.zelocorecms.com/reference/functions/paginate_links/).

    ```php
    echo paginate_links();
    ```

#### 󠀁[Pagination Between Single Posts](113-pagination.md#pagination-between-single-posts)󠁿

All of the previous functions should be used on index and archive pages. When you
are viewing a single blog post, you must use [prev_post_link](https://developer.zelocorecms.com/reference/functions/previous_post_link/)
and [next_post_link](https://developer.zelocorecms.com/reference/functions/next_post_link/).
Place the following functions below the loop on your single.php.

    ```php
    previous_post_link();
    next_post_link();
    ```

### 󠀁[Pagination within a post](113-pagination.md#pagination-within-a-post)󠁿

Zelocorecms gives you a tag that can be placed in post content to enable pagination
for that post:
`<!--nextpage-->`If you use that tag in the content, you need to 
ensure that the [zelo_link_pages](https://developer.zelocorecms.com/reference/functions/zelo_link_pages/)
function is placed in your single.php template within the loop.

    ```php
    <?php if ( have_posts() ) : ?>

    	<!-- Start of the main loop. -->
    	<?php while ( have_posts() ) : the_post(); ?>

    		<?php the_content(); ?>

    		<?php zelo_link_pages(); ?>

    	<?php endwhile; ?>
    	<!-- End of the main loop. -->

    <?php endif; ?>
    ```

[  Previous: Navigation Menus](112-navigation-menus.md)

[  Next: Post Formats](114-post-formats.md)