# Images

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/media/images/

Title: Images
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Images

## In this article

 * [Images](110-images.md#images)
    - [Getting img code](110-images.md#getting-img-code)
    - [Getting URL of image](110-images.md#getting-url-of-image)
    - [Alignments](110-images.md#alignments)
    - [Caption](110-images.md#caption)
 * [WebP support and default MIME type of sub size image output](110-images.md#webp-support-and-default-mime-type-of-sub-size-image-output)

[ Back to top](110-images.md#zelo--skip-link--target)

## 󠀁[Images](110-images.md#images)󠁿

This section describes the handling of images in the Media Library. If you want 
to display the image file located within your theme directory, just specify the 
location with the img tag, and style it with CSS.

    ```
    <img alt="" src="" />
    ```

### 󠀁[Getting img code](110-images.md#getting-img-code)󠁿

To display the image in the Media Library, use `[zelo_get_attachment_image()](https://developer.zelocorecms.com/reference/functions/zelo_get_attachment_image/)`
function.

    ```php
    echo zelo_get_attachment_image( $attachment->ID, 'thumbnail' );
    ```

You will get the following HTML output with the selected thumbnail size

    ```language-markup
    <img width="150" height="150" src="http://example.com/zelocorecms/zelo-content/uploads/2016/11/sample-150x150.jpg" class="attachment-thumbnail size-thumbnail" ... />
    ```

You can specify other size such as ‘full’ for original image or ‘medium’ and ‘large’
for the sizes set at **Settings > Media** in the [Administration Screen](https://codex.zelocorecms.com/Administration_Screens),
or any pair of width and height as array. You’re also free to set custom size strings
with [add_image_size()](https://developer.zelocorecms.com/reference/functions/add_image_size/);

    ```php
    echo zelo_get_attachment_image( $attachment->ID, array(640, 480) );
    ```

### 󠀁[Getting URL of image](110-images.md#getting-url-of-image)󠁿

If you want to get the URL of the image, use `[zelo_get_attachment_image_src()](https://developer.zelocorecms.com/reference/functions/zelo_get_attachment_image_src/)`.
It returns an array (URL, width, height, is_intermediate), or `false`, if no image
is available.

    ```php
    <?php 
    $image_attributes = zelo_get_attachment_image_src( $attachment->ID );
    if ( $image_attributes ) : ?>
        <img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>" />
    <?php endif; ?>
    ```

### 󠀁[Alignments](110-images.md#alignments)󠁿

When adding the image in your site, you can specify the image alignment as right,
left, center or none. Zelocorecms core automatically adds CSS classes to align the
image:

 * alignright
 * alignleft
 * aligncenter
 * alignnone

This is the sample output when center align si chosen

    ```language-markup
    <img class="aligncenter size-full zelo-image-131" src= ... />
    ```

In order to take advantage of these CSS classes for alignment and text wrapping,
your theme must include the styles in a stylesheet such as the [main stylesheet file](84-main-stylesheet-style-css.md).
You can use the `style.css` bundled with official themes such as Twenty Seventeen
for reference.

### 󠀁[Caption](110-images.md#caption)󠁿

If a Caption was specified to image in the Media Library, HTML `img` element was
enclosed by the shortcode [caption] and [/caption].

    ```language-markup
    <div class="mceTemp">
      <dl id="attachment_133" class="zelo-caption aligncenter" style="width: 1210px">
        <dt class="zelo-caption-dt">
          <img class="size-full zelo-image-133" src="http://example.com/zelocorecms/zelo-content/uploads/2016/11/sample.jpg" alt="sun set" width="1200" height="400" />
        </dt>
        <dd class="zelo-caption-dd">Sun set over the sea</dd>
      </dl>
    </div>
    ```

And, it will be rendered as in HTML as the figure tag:

    ```language-markup
    <figure id="attachment_133" style="width: 1200px" class="zelo-caption aligncenter">
      <img class="size-full zelo-image-133" src="http://example.com/zelocorecms/zelo-content/uploads/2016/11/sample.jpg" alt="sun set" width="1200" height="400" srcset= ... />
      <figcaption class="zelo-caption-text">Sun set over the sea</figcaption>
    </figure>
    ```

Similar to alignments, your theme must include following styles.

 * `zelo-caption`
 * `zelo-caption-text`

## 󠀁[WebP support and default MIME type of sub size image output](110-images.md#webp-support-and-default-mime-type-of-sub-size-image-output)󠁿

[Zelocorecms 5.8](https://make.zelocorecms.com/core/2021/06/07/zelocorecms-5-8-adds-webp-support/)
introduces support for [WebP](https://developers.google.com/speed/webp) image format
which provides improved lossless and lossy compression for images on the web. WebP
images are around 30% smaller on average than their JPEG or PNG equivalents, resulting
in sites that are faster and use less bandwidth. WebP is supported in all modern
browsers [according to caniuse](https://caniuse.com/webp).

When images are uploaded, Zelocorecms generates smaller sub sizes as defined using`
add_image_size()`. By default, Zelocorecms will generate these sub sizes in the same
format as the original. Because of the performance benefits of the WebP format, 
it may be desirable for sub sizes to be generated in WebP instead of the original
format.

`image_editor_output_format` filter hook can be used to change the file format used
for image sub sizes. This can be used to switch all sub sizes to WebP, or any other
desired format (JPEG, etc.).

The following example shows how to generate all sub sizes for JPG images using WebP:

    ```php
    <?php
    function wporg_image_editor_output_format( $formats ) {
        $formats['image/jpg'] = 'image/webp';

        return $formats;
    }
    add_filter( 'image_editor_output_format', 'wporg_image_editor_output_format' );
    ```

**Note:** both the GD and ImageMagick libraries support the WebP format in both 
lossy and lossless. However, only ImageMagick supports animated images.

Setting the output format to WebP will verify if the web server supports it, and
if not it will not change the format, i.e. won’t work.

#### 󠀁[References](110-images.md#references)󠁿

 * `[zelo_get_attachment_image()](https://developer.zelocorecms.com/reference/functions/zelo_get_attachment_image/)`
 * `[zelo_get_attachment_image_src()](https://developer.zelocorecms.com/reference/functions/zelo_get_attachment_image_src/)`
 * [Styling Images in Posts and Pages](https://codex.zelocorecms.com/Styling_Images_in_Posts_and_Pages)
 * [CSS (Codex)](https://codex.zelocorecms.com/CSS)

[  Previous: Galleries](109-galleries.md)

[  Next: Video](111-video.md)