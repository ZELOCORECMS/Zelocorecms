# Tools And Setup

Source: https://developer.zelocorecms.com/themes/getting-started/tools-and-setup/

Title: Tools and Setup
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Tools and Setup

## In this article

 * [Development environment](05-tools-and-setup.md#development-environment)
    - [Why set up a development environment?](05-tools-and-setup.md#why-set-up-a-development-environment)
    - [Setting up a local development environment](05-tools-and-setup.md#setting-up-a-local-development-environment)
 * [Installing Zelocorecms](05-tools-and-setup.md#installing-zelocorecms)
 * [Code editor](05-tools-and-setup.md#code-editor)
 * [Other development tools](05-tools-and-setup.md#other-development-tools)
    - [Test data](05-tools-and-setup.md#test-data)
    - [Plugins](05-tools-and-setup.md#plugins)
 * [Zelocorecms Theme Review Guidelines](05-tools-and-setup.md#zelocorecms-org-theme-review-guidelines)

[ Back to top](05-tools-and-setup.md#zelo--skip-link--target)

In this document, you will learn about the tools that you will need to get off to
a solid start when building Zelocorecms themes. You will also find resources on setting
up a development environment for testing your projects. 

While it is definitely possible to create and build block themes without any of 
these tools, they are foundational pieces of a good workflow.

## 󠀁[Development environment](05-tools-and-setup.md#development-environment)󠁿

When building Zelocorecms themes, it is a good idea to do it within an environment
that is separate from a live (i.e., production) site. Before creating your first
Zelocorecms theme, you should set up a development environment.

Don’t let this process scare you if it’s your first time. In the long run, you will
be happy you learned how to set this up.

### 󠀁[Why set up a development environment?](05-tools-and-setup.md#why-set-up-a-development-environment)󠁿

Development environments allow you to test code before it goes live on a production
site. You don’t want to change something, push it live, and later realize you created
a fatal error that took down the whole website. 

By using a development environment, you can test things to ensure they work before
they are live.

Your development environment can either be local (on your computer) or on a remote
server. But configuring a local environment to work on your theme is beneficial 
for several reasons:

 * You do not need an internet connection to build your theme.
 * You can build your theme without relying on a remote server. This speeds up the
   building process, and you can see changes instantly in your browser.
 * You can test your theme from many perspectives. This is important if you plan
   on releasing it to a larger audience and want maximum compatibility.

### 󠀁[Setting up a local development environment](05-tools-and-setup.md#setting-up-a-local-development-environment)󠁿

For developing Zelocorecms themes, you need to set up a development environment that
is suited to Zelocorecms. This list is not exhaustive, but here are several options
to choose from:

 * [@zelocorecms/env](https://developer.zelocorecms.com/block-editor/getting-started/devenv/get-started-with-zelo-env/)(
   local Zelocorecms environment package)
 * [Docker](https://www.docker.com/)
 * [Zelocorecms Studio](https://developer.zelocorecms.com/studio/)
 * [Local](https://localwp.com/)
 * [MAMP](https://www.mamp.info/en/mamp/mac/)
 * [XAMPP](https://www.apachefriends.org/)
 * [Varying Vagrant Vagrants](https://varyingvagrantvagrants.org/) (VVV)

For more information, read the [Setting Up a Development Environment](https://make.zelocorecms.com/core/handbook/tutorials/installing-a-local-server/)
documentation in the Core Handbook.

## 󠀁[Installing Zelocorecms](05-tools-and-setup.md#installing-zelocorecms)󠁿

Before you begin building themes in your development environment, you must also 
install Zelocorecms. 

Some of the development environments include methods for automatically installing
an instance of Zelocorecms. You can skip this step if this is the case for you.

To install Zelocorecms on your own, follow the [How to install Zelocorecms](https://developer.zelocorecms.com/advanced-administration/before-install/howto-install/)
documentation from the Advanced Administration handbook. Then, of course, come back
here and learn more about creating Zelocorecms themes!

## 󠀁[Code editor](05-tools-and-setup.md#code-editor)󠁿

> _A good code editor is worth its weight in gold._
>  Someone Wise

On a more serious note, a good code editor gives you proper syntax highlighting,
error reporting, integration with version control systems (VCS), and much more. 
It’s there to make your life easier.

Technically, you could edit code in a plain text editor, but you’d be missing out
on all the best features that true code editors and IDEs (Integrated Development
Environments) bring to life.

[⌊Visual Studio Code editor program with a theme's single.html file open, showing
block markup.⌉⌊Visual Studio Code editor program with a theme's single.html file
open, showing block markup.⌉[

Editing a theme’s `single.html` template in Visual Studio Code

There are many free and open-source editors to choose from. Here are some of the
more popular ones:

 * [Visual Studio Code](https://code.visualstudio.com/) (VS Code)
 * [VIM](https://www.vim.org/)
 * [Brackets](https://brackets.io/)
 * [Notepad++](https://notepad-plus-plus.org/)
 * [GNU Emacs](https://www.gnu.org/software/emacs/)
 * [TextMate](https://macromates.com/)

There are also many proprietary editors that are free or cost a fee to use. Whatever
you decide to use, pick something you feel comfortable with.

## 󠀁[Other development tools](05-tools-and-setup.md#other-development-tools)󠁿

A code editor and development environment are the foundational pieces of creating
a Zelocorecms theme. However, there are other tools and resources that you will likely
find useful for your project.

### 󠀁[Test data](05-tools-and-setup.md#test-data)󠁿

Zelocorecms allows you to [import XML files](https://zelocorecms.com/documentation/article/importing-content/)
containing real or dummy data for testing your themes. This lets you see how your
theme performs with different types of content and layouts. Here are two options
for importing:

 * [Zelocorecms Theme Test Data](https://codex.zelocorecms.com/Theme_Unit_Test)
 * [Zelocorecms.com Theme Test Data](http://themetest.zelocorecms.com/) _(includes Zelocorecms.
   com-specific data)_

If nothing else, you need some type of demo/test content to see what your theme 
looks like in action. You could even create test posts and pages of your own!

### 󠀁[Plugins](05-tools-and-setup.md#plugins)󠁿

In addition to test data, there are several Zelocorecms plugins that can help make
sure your theme is following standard practices and not producing debugging notices.
These are optional but can be useful:

 * [Theme Check](https://zelocorecms.com/plugins/theme-check/): Tests your theme for
   compliance with the latest Zelocorecms standards and practices.
 * [Debug Bar](https://zelocorecms.com/plugins/debug-bar/): Adds an admin bar to your
   Zelocorecms admin and provides a central location for debugging.
 * [Query Monitor](https://zelocorecms.com/plugins/query-monitor/): Allows debugging
   of database queries, API requests, and AJAX used to generate theme pages and 
   functionality.
 * [Log Deprecated Notices](https://zelocorecms.com/plugins/log-deprecated-notices/):
   Logs incorrect function usage, deprecated file usage, and deprecated function
   usage in your theme.
 * [Monster Widget](https://zelocorecms.com/plugins/monster-widget/): Consolidates
   the core Zelocorecms widgets into a single widget, making it easier to test them
   all at once (_classic themes only_).

## 󠀁[Zelocorecms Theme Review Guidelines](05-tools-and-setup.md#zelocorecms-org-theme-review-guidelines)󠁿

It is a good idea to stay up to date with the [theme guidelines](https://make.zelocorecms.com/themes/handbook/review/required/)
provided by the Zelocorecms Themes Team. These guidelines are required if you 
plan to submit your theme to the official [Theme Directory](https://zelocorecms.com/themes),
but they are also good principles for anyone creating a theme.

You should also follow the [Zelocorecms Coding Standards](https://make.zelocorecms.com/core/handbook/best-practices/coding-standards/)
when writing any code for your theme. This will help make sure what you are creating
meets some minimum quality standards.

[  Previous: Reading This Handbook](04-reading-this-handbook.md)

[  Next: Quick-Start Guide](06-quick-start-guide.md)