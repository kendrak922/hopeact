<?php

/**
 * Block: Publications
 * - Slug: publications
 */

use Lean\Load;

// see functions--listing-queries.php for data handling

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);

// BLOCK :: DATA
$blockData = array(
    'title' => get_field('title') ?? 'Publication Category',
    'title_level' => get_field('title_level') ?? 'h2',
    'pull_type' => get_field('pull_type') ?? 'manual',
);

// BLOCK :: CLASSES
$classes = ['inner-block--publication-listing'];
if (!empty($block['className'])) {
    $classes = array_merge($classes, explode(' ', $block['className']));
}


// BLOCK :: RENDER
?>

<div id="<?php echo $blockID; ?>" class="inner-block glossary-listing publications <?php echo join(' ', $classes) ?>">

    <?php
    // seperator
    if ($blockData['title']) :
        Load::atom(
            'text/seperator',
            [
                'base'            => ['publication-listing'],
                'heading'         => $blockData['title'],
                'heading_level'   => $blockData['title_level'],
            ]
        );
    endif;
    ?>

    <div class="list__publications">
        <?php
        // Publication list
        if ($blockData['pull_type'] == 'manual') :
            $publications = [];
            $content = get_field('manual_content');
            foreach ($content as $id) {
                $publications[] = publicationFromID($id);
            }
        else :
            $publications = grantPublicationsFromQuery(
                get_field('filter_tags'),
                get_field('filter_audience'),
                get_field('filter_audience_exclude')
            );
        endif;
        foreach ($publications as  $key => $publication) :
        ?>

            <div class="publication__overview glossary-entry glossary-entry--left-wide text-xs">

                <div class="glossary-entry__left">
                    <?php
                    Load::atom(
                        'text/heading',
                        [
                            'heading'         => $publication['title'],
                            'heading_level'   => 'h3',
                            'heading_style'   => 'h4 u-marginBottom6gu',
                        ]
                    ); ?>
                    <div class="inner-block  inner-block--accordion accordion--mobile-only">
                        <div class='accordionTabs__wrapper'>
                            <div class="accordionTab">
                                <div class="accordion__title accordionTab__trigger" aria-expanded="false">
                                    <h3 class="h--smNav">View Abstract</h3>
                                    <div class="line"></div>
                                    <div class="toggle"></div>
                                </div>
                                <div class="accordionTab__content" aria-hidden="true" style="display: none;">
                                    <div class="h--caption">
                                        Abstract
                                    </div>
                                    <div>
                                        <?php echo $publication['abstract']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-hidden u-md-block">
                        <div class="h--caption">
                            Abstract
                        </div>
                        <div>
                            <?php echo $publication['abstract']; ?>
                        </div>

                    </div>


                    <?php
                    if ($publication['url']) :
                        $button = [
                            'button_type' => 'link',
                            'button_style' => 'outline',
                            'button_link' => array(
                                'title' => 'Read "' . $publication['title'] . '"',
                                'url' => $publication['url'],
                            ),
                            'classes' => 'u-marginTop6gu'
                        ];

                        Load::atom(
                            'button/button',
                            [
                                'button' => $button,
                            ]
                        );
                    endif; ?>
                </div>
                <div class="glossary-entry__right u-textSecondary">
                    <?php
                    if ($publication['author']) :
                    ?>
                        <div>
                            <div class="h--caption u-marginBottom1gu">Authors:</div>
                            <div class="u-textWeightBold">
                                <?php echo $publication['author']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($publication['publication_date']) : ?>
                        <div class="u-marginTop8gu">
                            <div class="h--caption u-marginBottom1gu">Publication Date:</div>
                            <div class="u-textWeightBold">
                                <?php echo $publication['publication_date']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($publication['publisher']) : ?>
                        <div class="u-marginTop8gu">
                            <div class="h--caption u-marginBottom1gu">Publisher:</div>
                            <div class="u-textWeightBold">
                                <?php echo $publication['publisher']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($publication['volume']) : ?>
                        <div class="u-marginTop8gu">
                            <div class="h--caption u-marginBottom1gu">Volume/Issue/Pages:</div>
                            <div class="u-textWeightBold">
                                <?php echo $publication['volume']; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($publication['population_studied']) : ?>
                        <div class="u-marginTop8gu">
                            <div class="h--caption u-marginBottom1gu">Population Studied:</div>
                            <div class="u-textWeightBold">
                                <?php echo $publication['population_studied']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($publication['treatment']) : ?>
                        <div class="u-marginTop8gu">
                            <div class="h--caption u-marginBottom1gu">Treatment:</div>
                            <div class="u-textWeightBold">
                                <?php echo $publication['treatment']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($publication['study_design']) : ?>
                        <div class="u-marginTop8gu">
                            <div class="h--caption u-marginBottom1gu">Study Design:</div>
                            <div class="u-textWeightBold">
                                <?php echo $publication['study_design']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($publication['measures']) : ?>
                        <div class="u-marginTop8gu">
                            <div class="h--caption u-marginBottom1gu">Measures:</div>
                            <div class="u-textWeightBold">
                                <?php echo $publication['measures']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>