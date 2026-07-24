<?php
/**
 * Title: Footer
 * Slug: zelocorecms-theme/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Footer with location, hours, and contact information.
 */
declare(strict_types=1);
?>
<!-- wp:group {"metadata":{"name":"Footer Container"},"align":"full","className":"is-style-section-1","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-1" style="padding-top:0;padding-bottom:0"><!-- wp:spacer {"height":"var:preset|spacing|60"} -->
    <div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50"}}}} -->
    <div class="wp-block-columns alignwide"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
    <div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3} -->
    <h3 class="wp-block-heading has-text-align-center"><?php esc_html_e('Location', 'zelocorecms-theme'); ?></h3>
    <!-- /wp:heading -->

    <!-- wp:spacer {"height":"var:preset|spacing|20"} -->
    <div style="height:var(--wp--preset--spacing--20)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('123 Example Street', 'zelocorecms-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('San Francisco, CA 12345', 'zelocorecms-theme'); ?></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
    <div class="wp-block-column"><!-- wp:heading {"level":3,"className":"has-text-align-center"} -->
    <h3 class="wp-block-heading has-text-align-center"><?php esc_html_e('Hours', 'zelocorecms-theme'); ?></h3>
    <!-- /wp:heading -->

    <!-- wp:spacer {"height":"var:preset|spacing|20"} -->
    <div style="height:var(--wp--preset--spacing--20)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('Monday—Friday', 'zelocorecms-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('8am — 6pm', 'zelocorecms-theme'); ?></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
    <div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3} -->
    <h3 class="wp-block-heading has-text-align-center"><?php esc_html_e('Contact', 'zelocorecms-theme'); ?></h3>
    <!-- /wp:heading -->

    <!-- wp:spacer {"height":"var:preset|spacing|20"} -->
    <div style="height:var(--wp--preset--spacing--20)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('hi@example.com', 'zelocorecms-theme'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('(123) 456-7890', 'zelocorecms-theme'); ?></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns -->

    <!-- wp:spacer {"height":"var:preset|spacing|20"} -->
    <div style="height:var(--wp--preset--spacing--20)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
    <p class="has-text-align-center has-small-font-size">
            <?php
            printf(
                /* translators: %1$s: WordPress.org link opening tag, %2$s: the closing tag. */
                esc_html__('Designed with %1$sWordPress%2$s', 'zelocorecms-theme'),
                '<a href="https://wordpress.org" rel="nofollow">',
                '</a>'
            );
?></p>
    <!-- /wp:paragraph -->

    <!-- wp:spacer {"height":"var:preset|spacing|60"} -->
    <div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer --></div>
    <!-- /wp:group -->
