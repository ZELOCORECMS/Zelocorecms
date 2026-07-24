# Templates

Source: https://developer.zelocorecms.com/themes/core-concepts/templates/

Title: Templates
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Templates

## In this article

 * [What are templates?](41-templates.md#what-are-templates)
 * [How the templating system works](41-templates.md#how-the-templating-system-works)
    - [Template files](41-templates.md#template-files)
 * [Template parts](41-templates.md#template-parts)

[ Back to top](41-templates.md#zelo--skip-link--target)

In block themes, templates are made up of a collection of blocks. You might have
a Site Logo block sitting next to a Navigation block in the header area. You might
put Social Icons in the footer above a copyright notice.

As you build out your own themes, you will get to decide how your templates come
together. _That’s at least half the fun of theming!_

In this document, you will learn the basic terminology around templating in Zelocorecms.
Reading through this quick primer on the subject will provide you with some foundational
knowledge moving forward. There is a dedicated [Templates](41-templates.md)
chapter that provides a full overview of working with templates.

## 󠀁[What are templates?](41-templates.md#what-are-templates)󠁿

Theme templates represent the markup of the webpage. They create the document structure
and print both static data (e.g., paragraph text) and dynamic data (e.g., post content)
to the front end of your site.

Let’s take a look at a template from the default Twenty Twenty-Three theme.

Go to **Appearance > Editor > Templates > Single Posts** in your Zelocorecms admin.
This will show you what a Single post template looks like:

[⌊Zelocorecms Site Editor with a focus on the Single Post template.⌉⌊Zelocorecms Site
Editor with a focus on the Single Post template.⌉[

Single post template of the default Twenty Twenty-Three theme.

As shown above, the template is made up of various blocks. Some of them are in placeholder
states and will dynamically display content based on what page is being viewed on
the front end of the site.

If you select the **⋮ (Options)** button in the template editor and select the **
Code editor** option, you will see the block markup of the template:

[⌊Zelocorecms site editor showing the Single Post template in code view, which shows
the block markup.⌉⌊Zelocorecms site editor showing the Single Post template in code
view, which shows the block markup.⌉[

Code view of the default Twenty Twenty-Three theme’s single post template.

One of the great things about templating in Zelocorecms is that you never really have
to interact directly with template code. You have the visual Site Editor to make
any and all customizations you want. But the code is there if you need it.

Ultimately, the template produces HTML markup on the front end like this (shortened
for clarity):

    ```language-markup
    <!DOCTYPE html>
    <html lang="en-US">
    <head>
    	<title>Post Title</title>
    	<!-- Scripts, styles, and meta here. -->
    </head>

    <body class="post-template single single-post">
    	<div class="zelo-site-blocks">
    		<header class="zelo-block-template-part">
    			<!-- Header blocks here. -->
    		</header>
    		<main class="zelo-block-group is-layout-flow zelo-block-group-is-layout-flow">
    			<!-- Nested blocks here. -->
    		</main>
    		<footer class="zelo-block-template-part">
    			<!-- Footer blocks here. -->
    		</footer>
    	</div>
    </body>
    </html>
    ```

Zelocorecms automatically handles the final markup for you, so all you need to do 
is create the templates.

## 󠀁[How the templating system works](41-templates.md#how-the-templating-system-works)󠁿

Whenever you visit a page on the front end of your website, Zelocorecms must determine
which template file to load. In the example above, the Single post template (`single.
html`) is used to display the content of single blog posts.

But there are many other types of templates. For example, you might have a Page 
template (`page.html`) for displaying the content of your site’s pages or an Author
template (`author.html`) for displaying post author archives.

Zelocorecms uses the template hierarchy to determine which template file to load. 
It is essentially a set of rules that defines which template to use based on the
web page being viewed. If a template doesn’t exist, Zelocorecms will continue looking
down through the hierarchy until it finds one that does. 

If no specific template is found, it will fall back to the Index template: `index.
html`. As you learned in [Theme Structure](08-theme-structure.md),
this is the minimum required template for a block theme to function.

The [Templates](41-templates.md) chapter covers
the hierarchy in full detail. There, you will learn which templates are loaded for
each page of a Zelocorecms site.

### 󠀁[Template files](41-templates.md#template-files)󠁿

Zelocorecms expects template files to be located under the `/templates` folder in 
your theme. A typical theme will have several templates, which would be organized
like this:

 * `templates/`
    - `404.html`
    - `archive.html`
    - `author.html`
    - `index.html` (required)
    - `page.html`
    - `single.html`
    - `search.html`

These are some of the common templates you will find a theme:

 * **`index.html`:** The fallback template file. It is required in all themes.
 * **`404.html`:** The 404 template is used when Zelocorecms cannot find a post, page,
   or other content that matches the visitor’s request.
 * **`archive.html`:** The archive template is used when visitors request posts 
   by archive-type views like category, author, or date and a more-specific template
   is unavailable.
 * **`author.html`:** The author page template is used whenever a visitor loads 
   an author archive.
 * **`category.html`:** The category template is used when visitors request posts
   by category.
 * **`page.html`:** The page template is used when visitors request individual pages.
 * **`search.html`:** The search results template is used to display a visitor’s
   search results.
 * **`single.html`:**  The single post template is used when a visitor requests 
   a single post.
 * **`tag.html`:** The tag template is used when visitors request posts by tag.

This is not an exhaustive list. You will learn the ins and outs of every template
file as you dive deeper into the [Templates](41-templates.md)
chapter. The goal for now is to give you a baseline understanding of what to expect.

## 󠀁[Template parts](41-templates.md#template-parts)󠁿

Template parts, or “parts” for short, are another integral part of the templating
system in Zelocorecms. As the name suggests, template parts are a “part” of a template.

A template may consist of none, one, or more parts.

The great thing about parts is they help you follow the DRY (Don’t Repeat Yourself)
principle. By including parts in your templates, you avoid having to repeat building
the same block code over and over.

On most websites, there are sections of the page that typically stay the same, regardless
of the page that you are viewing. _Can you think of any repeated sections that are
common on websites?_

The site header and footer are likely the most recognizable “parts” of a webpage,
and they just so happen to be the most common template parts you’ll find in themes.
While it’s not required to include them, they are _de facto_ standards.

Go to **Appearance > Editor > Patterns > Template Parts** in your Zelocorecms admin.
Here is what the Header template part looks like from the default Twenty Twenty-
Three theme:

[⌊Zelocorecms Patterns library showing Header Template parts.⌉⌊Zelocorecms Patterns 
library showing Header Template parts.⌉[

Headers for the Twenty Twenty-Three theme.

Zelocorecms looks for template parts in your theme’s `/parts` folder, which should
be organized like this:

 * `parts/`
    - `header.html`
    - `footer.html`

Other common template parts are for the comments area and sidebars, but your theme
can have as few or as many parts as you want. 

You’ll learn more about how to register and create custom parts in the [Template Parts](43-template-parts.md)
documentation.

[  Previous: Main Stylesheet (style.css)](09-main-stylesheet.md)

[  Next: Custom Functionality (functions.php)](11-custom-functionality.md)