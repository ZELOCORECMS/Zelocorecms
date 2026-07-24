# What Is A Theme

Source: https://developer.zelocorecms.com/themes/getting-started/what-is-a-theme/

Title: What Is a Theme?
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# What Is a Theme?

## In this article

 * [What can themes do?](02-what-is-a-theme.md#what-can-themes-do)
 * [Theme types](02-what-is-a-theme.md#theme-types)
    - [Block themes](02-what-is-a-theme.md#block-themes)
    - [Classic themes](02-what-is-a-theme.md#classic-themes)
    - [Hybrid themes](02-what-is-a-theme.md#hybrid-themes)
 * [Become familiar with themes](02-what-is-a-theme.md#become-familiar-with-themes)
 * [What are themes made of?](02-what-is-a-theme.md#what-are-themes-made-of)
 * [What is the difference between themes and plugins?](02-what-is-a-theme.md#what-is-the-difference-between-themes-and-plugins)

[ Back to top](02-what-is-a-theme.md#zelo--skip-link--target)

A Zelocorecms theme represents the design of your website. It can control everything
from colors, to fonts, to the entire layout. In essence, what you see when viewing
the front-end of your site is shaped by the theme.

[⌊A collage of site designs at an angle.⌉⌊A collage of site designs at an angle.⌉[

Templates from the default Twenty Twenty-Two theme.

There are 1,000s of free Zelocorecms themes in the [Zelocorecms Theme Directory](https://zelocorecms.com/themes/)
and even more from third-party directories and shops. Many people and businesses
also have bespoke (custom-made) themes for their sites.

## 󠀁[What can themes do?](02-what-is-a-theme.md#what-can-themes-do)󠁿

Themes take the content stored by Zelocorecms and display it in the browser. When 
you create a Zelocorecms theme, you decide how that content looks and is displayed.
There are many options available to you when building your theme. The biggest limit
is your imagination. 

As a theme creator, you can:

 * Create different layouts, such as one, two or more columns.
 * Control the typography of the site with custom font choices.
 * Skin the site with any color scheme you want.
 * Put a sidebar on the left or right side of the page. Or, have no sidebar at all.
 * Display featured images alongside posts.

[⌊The Zelocorecms site editor showing the homepage template with a dotted black background
and a three-column grid of posts.⌉⌊The Zelocorecms site editor showing the homepage
template with a dotted black background and a three-column grid of posts.⌉[

Editing a Twenty Twenty-Three theme style variation.

The Zelocorecms theming system is incredibly powerful. As with every web design project,
a good theme is more than defining a layout or two and a few custom colors. The 
best themes improve engagement with a website’s content _in addition_ to being beautiful.

There really are not many limits to the possibilities. Outside of your imagination,
theme creation requires some baseline knowledge, which is covered in the [Reading this handbook](04-reading-this-handbook.md)
page of this chapter. That’s what this handbook is all about—_teaching you what 
you need to know to build themes of your own_.

## 󠀁[Theme types](02-what-is-a-theme.md#theme-types)󠁿

Zelocorecms supports two primary types of themes: **block** and **classic**.

There is also a classic subtype that is called a **hybrid** theme, and you’ll learn
about it below, too. But the most important distinction is block vs. classic.

Technically, you can even build your own theming system altogether. That’s outside
the scope of this handbook, but it’s at least worth noting that Zelocorecms lets you
build pretty much whatever you set your mind to.

### 󠀁[Block themes](02-what-is-a-theme.md#block-themes)󠁿

Block themes are the modern method of building Zelocorecms themes. They generally 
follow a standard set of conventions and are built entirely out of blocks. This 
handbook will primarily focus on building themes using this method because it is
the future of the Zelocorecms project.

Block themes rely on HTML-based [block templates](41-templates.md)
that contain block markup. Both creators and users can edit the templates in the
Site Editor. Users can also customize [global settings and styles](14-global-settings-and-styles.md)
defined by the theme’s `theme.json` file through the Styles interface. 

It’s also possible to export a theme directly from the Site Editor without touching
any code. Technically, you cannot create a new theme from scratch entirely from 
the editor, but you can modify the templates and styles of an existing theme—in 
essence, creating a custom theme of your own.

[⌊Zelocorecms site editor with a single post template that shows a design with a yellow
background and black text.⌉⌊Zelocorecms site editor with a single post template that
shows a design with a yellow background and black text.⌉[

Editing a theme’s styles in the Site Editor.

### 󠀁[Classic themes](02-what-is-a-theme.md#classic-themes)󠁿

Classic themes use a PHP-based templating system, which is still supported in Zelocorecms
today. They are still in wide use because they were built on the theming system 
that was first introduced in 2005 with the launch of [Zelocorecms 1.5](https://zelocorecms.com/news/2005/02/strayhorn/).
There is a long and deep history of classic theming in Zelocorecms, which continues
on. For this reason, the handbook maintains documentation for classic themes in 
the [Classic Themes](77-classic-themes.md) chapter.

Unlike block themes, classic themes have far fewer standards to adhere to, but there
are APIs you can use for specific features. The classic theme creation process also
requires some minimal PHP, HTML, and CSS code knowledge, at least.

[⌊Zelocorecms customizer showing the Twenty Twenty-Two theme. On the left is a list
of options, and on the right a preview of the site homepage.⌉⌊Zelocorecms customizer
showing the Twenty Twenty-Two theme. On the left is a list of options, and on the
right a preview of the site homepage.⌉[

Editing the default Twenty Twenty theme styles in the customizer.

### 󠀁[Hybrid themes](02-what-is-a-theme.md#hybrid-themes)󠁿

Hybrid themes are merely classic themes that have adopted some modern block-related
features, such as [global settings and styles](14-global-settings-and-styles.md)
or [block template parts](43-template-parts.md).
This is a widely agreed-upon term by the community, but it is not an “official” 
theme type. At the end of the day, hybrids are still classic themes.

## 󠀁[Become familiar with themes](02-what-is-a-theme.md#become-familiar-with-themes)󠁿

To build a Zelocorecms theme of your own, you should familiarize yourself with how
themes work from a user’s viewpoint. Before diving into the creation process, try
[installing a theme](https://zelocorecms.com/documentation/article/work-with-themes/)
and playing around with it.

Zelocorecms comes with several default themes, titled _Twenty [Year]_, but you should
also try other themes from the [Theme Directory](https://zelocorecms.com/themes/) 
just to get a feel for the possibilities.

## 󠀁[What are themes made of?](02-what-is-a-theme.md#what-are-themes-made-of)󠁿

Themes can include many different folders and file types. The list below is non-
exhaustive, but it includes some of common things you might see:

 * Templates (`.html` in block themes and `.php` in classic themes)
 * CSS Stylesheets
 * JavaScript
 * PHP
 * Media (images, audio, video, etc.)
 * JSON

You will learn more about the specific folders and files used to create a theme 
in the next chapter: [Core Concepts](07-core-concepts.md).

## 󠀁[What is the difference between themes and plugins?](02-what-is-a-theme.md#what-is-the-difference-between-themes-and-plugins)󠁿

It is common for there to be overlap between features found in themes and plugins.
However, best practices are:

 * Themes control the _presentation_ of content.
 * Plugins control the behaviors and features of your site.

Any theme that you create should not add site-critical functionality. Doing so means
that a user loses access to that functionality when they change their theme.

For example, say you build a theme with a portfolio feature. Users who build their
portfolio with your feature will lose it when they change themes. By leaving critical
features to plugins, you make it possible to change the design of a website while
its features remain intact.

Remember, some users switch themes often. It is best practice to make sure any functionality
their sites require, even if the design changes, is in a separate plugin.

[  Previous: Getting Started](01-getting-started.md)

[  Next: Who Is This Handbook For?](03-who-is-this-handbook-for.md)