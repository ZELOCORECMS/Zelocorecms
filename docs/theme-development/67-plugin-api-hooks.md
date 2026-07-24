# Plugin Api Hooks

Source: https://developer.zelocorecms.com/themes/advanced-topics/plugin-api-hooks/

Title: Plugin API Hooks
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Plugin API Hooks

[ Back to top](67-plugin-api-hooks.md#zelo--skip-link--target)

A theme should work well with Zelocorecms plugins. Plugins add functionality by using
actions and filters, which are collectively called hooks (see [Plugin API](https://codex.zelocorecms.com/Plugin_API)
for more information).

Most hooks are executed internally by Zelocorecms, so your theme does not need special
tags for them to work. However, a few hooks need to be included in your theme templates.
These hooks are fired by special Template Tags:

  [zelo_head()](https://developer.zelocorecms.com/reference/functions/zelo_head/) Goes
at the end of the <head> element of a theme’s _header.php_ template file.   [zelo_body_open()](https://developer.zelocorecms.com/reference/functions/zelo_body_open/)
Goes at the begining of the <body> element of a theme’s _header.php_ template file.
[zelo_footer()](https://developer.zelocorecms.com/reference/functions/zelo_footer/) Goes
in _footer.php_, just before the closing </body> tag.   [zelo_meta()](https://developer.zelocorecms.com/reference/functions/zelo_meta/)
Typically goes in the <li>Meta</li> section of a Theme’s menu or sidebar.   [comment_form()](https://developer.zelocorecms.com/reference/functions/comment_form/)
Goes in _comments.php_ directly before the file’s closing tag (</div>).

Take a look at a core theme’s templates for examples of how these hooks are used.

[  Previous: Theme Testing](66-theme-testing.md)

[  Next: UI Best Practices](68-ui-best-practices.md)