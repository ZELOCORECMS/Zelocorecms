# Galleries

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/media/galleries/

Title: Galleries
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Galleries

## In this article

 * [Galleries](109-galleries.md#galleries)
    - [Gallery shortcode](109-galleries.md#gallery-shortcode)
    - [Usage](109-galleries.md#usage)
    - [Supported Options](109-galleries.md#supported-options)
    - [References](109-galleries.md#references)

[ Back to top](109-galleries.md#zelo--skip-link--target)

## 󠀁[Galleries](109-galleries.md#galleries)󠁿

[[

Image galleries are the best way to showcase your pictures on your Zelocorecms sites.
Zelocorecms bundles the **Create Gallery** feature by default in the media uploader
which allows you to create a simple gallery.

Note: Before adding a gallery, you must have images in your media library. Otherwise,
you need to upload the images into the library and can proceed on gallery creation.

### 󠀁[Gallery shortcode](109-galleries.md#gallery-shortcode)󠁿

The **Gallery** feature allows you to add one or more image galleries to your posts
and pages using a simple Shortcode.

The basic form of gallery shortcode is:

    ```php
    [gallery]
    ```

If you use the [gallery] shortcode without using the `ids` argument in your post
or page, only images that are “attached” to that post or page will be displayed.

If you need to add multiple images with ID’s, use the following sample shortcode

    ```php
    //Note: 10, 205, 552 and 607 are the IDs of respected image.
    [gallery ids="10, 205, 552, 607"]
    ```

NOTE: find the proper IDs of the images for the gallery. Go to Media library and
click on the respected image and ID will appear on the URL.

To use the shortcode from the template file, use the [do_shortcode()](https://developer.zelocorecms.com/reference/functions/do_shortcode/)
function. Insert the following code into your template file:

    ```php
    <?php echo do_shortcode( [gallery] ); ?>
    ```

If you need to use the shortcode with IDs, insert the following code in your template
file:

    ```php
    <?php echo do_shortcode( [gallery ids="10, 205, 552, 607"] ); ?>
    ```

### 󠀁[Usage](109-galleries.md#usage)󠁿

There are may options that may be specified using the below syntax:

    ```php
    [gallery option1="value1" option2="value2"]
    ```

If you want to print the gallery directly on the template file, use `[do_shortcode()](https://developer.zelocorecms.com/reference/functions/do_shortcode/)`
function like below:

    ```php
    <?php echo do_shortcode( '[gallery option1="value1"]' ); ?>
    ```

If you need to filter the shortcodes, the following example gives you some tips

    ```php
    // Note: 'the_content' filter is used to filter the content of the
    // post after it is retrieved from the database and before it is 
    // printed to the screen.
    <?php
    $gallery_shortcode = '[gallery id="' . intval( $post->post_parent ) . '"]';
    print apply_filters( 'the_content', $gallery_shortcode );
    ?>
    ```

### 󠀁[Supported Options](109-galleries.md#supported-options)󠁿

Gallery Shortcodes supports the basic options which are listed below:

#### 󠀁[Orderby](109-galleries.md#orderby)󠁿

‘orderby’ specifies the order the thumbnails show up. The default order is ‘menu_order’.

 * menu_order: You can reorder the images in the Gallery tab of the Add Media popup
 * title: Order by the title of the image in the Media Library
 * post_date: Sort by date/time
 * rand: Order randomly
 * ID: Specify the post ID

#### 󠀁[Order](109-galleries.md#order)󠁿

order specify the sort order used to display thumbnail; ASC or DESC. For Example,
to sort by ID and DESC:

    ```php
    [gallery order="DESC" orderby="ID"]
    ```

If you need to print it on template file, use the [do_shortcode()](https://developer.zelocorecms.com/reference/functions/do_shortcode/)
function;

    ```php
    <?php echo do_shortcode( '[gallery]' ); ?>
    ```

#### 󠀁[columns](109-galleries.md#columns)󠁿

The Columns options specify the number of columns in the gallery. The default value
is 3.
If you want to increase the number of column in the galley, use the following
shortcode.

    ```php
    [gallery columns="4"]
    ```

If you need to print it on your template file, use the [do_shortcode()](https://developer.zelocorecms.com/reference/functions/do_shortcode/)
function;

    ```php
    <?php echo do_shortcode(' [gallery columns="4"] '); ?>
    ```

#### 󠀁[IDs](109-galleries.md#ids)󠁿

The IDs option on the gallery shortcode loads images with specific post IDs.

If you want to display the attached image with the specific post ID, follow the 
following code example.

    ```php
    // Note: remove each space between brackets and 'gallery' and brackets and `123"`.
    //Here "123" stands for the post IDs. If you want to display more than
    //one ID, separate the IDs by a comma `,`.
    [ gallery id="123" ]
    ```

Use ‘do_shortcode’ function to print the gallery with IDs on template files like
below:

    ```php
    // Note: remove each space between brackets and 'gallery' and brackets and `123"`.
    <?php echo do_shortcode(' [ gallery id="123" ] '); ?>
    ```

#### 󠀁[Size](109-galleries.md#size)󠁿

Size determines the image size to use for the thumbnail display. Valid values include“
thumbnail”, “medium”, “large”, “full” and any other additional image size that was
registered with [add_image_size()](https://developer.zelocorecms.com/reference/functions/add_image_size/).
The default value is “thumbnail”. The size of the images for “thumbnail”, “medium”
and “large” can be configured in Zelocorecms admin panel under Settings > Media.

For example, to display a gallery of medium sized images:

    ```php
    [gallery size="medium"]
    ```

Some advanced options are also available on Gallery shortcodes.

#### 󠀁[itemtag](109-galleries.md#itemtag)󠁿

The name of the HTML tag used to enclose each item in the gallery. The default is“
dl”.

#### 󠀁[icontag](109-galleries.md#icontag)󠁿

The name of the HTMLtag used to enclose each thumbnail icon in the gallery. The 
default is “dt”.

#### 󠀁[captiontag](109-galleries.md#captiontag)󠁿

The name of the HTML tag used to enclose each caption. The default is “dd”.

You are allowed to change the defaults.

    ```php
    [gallery itemtag="div" icontag="span" captiontag="p"]
    ```

#### 󠀁[Link](109-galleries.md#link)󠁿

Specify where you want the image to link. The default value links to the attachment’s
[permalink](https://codex.zelocorecms.com/Using_Permalinks). Options:

 * file – Link directly to image file
 * none – No link

Example:

    ```php
    [gallery link="file"]
    ```

#### 󠀁[Include](109-galleries.md#include)󠁿

Include allows you to insert an “array” of comma separated attachment IDs to show
only the images from these attachments.

    ```php
    [gallery include="23,39,45"]
    ```

#### 󠀁[Exclude](109-galleries.md#exclude)󠁿

Exclude callows you to insert an “array” of comma separated attachment IDs to not
show the images from these attachments. Please note that include and exclude cannot
be used together.

    ```language-markup
    [gallery exclude="21,32,43"]
    ```

### 󠀁[References](109-galleries.md#references)󠁿

For more technical details take a reference from below links

 * [Gallery Shortcode](https://codex.zelocorecms.com/Gallery_Shortcode)
 * [Function do_shortcode()](https://developer.zelocorecms.com/reference/functions/do_shortcode/)

[  Previous: Audio](108-audio.md)

[  Next: Images](110-images.md)