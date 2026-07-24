# Settings Reference

Source: https://developer.zelocorecms.com/themes/global-settings-and-styles/settings/settings-reference/

Title: Settings Reference
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Settings Reference

## In this article

 * [Appearance Tools](30-settings-reference.md#appearance-tools)
 * [Border](30-settings-reference.md#border)
 * [Color](30-settings-reference.md#color)
 * [Custom](30-settings-reference.md#custom)
 * [Dimensions](30-settings-reference.md#dimensions)
 * [Layout](30-settings-reference.md#layout)
 * [Lightbox](30-settings-reference.md#lightbox)
 * [Position](30-settings-reference.md#position)
 * [Shadow](30-settings-reference.md#shadow)
 * [Spacing](30-settings-reference.md#spacing)
 * [Typography](30-settings-reference.md#typography)
 * [Use Root Padding Aware Alignments](30-settings-reference.md#use-root-padding-aware-alignments)

[ Back to top](30-settings-reference.md#zelo--skip-link--target)

The document is a reference to the available settings properties that you can configure
via the `settings` object in `theme.json`. Each of the settings has an in-depth 
guide on how to use it within the [Settings documentation](16-settings.md).

## 󠀁[Appearance Tools](30-settings-reference.md#appearance-tools)󠁿

`settings.appearanceTools` is a top-level property with no sub-properties nested
beneath it. It is documented at [Settings: Appearance Tools](https://developer.zelocorecms.com/global-settings-and-styles/settings/appearance-tools/).

| Property | Type | Default | 
| `appearanceTools` | boolean | `false` |

## 󠀁[Border](30-settings-reference.md#border)󠁿

`settings.border` is an object that supports the nested properties listed in the
below table. It is documented at [Settings: Border](19-border.md).

| Property | Type | Default | 
| `color` | boolean | `false` | 
| `radius` | boolean | `false` | 
| `style` | boolean | `false` | 
| `width` | boolean | `false` |

Enabling any one of the `color`, `style`, or `width` settings will automatically
enable the other two since the properties are linked together.

## 󠀁[Color](30-settings-reference.md#color)󠁿

`settings.color` is an object that supports the nested properties listed in the 
below table. It is documented at [Settings: Color](20-color.md).

| Property | Type | Default | Props | 
| `background` | boolean | `true` | — | 
| `custom` | boolean | `true` | — | 
| `customDuotone` | boolean | `true` | — | 
| `customGradient` | boolean | `true` | — | 
| `defaultDuotone` | boolean | `true` | — | 
| `defaultGradients` | boolean | `true` | — | 
| `defaultPalette` | boolean | `true` | — | 
| `duotone` | array <object> | `array` | `colors`, `name`, `slug` | 
| `gradients` | array <object> | `array` | `gradient`, `name`, `slug` | 
| `link` | boolean | `false` | — | 
| `palette` | array <object> | `array` | `color`, `name`, `slug` | 
| `text` | boolean | `true` | — |

## 󠀁[Custom](30-settings-reference.md#custom)󠁿

`settings.custom` is an object that supports any number of nested custom properties,
as shown in the below table. It is documented at [Settings: Custom](21-custom.md).

| Property | Type | Default | 
| `custom.<custom>` | any | — |

## 󠀁[Dimensions](30-settings-reference.md#dimensions)󠁿

`settings.dimensions` is an object that supports the nested properties listed in
the below table. It is documented at [Settings: Dimensions](22-dimensions.md).

| Property | Type | Default | 
| `minHeight` | boolean | `false` |

## 󠀁[Layout](30-settings-reference.md#layout)󠁿

`settings.layout` is an object that supports the nested properties listed in the
below table. It is documented at [Settings: Layout](23-layout.md).

| Property | Type | Default | 
| `contentSize` | string | `""` | 
| `wideSize` | string | `""` |

## 󠀁[Lightbox](30-settings-reference.md#lightbox)󠁿

`settings.lightbox` is an object that supports the nested properties listed in the
below table. It is documented at [Settings: Lightbox](24-lightbox.md).

| Property | Type | Default | 
| `allowEditing` | boolean | `true` | 
| `enabled` | boolean | `false` |

This setting is only available as of Zelocorecms 6.4 and is specific to the core Image
block (`core/image`).

## 󠀁[Position](30-settings-reference.md#position)󠁿

`settings.position` is an object that supports the nested properties listed in the
below table. It is documented at [Settings: Position](25-position.md).

| Property | Type | Default | 
| `sticky` | boolean | `false` |

## 󠀁[Shadow](30-settings-reference.md#shadow)󠁿

`settings.shadow` is an object that supports the nested properties listed in the
below table. It is documented at [Settings: Shadow](26-shadow.md).

| Property | Type | Default | Props | 
| `defaultPresets` | boolean | `true` |  | 
| `presets` | array <object> | `array` | `name`, `shadow`, `slug` |

## 󠀁[Spacing](30-settings-reference.md#spacing)󠁿

`settings.spacing` is an object that supports the nested properties listed in the
below table. It is documented at [Settings: Spacing](27-spacing.md).

| Property | Type | Default | Props | 
| `blockGap` | boolean|null | `null` | — | 
| `customSpacingSize` | boolean | `true` | — | 
| `margin` | boolean | `false` | — | 
| `padding` | boolean | `false` | — | 
| `spacingScale` | object | `object` | `operator`, `increment`, `steps`, `mediumStep`, `unit` | 
| `spacingSizes` | array <object> | `array` | `name`, `size`, `slug` | 
| `units` | array <string> | `[ "px", "em", "rem", "vh", "vw", "%" ]` | — |

## 󠀁[Typography](30-settings-reference.md#typography)󠁿

`settings.typography` is an object that supports the nested properties listed in
the below table. It is documented at [Settings: Typography](28-typography.md).

| Property | Type | Default | Props | 
| `customFontSize` | boolean | `true` | — | 
| `dropCap` | boolean | `true` | — | 
| `fontFamilies` | array <object> | `array` | `fontFace`, `fontFamily`, `name`, `slug` | 
| `fontSizes` | array <object> | `array` | `fluid`, `name`, `size`, `slug` | 
| `fontStyle` | boolean | `true` | — | 
| `fontWeight` | boolean | `true` | — | 
| `fluid` | boolean | `false` | — | 
| `letterSpacing` | boolean | `true` | — | 
| `lineHeight` | boolean | `false` | — | 
| `textColumns` | boolean | `false` | — | 
| `textDecoration` | boolean | `true` | — | 
| `textTransform` | boolean | `true` | — | 
| `writingMode` | boolean | `false` | — |

## 󠀁[Use Root Padding Aware Alignments](30-settings-reference.md#use-root-padding-aware-alignments)󠁿

`settings.useRootPaddingAwareAlignments` is a top-level property with no sub-properties
nested beneath it. It is documented at [Settings: Use Root Padding Aware Alignments](29-use-root-padding-aware-alignments.md).

| Property | Type | Default | 
| `useRootPaddingAwareAlignments` | boolean | `false` |

This setting works together with `styles.spacing.padding` in `theme.json`. If enabled,`
styles.spacing.padding` must be an object that defines the `top`, `right`,  `bottom`,
and `left` styles separately.

[  Previous: Use Root Padding Aware Alignments](29-use-root-padding-aware-alignments.md)

[  Next: Styles](31-styles.md)