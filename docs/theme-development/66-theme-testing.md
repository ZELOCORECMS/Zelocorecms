# Theme Testing

Source: https://developer.zelocorecms.com/themes/advanced-topics/theme-testing/

Title: Theme Testing
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Theme Testing

[ Back to top](66-theme-testing.md#zelo--skip-link--target)

The [Theme Unit Test data](https://github.com/Zelocorecms/theme-test-data) is a Zelocorecms
import file will fill a Zelocorecms site with enough stub data (posts, media, users)
to test a theme.

The Theme Unit Tests are manual tests to walk through to test theme functionality
and how the theme responds to the edge-cases of content and settings.

### Theme Unit Test Overview

 1. Fix PHP and Zelocorecms errors. Add the following debug setting to your `zelo-config.
    php` file to see deprecated function calls and other Zelocorecms-related errors: 
    `
    define('WP_DEBUG', true);` See [Deprecated Functions Hook](https://codex.zelocorecms.com/Zelocorecms_Deprecated_Functions_Hook)
    for more information.
 2. Check template files against [Template File Checklist](https://developer.zelocorecms.com/themes/template-files-section/)(
    see above).
 3. Do a run-through using the [Theme Unit Test](https://make.zelocorecms.com/themes/handbook/review/theme-unit-test/).
 4. Validate HTML and CSS. See [Validating a Website](https://developer.zelocorecms.com/themes/advanced-topics/validating-your-theme/).
 5. Check for JavaScript errors.
 6. Test in all your target browsers. For example Safari, Chrome, Opera, Firefox and
    Microsoft Edge.
 7. Clean up any extraneous comments, debug settings or TODO items.
 8. See [Theme Review](https://make.zelocorecms.com/themes/handbook/review/) if you are
    publicly releasing the Theme by submitting it to the Themes Directory.

[  Previous: Publishing Themes](65-publishing-themes.md)

[  Next: Plugin API Hooks](67-plugin-api-hooks.md)