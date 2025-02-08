<?php

/**
 * Block: Accordion
 * - Slug: accordion
 * - Docs: https://www.billerickson.net/innerblocks-with-acf-blocks/
 */

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : uniqid($block['id']));

use Lean\Load;

// BLOCK :: DATA
$blockData = array(
    'title' => get_field('title') ?? 'title',
    'title_level' => get_field('title_level') ?? 'h3',
);

// BLOCK :: CLASSES
$classes = ['inner-block--accordion'];
$classes[] = 'accordion';

if (!empty($block['className'])) {
    $classes = array_merge($classes, explode(' ', $block['className']));
}

// BLOCK :: RENDER
?>
<div id="<?php echo $blockID; ?>" class="inner-block <?php echo join(' ', $classes) ?>">
    <div class='accordionTabs__wrapper'>
        <div class="accordionTab">
            <div class="accordion__title accordionTab__trigger" aria-expanded="false">
                <?php         // heading
                Load::atom(
                    'text/heading',
                    [
                        'heading'         => $blockData['title'],
                        'heading_level'   => $blockData['title_level'],
                        'heading_style'  => 'h5'
                    ]
                );
                ?>
                <div class="line"></div>
                <div class="toggle"></div>
            </div>
            <div class="accordionTab__content" aria-hidden="true" style="display: none;">
                <InnerBlocks />
            </div>
        </div>
    </div>
</div>