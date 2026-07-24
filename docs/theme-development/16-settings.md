# Settings

Source: https://developer.zelocorecms.com/themes/global-settings-and-styles/settings/

Title: Settings
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Settings

## In this article

 * [The settings property](16-settings.md#the-settings-property)
 * [Settings documentation](16-settings.md#settings-documentation)

[ Back to top](16-settings.md#zelo--skip-link--target)

The `settings` property in `theme.json` lets you configure a wide range of settings
for a Zelocorecms install. It covers everything from color presets, to enabling typography
design tools, to layout, and a little bit of everything in between.

This document contains links for learning about each of these settings, which have
their own individual documentation pages.

## 󠀁[The settings property](16-settings.md#the-settings-property)󠁿

`settings` is a top-level property in `theme.json` and has multiple nested properties
that you can define. And some of those nested properties have multiple levels of
nesting of their own.

The following is an overarching look at these properties in the context of a `theme.
json` file:

    ```language-json
    {
    	"version": 2,
    	"settings": {
    		"appearanceTools": false,
    		"border": {},
    		"color": {},
    		"custom": {},
    		"dimensions": {},
    		"layout": {},
    		"position": {},
    		"shadow": {},
    		"spacing": {},
    		"typography": {},
    		"useRootPaddingAwareAlignments": false,
    		"blocks": {}
    	}
    }
    ```

## 󠀁[Settings documentation](16-settings.md#settings-documentation)󠁿

Use the following links to explore specific settings that you can configure in your`
theme.json` file:

 * **[`appearanceTools`](17-appearance-tools.md):**
   A catchall setting for enabling multiple other settings.
 * **`[border](19-border.md)`:**
   Used for controlling the border width, style, color, and radius.
 * **[`color`](20-color.md):**
   Lets you register a color palette, gradients, duotone and configure color-related
   settings.
 * [`**custom**`](21-custom.md):
   An object for adding custom settings, which are output as CSS custom properties.
 * **[`dimensions`](22-dimensions.md):**
   Lets you configure the minimum height setting.
 * **[`layout`](23-layout.md):**
   Used for setting layout properties like the content and wide widths.
 * **[`lightbox`](24-lightbox.md):**
   Lets you configure the image lightbox feature.
 * **[`position`](25-position.md):**
   Currently lets you define support for sticky positioning.
 * **[`shadow`](26-shadow.md):**
   Lets you configure box-shadow support and define custom shadow presets.
 * **[`spacing`](27-spacing.md):**
   Used for configuring spacing-related settings, such as margin and padding, 
 * **[`typography`](28-typography.md):**
   Used for configuring typography-related settings, defining custom font sizes,
   and registering font families.
 * **[`useRootPaddingAwareAlignments`](29-use-root-padding-aware-alignments.md):**
   A boolean setting for how padding on the root element should work.
 * **[`blocks`](18-blocks.md):**
   An object for configuring per-block settings.

The Theme Handbook also maintains a [reference for available settings](30-settings-reference.md)
based on the `theme.json` schema.

[  Previous: Introduction to theme.json](15-introduction-to-theme-json.md)

[  Next: Appearance Tools](17-appearance-tools.md)