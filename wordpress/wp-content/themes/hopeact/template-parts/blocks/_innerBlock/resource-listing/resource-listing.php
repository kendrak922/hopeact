<?php
/**
 * Block: Resource Listing
 * - Slug: resource-listing
 */

use Lean\Load;

// see functions--listing-queries.php for data handling

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);

// BLOCK :: DATA
$blockData = array(
    'title' => get_field('title') ?? 'Resource Category',
    'title_level' => get_field('title_level') ?? 'h2',
    'pull_type' => get_field('pull_type') ?? 'manual',
);

// BLOCK :: CLASSES
$classes = [ 'inner-block--resource-listing' ];
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}


// BLOCK :: RENDER
?>

<div id="<?php echo $blockID; ?>" class="inner-block content-listing resource-listing <?php echo join( ' ', $classes ) ?>">
    
    <?php 
        // seperator
        if($blockData['title']):
            Load::atom(
                'text/seperator',
                [
                    'base'            => ['resource-listing'],
                    'heading'         => $blockData['title'],
                    'heading_level'   => $blockData['title_level'],
                ]
            );
        endif;
    ?>

    <div class="list__resource-listing">
        <?php 
        // Resource list
        if($blockData['pull_type']=='manual'):
            $resourcelisting = [];
            $content = get_field('manual_content');
            foreach($content as $id){
                $resourcelisting[] = resourceFromID($id);
            }
        else:
            $resourcelisting = resourcesFromQuery(
                get_field('filter_category'),
                get_field('filter_tags'),
                get_field('filter_audience'),
                get_field('filter_audience_exclude')
            );
        endif;
        foreach( $resourcelisting as  $key=>$resource):
        ?>

            <div class="resource__overview content-entry content-entry--reverse content-entry--left-wide text-sm card--clickable" onclick="location.href='<?php echo $resource['url']; ?>';"> 
                <div class="content-entry__right <?php if(!$resource['imageID']):?>u-hidden u-md-block<?php endif?>">
                    <?php if($resource['imageID']):?>
                        <?php echo wp_get_attachment_image($resource['imageID'],'medium', '', array('class' => 'lazyload') ); ?>
                    <?php endif;?>
                </div>
                <div class="content-entry__left">
                    <div class="h--smNav u-marginBottom3gu">
                        <?php echo $resource['eyebrow'];?>
                    </div>
                    <a class="content-entry__title" href="<?php echo $resource['url'];?>">
                        <?php 
                        Load::atom(
                            'text/heading',
                            [
                                'heading'         => $resource['title'],
                                'heading_level'   => 'h3',
                                'heading_style'   => 'h4 u-marginBottom4gu',
                            ]
                        );?>
                    </a>
                    <div class="inner-block--divider u-marginVert4gu u-bgColorNone">
                        <span class="u-bgColorBlue"></span>
                    </div>
                    <?php if($resource['description']):?>
                        <div >
                            <?php echo $resource['description'];?>
                        </div>
                    <?php endif;?>
                </div>
            </div> 

        <?php endforeach;?>
    </div>
</div>