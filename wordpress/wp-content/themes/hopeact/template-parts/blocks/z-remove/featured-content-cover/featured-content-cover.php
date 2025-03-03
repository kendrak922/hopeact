<?php
/**
 * Block: Featured Content (Cover) 
 * - Slug: featured-content-cover
 */

use Lean\Load;

// BLOCK :: TEMPLATE
$blocks_allowed = array(
    'acf/buttons',
    'acf/divider',
    'acf/share',
    'core/heading',
    'core/paragraph',
);
$blocks_template = array(
    array('core/heading', array()),
    array('core/paragraph', array()),
    array('acf/buttons', array()),
);


// Global Variables
global $templateData;

// BLOCK :: DATA
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);
$blockData = array(
    'classes' => [],
    'card_type' => get_field('card_type'),
    'card_relationship' => get_field('card_relationship'),
    'content_position' => get_field('content_position'),
    'image' => get_field('image'),
    'image_position' => get_field('image_position') 
);
$contentID = $blockData['card_relationship'] ? $blockData['card_relationship'][0] : 0;
$featured_image = get_the_post_thumbnail($contentID);


// BLOCK :: CLASSES
if (isset($block["className"])) {
    $blockData['classes'][] =  $block["className"];
}
$blockData['classes'][] = 'u-bgMedia';


// BLOCK RENDER
?>

<section id="<?php echo $blockID; ?>" class="block block--featured-content-cover hero-banner <?php echo implode(' ', $blockData['classes']); ?> u-bgColorGray">
    <picture class="hero-banner__background" data-image-position="<?php echo $blockData['image_position'];?>">
       <?php if($blockData['image']):?>
            <?php echo wp_get_attachment_image($blockData['image']['ID'],'1536×1536', '', array('class' => 'lazyload') ); ?>
        <?php elseif($contentID):
            $featured_image = get_the_post_thumbnail($contentID);
            echo $featured_image;
        endif;?>
    </picture>
  
    <div class="container container--ultra-wide grid grid--justify-end grid--align-top">
        <div class="hero-banner__content u-bgColorBlack u-darkMode">
            <?php if($blockData['card_type'] == 'manual'):?>
                <InnerBlocks 
                    allowedBlocks="<?php echo esc_attr(wp_json_encode($blocks_allowed)); ?>" 
                    template="<?php echo esc_attr(wp_json_encode($blocks_template)); ?>" 
                />
            <?php else:
                $title = get_the_title($contentID);
                $divider = get_field('sub_title',$contentID);
                $summary = get_field('caption',$contentID);
                $button = [
                    'button_type' => 'link',
                    'button_style' => 'default',
                    'button_link' => [
                        'url' => get_the_permalink($contentID),
                        'title' => 'Read the full case study' // TODO
                    ]
                ];?>
                <h2 class="wp-block-heading has-h-3-font-size">
                    <?php echo $title?>
                </h2>
                <p class="u-textStyleItalic h--divider"><?php echo $divider;?></p>
                <p class="text-sm"><?php echo $summary;?></p>
                <?php 
                    Load::atom(
                        'button/button',
                        [
                            'button'    => $button,
                        ]
                    );
                ?>
            <?php endif;?>
        </div>
    </div>
</section>