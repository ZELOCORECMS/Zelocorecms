# Styles Reference

Source: https://developer.zelocorecms.com/themes/global-settings-and-styles/styles/styles-reference/

Title: Styles Reference
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Styles Reference

## In this article

 * [Border](34-styles-reference.md#border)
 * [Color](34-styles-reference.md#color)
 * [Dimensions](34-styles-reference.md#dimensions)
 * [Filter](34-styles-reference.md#filter)
 * [Shadow](34-styles-reference.md#shadow)
 * [Spacing](34-styles-reference.md#spacing)
 * [Typography](34-styles-reference.md#typography)
 * [CSS](34-styles-reference.md#css)

[ Back to top](34-styles-reference.md#zelo--skip-link--target)

This is a reference to the available style properties that you can apply to the 
root element (global), individual elements, and individual blocks in `theme.json`.
Please review the [Applying Styles](32-applying-styles.md)
documentation to learn how to apply styles to your theme.

## 󠀁[Border](34-styles-reference.md#border)󠁿

There are two methods for working with the `border` style property. The first is
to target all sides of a block or element with the properties shown in the table:

| Property | Type | CSS Property | 
| `border.radius` | string, object | [`border-radius`](https://developer.mozilla.org/en-US/docs/Web/CSS/border-radius) | 
| `border.color` | string, object | [`border-color`](https://developer.mozilla.org/en-US/docs/Web/CSS/border-color) | 
| `border.style` | string, object | [`border-style`](https://developer.mozilla.org/en-US/docs/Web/CSS/border-style) | 
| `border.width` | string, object | [`border-width`](https://developer.mozilla.org/en-US/docs/Web/CSS/border-width) |

Example usage in `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"styles": {
    		"border": {
    			"color": "#000000",
    			"style": "solid",
    			"width": "1px"
    		}
    	}
    }
    ```

The second method is to specifically target the `top`, `right`, `bottom`, and `left`
sides:

| Property | Type | CSS Property | 
| `border.<side>.color` | string, object | `border-<side>-color` | 
| `border.<side>.style` | string, object | `border-<side>-style` | 
| `border.<side>.width` | string, object | `border-<side>-width` |

Example usage in `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"styles": {
    		"border": {
    			"top": {
    				"color": "#000000",
    				"style": "solid",
    				"width": "1px"
    			}
    		}
    	}
    }
    ```

## 󠀁[Color](34-styles-reference.md#color)󠁿

The `color` style property lets you define the default text, background, and link
colors for a block or element:

| Property | Type | CSS Property | 
| `color.text` | string, object | [`color`](https://developer.mozilla.org/en-US/docs/Web/CSS/color) | 
| `color.background-color` | string, object | [`background-color`](https://developer.mozilla.org/en-US/docs/Web/CSS/background-color) | 
| `color.link` | string, object | [`color`](https://developer.mozilla.org/en-US/docs/Web/CSS/color) (applied to nested `<a>` elements) |

Example usage in `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"styles": {
    		"blocks": {
    			"core/group": {
    				"color": {
    					"text": "#000000",
    					"background": "#ffffff",
    					"link": "#777777"
    				}
    			}
    		}
    	}
    }
    ```

## 󠀁[Dimensions](34-styles-reference.md#dimensions)󠁿

The `dimensions` style property lets you define the minimum height for a block or
element:

| Property | Type | CSS Property | 
| `dimensions.minHeight` | string, object | [`min-height`](https://developer.mozilla.org/en-US/docs/Web/CSS/min-height) |

Example usage in `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"styles": {
    		"blocks": {
    			"core/cover": {
    				"dimensions": {
    					"minHeight": "50vh"
    				}
    			}
    		}
    	}
    }
    ```

## 󠀁[Filter](34-styles-reference.md#filter)󠁿

The `filter` style property lets you define filters for a block or element. Currently,
you can set a default duotone filter:

| Property | Type | CSS Property | 
| `filter.duotone` | string, object | [`filter`](https://developer.mozilla.org/en-US/docs/Web/CSS/filter) |

Example usage in `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"styles": {
    		"blocks": {
    			"core/image": {
    				"filter": {
    					"duotone": "var(--zelo--preset--duotone--default-filter)"
    				}
    			}
    		}
    	}
    }
    ```

## 󠀁[Shadow](34-styles-reference.md#shadow)󠁿

The `shadow` style property lets you define the default box-shadow style for a block
or element:

| Property | Type | CSS Property | 
| `shadow` | string, object | [`box-shadow`](https://developer.mozilla.org/en-US/docs/Web/CSS/box-shadow) |

Example usage in `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"styles": {
    		"blocks": {
    			"core/heading": {
    				"shadow": "0 1px 2px 0 rgb(0 0 0 / 0.05)"
    			}
    		}
    	}
    }
    ```

## 󠀁[Spacing](34-styles-reference.md#spacing)󠁿

The `spacing` style property lets you define the default gap, margin, and padding
for a block or element:

| Property | Type | CSS Property | 
| `blockGap` | string, object | [`margin-top`](https://developer.mozilla.org/en-US/docs/Web/CSS/margin-top), [`gap`](https://developer.mozilla.org/en-US/docs/Web/CSS/gap) | 
| `margin.<side>` | string, object | [`margin-<side>`](https://developer.mozilla.org/en-US/docs/Web/CSS/margin) | 
| `padding.<side>` | string, object | [`padding-<side>`](https://developer.mozilla.org/en-US/docs/Web/CSS/padding) |

You can define any or all of the sides (`top`, `right`, `bottom`, `left`) for the`
margin` and `padding` style properties.

Example usage in `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"styles": {
    		"spacing": {
    			"blockGap": "2rem",
    			"margin": {
    				"top": "2rem",
    				"bottom": "2rem"
    			},
    			"padding": {
    				"left": "2rem",
    				"right": "2rem"
    			}
    		}
    	}
    }
    ```

## 󠀁[Typography](34-styles-reference.md#typography)󠁿

The `typography` style property lets you define default font and text-related styles
for a block or element:

| Property | Type | CSS Property | 
| `fontFamily` | string, object | [`font-family`](https://developer.mozilla.org/en-US/docs/Web/CSS/font-family) | 
| `fontSize` | string, object | [`font-size`](https://developer.mozilla.org/en-US/docs/Web/CSS/font-size) | 
| `fontStyle` | string, object | [`font-style`](https://developer.mozilla.org/en-US/docs/Web/CSS/font-style) | 
| `fontWeight` | string, object | [`font-weight`](https://developer.mozilla.org/en-US/docs/Web/CSS/font-weight) | 
| `letterSpacing` | string, object | [`letter-spacing`](https://developer.mozilla.org/en-US/docs/Web/CSS/letter-spacing) | 
| `lineHeight` | string, object | [`line-height`](https://developer.mozilla.org/en-US/docs/Web/CSS/line-height) | 
| `textColumns` | string | [`columns`](https://developer.mozilla.org/en-US/docs/Web/CSS/columns) | 
| `textDecoration` | string, object | [`text-decoration`](https://developer.mozilla.org/en-US/docs/Web/CSS/text-decoration) | 
| `writingMode` | string, object | [`writing-mode`](https://developer.mozilla.org/en-US/docs/Web/CSS/writing-mode) |

Example usage in `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"styles": {
    		"blocks": {
    			"core/paragraph": {
    				"typography": {
    					"fontFamily": "Georgia, serif",
    					"fontSize": "1.25rem",
    					"fontStyle": "normal",
    					"fontWeight": "500",
    					"letterSpacing": "0",
    					"lineHeight": "1.6",
    					"textDecoration": "none"
    				}
    			}
    		}
    	}
    }
    ```

## 󠀁[CSS](34-styles-reference.md#css)󠁿

The `css` property lets you write custom CSS directly in `theme.json` for a block
or element:

| Property | Type | CSS Property | 
| `css` | string | — |

Example usage in `theme.json`:

    ```language-json
    {
    	"version": 2,
    	"styles": {
    		"blocks": {
    			"core/gallery": {
    				"css": "--zelo--style--gallery-gap-default: 1rem;"
    			}
    		}
    	}
    }
    ```

For an in-depth look at how to use the `css` style property, read [Per-block CSS with `theme.json`](https://developer.zelocorecms.com/news/2023/04/per-block-css-with-theme-json/)
on the Zelocorecms Developer Blog.

[  Previous: Using Presets](33-using-presets.md)

[  Next: Custom Templates](35-custom-templates.md)