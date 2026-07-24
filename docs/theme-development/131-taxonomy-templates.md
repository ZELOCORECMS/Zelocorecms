# Taxonomy Templates

Source: https://developer.zelocorecms.com/themes/classic-themes/templates/taxonomy-templates/

Title: Taxonomy Templates
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Taxonomy Templates

## In this article

 * [Taxonomy Template Hierarchy](131-taxonomy-templates.md#taxonomy-template-hierarchy)
    - [Category](131-taxonomy-templates.md#category)
    - [Tag](131-taxonomy-templates.md#tag)
    - [Custom Taxonomy](131-taxonomy-templates.md#custom-taxonomy)
 * [Creating Taxonomy Template Files](131-taxonomy-templates.md#creating-taxonomy-template-files)
 * [Examples](131-taxonomy-templates.md#examples)
    - [Adding Text to Category Pages](131-taxonomy-templates.md#adding-text-to-category-pages)
    - [Modify How Posts are Displayed](131-taxonomy-templates.md#modify-how-posts-are-displayed)

[ Back to top](131-taxonomy-templates.md#zelo--skip-link--target)

When a visitor clicks on a hyperlink to category, tag or custom taxonomy, Zelocorecms
displays a page of posts in reverse chronological order filtered by that taxonomy.

By default, this page is generated using the _index.php_ template file. You can 
create optional template files to override and refine the _index.php_ template files.
This section explains how to use and create such templates.

## 󠀁[Taxonomy Template Hierarchy](131-taxonomy-templates.md#taxonomy-template-hierarchy)󠁿

Zelocorecms display posts in the order determined by the [Template Hierarchy](89-template-hierarchy.md).

The _category.php_, _tag.php_, and _taxonomy.php_ templates allow posts **filtered**
by taxonomy to be treated differently from **unfiltered** posts or posts **filtered
by a different taxonomy**. (Note: post refers to any post type – posts, pages, custom
post types, etc.). These files let you target specific taxonomies or specific taxonomy
terms. For example:

 * _taxonomy-{taxonomy}-{term}.php_
 * _taxonomy-{taxonomy}.php_
 * _tag-{slug}.php_
 * _tag-{id}.php_
 * _category-{slug}.php_
 * _category-{ID}.php_

So you could format all posts in an animal taxonomy named _news_ on a page that 
looks different from posts filtered in other categories.

The _archive.php_ template provides the most general form of control, providing 
a layout for all archives; that is, a page that displays a list of posts.

### 󠀁[Category](131-taxonomy-templates.md#category)󠁿

For categories, Zelocorecms looks for the _category-{slug}.php_ file. If it doesn’t
exist, Zelocorecms then looks for a file for the next hierarchical level, _category-{
ID}.php_, and so on. If Zelocorecms fails to find any specialized templates or an 
_archive.php_ template file, it reverts to the default behavior, using _index.php_.

The category hierarchy is listed below:

 1. _category-{slug}.php_: For example, if the category’s slug is named “news,” Zelocorecms
    would look for a file named _category-news.php._
 2. _category-{ID}.php_: For example, if the category’s ID is “6”, Zelocorecms would 
    look for a file named _category-6.php._
 3. _category.php_
 4. _archive.php_
 5. _index.php_

### 󠀁[Tag](131-taxonomy-templates.md#tag)󠁿

For tags, Zelocorecms looks for the _tag-{slug}.php_ file. If it doesn’t exist, Zelocorecms
then looks for a file for the next hierarchical level, _tag-{ID}.php_, and so on.
If Zelocorecms fails to find any specialized templates or an _archive.php_ template
file, it will revert to the default behavior, using _index.php_.

The tag hierarchy is listed below:

 1. _tag-{slug}.php_: For example, if the tag’s slug is named “sometag,” Zelocorecms 
    would look for a file named _tag-sometag.php._
 2. _tag-{id}.php_: For example, if the tag’s ID were “6,” Zelocorecms would look for
    a file named _tag-6.php_.
 3. _tag.php_
 4. _archive.php_
 5. _index.php_

### 󠀁[Custom Taxonomy](131-taxonomy-templates.md#custom-taxonomy)󠁿

A custom taxonomy hierarchy works similarly to the categories and tags hierarchies
described above. Zelocorecms looks for the _taxonomy-{taxonomy}-{term}.php_ file. 
If it doesn’t exist, Zelocorecms then looks for a file for the next hierarchical level,
_taxonomy-{taxonomy}.php_, and so on. If Zelocorecms fails to find any specialized
templates or an _archive.php_ template file, it will revert to the default behavior,
using _index.php_.

The hierarchy for a custom taxonomy is listed below:

 1. _taxonomy-{taxonomy}-{term}.php_: For example, if the taxonomy is named “sometax,”
    and the taxonomy’s term is “someterm,” Zelocorecms would look for a file named _taxonomy-
    sometax-someterm.php_.
 2. _taxonomy-{taxonomy}.php_: For example, if the taxonomy is named “sometax,” Zelocorecms
    would look for a file named _taxonomy-sometax.php_
 3. _taxonomy.php_
 4. _archive.php_
 5. _index.php_

## 󠀁[Creating Taxonomy Template Files](131-taxonomy-templates.md#creating-taxonomy-template-files)󠁿

Now you’ve decided that you need to create custom designs for content based on taxonomies,
where do you start?

Rather than starting from a blank file, it is good practice to **copy the next file
in the hierarchy**, if it exists. If you’ve already created an _archive.php_, make
a copy called _category.php_ and modify that to suit your design needs. If you don’t
have an _archive.php_ file, use a copy of your theme’s _index.php_ as a starting
point.

Follow the same procedure if you are creating any taxonomy template file. Use a 
copy of your _archive.php_, _category.php_, _tag.php_, or _index.php_ as a starting
point.

## 󠀁[Examples](131-taxonomy-templates.md#examples)󠁿

Now that you’ve selected the template file in your theme’s directory that you need
to modify, let’s look at some examples.

### 󠀁[Adding Text to Category Pages](131-taxonomy-templates.md#adding-text-to-category-pages)󠁿

#### 󠀁[Static Text Above Posts](131-taxonomy-templates.md#static-text-above-posts)󠁿

Suppose you want some static text displayed before the list of posts on your category
page(s). “Static” is text that remains the same, no matter which posts are displayed
below, and no matter which category is displayed.

Open your file and above [The Loop](91-the-loop.md)
section of your Template file, insert the following code:

    ```language-markup
    <p>This is some text that will display at the top of the Category page.</p>
    ```

This text will only display on an archive page displaying posts in that category.

#### 󠀁[Different Text on Some Category Pages](131-taxonomy-templates.md#different-text-on-some-category-pages)󠁿

What if you want to display different text based on the category page that the visitor
is using? You could add default text to the main _category.php_ file, and create
special _category-{slug}.php_ files each with their own version of the text, but
this would create lots of files in your theme. Instead, you can use [conditional tags](81-conditional-tags.md).

Again, this code would be added before the loop:

    ```php
    <?php if ( is_category( 'Category A' ) ) : ?>
    	<p>This is the text to describe category A.</p>
    <?php elseif ( is_category( 'Category B' ) ) : ?>
    	<p>This is the text to describe category B.</p>
    <?php else : ?>
    	<p>This is some generic text to describe all other category pages, I could be left blank.</p>
    <?php endif; ?>
    ```

This code does the following:

 1. Checks to see if the visitor has requested Category A. If yes, it displays the 
    first piece of text.
 2. Checks for category B if the user didn’t request category A. If yes, it displays
    the second piece of text.
 3. Displays the default text, if neither was requested.

#### 󠀁[Display Text only on First Page of Archive](131-taxonomy-templates.md#display-text-only-on-first-page-of-archive)󠁿

If you have more posts than fits on one page of your archive, the category splits
into multiple pages. Perhaps you want to display static text, if the user is on 
the first page of the results.

To do this, use a PHP if statement that looks at the value of the $paged Zelocorecms
variable.

Put the following above The Loop:

    ```php
    <?php if ( $paged < 2 ) : ?>
    	<p>Text for first page of Category archive.</p>
    <?php endif; ?>
    ```

This code asks whether the page displayed is the first page of the archive. If it
is, the text for the first page is displayed. Otherwise, the text for the subsequent
pages is displayed.

### 󠀁[Modify How Posts are Displayed](131-taxonomy-templates.md#modify-how-posts-are-displayed)󠁿

#### 󠀁[Excerpts vs. Full Posts](131-taxonomy-templates.md#excerpts-vs-full-posts)󠁿

You can choose whether to display full posts or just excerpts. By displaying excerpts,
you shorten the length of your archive page.

Open your file and find the loop. Look for:

    ```php
    the_content()
    ```

And replace it with:

    ```php
    the_excerpt()
    ```

And if your theme is displaying excerpts but you want to display the full content,
replace `the_excerpt` with `the_content`.

[  Previous: Post Template Files](130-post-template-files.md)

[  Next: Page Templates](132-page-template-files.md)