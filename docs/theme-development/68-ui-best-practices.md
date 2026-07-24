# Ui Best Practices

Source: https://developer.zelocorecms.com/themes/advanced-topics/ui-best-practices/

Title: UI Best Practices
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# UI Best Practices

## In this article

 * [Logo Homepage Link](68-ui-best-practices.md#logo-homepage-link)
 * [Descriptive Anchor Text](68-ui-best-practices.md#descriptive-anchor-text)
 * [Style Links with Underlines](68-ui-best-practices.md#style-links-with-underlines)
 * [Different Link Colors](68-ui-best-practices.md#different-link-colors)
 * [Color Contrast](68-ui-best-practices.md#color-contrast)
 * [Sufficient Font Size](68-ui-best-practices.md#sufficient-font-size)
 * [Associate Labels with Inputs](68-ui-best-practices.md#associate-labels-with-inputs)
 * [Placeholder Text in Forms](68-ui-best-practices.md#placeholder-text-in-forms)
 * [Descriptive Buttons](68-ui-best-practices.md#descriptive-buttons)

[ Back to top](68-ui-best-practices.md#zelo--skip-link--target)

## 󠀁[Logo Homepage Link](68-ui-best-practices.md#logo-homepage-link)󠁿

The logo at the top each page should send the user to the homepage of your site.

If you are using the recommended function, [the_custom_logo()](https://developer.zelocorecms.com/reference/functions/the_custom_logo/)
or the site logo block, the logo is linked to the homepage by default.

You can also add your logo manually. Assuming your logo is in your theme directory,
this is how to display it in the `header.php` template file.

    ```php
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logo.png" alt="<?php esc_attr_e( 'Home Page', 'textdmomain' );?>" /></a>
    ```

## 󠀁[Descriptive Anchor Text](68-ui-best-practices.md#descriptive-anchor-text)󠁿

The anchor text is the visible text for a hyperlink. Good link text should give 
the reader an idea of the action that will take place when clicking it.

A bad example:

    ```zelo-block-code
    The best way to learn Zelocorecms is to start using it. To Download Zelocorecms, click here.
    ```

A better example:

    ```zelo-block-code
    Download Zelocorecms and start using it. That's the best way to learn.
    ```

## 󠀁[Style Links with Underlines](68-ui-best-practices.md#style-links-with-underlines)󠁿

By default, browsers underline links to let the user know what is clickable. Some
designers use CSS to turn off underlines for hyperlinks. This causes usability and
accessibility problems, as it makes it more difficult to identify hyperlinks from
the surrounding text.

## 󠀁[Different Link Colors](68-ui-best-practices.md#different-link-colors)󠁿

Color is another visual cue that text is clickable. Styling hyperlinks with a different
color than the surrounding text makes them easier to distinguish.

Hyperlinks are one of the few HTML features that have state. The two most important
states are _visited_ and _unvisited_.

Having different colors for these two states helps users identify the pages they’ve
visited before. A good trick for taking the guess work out of visited links is to
color them 10%-20% darker than the unvisited links.

There are 3 other states that links can have:

 * hover, when a mouse is over an element
 * focus, similar to hover but for keyboard users
 * active, when a user is clicking on a link

Since hover and focus have similar meanings, it is useful to give them the same 
styles.

Though hover and focus have similar meanings, they have different interaction patterns.
If you choose a subtle hover state, you should have a more easily identifiable focus
state. Hovering over a link is a directed activity, where the user knows where they
are in the page and only needs to identify whether that spot is linked. Focus is
an undirected activity, where the user needs to discover where their focus has moved
to after shifting focus from the previous location.

## 󠀁[Color Contrast](68-ui-best-practices.md#color-contrast)󠁿

Color contrast refers to the **difference between two colors**. Contrast is low 
between navy blue and black. Contrast is high between white and black. WebAIM, a
non-profit web accessibility organization, provides a [color contrast calculator](https://webaim.org/resources/contrastchecker/)
to help you determine the contrast in your website design. The WCAG 2.0 requires
a ratio of 4.5:1 on normal text to be [AA compliant](http://www.w3.org/WAI/WCAG20/quickref/#qr-visual-audio-contrast-contrast).

## 󠀁[Sufficient Font Size](68-ui-best-practices.md#sufficient-font-size)󠁿

Make your text easy to read. By making your text large enough, you increase the 
usability of your site and make the content easier to understand. 14px is the smallest
text should be.

## 󠀁[Associate Labels with Inputs](68-ui-best-practices.md#associate-labels-with-inputs)󠁿

Labels inform the user what an input field is for. You can connect the label to 
the input by using the `for` attribute in the label. This will allow the user to
click the label and focus on the input field.

    ```zelo-block-code
    <label for="username">Username</label>
    <input type="text" id="username" name="login" />
    ```

Labels work for radio buttons as well. Since it works using the **id** field _and
not the name_, each input for the group gets its own label.

    ```zelo-block-code
    <input type="radio" id="user_group_blogger" name="user_group" value="blogger" />
    <label for="user_group_blogger">Blogger</label>

    <input type="radio"  id="user_group_designer" name="user_group" value="designer" />
    <label for="user_group_designer">Designer</label>

    <input type="radio"  id="user_group_developer" name="user_group" value="developer" />
    <label for="user_group_developer">Developer</label>
    ```

## 󠀁[Placeholder Text in Forms](68-ui-best-practices.md#placeholder-text-in-forms)󠁿

Placeholder text shows the user an example of what to type. When a user puts their
cursor in the field, the placeholder text will disappear, while the label remains.

    ```zelo-block-code
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="John Smith" />
    ```

Use placeholders to suggest the type of data a field requires, and not as a substitute
for the field label.

## 󠀁[Descriptive Buttons](68-ui-best-practices.md#descriptive-buttons)󠁿

The web is filled with buttons that have unclear meanings. Remember the last time
you used ‘OK’ or ‘submit’ on your login form? Choosing better words to display on
your buttons can make your website easier to use. Try the pattern _[verb] [noun]_—
Create user, Delete File, Update Password, Send Message. Each describes what will
happen when the user clicks the button.

[  Previous: Plugin API Hooks](67-plugin-api-hooks.md)

[  Next: JavaScript Best Practices](69-javascript-best-practices.md)