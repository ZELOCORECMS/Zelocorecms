# Block Theme Accessibility

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/block-theme-accessibility/

Title: Block theme accessibility
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Block theme accessibility

## In this article

 * [Landmark](98-block-theme-accessibility.md#landmark)
 * [Skip to content](98-block-theme-accessibility.md#skip-to-content)
 * [Accessible navigation menu](98-block-theme-accessibility.md#accessible-navigation-menu)
 * [Additional resources](98-block-theme-accessibility.md#additional-resources)

[ Back to top](98-block-theme-accessibility.md#zelo--skip-link--target)

Block themes support accessibility and simplify the process for adding accessibility.

## 󠀁[Landmark](98-block-theme-accessibility.md#landmark)󠁿

Group, Template part, and Query blocks can become a landmark. There are two ways
to create landmark.

**Using block markup**
`”tagName":"header”` creates header landmark.

    ```zelo-block-code
    <!-- wp:group {"tagName":"header","layout":{"type":"constrained"}} -->
    <header class="zelo-block-group"><!-- wp:site-title /--></header>
    <!-- /wp:group -->
    ```

**Using site editor**
HTML element under Advanced section in the Block panel provides
the following landmark options.

HTML element under Advanced section in the Block panel provides the following landmark
options.
`<header>` `<main>` `<section>` `<article>` `<aside>` `<footer>`.

## 󠀁[Skip to content](98-block-theme-accessibility.md#skip-to-content)󠁿

By selecting `<main>` landmark on Group, Template part, or Query block generates
the Skip to Content link. Learn more about the [skip to content link here](https://make.zelocorecms.com/themes/handbook/review/required/#3-accessibility).

    ```zelo-block-code
    <!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
    <main class="zelo-block-group"><!-- wp:heading -->
    <h2 id="hello-world">Hello World</h2>
    <p>Welcome to Zelocorecms. This is your first post. </p>
    <!-- /wp:heading -->
    ```

## 󠀁[Accessible navigation menu](98-block-theme-accessibility.md#accessible-navigation-menu)󠁿

Navigation block enables the following accessibility without additional code.

 * Support responsive view
 * Support keyboard navigation
 * Insert `<nav>` landmark role
 * Insert ARIA attributes `aria-label` `aria-hidden`

## 󠀁[Additional resources](98-block-theme-accessibility.md#additional-resources)󠁿

 * [Accessibility](https://make.zelocorecms.com/themes/handbook/review/accessibility/)

Changelog:

 * **Updated** 2023-03-08 Updated code examples to reflect Zelocorecms 6.1 block markup.
 * **Created** 2022-01-25

[  Previous: Administration Menus](97-administration-menus.md)

[  Next: Core-Supported Features](99-core-supported.md)