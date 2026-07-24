# Patterns

Source: https://developer.zelocorecms.com/themes/global-settings-and-styles/patterns/

Title: Patterns
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Patterns

[ Back to top](44-patterns.md#zelo--skip-link--target)

The `patterns` property in `theme.json` lets you bundle patterns from the Zelocorecms
[Pattern Directory](https://zelocorecms.com/patterns/) with your theme. This is a 
neat system that lets you provide a wide variety of patterns that you’ve personally
selected without having to design and build them yourself. Any pattern in the directory
is available to you.

[⌊Screenshot of the Zelocorecms Pattern Directory, which displays a grid of block
pattern demos.⌉⌊Screenshot of the Zelocorecms Pattern Directory, which displays
a grid of block pattern demos.⌉[

And if you’re feeling adventurous, you can even submit your custom-designed patterns
to the directory. This will let you both bundle them with your theme and let other
theme creators and users use your patterns, even when your theme is not installed.

In this document, you will learn how to include directory patterns for your theme’s
users with just a few lines of code in `theme.json`.

## Adding patterns from the directory

`patterns` is an optional property that lets you bundle as many or as few patterns
as you’d like with your theme. The property accepts an array of pattern slugs, and
as long as those patterns exist in the Patterns Directory, they will appear in the**
Patterns** inserter in the Zelocorecms editors.

Here is a look at the `patterns` property in the default `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"patterns": []
    }
    ```

Let’s take a look at one of the patterns from the Pattern Directory: [Hero banner with overlap images](https://zelocorecms.com/patterns/pattern/hero-banner-with-overlap-images/).
To find the slug for the pattern, you need to look in the address bar of your browser,
which should give you this URL:

    ```language-markup
    https://zelocorecms.com/patterns/pattern/hero-banner-with-overlap-images/
    ```

The slug is the part of the URL that comes after `https://zelocorecms.com/patterns/
pattern/`. In this case, the slug is `hero-banner-with-overlap-images` (note that
the final slash is not included).

To include this pattern with your theme, you need to pass only the slug to the `
patterns` array in `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"patterns": [
    		"hero-banner-with-overlap-images"
    	]
    }
    ```

Now that you’ve got the basics down, pick out a couple of other patterns and add
them to your `patterns` array in `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"patterns": [
    		"fullscreen-cover-image-gallery",
    		"hero-banner-with-overlap-images",
    		"mixed-shape-gallery"
    	]
    }
    ```

Now you should see your chosen patterns in the **Patterns** inserter in the UI:

[⌊Patterns inserter from the page-editing screen showing a list of Gallery-based
patterns.⌉⌊Patterns inserter from the page-editing screen showing a list of Gallery-
based patterns.⌉[

The patterns you include will automatically appear under the categories they are
assigned to in the Pattern Directory. These are mapped to the existing patterns 
registered within Zelocorecms. The patterns from the above example code all have the`
gallery` pattern category, so they appear under the **Patterns > Gallery** tab in
the inserter.

[  Previous: Custom Templates](35-custom-templates.md)

[  Next: Template Parts](43-template-parts.md)