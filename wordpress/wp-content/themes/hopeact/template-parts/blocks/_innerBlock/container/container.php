<?php
/**
 * Block: Container
 * - Slug: container
 * - Docs: https://www.billerickson.net/innerblocks-with-acf-blocks/
 */

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : uniqid($block['id']));

$blocks_template = array(
    // array('core/heading', array()),
    // array('core/paragraph', array()),
    // array('acf/buttons', array()),
);

// BLOCK :: DATA
$blockData = array(
    'width' => get_field('width') ?? 'default'
);

// BLOCK :: CLASSES
$classes = [ 'inner-block--container' ];
$classes[] = 'container';
$classes[] = 'container--'.$blockData['width'];

if($block['align']){
    $classes[] = 'container--'.$block['align'];
}
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

// BLOCK :: RENDER
?>

<?php if($block['align'] && $block['align'] != 'center'):?>
<div class="container container--wide" >
<?php endif?>
<div id="<?php echo $blockID; ?>" class="inner-block <?php echo join( ' ', $classes ) ?>">
    <InnerBlocks 
        template="<?php echo esc_attr(wp_json_encode($blocks_template)); ?>" 
    />
</div>
<?php if($block['align'] && $block['align'] != 'center'):?>
</div>
<?php endif?>