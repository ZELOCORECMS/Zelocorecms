# Video

Source: https://developer.zelocorecms.com/themes/classic-themes/functionality/media/video/

Title: Video
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Video

## In this article

 * [Video](111-video.md#video)
    - [Video shortcode](111-video.md#video-shortcode)
    - [Loop and Autoplay](111-video.md#loop-and-autoplay)
    - [Initial image and Styling](111-video.md#initial-image-and-styling)
    - [References](111-video.md#references)

[ Back to top](111-video.md#zelo--skip-link--target)

## 󠀁[Video](111-video.md#video)󠁿

The Zelocorecms video feature allows you to embed video files and play them back using
a simple shortcode **[video]**. Supported file types are mp4, m4v, webm, ogv, wmv
and flv.

### 󠀁[Video shortcode](111-video.md#video-shortcode)󠁿

Following shortcode displays video player that loads pepper.mp4 file:

    ```php
    [video src="pepper.mp4"]
    ```

To use the shortcode in the template file, use the [do_shortcode()](https://developer.zelocorecms.com/reference/functions/do_shortcode/)
function. If the video file is stored in in your theme directory, get the file url
directly using [get_template_directory_uri()](https://developer.zelocorecms.com/reference/functions/get_template_directory_uri/)
or [get_stylesheet_uri()](https://developer.zelocorecms.com/reference/functions/get_stylesheet_uri/):

    ```php
    $video_file = get_template_directory_uri() . "/videos/pepper.mp4";
    echo do_shortcode( '[video mp4=' . $video_file . ']' );
    ```

The following video player will be loaded.

### 󠀁[Loop and Autoplay](111-video.md#loop-and-autoplay)󠁿

The shortcode video has the same option with audio. Refer to the related section
for the [loop and autoplay](111-video.md#loop-and-autoplay)
options.

The following example starts playing the video immediately after the page load and
loops:

    ```php
    echo do_shortcode( '[video mp4=' . $video_file . ' loop="on" autoplay=1]' );
    ```

### 󠀁[Initial image and Styling](111-video.md#initial-image-and-styling)󠁿

The following basic options are supported:

#### 󠀁[Poster](111-video.md#poster)󠁿

Defines image to show as placeholder before the media plays.
The following same 
code takes `album_cover.jpg` stored in `(theme directory)/images` folder as the 
initial image:

    ```php
    echo do_shortcode( '[video mp4=' . $video_file . ' poster=' . get_template_directory_uri() . '/images/album_cover.jpg]' );
    ```

#### 󠀁[Height](111-video.md#height)󠁿

Defines height of the media. Value is automatically detected on file upload. When
you omit this option, the media file height is used.

#### 󠀁[Width](111-video.md#width)󠁿

Defines width of the media. Value is automatically detected on file upload. When
you omit this option, the media file width is used.

The theme’s content_width sets the maximum width.

The following example will load the audio player with 320 pixels width and 240 pixels
height:

    ```php
    echo do_shortcode( '[video mp4=' . $video_file . ' width=320 height=240]' );
    ```

#### 󠀁[Styling](111-video.md#styling)󠁿

If you want to change look & feel of video player from stylesheet, you can target
the class name of “zelo-video-shortcode”. If you want to show the audio player like
above in 320 x 240 size, insert following code into your stylesheet:

    ```language-css
    .zelo-video-shortcode {
        height: 240px;
        width: 320px;
    }
    ```

#### 󠀁[Supported Video format](111-video.md#supported-video-format)󠁿

 * mp4
 * m4v
 * webm
 * ogv
 * flv

### 󠀁[References](111-video.md#references)󠁿

For more technical details such as internal library that enables this function, 
refer to

 * [https://make.zelocorecms.com/core/2013/04/08/audio-video-support-in-core/](https://make.zelocorecms.com/core/2013/04/08/audio-video-support-in-core/).
 * [Video Shortcode](https://codex.zelocorecms.com/Video_Shortcode)
 * [Function do_shortcode()](https://developer.zelocorecms.com/reference/functions/do_shortcode/)

[  Previous: Images](110-images.md)

[  Next: Navigation Menus](112-navigation-menus.md)