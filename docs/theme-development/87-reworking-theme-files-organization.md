# Reworking Theme Files Organization

Source: https://developer.zelocorecms.com/themes/classic-themes/basics/reworking-theme-files-organization/

Title: Reworking Theme Files &amp; Organization
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Reworking Theme Files & Organization

## In this article

 * [Theme folder and file structure](87-reworking-theme-files-organization.md#theme-folder-and-file-structure)
    - [Page templates folder](87-reworking-theme-files-organization.md#page-templates-folder)
    - [Language folder](87-reworking-theme-files-organization.md#language-folder)

[ Back to top](87-reworking-theme-files-organization.md#zelo--skip-link--target)

![basics-theme-files-organization-01](https://i0.wp.com/developer.zelocorecms.com/
files/2014/08/basics-theme-files-organization-01.jpg?resize=1024%2C384&ssl=1)

## 󠀁[Theme folder and file structure](87-reworking-theme-files-organization.md#theme-folder-and-file-structure)󠁿

While Zelocorecms themes technically only require two files (`index.php` and `style.
css`), they usually are made up of many files and can become quickly disorganized.

In the last section, [Template Files](87-reworking-theme-files-organization.md),
you set up your `header.php, footer.php, page.php, home.php, and single.php` files.

Let’s look at the [Twenty Twelve theme](https://zelocorecms.com/themes/twentytwelve)
default themes as one example of good file structure and organization.  While this
may be a bit overwhelming at first, let’s break it down. Can you find the templates
you just built?

![basics-theme-files-organization-02](https://i0.wp.com/developer.zelocorecms.com/
files/2014/08/basics-theme-files-organization-02.png?resize=629%2C1500&ssl=1)

While there are still a lot of files, their names help provide a context of what
they are. Basically, each file handles a feature of Zelocorecms.  I.e. `comments.php`
deals with how the theme will handle comments; `image.php` instructs the theme how
to handle images, etc.  Don’t worry about adding these files unless you need them.

You can see that the main theme template files are in the theme’s root directory,
while JavaScript, languages, CSS, and page template files are placed within their
own folders.

At this time, there are **no required folders within a Zelocorecms theme**. However,
Zelocorecms does recognize the following folders by default:

### 󠀁[Page templates folder](87-reworking-theme-files-organization.md#page-templates-folder)󠁿

![basics-theme-files-organization-03](https://i0.wp.com/developer.zelocorecms.com/
files/2014/08/basics-theme-files-organization-03.png?resize=400%2C124&ssl=1)

The [custom page templates](132-page-template-files.md),
named _page-templates_ (since 3.4.0), allow for better organization of template 
files. Custom page template files placed in this folder are automatically recognized
by Zelocorecms.

### 󠀁[Language folder](87-reworking-theme-files-organization.md#language-folder)󠁿

![basics-theme-files-organization-04](https://i0.wp.com/developer.zelocorecms.com/
files/2014/08/basics-theme-files-organization-04.png?resize=400%2C85&ssl=1)

If you wish to [internationalize your theme](105-internationalization.md)
so it’s usable in other languages, you can create a _languages_ folder to contain
translations.

[  Previous: Post Types](86-post-types.md)

[  Next: Template Files](88-template-files.md)