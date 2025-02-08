<?php
/**
 * Block: Cover Image
 * - Slug: cover-image 
 */

use Lean\Load;

// Global Variables
global $templateData;

// BLOCK :: DATA
$blockID = (!empty($block['anchor']) ? $block['anchor'] : uniqid($block['id']));
$blockData = [
    'classes' => [],
    'image' => get_field('image'),
    'aspect_ratio' => get_field('aspect_ratio') ?? 'default',
    'resolution' => get_field('resolution') ?? 'large'
];

$mediaId = $blockData['image']['ID'];
$image = get_post($mediaId);
$image_caption = $image->post_excerpt?$image->post_excerpt:'';
$image_attribution = get_field('attribution',$mediaId)? '<i>'.get_field('attribution',$mediaId).'</i>':'';
   

// BLOCK :: CLASSES
if (isset($block["className"])) {
    $blockData['classes'][] =  $block["className"];
}
$blockData['classes'][] = 'u-bgMedia';


// BLOCK :: RENDER     
?>

<figure class="figure--center">
    <?php echo wp_get_attachment_image($mediaId, $blockData['resolution'], '', array('class' => 'lazyload','style' => 'aspect-ratio: '.$blockData['aspect_ratio']) ); ?>
    <figcaption class="h--caption"><?php echo $image_caption .' '.$image_attribution;?></figcaption>
</figure>
