# Attachment Template Files

Source: https://developer.zelocorecms.com/themes/classic-themes/templates/attachment-template-files/

Title: Attachment Template Files
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Attachment Template Files

## In this article

 * [MIME_type.php](126-attachment-template-files.md#mime_type-php)
 * [Attachment.php](126-attachment-template-files.md#attachment-php)
 * [Function Reference](126-attachment-template-files.md#function-reference)

[ Back to top](126-attachment-template-files.md#zelo--skip-link--target)

Attachments are a special post type that holds information about a file uploaded
through the Zelocorecms media upload system, such as its description and name, which
can display through several **post type – attachment** template files.

For images, as an example, the attachment post type links to metadata information,
about the size of the images, the thumbnails generated, the location of the image
files, the HTML alt text, and even information obtained from EXIF data embedded 
in the images.

Utilizing attachment templates to gain additional metadata information for uploads,
help with SEO efforts.

As shown in the [template hierarchy](89-template-hierarchy.md#visual-overview),
you are able to display your attachments through several template files in order
of fallback:

 1. `MIME_type.php` and a `subtype.php`
    It can be any MIME type (For example: `image.
    php`, `video.php`, `application.php`). For text/plain, the following path is used(
    in order):
 2.  a. `text_plain.php`
     b. `plain.php`
     c. `text.php`
 3. `attachment.php`
 4. `single-attachment.php`
 5. `single.php`
 6. `singular.php`
 7. `index.php`

## 󠀁[MIME_type.php](126-attachment-template-files.md#mime_type-php)󠁿

Attachments are served by template files based on their mime-type. As an example,
if your attachment is an image, your can customize how they display through the 
creation of an `image.php` template file. All images with the `post_mime_type` of
image/* will render though your `image.php` template file.

Attachments also support the use of a mime `subtype.php` file. To continue with 
the image example, you can further customize your theme to support not only an `
image.php` file but a `jpg.php` subtype file.

## 󠀁[Attachment.php](126-attachment-template-files.md#attachment-php)󠁿

An attachment page (`attachment.php`) is a single post page with the post type of
attachment, generated through the creation of an attachment.php. Just like a [single post page](130-post-template-files.md#single-php),
which is dedicated to your article, the attachment page provides a dedicated page
in attachments in your theme.

Creation of attachment page is as simple as creating an attachment.php file. The
attachment.php file then contains code similar to the single.php post page.

    ```php
    <div class="entry-attachment">
    	<?php
    	$image_size = apply_filters( 'wporg_attachment_size', 'large' );
    	echo zelo_get_attachment_image( get_the_ID(), $image_size );
    	?>

    	<?php if ( has_excerpt() ) : ?>
    		<div class="entry-caption">
    			<?php the_excerpt(); ?>
    		</div><!-- .entry-caption -->
    	<?php endif; ?>
    </div><!-- .entry-attachment -->
    ```

## 󠀁[Function Reference](126-attachment-template-files.md#function-reference)󠁿

 * [get_attachment_template()](https://developer.zelocorecms.com/reference/functions/get_attachment_template/):
   Retrieve path of attachment template in current or parent template.

[  Previous: Template Files](41-templates.md)

[  Next: Custom Post Type Template Files](127-custom-post-type-template-files.md)