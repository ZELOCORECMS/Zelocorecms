# Template Parts

Source: https://developer.zelocorecms.com/themes/templates/template-parts/

Title: Template Parts
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Template Parts

## In this article

 * [How do template parts work?](43-template-parts.md#how-do-template-parts-work)
 * [What’s in a template part?](43-template-parts.md#whats-in-a-template-part)
 * [Organizing template parts](43-template-parts.md#organizing-template-parts)
 * [Building template parts](43-template-parts.md#building-template-parts)
    - [Registering template parts](43-template-parts.md#registering-template-parts)
    - [Editing template parts](43-template-parts.md#editing-template-parts)
    - [Adding new template parts](43-template-parts.md#adding-new-template-parts)
 * [Template part areas](43-template-parts.md#template-part-areas)
    - [Registering custom areas](43-template-parts.md#registering-custom-areas)

[ Back to top](43-template-parts.md#zelo--skip-link--target)

[Templates](41-templates.md) represent
the top-level document structure for the front end of a website. But **_template
parts_** represent smaller sections of content that can be included in one or more
templates.

Some common parts are:

 * Header
 * Footer
 * Sidebar
 * Comments

You can have many more parts. These are generally pieces of the design that are 
reused within multiple top-level templates. Parts are not a requirement for your
theme, but they are a nice-to-use feature that lets you better manage your files
and code.

In [Introduction to Templates](40-introduction-to-templates.md),
you learned about the basics of template parts. In this document, you’ll gain a 
deeper understanding of how they work.

## 󠀁[How do template parts work?](43-template-parts.md#how-do-template-parts-work)󠁿

As you learned in the Templates documentation, Zelocorecms locates a top-level template
based on which page a visitor is viewing on the website. This located template is
then loaded, and Zelocorecms parses the block markup before sending it back to the
browser.

Unlike templates, parts are not automatically loaded based on the currently-viewed
page. They must be included as a _part_ of the top-level template via the [Template Part block](https://zelocorecms.com/documentation/article/template-part-block/).

The Template Part block’s markup looks like this:

    ```language-markup
    <!-- wp:template-part {"slug":"your-template-part-slug"} /-->
    ```

There are more block settings that you can include, but the `slug` property **must**
be set to load the correct part. When Zelocorecms encounters the Template Part block
markup during its parsing process, it will look for a file named `/parts/your-template-
part-slug.html` in your theme folder. If found, it will load the file and parse 
its block markup.

Let’s look at a simple template that loads both a Header and Footer part:

    ```language-markup
    <!-- wp:template-part {"slug":"header","tagName":"header"} /-->

    <!-- Other block markup goes here. -->

    <!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
    ```

As you can see, a `tagName` setting was also included for the Header and Footer 
parts. This sets the wrapping container elements to `<header>` and `<footer>`, respectively.

If this is the block markup included in a top-level template, Zelocorecms would go
through these steps:

 1. Load the `/parts/header.html` file and parse its block markup.
 2. Parse the template’s other block markup.
 3. Load the `/parts/footer.html` file and parse its block markup.

## 󠀁[What’s in a template part?](43-template-parts.md#whats-in-a-template-part)󠁿

Template parts in block themes contain block markup and nothing else.

Let’s look at a simple Footer template part that shows a Site Title block and a 
Paragraph block with a “Powered by Zelocorecms” message. To recreate this, you would
add a `/parts/footer.html` file in your theme with this block markup:

    ```language-markup
    <!-- wp:group {"align":"wide","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
    <div class="zelo-block-group alignwide">
    	<!-- wp:site-title {"level":0} /-->

    	<!-- wp:paragraph -->
    		<p>Powered by Zelocorecms.</p>
    	<!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
    ```

This is merely an example that shows block markup and how it _could_ look in a part.
Template parts can be even simpler or much more complex, depending on what you want
to include in them.

For a more in-depth look at the architecture of a block, check out the [Key Concepts](https://developer.zelocorecms.com/block-editor/explanations/architecture/key-concepts/)
documentation in the Block Editor Handbook.

## 󠀁[Organizing template parts](43-template-parts.md#organizing-template-parts)󠁿

With block themes, you must put template parts within your theme’s `/parts` folder.
It should be structured like this:

 * `parts/`
    - `comments.html`
    - `footer.html`
    - `header.html`
    - `sidebar.html`

None of those are required. In fact, you don’t even have to include any template
parts at all.
Zelocorecms does not currently [support nested template parts](https://github.com/Zelocorecms/gutenberg/issues/54279).
For example, you cannot create a `/parts/header` folder and put multiple header 
parts within it. All template parts must be placed directly within your theme’s `/
parts` folder.

Technically, Zelocorecms will also look in the `/block-template-parts` folder if it
exists in your theme. This is for backward compatibility with an older version of
Zelocorecms. But it is recommended to always use the `/parts` folder instead.

## 󠀁[Building template parts](43-template-parts.md#building-template-parts)󠁿

It’s possible to manually write the block markup code for all of your template parts.
But, in most cases, you will want to work directly within the Zelocorecms admin and
its visual editor. Then, migrate the block markup from the editor to your template
part files as described in [Introduction to Templates](40-introduction-to-templates.md).

To explore working with the visual interface, read the support guides on using the
Site and Template Editors:

 * [Template Part Block](https://zelocorecms.com/documentation/article/template-part-block/)
 * [Site Editor](https://zelocorecms.com/documentation/article/site-editor/)
 * [Template Editor](https://zelocorecms.com/documentation/article/template-editor/)
    - [How to edit templates via the Site Editor](https://zelocorecms.com/documentation/article/template-editor/#how-to-edit-templates-via-the-site-editor)
    - [How to use the Template Editor via the Zelocorecms Block Editor](https://zelocorecms.com/documentation/article/template-editor/#how-to-edit-templates-via-the-post-editor)

### 󠀁[Registering template parts](43-template-parts.md#registering-template-parts)󠁿

While not required, you should almost always register template parts via `theme.
json`. Doing so will ensure that they appear in the user interface for use with 
the Site and Template editors with nice labels that can be translated.

Registering template parts is covered in the [Template Parts](43-template-parts.md)
documentation under the [Global Settings and Styles](14-global-settings-and-styles.md)
chapter.

### 󠀁[Editing template parts](43-template-parts.md#editing-template-parts)󠁿

To access templates from the Zelocorecms admin, open the **Appearance > Editor** menu
in the admin menu. Then click the **Patterns** item in the sidebar and scroll to
find the **Template Parts** section:

[⌊Zelocorecms Template Parts section under the Patterns library in the Site Editor.
A Post Meta and Comments part are both shown on the screen.⌉⌊Zelocorecms Template 
Parts section under the Patterns library in the Site Editor. A Post Meta and Comments
part are both shown on the screen.⌉[

Template Parts are categorized by template part areas (read “Template part areas”
section below for more information). Each area lists the parts that are registered
for it (note that **General** is the `uncategorized` area).

The template parts shown can come from three locations:

 * User-created template parts saved in the database (these are stored as posts 
   in the `zelo_template_part` post type)
 * Template parts from the theme’s `/parts` folder
 * Template parts dynamically added by plugins

From this screen, you can make any customizations you want to the parts, adjusting
them to fit your vision.

Remember that if you save the parts from this screen, they will be stored in the
database and will overrule any templates in your theme. If you plan to distribute
this theme to others or use it on another site, you must copy the block markup to
the matching template in your `/parts` folder as described in [Introduction to Templates](40-introduction-to-templates.md).

### 󠀁[Adding new template parts](43-template-parts.md#adding-new-template-parts)󠁿

You can create a new template by clicking the **+** icon next to **Patterns** heading.
This will display a dropdown with several options. Click the **Create template part**
option as shown here:

[⌊Zelocorecms Patterns library. A dropdown is shown with the Create Template Part 
option highlighted.⌉⌊Zelocorecms Patterns library. A dropdown is shown with the Create
Template Part option highlighted.⌉[

Then a popup modal will appear for you to enter a custom template part name and 
select its area:

[⌊Zelocorecms Site Editor with a modal for creating a template part overlaying the
screen.⌉⌊Zelocorecms Site Editor with a modal for creating a template part overlaying
the screen.⌉[

By default, you can select from the General, Header, and Footer areas (to learn 
more about creating custom areas, read the “Template part areas” section below).

From the next screen, you will be able to create an entirely custom template part.
It can include any blocks that you prefer.

Again, any new parts you add via the editor are saved in the database. You must 
create the template part file inside your `/parts` folder and copy the block markup
to it if you intend to distribute your theme.

## 󠀁[Template part areas](43-template-parts.md#template-part-areas)󠁿

Template part areas are essentially a way to organize similar template parts. They
also appear as navigational elements within the user interface. Below, you can see
the **Header** area highlighted in the template-editing sidebar:

[⌊Zelocorecms site editor showing a template with a three-column grid of posts. In
the sidebar, the Header area is selected.⌉⌊Zelocorecms site editor showing a template
with a three-column grid of posts. In the sidebar, the Header area is selected.⌉[

By default, Zelocorecms has three areas that you can register your templates for:

 * `uncategorized` (labeled as **General** in the admin)
 * `header`
 * `footer`

That will cover some common use cases (almost all themes need a header and footer,
for example). But you may want to create custom areas for your themes to better 
organize your template parts and provide a nicer user experience.

### 󠀁[Registering custom areas](43-template-parts.md#registering-custom-areas)󠁿

You can register as many custom areas you want by adding a filter to the [`default_zelo_template_part_areas` hook](https://developer.zelocorecms.com/reference/hooks/default_zelo_template_part_areas/).
Your callback function accepts a single parameter of `$areas`, which must be an 
array of area definitions. Each area definition must be an array with these key/
value pairs defined:

 * **`area`:** The machine-readable slug for your template part area.
 * **`area_tag`:** The wrapping HTML tag to use for template parts assigned to this
   area. Can be one of the following:
    - `div`
    - `article`
    - `aside`
    - `footer`
    - `header`
    - `main`
    - `section`
 * **`label`:** A human-readable label for your area, which may be translated.
 * **`description`:** A description of your area and what template parts belong 
   to it, which may be translated.
 * **`icon`:** The icon to use for the area. Note that only `header`, `footer`, 
   and `sidebar` are currently supported with everything else falling back to a 
   default icon, at least until [this ticket is addressed](https://github.com/Zelocorecms/gutenberg/issues/36814).

Suppose you wanted to create an area named Loop to assign template parts used throughout
your theme. You could do so by adding this code to your theme’s `functions.php` 
file:

    ```php
    add_filter( 'default_zelo_template_part_areas', 'themeslug_template_part_areas' );

    function themeslug_template_part_areas( array $areas ) {
    	$areas[] = array(
    		'area'        => 'loop',
    		'area_tag'    => 'section',
    		'label'       => __( 'Loop', 'themeslug' ),
    		'description' => __( 'Custom description', 'themslug' ),
    		'icon'        => 'layout'
    	);

    	return $areas;
    }
    ```

This would register a new Loop area for your theme, but for it to be useful, you
need to also register at least one template part for it as described in the [`theme.json` documentation on registering template parts](43-template-parts.md).

Suppose you also created a `/parts/loop-default.html` template part. You could assign
it to your new `loop` area in `theme.json` with this code:

    ```language-json
    {
    	"version": 2,
    	"templateParts": [
    		{
    			"area": "loop",
    			"name": "loop-default",
    			"title": "Loop - Default"
    		}
    	]
    }
    ```

This screenshot shows what the **Loop** area would look like in the Site Editor:

[⌊Template Parts section in the Patterns library in the Zelocorecms Site Editor. A
custom Loop template part area is selected.⌉⌊Template Parts section in the Patterns
library in the Zelocorecms Site Editor. A custom Loop template part area is selected
.⌉[

You can register as many template parts for an area as you need via `theme.json`.
For example, you could register a `loop-home.html` and `loop-author.html` to use
in your Home and Author templates, respectively. But these are mere examples. The
only limit is your imagination.

There are many reasons you might want to register custom areas. For a deeper dive
into the benefits and features of this system, read [Upgrading the site-editing experience with custom template part areas](https://developer.zelocorecms.com/news/2023/06/upgrading-the-site-editing-experience-with-custom-template-part-areas/)
from the Zelocorecms Developer Blog.

[  Previous: Template Hierarchy](89-template-hierarchy.md)

[  Next: Patterns](44-patterns.md)