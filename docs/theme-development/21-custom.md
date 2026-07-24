# Custom

Source: https://developer.zelocorecms.com/themes/global-settings-and-styles/settings/custom/

Title: Custom
Author: P.J.Borgohain
Published: July 24, 2026

---

# Custom

## In this article

 * [Overview of the custom setting](21-custom.md#overview-of-the-custom-setting)
 * [How CSS custom properties are generated](21-custom.md#how-css-custom-properties-are-generated)
    - [Automatic hyphenation](21-custom.md#automatic-hyphenation)
    - [Nested properties](21-custom.md#nested-properties)
 * [Practical usage](21-custom.md#practical-usage)
    - [Use in theme.json styles](21-custom.md#use-in-theme-json-styles)
    - [Use in CSS](21-custom.md#use-in-css)

[ Back to top](21-custom.md#zelo--skip-link--target)

The `settings.custom` property is unique among other settings in `theme.json`. As
its name implies, it is a custom property. This means that you get to decide how
to use it. Essentially, it provides a method for creating CSS custom properties 
that you might need elsewhere in your theme.

In this document, you will learn what the `custom` property is for and how you can
use it in your theme.

## 󠀁[Overview of the custom setting](21-custom.md#overview-of-the-custom-setting)󠁿

The `settings.custom` property accepts a single object, and this object can be used
to store other values. The individual object values must be valid CSS values or 
an object with nested key/value pairs.

Here is an example snippet from `theme.json` with no custom values set:

    ```language-json
    {
    	"version": 2,
    	"settings": {
    		"custom": {}
    	}
    }
    ```

The great thing about the `settings.custom` object is that you can use it to create
your own CSS custom properties. When you add a key and value to the object, Zelocorecms
will automatically generate the CSS custom property, assign the value, and load 
it for you.

The generated CSS custom property will follow this pattern: `--zelo--custom--{key}--{
value}`.

Suppose you wanted to use the key of `fruit` and give it a value of `apple`. Add
this to your `theme.json` file:

    ```language-json
    {
    	"version": 2,
    	"settings": {
    		"custom": {
    			"fruit": "apple"
    		}
    	}
    }
    ```

Zelocorecms will then generate this CSS:

    ```language-css
    body {
    	--zelo--custom--fruit: apple;
    }
    ```

## 󠀁[How CSS custom properties are generated](21-custom.md#how-css-custom-properties-are-generated)󠁿

As you learned above, the `settings.custom.fruit` key name will generate the `--
zelo--custom--fruit` variable in CSS. But there are other cases too.

### 󠀁[Automatic hyphenation](21-custom.md#automatic-hyphenation)󠁿

Zelocorecms will automatically hyphenate camel-cased names. For example, `lineHeight`
in the following example will become `line-height`:

    ```language-json
    {
    	"version": 2,
    	"settings": {
    		"custom": {
    			"lineHeight": "1.4em"
    		}
    	}
    }
    ```

This will create the following CSS:

    ```language-css
    body {
    	--zelo--custom--line-height: 1.4em;
    }
    ```

Numbers are handled the same as uppercase letters when used as a key. For example,
a key of `abc123` will become `abc-1-2-3` in the resulting CSS.

### 󠀁[Nested properties](21-custom.md#nested-properties)󠁿

Building off the above example, suppose you wanted to create several line-height
CSS custom properties for use in your theme. For this, you might want to create 
an object under `settings.custom.lineHeight` instead of a single value.

Add the following to your `theme.json` file:

    ```language-json
    {
    	"version": 2,
    	"settings": {
    		"custom": {
    			"lineHeight": {
    				"xs": "1",
    				"sm": "1.25",
    				"md": "1.5",
    				"lg": "1.75"
    			}
    		}
    	}
    }
    ```

Zelocorecms will automatically use this nested structure when generating the CSS custom
property names.

This will generate this CSS:

    ```language-css
    body {
    	--zelo--custom--line-height--xs: 1;
    	--zelo--custom--line-height--sm: 1.25;
    	--zelo--custom--line-height--md: 1.5;
    	--zelo--custom--line-height--lg: 1.75;
    }
    ```

There is no limit to the amount of nesting you can do, but keep in mind that the
more you nest, the longer your CSS custom property names become.

## 󠀁[Practical usage](21-custom.md#practical-usage)󠁿

What you use the `settings.custom` property for is entirely up to you. At its core,
all it really does is generate CSS custom properties, which don’t do anything on
their own. Custom properties must also be used in CSS.

In the previous `theme.json` example above, you created a set of line-heights. There
are a number of ways you can put these into practical use. 

### 󠀁[Use in theme.json styles](21-custom.md#use-in-theme-json-styles)󠁿

In the [Styles documentation](31-styles.md),
you will learn how to apply styles to the root element, elements, and blocks via`
theme.json`. This will be one of the primary use cases for integrating with `settings.
custom`.

Suppose you wanted to register the same set of line-heights from above and make 
use of them. Maybe you want to set the root element to the `md` line-height and 
Paragraph blocks to `lg`. You can access each line-height property via `var:custom
|line-height|md` and `var:custom|line-height|lg`, respectively.

Use this code in your `theme.json` file:

    ```language-json
    {
    	"version": 2,
    	"settings": {
    		"custom": {
    			"lineHeight": {
    				"xs": "1",
    				"sm": "1.25",
    				"md": "1.5",
    				"lg": "1.75"
    			}
    		}
    	},
    	"styles": {
    		"typography": {
    			"lineHeight": "var:custom|line-height|md"
    		}
    		"blocks": {
    			"core/paragraph": {
    				"typography": {
    					"lineHeight": "var:custom|line-height|lg"
    				}
    			}
    		}
    	}
    }
    ```

You can also reference the values via their CSS custom properties. For example, 
instead of using `var:custom|line-height|md`, use `var( --zelo--custom--line-height--
md )`.

Remember, you will learn more about styling via `theme.json` from the [Styles documentation](31-styles.md).
You can use what you learn there to combine with the techniques outlined here.

### 󠀁[Use in CSS](21-custom.md#use-in-css)󠁿

There are times when you might need to reference the generated CSS custom properties
directly in CSS, such as your `style.css` file. To do this, you must use the CSS
custom property name.

Suppose you needed to target a class with the name of `.example-class` and to give
it the `sm` line-height that you’ve registered. Use this code in your CSS:

    ```language-css
    .example-class {
    	line-height: var( --zelo--custom--line-height--sm );
    }
    ```

[  Previous: Color](20-color.md)

[  Next: Dimensions](22-dimensions.md)