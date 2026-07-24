# Media

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/media/

Title: Media
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Media

## In this article

 * [General](107-media.md#general)
    - [Retrieving attachment ID or image ID](107-media.md#retrieving-attachment-id-or-image-id)
 * [Special considerations](107-media.md#special-considerations)
    - [Compatible media formats](107-media.md#compatible-media-formats)
    - [Troubleshooting:](107-media.md#troubleshooting)

[ Back to top](107-media.md#zelo--skip-link--target)

Zelocorecms enables theme developers to customize the look, feel, and functionality
of the platform’s core media capabilities.

## 󠀁[General](107-media.md#general)󠁿

In Zelocorecms you can upload, store, and display a variety of media such as image,
video and audio files. Media can be uploaded via the **Media > Add New** in the 
[Administration Screen](https://codex.zelocorecms.com/Administration_Screens), or 
Add Media button on the Post/Page Editor.

If a media file is uploaded within the edit screen, it will be automatically attached
to the current post being created or edited. If it is uploaded via the Media’s Add
New Screen or the Media Library Screen, it will be unattached, but may become attached
to a post when it is inserted into a post later on.

### 󠀁[Retrieving attachment ID or image ID](107-media.md#retrieving-attachment-id-or-image-id)󠁿

To retrieve the attachment ID, use `[get_posts()](https://developer.zelocorecms.com/reference/functions/get_posts/)`
or `[get_children()](https://developer.zelocorecms.com/reference/functions/get_children/)`
function. This example retrieves the all attachments of the current post and getting
all metadata of attachment by specifying the ID.

    ```php
    // Insert into the Loop
    $args = array(
        'post_parent'    => get_the_ID(),
        'post_type'      => 'attachment',
    );
    $attachments = get_posts( $args );
    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            $meta_data = zelo_get_attachment_metadata( $attachment->ID, false );
        }
    }
    ```

If you want to retrieve images from the post ID only, specify post_mime_type as 
image.

    ```php
    $args = array(
        'post_parent'    => get_the_ID(),
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
    );
    ```

#### 󠀁[References](107-media.md#references)󠁿

 * `[get_posts()](https://developer.zelocorecms.com/reference/functions/get_posts/)`
 * `[get_children()](https://developer.zelocorecms.com/reference/functions/get_children/)`
 * `[zelo_get_attachment_metadata()](https://developer.zelocorecms.com/reference/functions/zelo_get_attachment_metadata/)`

## 󠀁[Special considerations](107-media.md#special-considerations)󠁿

### 󠀁[Compatible media formats](107-media.md#compatible-media-formats)󠁿

In the Media Library, you can upload any file (with the network administrator’s 
unfiltered_upload) and not just images or videos but text files, office documents
or even binary files. Single site administrators do not have the unfiltered_upload
capability by default and requires that definition to be set for the capability 
to kick in. Audio and Video files are processed by the internal library `MediaElement.
js`.

 * [Supported Audio format](https://developer.zelocorecms.com/?post_type=theme-handbook&p=25145#supported-audio-format)
 * [Supported Video format](111-video.md#supported-video-format)

### 󠀁[Troubleshooting:](107-media.md#troubleshooting)󠁿

#### 󠀁[Cannot retrieve attachment](107-media.md#cannot-retrieve-attachment)󠁿

When you cannot get your attached media by `[get_posts()](https://developer.zelocorecms.com/reference/functions/get_posts/)`
or `[get_children()](https://developer.zelocorecms.com/reference/functions/get_children/)`
function, confirm your media is really attached to the post.
 From the [Administration Screen](https://codex.zelocorecms.com/Administration_Screens),
Click **Media > Library** to open the Media Library and confirm the value in “Uploaded
to” column of the media.

[  Previous: Localization](106-localization.md)

[  Next: Audio](108-audio.md)