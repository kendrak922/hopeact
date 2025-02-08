<?php
/**
 * Block: Program Card
 * - Slug: Program Card
 * - Docs: https://www.billerickson.net/innerblocks-with-acf-blocks/
 */

use Lean\Load;

// BLOCK :: TEMPLATE
$blockID = (!empty($block['anchor']) ? $block['anchor'] : uniqid($block['id']));
$blocks_allowed = array(
    'acf/buttons',
    'core/heading',
    'core/paragraph',
    'core/quote',
);
$blocks_template = array(
    array('core/heading', array()),
    array('core/paragraph', array()),
    array('acf/buttons', array()),
);


// BLOCK :: DATA
$blockData = array(
    'card_type' => get_field('card_type'),
    'card_relationship' => get_field('card_relationship'),
    'card_title_level' => get_field('card_title_level') ?? 'h3',
    'card_size' => get_field('card_size') ?? 'default',
    'content_position' => get_field('content_position'),
    'button' => get_field('button'),
    'image' => get_field('image'),
    'image_position' => get_field('image_position') 
);
$contentID = $blockData['card_relationship'] ? $blockData['card_relationship'][0] : 0;


// BLOCK :: CLASSES
$classes = [ 'inner-block--program-card' ];
$classes[] = 'program-card';

if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}
// controls left/right content
if($blockData['content_position'] == 'left'){
    $classes[] = 'program-card--reverse';
}
// controls color
if ( ! empty( $block['backgroundColor'] ) ) {
    $classes[] = 'has-background';
    // starter colors
    $colorParts = explode('-', $block['backgroundColor']);
    $transformedColor = implode('', array_map('ucwords', $colorParts));
	$classes[] = 'u-bgColor' . $transformedColor;
    if($transformedColor == 'Black' || $transformedColor == 'Blue' || $transformedColor == 'Red' || $transformedColor == 'Green'){
        $classes[] = 'u-darkMode';
    }
    //clickable card
    if($blockData['card_relationship'] || ( $blockData['button'] && $blockData['button']['button_link']) ){
        $classes[] = 'card--clickable';
    }
}else{
	$classes[] = 'u-bgColorNone'; //grid--align-center'
}
if ( ! empty( $block['textColor'] ) ) {
    if($block['textColor'] == 'white'){
        $classes[] = 'u-darkMode';
    }
    $colorParts = explode('-', $block['textColor']);
    $transformedColor = implode('', array_map('ucwords', $colorParts));
	$classes[] = 'u-textColor' . $transformedColor;
}
//controls size
if($blockData['card_size']){
    $classes[] = 'program-card--'.$blockData['card_size'];
}


//convert to card
if($blockData['card_type'] == 'manual'):
    $title = get_field('card_title');
    $content = get_field('card_content');
    $button = get_field('button');
    $card_link = ($button['button_link']) ? $button['button_link']['url'] : '';
else:
    $title = get_the_title($contentID);
    $divider = get_field('sub_title',$contentID);
    $content = get_field('caption',$contentID); // or excerpt
    $card_link = get_the_permalink($contentID);
    $button = [
        'button_type' => 'link',
        'button_style' => 'default',
        'button_link' => [
            'url' => $card_link,
            'title' => 'Read the full case study' // TODO
        ]
    ];
endif;

// BLOCK :: RENDER
?>

<div id="<?php echo $blockID; ?>" class="inner-block <?php echo join( ' ', $classes ) ?>" <?php if (get_field('button') && $card_link) : ?> onclick="location.href='<?php echo $card_link; ?>';" <?php endif; ?>>
    <div class="program-card__image" data-image-position="<?php echo $blockData['image_position'];?>">
        <picture class="program-card__background">
            <?php if($blockData['image']):?>
                <?php echo wp_get_attachment_image($blockData['image']['ID'],'medium', '', array('class' => 'lazyload') ); ?>
            <?php elseif($contentID):
                $featured_image = get_the_post_thumbnail($contentID);
                echo $featured_image;
            endif;?>
        </picture>
    </div>
    <div class="program-card__content">
        <<?php echo $blockData['card_title_level'];?> class="program-card__title">
            <?php echo $title;?>
        </<?php echo $blockData['card_title_level'];?>>
        <?php if(isset($divider) && $divider):?>
        <div class="program-card__divider u-textStyleItalic h--divider u-marginTop4gu">
            <?php echo $divider;?>
        </div>
        <?php endif;?>
        <div class="program-card__summary u-marginTop6gu">
            <?php echo $content;?>
        </div>
        <div class="program-card__button u-marginTop6gu">
            <?php 
            Load::atom(
                'button/button',
                [
                    'button'    => $button,
                ]
            );
            ?>
        </div>
    </div>
</div>