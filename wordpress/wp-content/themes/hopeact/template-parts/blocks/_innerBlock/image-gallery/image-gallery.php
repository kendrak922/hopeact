<?php

/**
 * Block: Image Gallery
 * - Slug: image-gallery
 */

use Lean\Load;

// Local Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);

//BLOCK :: data
$blockData = [
    'gallery' => get_field('gallery_items')
];

//no gallery, no render
if(!$blockData['gallery']) { return;
}


//BLOCK :: render
?>

<!-- BLOCK CONTENT -->
<div class="block--image-gallery">
    <div class="image-gallery" style="grid-template-columns: 3fr 2fr;">
        <?php foreach($blockData['gallery'] as $key => $galleryItem):
            $style='grid-row: span '.($galleryItem['rowspan'] ?? 3).';';
            if($key == 1) { $style = 'grid-row: '.ceil($blockData['gallery'][0]['rowspan']/2).' / span '.$galleryItem['rowspan'].';';
            }
            if($galleryItem['center_item']) {
                $style .= 'grid-column: 1 / 3;';
            }
            $mediaID = $galleryItem['image']['ID'];
            $image = get_post($mediaID);
            $image_caption = $image->post_excerpt ? $image->post_excerpt:'';
            $image_attribution = get_field('attribution', $mediaID)? '<i>'.get_field('attribution', $mediaID).'</i>':'';
            
            $modaal_desc = $image_caption .(get_field('attribution', $mediaID)?' &nbsp; - '.strtoupper(get_field('attribution', $mediaID)):"");
            $modaal_image = $galleryItem['image']['sizes']['large']; //medium_large
            ?>
            <div class="image-gallery__item gallery-item u-animation" style="<?php echo $style;?>">
                <?php if($galleryItem['title']) :
                    Load::atom(
                        'text/heading',
                        [
                            'base'            => ['gallery'],
                            'heading'         => $galleryItem['title'],
                            'heading_level'   => 'h3',
                            'heading_style'   => 'h--smNav'
                        ]
                    );
                endif;?>
                <figure class="gallery-item">
                    <a href="<?php echo $modaal_image;?>" <?php if($modaal_desc) :?>data-modaal-desc="<?php echo $modaal_desc; ?>"<?php 
                   endif;?> class="image image--modaal modaal" data-group="gallery" aria-label="open gallery">
                        <div class="gallery-item__img">
                            <?php echo wp_get_attachment_image($mediaID, 'large', '', array('class' => 'lazyload', 'style' => 'aspect-ratio: '.$galleryItem['aspect_ratio'])); ?>
                        </div>
                    </a>
                    <?php if($image_caption || $image_attribution) :?>
                    <figcaption class="gallery-item__caption h--caption">
                        <?php echo $image_caption.' '.$image_attribution; ?>
                    </figcaption>
                    <?php endif;?>
                </figure>
            </div>
        <?php endforeach;?>
    </div>
</div>