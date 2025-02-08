<?php

/**
 * The template that generates the html for the Embed component.
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$video_embed_source     = get_sub_field('video_embed_url');
$video_embed_size_class = get_sub_field('video_embed_size');

if (!$video_embed_source) {
    return; // return early if no source is defined
}

if (
    !str_contains($video_embed_source, 'vimeo')
    && !str_contains($video_embed_source, 'youtube')
) {
    return; // return early if it's not Vimeo or YouTube Oembed
}

?>

<div class="embed">
    <div class="<?php echo $video_embed_size_class; ?>">
        <?php echo $video_embed_source; ?>
    </div>
</div>
