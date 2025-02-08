<?php
/**
 * Block: News Listing
 * - Slug: news-listing
 */

use Lean\Load;

// see functions--listing-queries.php for data handling

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);

// BLOCK :: DATA
$blockData = array(
    'title' => get_field('title') ?? 'News Category',
    'title_level' => get_field('title_level') ?? 'h2',
    'pull_type' => get_field('pull_type') ?? 'manual',
);

// BLOCK :: CLASSES
$classes = [ 'inner-block--map' ];
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}


// BLOCK :: RENDER
?>

<div id="<?php echo $blockID; ?>" class="inner-block content-listing news-listing <?php echo join( ' ', $classes ) ?>">
    
    <?php 
        // seperator
        if($blockData['title']):
            Load::atom(
                'text/seperator',
                [
                    'base'            => ['map'],
                    'heading'         => $blockData['title'],
                    'heading_level'   => $blockData['title_level'],
                ]
            );
        endif;
    ?>

    <div class="list__news-listing">
        <?php 
        // Publication list
        if($blockData['pull_type']=='manual'):
            $newslisting = [];
            $content = get_field('manual_content');
            foreach($content as $id){
                $newslisting[] = newsFromID($id);
            }
        else:
            $newslisting = newsFromQuery(
                get_field('filter_category'),
                get_field('filter_tags'),
                get_field('filter_audience'),
                get_field('filter_audience_exclude')
            );
        endif;
        foreach( $newslisting as  $key=>$news):
        ?>

            <div class="news__overview content-entry content-entry--reverse content-entry--left-wide text-sm card--clickable" onclick="location.href='<?php echo $news['url']; ?>';"> 
                
                <div class="content-entry__right <?php if(!$news['imageID']):?>u-hidden u-md-block<?php endif?>">
                    <?php if($news['imageID']):?>
                    <?php echo wp_get_attachment_image($news['imageID'],'medium', '', array('class' => 'lazyload') ); ?>
                    <?php endif;?>  
                </div>
                <div class="content-entry__left">
                    <div class="h--smNav u-marginBottom3gu">
                        <?php echo $news['eyebrow'];?>
                    </div>
                    <a class="content-entry__title" href="<?php echo $news['url'];?>">
                        <?php 
                        Load::atom(
                            'text/heading',
                            [
                                'heading'         => $news['title'],
                                'heading_level'   => 'h3',
                                'heading_style'   => 'h4 u-marginBottom4gu',
                            ]
                        );?>
                    </a>
                    <div class="inner-block--divider u-bgColorNone">
                        <span class="u-bgColorBlue"></span>
                    </div>
                    <?php if($news['description']):?>
                        <div>
                            <?php echo $news['description'];?>
                        </div>
                    <?php endif;?>
                </div>
            </div> 

        <?php endforeach;?>
    </div>
</div>