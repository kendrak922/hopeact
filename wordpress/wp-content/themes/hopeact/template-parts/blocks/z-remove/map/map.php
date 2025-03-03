<?php
/**
 * Block: Map
 * - Slug: map
 */
use Lean\Load;

// see functions--listing-queries.php for data handling

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);

$blocks_template = array(
    array('core/heading', array()),
    array('core/paragraph', array()),
);

// BLOCK :: DATA
$blockData = array(
    'legend' => get_field('legend') ?? [],
    'map' => get_field('map') ?? [],
    'hide_on_mobile' => get_field('hide_on_mobile') ?? false,
);

// BLOCK :: CLASSES
$classes = [ 'inner-block--map' ];
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}


// BLOCK :: RENDER
?>

<div id="<?php echo $blockID; ?>" class="inner-block <?php echo join( ' ', $classes ) ?>">
    <!-- Header -->
    <div class="map__header grid grid--column grid-md--row grid--justify-between">
        <div class="map__content">
            <InnerBlocks 
                template="<?php echo esc_attr(wp_json_encode($blocks_template)); ?>" 
            />
        </div>
        <div class="map__legend <?php if($blockData['hide_on_mobile']):?>u-hidden u-md-block<?php endif?>">
            <?php if($blockData['legend']):?>
                <?php echo wp_get_attachment_image($blockData['legend'],'full', '', array('alt' => 'map legend', 'class' => 'lazyload') ); ?>
            <?php endif;?>
        </div>
    </div>  

    <!-- Map -->
    <div class="map__map <?php if($blockData['hide_on_mobile']):?>u-hidden u-md-block<?php endif?>">
        <?php if($blockData['map']):?>
            <?php echo wp_get_attachment_image($blockData['map'],'1536×1536', '', array('class' => 'lazyload') ); ?>
        <?php endif;?>
    </div>

</div>