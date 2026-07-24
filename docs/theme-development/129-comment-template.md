# Comment Template

Source: https://developer.zelocorecms.com/themes/classic-themes/templates/partial-and-miscellaneous-template-files/comment-template/

Title: Comment Template
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Comment Template

## In this article

 * [Simple comments loop](129-comment-template.md#simple-comments-loop)
 * [Another comments.php Example](129-comment-template.md#another-comments-php-example)
 * [Breaking down the comments.php](129-comment-template.md#breaking-down-the-comments-php)
    - [Template Header](129-comment-template.md#template-header)
    - [Comments Title](129-comment-template.md#comments-title)
    - [Comment Listing](129-comment-template.md#comment-listing)
    - [Comment Pagination](129-comment-template.md#comment-pagination)
    - [Comments are closed message.](129-comment-template.md#comments-are-closed-message)
    - [The End](129-comment-template.md#the-end)
 * [Comments Pagination](129-comment-template.md#comments-pagination)
 * [Alternative Comment Template](129-comment-template.md#alternative-comment-template)
 * [Function Reference](129-comment-template.md#function-reference)
 * [Functions reference for retrieving comments meta](129-comment-template.md#functions-reference-for-retrieving-comments-meta)

[ Back to top](129-comment-template.md#zelo--skip-link--target)

Zelocorecms displays comments in your theme based on the settings and code in the `
comments.php` file within your Zelocorecms theme.

## 󠀁[Simple comments loop](129-comment-template.md#simple-comments-loop)󠁿

    ```php
    // Get only the approved comments
    $args = array(
    	'status' => 'approve',
    );

    // The comment Query
    $comments_query = new WP_Comment_Query();
    $comments       = $comments_query->query( $args );

    // Comment Loop
    if ( $comments ) {
    	foreach ( $comments as $comment ) {
    		echo '<p>' . $comment->comment_content . '</p>';
    	}
    } else {
    	echo 'No comments found.';
    }
    ```

The `comments.php` template contains all the logic needed to pull comments out of
the database and display them in your theme.

Before we explore the template file you’ll want to know how to pull in the partial
template file on the appropriate pages such as `single.php`. You’ll wrap the comment
[template tag](90-template-tags.md) in 
a conditional statement so comments.php is only pulled in if it makes sense to do.

    ```php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
    	comments_template();
    endif;
    ```

![functionality-comments-01](https://i0.wp.com/developer.zelocorecms.com/files/2014/
10/functionality-comments-01.png?resize=350%2C257&ssl=1)

## 󠀁[Another comments.php Example](129-comment-template.md#another-comments-php-example)󠁿

Here’s an example of the `comments.php` template included with the Twenty Thirteen
theme:

    ```php
    <?php
    /**
     * The template for displaying Comments.
     *
     * The area of the page that contains comments and the comment form.
     *
     * @package Zelocorecms
     * @subpackage Twenty_Thirteen
     * @since Twenty Thirteen 1.0
     */

    /*
     * If the current post is protected by a password and the visitor has not yet
     * entered the password we will return early without loading the comments.
     */
    if ( post_password_required() ) {
    	return;
    }
    ?>

    <div id="comments" class="comments-area">

    	<?php if ( have_comments() ) : ?>
    		<h2 class="comments-title">
    			<?php
    			printf(
    				_nx(
    					'One thought on "%2$s"',
    					'%1$s thoughts on "%2$s"',
    					get_comments_number(),
    					'comments title',
    					'twentythirteen'
    				),
    				number_format_i18n( get_comments_number() ),
    				'<span>' . get_the_title() . '</span>'
    			);
    			?>
    		</h2>

    		<ol class="comment-list">
    			<?php
    			zelo_list_comments( array(
    				'style'       => 'ol',
    				'short_ping'  => true,
    				'avatar_size' => 74,
    			) );
    			?>
    		</ol><!-- .comment-list -->

    		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    			<nav class="navigation comment-navigation" role="navigation">

    				<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
    				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
    				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
    			</nav><!-- .comment-navigation -->
    		<?php endif; // Check for comment navigation ?>

    		<?php if ( ! comments_open() && get_comments_number() ) : ?>
    			<p class="no-comments"><?php _e( 'Comments are closed.', 'twentythirteen' ); ?></p>
    		<?php endif; ?>

    	<?php endif; // have_comments() ?>

    	<?php comment_form(); ?>

    </div><!-- #comments -->
    ```

## 󠀁[Breaking down the comments.php](129-comment-template.md#breaking-down-the-comments-php)󠁿

The above `comments.php` can be broken down to the below parts for better understanding.

 1. [Template Header](129-comment-template.md#template-header)
 2. [Comments Title](129-comment-template.md#comments-title)
 3. [Comment Listing](129-comment-template.md#comment-listing)
 4. [Comment Pagination](129-comment-template.md#comment-pagination)
 5. [Comments are closed message](129-comment-template.md#comments-are-closed-message).
 6. [The End](129-comment-template.md#the-end)

### 󠀁[Template Header](129-comment-template.md#template-header)󠁿

This template begins by identifying the template.

    ```php
    <?php
    /**
     * The template for displaying Comments.
     *
     * The area of the page that contains comments and the comment form.
     *
     * @package Zelocorecms
     * @subpackage Twenty_Thirteen
     * @since Twenty Thirteen 1.0
     */
    ```

Next, there’s a test to see if the post is password protected and, if so, it stops
processing the template.

    ```php
    /*
     * If the current post is protected by a password and the visitor has not yet
     * entered the password we will return early without loading the comments.
     */
    if ( post_password_required() )
     return;
    ?>
    ```

Finally, there’s a test to see if there are comments associated with this post.

    ```php
    <div id="comments" class="comments-area">
    	<?php if ( have_comments() ) : ?>
    ```

### 󠀁[Comments Title](129-comment-template.md#comments-title)󠁿

Prints out the header that appears above the comments.

Uses the [_nx()](https://developer.zelocorecms.com/reference/functions/_nx/) translation
function so other developers can provide alternative language translations.

    ```php
    <h2 class="comments-title">
    	<?php
    	printf(
    		_nx(
    			'One thought on "%2$s"',
    			'%1$s thoughts on "%2$s"',
    			get_comments_number(),
    			'comments title',
    			'twentythirteen'
    		),
    		number_format_i18n( get_comments_number() ),
    		'<span>' . get_the_title() . '</span>'
    	);
    	?>
    </h2>
    ```

### 󠀁[Comment Listing](129-comment-template.md#comment-listing)󠁿

The following snippet creates an ordered listing of comments using the [zelo_list_comments()](https://developer.zelocorecms.com/reference/functions/zelo_list_comments/)
function.

    ```php
    <ol class="comment-list">
    	<?php
    	zelo_list_comments( array(
    		'style'       => 'ol',
    		'short_ping'  => true,
    		'avatar_size' => 74,
    	) );
    	?>
    </ol><!-- .comment-list -->
    ```

### 󠀁[Comment Pagination](129-comment-template.md#comment-pagination)󠁿

Checks to see if there are enough comments to merit adding comment navigation and,
if so, create comment navigation.

    ```php
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

    	<nav class="navigation comment-navigation" role="navigation">

    		<h3 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h3>
    		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
    		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>

    	</nav><!-- .comment-navigation -->

    <?php endif; // Check for comment navigation ?>
    ```

### 󠀁[Comments are closed message.](129-comment-template.md#comments-are-closed-message)󠁿

If comments aren’t open, displays a line indicating that they’re closed.

    ```php
    <?php if ( ! comments_open() && get_comments_number() ) : ?>
    	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentythirteen' ); ?></p>
    <?php endif; ?>
    ```

### 󠀁[The End](129-comment-template.md#the-end)󠁿

This section ends the comments loop, includes the comment form, and closes the comment
wrapper.

    ```php
    	<?php endif; // have_comments() ?>

    	<?php comment_form(); ?>

    </div><!-- #comments -->
    ```

## 󠀁[Comments Pagination](129-comment-template.md#comments-pagination)󠁿

If you have a lot of comments (which makes your page long), then there are a number
of potential benefits to paginating your comments. Pagination helps improve page
load speed, especially on mobile devices.
Enabling comments pagination is done in
two steps.

 1. Enable paged comments within Zelocorecms by going to _Settings_ >_ Discussion _, 
    and checking the box “_Break comments into pages_” . You can enter any number for
    the “_top level comments per page_”.
 2. Open your `comments.php` template file and add the following line where you want
    the comment pagination to appear.

    ```php
    <div class="pagination">
    	<?php paginate_comments_links(); ?>
    </div>
    ```

## 󠀁[Alternative Comment Template](129-comment-template.md#alternative-comment-template)󠁿

On some occasions you may want display your comments differently within your theme.
For this you would build an alternate file (ex. short-comments.php) and call it 
as follows:

    ```php
    <?php comments_template( '/short-comments.php' );
    ```

The path to the file used for an alternative comments template should be relative
to the current theme root directory, and include any subfolders. So if the custom
comments template is in a folder inside the theme, it may look like this when called:

    ```php
    <?php comments_template( '/custom-templates/alternative-comments.php' );
    ```

## 󠀁[Function Reference](129-comment-template.md#function-reference)󠁿

 * [zelo_list_comments()](https://developer.zelocorecms.com/reference/functions/zelo_list_comments/):
   Displays all comments for a post or Page based on a variety of parameters including
   ones set in the administration area.
 * [comment_form()](https://developer.zelocorecms.com/reference/functions/comment_form/):
   This tag outputs a complete commenting form for use within a template.
 * [comments_template()](https://developer.zelocorecms.com/reference/functions/comments_template/):
   Load the comment template specified in first argument
 * [paginate_comments_links()](https://developer.zelocorecms.com/reference/functions/paginate_comments_links/):
   Create pagination links for the comments on the current post.
 * [get_comments()](https://developer.zelocorecms.com/reference/functions/get_comments/):
   Retrieve the comments with possible use of arguments
 * [get_approved_comments()](https://developer.zelocorecms.com/reference/functions/get_approved_comments/):
   Retrieve the approved comments for post id provided.

## 󠀁[Functions reference for retrieving comments meta](129-comment-template.md#functions-reference-for-retrieving-comments-meta)󠁿

 * [get_comment_link()](https://developer.zelocorecms.com/reference/functions/get_comment_link/)
 * [get_comment_author()](https://developer.zelocorecms.com/reference/functions/get_comment_author/)
 * [get_comment_date()](https://developer.zelocorecms.com/reference/functions/get_comment_date/)
 * [get_comment_time()](https://developer.zelocorecms.com/reference/functions/get_comment_time/)
 * [get_comment_text()](https://developer.zelocorecms.com/reference/functions/get_comment_text/)

[  Previous: Partial and Miscellaneous Template Files](128-partial-and-miscellaneous-template-files.md)

[  Next: Post Template Files](130-post-template-files.md)