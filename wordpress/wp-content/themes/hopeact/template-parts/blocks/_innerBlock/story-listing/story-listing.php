<?php
/**
 * Block: Story Listing
 * - Slug: story-listing
 */

use Lean\Load;

// see functions--listing-queries.php for data handling

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);

// BLOCK :: DATA
$blockData = array(
    'title' => get_field('title') ?? 'Our Stories',
    'title_level' => get_field('title_level') ?? 'h2',
    'pull_type' => get_field('pull_type') ?? 'manual',
);

// BLOCK :: CLASSES
$classes = [ 'inner-block--story-listing' ];
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

$storylisting[] = storiesFromQuery()

// BLOCK :: RENDER
?>

<div id="<?php echo $blockID; ?>" class="inner-block content-listing story-listing <?php echo join( ' ', $classes ) ?>">

    <div class="list__story-listing">
        <?php 
        foreach( $storylisting[0] as  $key=>$story):
        ?>

            <div class="resource__overview content-entry <?php if ($key % 2 != 0) { echo 'content-entry--reverse'; } ?> content-entry--left-wide text-sm card--clickable" onclick="location.href='<?php echo $story['url']; ?>';"> 
                <div class="content-entry__right <?php if(!$story['imageID']):?>u-hidden u-md-block<?php endif?>">
                    <?php if($story['imageID']):?>
                        <?php echo wp_get_attachment_image($story['imageID'],'medium', '', array('class' => 'lazyload') ); ?>
                    <?php endif;?>
                </div>
                <div class="content-entry__left">
                    <a class="content-entry__title" href="<?php echo $story['url'];?>">
                        <?php 
                        Load::atom(
                            'text/heading',
                            [
                                'heading'         => $story['title'],
                                'heading_level'   => 'h3',
                                'heading_style'   => 'h2 u-marginBottom10gu',
                            ]
                        );?>
                    </a>
                    <?php if($story['description']) : ?>
                        <div class="text-xl">
                            <?php echo $story['description'];?>
                            <?php if($story['accent_image']) :?>
                                <?php echo wp_get_attachment_image($story['accent_image']['id'],'medium', '', array('class' => 'lazyload') ); ?>
                            <?php endif;?>
                        </div>
                    <?php endif;?>
                </div>
            </div> 

        <?php endforeach;?>
    </div>
</div>