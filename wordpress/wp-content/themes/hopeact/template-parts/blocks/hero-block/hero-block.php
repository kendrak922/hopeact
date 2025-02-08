<?php
/**
 * Block: Hero Block
 * - Slug: hero-block
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
    // array('core/columns', array()),
    array('yoast-seo/breadcrumbs', array()),
    array('core/post-title', array()),
    array('core/paragraph', array()),
    array('acf/buttons', array()),
);


// BLOCK :: DATA
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);
$blockData = [
    'classes' => [],
    'center_content' => get_field('center_content') ?? false,
    'image' => get_field('image'),
    'image_mobile' => get_field('image_mobile'),
    'image_position' => get_field('image_position') ?? 'center center'
];
$imageID = $blockData['image'] ? $blockData['image']['ID'] : get_post_thumbnail_id();


if($blockData['image'] || has_post_thumbnail()){
    $blockData['classes'][] = 'has-image';
}


// BLOCK :: RENDER
?>

<section id="<?php echo $blockID; ?>" class="block block--hero-block <?php echo implode(' ', $blockData['classes']); ?>">

    <div class="container container--ultra-wide">
        <div class="hero-block__content <?php if($blockData['center_content']): ?>hero-block__content--center<?php endif;?>">
            <InnerBlocks 
                allowedBlocks="<?php echo esc_attr(wp_json_encode($blocks_allowed)); ?>" 
                template="<?php echo esc_attr(wp_json_encode($blocks_template)); ?>" 
            />
        </div>
        <?php if(!$blockData['center_content']): ?>
        <div class="hero-block__media" data-image-position="<?php echo $blockData['image_position'];?>" role="presentation">
            <?php if($blockData['image']):?>
                <?php if($blockData['image_mobile']):?>
                    <?php echo wp_get_attachment_image($blockData['image_mobile']['ID'],'medium-large', '', array('class' => 'lazyload u-md-hidden') ); ?>
                    <?php echo wp_get_attachment_image($imageID,'1536×1536', '', array('class' => 'lazyload u-hidden u-md-block') ); ?>
                <?php else:?>
                    <?php echo wp_get_attachment_image($imageID,'1536×1536', '', array('class' => 'lazyload') ); ?>
                <?php endif;?>
            <?php elseif(has_post_thumbnail()):
                $featured_image = get_the_post_thumbnail();
                echo $featured_image;
            endif;?>
        </div>
        <?php endif;?>
    </div>

</section>