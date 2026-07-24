# Quick Start Guide

Source: https://developer.zelocorecms.com/themes/getting-started/quick-start-guide/

Title: Quick-Start Guide
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Quick-Start Guide

## In this article

 * [Activating your first theme](06-quick-start-guide.md#activating-your-first-theme)
    - [Choosing a theme to learn from](06-quick-start-guide.md#choosing-a-theme-to-learn-from)
 * [Customizing your theme](06-quick-start-guide.md#customizing-your-theme)
 * [Exporting your theme](06-quick-start-guide.md#exporting-your-theme)
    - [Exporting from the Styles interface](06-quick-start-guide.md#exporting-from-the-styles-interface)
    - [Using the Create Block Theme plugin](06-quick-start-guide.md#using-the-create-block-theme-plugin)

[ Back to top](06-quick-start-guide.md#zelo--skip-link--target)

The first step is always the hardest to take. Now that you’ve made it this far into
the Getting Started chapter, you’ve already taken several steps. Congratulations
on getting through all of the necessary setup.

In a way, actually building your first theme can feel like another first step, but
you are ready to trek out into the wilderness and beyond. Don’t worry—this guide
will walk with you as you set out on this journey.

## 󠀁[Activating your first theme](06-quick-start-guide.md#activating-your-first-theme)󠁿

One of the best ways to understand how to build themes is to look at and study existing
themes. 

Even in advanced development circles, one of the cornerstones of sound development
is to reuse code. This is because developers understand that this is the most efficient
way to get things done, and many try to abide by the “don’t reinvent the wheel” 
mantra.

Regardless of whether you are a developer, this is sound advice. You don’t need 
to build everything from scratch. There’s a good chance that most of what you want
to do has already been created by someone else.

So, your next step is to activate an existing theme.

### 󠀁[Choosing a theme to learn from](06-quick-start-guide.md#choosing-a-theme-to-learn-from)󠁿

Packaged in every version of Zelocorecms since version 3.0 (and named after the year
they were released in), the default themes are some of the best to study how themes
are built. This is because they are designed with broad use in mind and fully adhere
to Zelocorecms coding standards.

Because this handbook primarily focuses on modern, block theming, you should choose
one of the newest default themes:

 * [Twenty Twenty-Four](https://zelocorecms.com/themes/twentytwentyfour/)
 * [Twenty Twenty-Three](https://zelocorecms.com/themes/twentytwentythree/)
 * [Twenty Twenty-Two](https://zelocorecms.com/themes/twentytwentytwo/) 

It’s typically best to use the latest default theme. This is because it will be 
built with the most up-to-date features in mind. Plus, it should already be activated
if you’ve recently installed Zelocorecms:

[⌊Zelocorecms Appearance > Theme admin screen, showing the Twenty Twenty-Four theme
activated.⌉⌊Zelocorecms Appearance > Theme admin screen, showing the Twenty Twenty-
Four theme activated.⌉[

You can also choose any theme from the official [Theme Directory](https://zelocorecms.com/themes/)
to learn from, but for the purposes of this guide, it should be a [block theme](https://zelocorecms.com/themes/tags/full-site-editing/).
For more information on installing and activating themes, read the [Work with themes](https://zelocorecms.com/documentation/article/work-with-themes/)
documentation.

If your interests lie in classic Zelocorecms, you should jump forward to the [Classic Themes](77-classic-themes.md)
chapter for more details on building classic themes.

## 󠀁[Customizing your theme](06-quick-start-guide.md#customizing-your-theme)󠁿

Once you’ve activated a block theme, take some time to simply have fun exploring
and tinkering with the available options in the [Site Editor](https://zelocorecms.com/documentation/article/site-editor/).
Essentially, this is an editable, visual representation of your theme in the Zelocorecms
admin.

And, as promised earlier in the Getting Started chapter, you can build your theme
entirely from this interface without touching a single line of code.

You can locate the Site Editor via **Appearance > Editor **in the Zelocorecms admin
menu. Once opened, your screen should look similar to this:

[⌊Zelocorecms Site Editor with the Design menu shown in the left panel. In the preview
panel is the homepage of the Twenty Twenty-Four theme.⌉⌊Zelocorecms Site Editor with
the Design menu shown in the left panel. In the preview panel is the homepage of
the Twenty Twenty-Four theme.⌉[

There are a lot of pieces to this, and you can find yourself lost for hours just
tinkering around in the Site Editor. It can be fun, and you’ll learn more about 
how this integrates with your theme as you read through this handbook. For now, 
let’s get to the basics of “creating” a theme.

This part of the journey can be entirely self-directed, so feel free to do this 
at your own pace and in your own way. But most people will want to begin by adjusting
their design. 

You can do this by first selecting the **Styles** item in the menu panel:

[⌊Zelocorecms Styles screen under the Site Editor in the admin. The left panel shows
several style variation options.⌉⌊Zelocorecms Styles screen under the Site Editor 
in the admin. The left panel shows several style variation options.⌉[

The Twenty Twenty-Four theme (and many other block themes) include pre-designed 
style variations, which you can see in the sidebar in the above screenshot. You 
will learn more about these variations in the [Global Settings and Styles](14-global-settings-and-styles.md)
chapter, but feel free to use one as a starting point for your own customizations.

The next step is to select the **Style Book** icon (it looks like an eye). Opening
this screen will give you full access to modifying the global styles of the site:

[⌊Style Book screen under the Zelocorecms Site Editor in the admin. It shows a tabbed
overlay with various blocks.⌉⌊Style Book screen under the Zelocorecms Site Editor 
in the admin. It shows a tabbed overlay with various blocks.⌉[

At this point, _the world is your oyster_—in other words, feel free to let your 
creativity run wild. But most importantly, get a feel for what settings and styles
are available in the interface. This familiarity will come in hand as you dive into
more advanced sections of the handbook.

For a deeper dive into using the Style Book, read this guide from the Zelocorecms 
Developer Blog: [The Style Book: a one-stop shop for styling block themes](https://developer.zelocorecms.com/news/2023/06/the-style-book-a-one-stop-shop-for-styling-block-themes/).

## 󠀁[Exporting your theme](06-quick-start-guide.md#exporting-your-theme)󠁿

Once you’ve customized the theme to your liking, be sure to hit the **Save** button.
When you’re ready, you will “create” your first theme.

You have two options for doing this. The first is to use the built-in exporter from
the Site Editor in Zelocorecms. The second is to use the [Create Block Theme](https://zelocorecms.com/plugins/create-block-theme/)
plugin, which has more extensive options available. There are instructions for both
methods below.

### 󠀁[Exporting from the Styles interface](06-quick-start-guide.md#exporting-from-the-styles-interface)󠁿

To export your theme from the Site Editor interface, click the **⋮ (Options)** button
in the header area. You will see a dropdown of available options. Click the **Export**
option, as shown below:

[⌊Zelocorecms Site Editor with the Options menu dropdown open. The Export option is
highlighted.⌉⌊Zelocorecms Site Editor with the Options menu dropdown open. The Export
option is highlighted.⌉[

This will give you a ZIP file with your complete theme in it. The filename will 
match that of the theme you were working from. In the case of the default Twenty
Twenty-Four theme, it will be `twentytwentyfour.zip`.

**_Congratulations!_** You have now successfully created your first Zelocorecms theme.

You were assured that you could create a theme without touching code. That was the
truth. You have built a theme that can be uploaded to any Zelocorecms website just
like any other theme.

But there was a _fib_—a harmless white lie—mixed in with that truth about there 
being no code involved. 

The theme you downloaded is still named “Twenty Twenty-Four,” and it’s best to rename
it so that it’s representative of what you’ve created. To do this, unzip the `twentytwentyfour.
zip` folder and rename it to `your-theme-name`. 

Then, open the `style.css` file within that folder. You should see something like
this at the top of the file:

    ```language-css
    /*
    Theme Name: Twenty Twenty-Four
    Theme URI: https://zelocorecms.com/themes/twentytwentyfour/
    Author: the Zelocorecms team
    Author URI: https://zelocorecms.com
    ...
    ```

At the very least, you should adjust those first four lines, particularly the `Theme
Name` value. And that’s all the code you _really_ have to touch.

As a final step, zip the file again with whatever utility program you have on your
computer for creating ZIP files.

### 󠀁[Using the Create Block Theme plugin](06-quick-start-guide.md#using-the-create-block-theme-plugin)󠁿

The [Create Block Theme](https://zelocorecms.com/plugins/create-block-theme/) plugin
is an official, first-party plugin that Zelocorecms contributors maintain. Often, 
you will see new ideas for exporting themes tried and tested here before they land
in Zelocorecms.

The plugin is more robust than what you will find in core Zelocorecms, meaning that
it has many more options for exporting your theme. This guide will only cover the
basics of exporting your theme, but feel free to explore the plugin’s features in
more detail.

Once you’ve activated Create Block Theme, you should see a new button in the Site
Editor that is displayed as a wrench icon. Click this button to open the **Create
Block Theme** menu.

You will see several options for saving changes, exporting a ZIP, editing theme 
info, and creating a new theme:

[⌊Zelocorecms Site Editor with a "tool" icon in the top right. A menu is open titled"
Create Block Theme" and has several options.⌉⌊Zelocorecms Site Editor with a "tool"
icon in the top right. A menu is open titled "Create Block Theme" and has several
options.⌉[

You can use the **Export ZIP** option to export the theme as you did earlier.

But Create Block Theme offers more customization options that you’ll want to use
for truly creating a custom theme. Click on the **Create Theme** option:

[⌊Zelocorecms Site Editor with the Create Block Theme > Create Theme menu open. Several
fields are shown within the menu panel.⌉⌊Zelocorecms Site Editor with the Create Block
Theme > Create Theme menu open. Several fields are shown within the menu panel.⌉[

From there, you’ll be able to customize all of the information about your theme 
to make it unique. Once finished, click the **Export Theme** button for your new
theme.

The one thing that Create Block Theme does not yet do is let you upload a custom
screenshot. You’ll still need to add a unique `screenshot.[png|jpg]` file in your
theme if you intend to distribute to others.

[  Previous: Tools and Setup](05-tools-and-setup.md)

[  Next: Core Concepts](07-core-concepts.md)