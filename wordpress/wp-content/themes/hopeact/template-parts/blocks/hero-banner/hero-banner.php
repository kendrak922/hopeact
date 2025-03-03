<?php
/**
 * Block: Hero Banner 
 * - Slug: hero-banner 
 */

use Lean\Load;

// BLOCK :: TEMPLATE
$blocks_allowed = array(
    'acf/buttons',
    'acf/divider',
    'acf/share',
    'core/columns',
    'core/heading',
    'core/post-title',
    'core/paragraph',
    'yoast-seo/breadcrumbs',
);
$blocks_template = array(
    array('core/columns', array()),
    // array('yoast-seo/breadcrumbs', array()),
    array('core/heading', array()),
    array('core/paragraph', array()),
    array('acf/buttons', array()),
);


// Global Variables
global $templateData;

// BLOCK :: DATA
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);
$blockData = [
    'classes' => [],
    'content_position' => get_field('content_position'),
    'image' => get_field('image'),
    'image_position' => get_field('image_position'),
    'gap' => get_field('gap')
];
$imageID = $blockData['image'] ? $blockData['image']['ID'] : get_post_thumbnail_id();
$gap = $blockData['gap'] ? $blockData['gap'].'px;' : '';


// BLOCK :: CLASSES
if (isset($block["className"])) {
    $blockData['classes'][] =  $block["className"];
}
$blockData['classes'][] = 'u-bgMedia';


// BLOCK :: RENDER
?>

<section id="<?php echo $blockID; ?>" class="block block--hero-banner hero-banner <?php echo implode(' ', $blockData['classes']); ?>">
    <div class="container container--ultra-wide grid" style="gap:<?php echo $gap;?>;" data-content-align-x="<?php echo $blockData['content_position'];?>">
        <div class="hero-banner__image">
            <picture class="hero-banner__background" data-image-position="<?php echo $blockData['image_position'];?>" role="presentation">
                <?php echo wp_get_attachment_image($imageID, '', array('class' => 'lazyload') ); ?>
            </picture>
        </div>
        <div class="hero-banner__content">
            <InnerBlocks 
                allowedBlocks="<?php echo esc_attr(wp_json_encode($blocks_allowed)); ?>" 
                template="<?php echo esc_attr(wp_json_encode($blocks_template)); ?>" 
            />
        </div>
    </div>
</section>
