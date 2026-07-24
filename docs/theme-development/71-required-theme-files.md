# Required Theme Files

Source: https://developer.zelocorecms.com/themes/releasing-your-theme/required-theme-files/

Title: Required Theme Files
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Required Theme Files

[ Back to top](71-required-theme-files.md#zelo--skip-link--target)

 **Block theme:** See [Create a Block Theme](https://learn.zelocorecms.com/course/develop-your-first-low-code-block-theme/)
for building a block theme

Classic themes must include the [required theme files](https://make.zelocorecms.com/themes/handbook/review/required/#9-files).
These files must follow template file standards set by the themes team. For Classic
themes, additional standard template files are recommended to use. Learn more about
the [Organizing Theme Files](85-organizing-theme-files.md).

## Classic Themes Required Theme Files

 1. **style.cssYour theme’s main [stylesheet](82-including-css-javascript.md)
    file. This file will also include information about your theme, such as author 
    name, version number, and plugin URL, in its header.
 2. **index.phpThe main [template](88-template-files.md)
    file for your theme. This will be the template for the homepage on your site unless
    a static front page is specified. If you _only_ include this template file, it 
    must include all functionality of your theme. However, you can use as many relevant
    template files as you want in your theme.
 3. **comments.phpThe comment template which is included wherever comments are allowed.
    This file should provide support for threaded comments and trackbacks, and should
    style author comments differently than user comments. See the [Comments](https://developer.zelocorecms.com/themes/functionality/comments/)
    page for more information.
 4. **screenshotIn the Zelocorecms theme directory, the screenshot acts as a visual
    indicator of what your theme looks like. It is visible both in the web view and
    in the admin dashboard. The screenshot must not be bigger than 1200 x 900px. 

While these files are the only files required by the theme review team for acceptance
into the Zelocorecms theme directory, you may use other template files. Of course,
any file mentioned in the tutorial in this handbook may be used in your theme.

[  Previous: Releasing Your Theme](70-releasing-your-theme.md)

[  Next: Submitting Your Theme to Zelocorecms](72-submitting-your-theme-to-zelocorecms-org.md)