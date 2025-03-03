<?php

/**
 * Block: Related Content
 * - Slug: related-content
 */

use Lean\Load;

// Local Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);
$blockData = [
    'variant' => get_field('variant') ?? 'border-top', //border-between
    'grid_type' => get_field('grid_type'),
];

//get featured posts
if($blockData['grid_type']=='manual'):
    $featuredPosts = [];
    $content = get_field('grid_content');
    foreach($content as $id){
        switch(get_post_type($id)){
            case 'impact': 
                $featuredPosts[] = cardFromImpactID($id); break;
            case 'news': 
                $featuredPosts[] = cardFromNewsID($id); break;
            case 'resource': 
                $featuredPosts[] = cardFromResourceID($id); break;
            case 'research': 
                $featuredPosts[] = cardFromResearchID($id); break;
            default:
                $featuredPosts[] = cardFromPostID($id); break;
        }
    }
else:
    $postTypes = get_field('grid_post_type');
    $featuredPosts = relatedFromQuery(
        get_field('grid_post_type'),
        get_field('grid_max') ?? 3,
        get_field('grid_filter_tags'),
        get_field('grid_filter_audience'),
        get_field('grid_filter_news'),
        get_field('grid_filter_impact'),
        get_field('grid_filter_resources'),
        get_field('grid_filter_research'),
    );
endif;


//BLOCK RENDER
?>

<div id="<?php echo $blockID; ?>" class="block block--related-content related-content--<?php echo $blockData['variant'];?> <?php echo isset($block["className"]) ? $block["className"] : '' ?>">

    <ul class="related-content__grid" role="presentation">
       <?php foreach($featuredPosts as $featuredPost):?>
            <li>
                <div class="card card--clickable" onclick="location.href='<?php echo $featuredPost['url']; ?>';">
                    <?php if($featuredPost['imageID']):?>
                    <div class="card__image">
                        <?php echo wp_get_attachment_image($featuredPost['imageID'],'medium-large', '', array('class' => 'lazyload') ); ?>
                    </div>
                    <?php endif;?>  
                    <div class="card__content">
                        <div class="card__eyebrow h--smNav">
                            <?php echo $featuredPost['eyebrow'];?>
                        </div>
                        <a class="card__title" href="<?php echo $featuredPost['url'];?>">
                            <h3 class="card__title h5">
                                    <?php echo $featuredPost['title'];?>
                            </h3>
                        </a>
                        <div class="inner-block--divider u-bgColorNone">
                            <span class="u-bgColorBlue"></span>
                        </div>
                        <div class="card__content text-sm">
                            <?php echo $featuredPost['description'];?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach;?>
       

        <?php
        // echo '<li class="grid_col u-animation--child">';
        // Load::molecule(
        //     'cards/card',
        //     [
        //         'post_id' => get_the_ID(),
        //         'template' => 'card--tile'
        //     ]
        // );
        // echo '</li>';
        ?>
    </ul>
</div>