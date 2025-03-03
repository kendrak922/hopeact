<?php

/**
 * Block: Location Listing
 * - Slug: location-listing
 */

use Lean\Load;

// see functions--listing-queries.php for data handling

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : uniqid($block['id']));

// BLOCK :: DATA
$blockData = array(
    'title' => get_field('title') ?? 'Locations',
    'title_level' => get_field('title_level') ?? 'h3',
    'pull_type' => get_field('pull_type') ?? 'manual',
    'enable_accordion' => get_field('enable_accordion') ?? false
);

$accordionClasses = '';
// BLOCK :: CLASSES
$classes = ['inner-block--location-listing'];
if ($blockData['enable_accordion']) {
    $classes[] = 'inner-block--accordion';
}
if (!empty($block['className'])) {
    $classes = array_merge($classes, explode(' ', $block['className']));
}


// BLOCK :: RENDER

?>

<div id="<?php echo $blockID; ?>" class="inner-block location-listing <?php echo join(' ', $classes) ?>">

    <?php
    if ($blockData['enable_accordion']) :
    ?>
        <div class='accordionTabs__wrapper'>
            <div class="accordionTab">
                <div class="accordion__title accordionTab__trigger" aria-expanded="false">
                    <h3 class="h5"><?php echo $blockData['title'] ?></h3>
                    <div class="line"></div>
                    <div class="toggle"></div>
                </div>
            <?php else :
            Load::atom(
                'text/seperator',
                [
                    'base'            => ['location-listing'],
                    'heading'         => $blockData['title'],
                    'heading_level'   => $blockData['title_level'],
                ]
            );
        endif;
            ?>
            <ul class="location-listing__grid u-textSecondary accordionTab__content" <?php if ($blockData['enable_accordion']) echo 'aria-hidden="true" style="display: none;";' ?>>
                <?php
                // Resource list
                if ($blockData['pull_type'] == 'manual') :
                    $locationListing = [];
                    $content = get_field('manual_content');
                    foreach ($content as $group) {
                        $locationListing[$group['title']] = array();
                        foreach ($group['locations'] as $location) {
                            $locationListing[$group['title']][] =  array(
                                'title' => $location['title'],
                                'url' =>  $location['url'],
                            );
                        }
                    }
                else :
                    $locationListing = locationsFromQuery(
                        ['grantee'],
                        get_field('filter_project_tags'),
                    );
                endif;
                foreach ($locationListing as $key => $mapLocation) : ?>
                    <li class="location-listing__item">
                        <div class="location-listing__title"><?php echo $key; ?></div>
                        <ul class="location-listing__list">
                            <?php foreach ($mapLocation as $location) : ?>
                                <li class="location-item">
                                    <?php if ($location['url']) : ?><a href="<?php echo $location['url']; ?>"><?php endif; ?>
                                        <h4 class="location-item__title"><?php echo $location['title']; ?></h4>
                                        <?php if ($location['url']) : ?>
                                        </a><?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
            if ($blockData['enable_accordion']) : ?>
            </div>
        </div>

    <?php endif; ?>
</div>