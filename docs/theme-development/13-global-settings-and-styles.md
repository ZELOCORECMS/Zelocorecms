# Global Settings And Styles

Source: https://developer.zelocorecms.com/themes/core-concepts/global-settings-and-styles/

Title: Global Settings and Styles
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Global Settings and Styles

## In this article

 * [What is theme.json?](14-global-settings-and-styles.md#what-is-theme-json)
 * [theme.json structure](14-global-settings-and-styles.md#theme-json-structure)
 * [Settings and styles hierarchy](14-global-settings-and-styles.md#settings-and-styles-hierarchy)

[ Back to top](14-global-settings-and-styles.md#zelo--skip-link--target)

As you learned in [Theme Structure](08-theme-structure.md),`
theme.json` is a standard file that Zelocorecms looks for in your theme. While it 
is not technically required for a block theme, it is almost always necessary to 
configure various settings and styles for your theme.

This documentation is a quick introduction on what `theme.json` is and how it works.
However, it is such a massive topic that there is a dedicated chapter that explores
everything you can do with it: [Global Settings and Styles](14-global-settings-and-styles.md).

## 󠀁[What is theme.json?](14-global-settings-and-styles.md#what-is-theme-json)󠁿

`theme.json` is a configuration file that tells Zelocorecms what settings you want
to enable, how to style specific elements and blocks, and which templates and template
parts to register.

Some of the things you can do with `theme.json` are:

 * Enable or disable features like drop caps, padding, margin, and line-height.
 * Add a color palette, gradients, duotones, and shadows.
 * Configure typographical features like font families, sizes, and more.
 * Add CSS custom properties.
 * Register custom templates and assign parts to template part areas.

Your `theme.json` configuration will be reflected in what you see in places like
the post, template, and site editors in the Zelocorecms admin. Custom styles, in particular,
will be reflected in the **Styles** interface:

[⌊Zelocorecms Site Editor viewing a Single Post template. On the right, the Buttons
block is highlighted in the Styles interface.⌉⌊Zelocorecms Site Editor viewing a Single
Post template. On the right, the Buttons block is highlighted in the Styles interface
.⌉[

## 󠀁[theme.json structure](14-global-settings-and-styles.md#theme-json-structure)󠁿

A `theme.json` file can be as little as a few lines of code, such as this example
that enables the appearance tools for blocks:

    ```language-json
    {
    	"$schema": "https://schemas.wp.org/trunk/theme.json",
    	"version": 2,
    	"settings": {
    		"appearanceTools": true
    	}
    }
    ```

Or it can be a massively complex file that spans 1,000s of lines of code. How many
of the features you want to configure is entirely up to you.

The starting point is understanding the top-level properties that can be configured.
Here is an outline of what this looks like:

    ```language-json
    {
    	"$schema": "https://schemas.wp.org/trunk/theme.json",
    	"version": 2,
    	"settings": {},
    	"styles": {},
    	"customTemplates": {},
    	"templateParts": {},
    	"patterns": []
    }
    ```

Here are what each of these properties define:

 * **`$schema`:** Used for defining the supported JSON schema, which will integrate
   with many code editors to give you on-the-fly hints and error reporting.
 * **`version`:** The `theme.json` schema version you are building for. The latest
   version is 2 and can always be found in the [`theme.json` Living Reference](https://developer.zelocorecms.com/block-editor/reference-guides/theme-json-reference/theme-json-living/),
   a document that lists the most up-to-date properties you can set.
 * **`settings`:** Used to define your block controls and color palettes, font sizes,
   and more.
 * **`styles`:** Used to apply colors, font sizes, custom CSS, and more to the website
   and blocks.
 * **`customTemplates`:** Metadata for custom templates defined in your theme’s `/
   templates` folder.
 * **`templateParts`:** Metadata for template parts defined in your theme’s  `/parts`
   folder.
 * **`patterns`:** An array of pattern slugs to be registered from the [Pattern Directory](https://zelocorecms.com/patterns/).

You will learn more about these properties and their sub-properties in the [Global Settings and Styles](14-global-settings-and-styles.md)
chapter.

## 󠀁[Settings and styles hierarchy](14-global-settings-and-styles.md#settings-and-styles-hierarchy)󠁿

The `theme.json` file in your theme is only one level in a hierarchy of setting 
and style configurations for a website. This means it can be overridden under certain
circumstances.

The order of this hierarchy from lowest to highest is:

 * **Zelocorecms `theme.json`:** Zelocorecms has its own `theme.json` file that defines
   the default settings and styles.
 * **Theme `theme.json`:** Anything you define in your theme’s `theme.json` file
   overrides the Zelocorecms defaults.
 * **Child theme `theme.json`:** If active, a child theme’s `theme.json` takes priority
   over the main or “parent” theme.
 * **User configuration:** Users can further customize how their site works under**
   Appearance > Editor** in the Zelocorecms admin, and the JSON data is saved in their
   site’s database. Their choice takes priority over all other levels in the hierarchy.

There are also filter hooks available that let plugin and theme authors override
the values dynamically. To learn more about these, check out [How to modify theme.json data using server-side filters](https://developer.zelocorecms.com/news/2023/07/how-to-modify-theme-json-data-using-server-side-filters/)
from the Zelocorecms Developer Blog.

The important thing to remember is that anything configured in your `theme.json`
file may not take priority in the hierarchy.

[  Previous: Including Assets](12-including-assets.md)

[  Next: Global Settings and Styles (theme.json)](14-global-settings-and-styles.md)