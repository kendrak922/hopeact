<?php

/**
 * Block: News/Events Latest
 * - Slug: news-events-latest
 */

use Lean\Load;

// Local Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);
$blockData = [
    'block_header' => get_field('block_header'),
];

/***** ADMIN LABEL *****/
echo hopeact_blockAdminHead($block);
?>

<!-- BLOCK CONTENT -->
<section id="<?php echo $blockID; ?>" class="block block--news-events-latest  <?php echo isset($block["className"]) ? $block["className"] : '' ?>">
    <div class="container">

        <?php
        // Molecule: Block Header
        $blockHeader = $blockData['block_header'];
        Load::molecule(
            'heading/block-heading',
            [
                'block-heading' => $blockHeader,
                'classes' => ['u-textAlignCenter u-animation', 'u-marginTop5gu u-marginBottom12gu u-md-marginBottom16gu'],
            ]
        );
        ?>

        <div class="grid grid--gutters-ultra-wide grid--column grid-lg--row">
            <div class="grid__col grid__col--12 grid__col-lg--6">
                <h3 class="h4 u-textAlignCenter u-md-textAlignLeft">Impact & News</h3>
                <ul class="u-normalize grid grid--column grid--gutters-narrow grid--no-wrap u-animation u-animation--sequenced">
                    <?php
                    $per_page = 3;
                    // Load molecule - card--tile
                    hopeact_get_news($per_page, 'card--tile u-animation--child');
                    ?>
                </ul>
                <div class="u-textAlignCenter u-md-textAlignLeft u-marginTop8gu">
                    <?php
                    $button = [
                        'button_type' => 'link',
                        'button_style' => 'arrow',
                        'button_link' => [
                            'url' => '/impact-and-news',
                            'title' => 'View All Impact & News'
                        ]
                    ];
                    Load::atom(
                        'button/button',
                        [
                            'button' => $button,
                        ]
                    ); ?>
                </div>
            </div>
            <div class="grid__col grid__col--12 grid__col-lg--6">
                <h3 class="h4 u-textAlignCenter u-md-textAlignLeft">Events</h3>
                <ul class="u-normalize grid grid--column grid--gutters-narrow grid--no-wrap u-animation u-animation--sequenced">
                    <?php
                    $per_page = 3;
                    // Load molecule - card--tile
                    hopeact_get_events($per_page, 'upcoming', 'card--tile', ['u-animation--child']);
                    ?>
                </ul>
                <div class="u-textAlignCenter u-md-textAlignLeft u-marginTop8gu u-animation">
                    <?php
                    $button = [
                        'button_type' => 'link',
                        'button_style' => 'arrow',
                        'button_link' => [
                            'url' => '/events',
                            'title' => 'View All Events'
                        ]
                    ];
                    Load::atom(
                        'button/button',
                        [
                            'button' => $button,
                        ]
                    ); ?>
                </div>
            </div>
        </div>

    </div>
</section>