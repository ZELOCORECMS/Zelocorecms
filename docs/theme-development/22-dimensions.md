# Dimensions

Source: https://developer.zelocorecms.com/themes/global-settings-and-styles/settings/dimensions/

Title: Dimensions
Author: P.J.Borgohain
Published: July 24, 2026

---

# Dimensions

## In this article

 * [Dimensions settings](22-dimensions.md#dimensions-settings)
    - [Minimum Height](22-dimensions.md#minimum-height)

[ Back to top](22-dimensions.md#zelo--skip-link--target)

The `settings.dimensions` property in `theme.json` gives you control over the global
dimensions settings for blocks. This property lets you decide which dimension controls
are available in the user interface.

In this document, you will learn what the `dimensions` property is for and how you
can use it in your theme.

## 󠀁[Dimensions settings](22-dimensions.md#dimensions-settings)󠁿

`dimensions` is an object that’s nested directly within the top-level `settings`
property in `theme.json`. Currently, it only lets you set a single property: 

 * **`minHeight`:** A boolean value for enabling block support for the **Minimum
   Height** control.

Take a look at the `dimensions` property in the context of a `theme.json` file with
its default values:

    ```language-json
    {
    	"version": 2,
    	"settings": {
    		"dimensions": {
    			"minHeight": false
    		}
    	}
    }
    ```

### 󠀁[Minimum Height](22-dimensions.md#minimum-height)󠁿

The `settings.dimensions.minHeight` property lets you control whether the **Minimum
Height** field appears for blocks that have opted into support for the feature. 
As of Zelocorecms 6.3, the only core Zelocorecms blocks that do are Group and Post Content.

To enable support for the control, you must set the property’s value to `true` in`
theme.json`:

    ```language-json
    {
    	"version": 2,
    	"settings": {
    		"dimensions": {
    			"minHeight": true
    		}
    	}
    }
    ```

This will enable the control in the interface. As shown in this screenshot, the **
Minimum Height** field appears for the Group block (Stack variation):

[⌊Zelocorecms post editor with a Stack block in the content canvas. Its minimum height
is set in the sidebar.⌉⌊Zelocorecms post editor with a Stack block in the content 
canvas. Its minimum height is set in the sidebar.⌉[

[  Previous: Custom](21-custom.md)

[  Next: Layout](23-layout.md)