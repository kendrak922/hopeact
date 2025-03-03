<?php
/**
 * Block: Team Listing
 * - Slug: team-listing
 */

use Lean\Load;

// see functions--listing-queries.php for data handling

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);

// BLOCK :: DATA
$blockData = array(
    'title' => get_field('title') ?? 'Team Category',
    'title_level' => get_field('title_level') ?? 'h2',
    'pull_type' => get_field('pull_type') ?? 'manual',
);

// BLOCK :: CLASSES
$classes = [ 'inner-block--team-listing' ];
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}


// BLOCK :: RENDER
?>

<div id="<?php echo $blockID; ?>" class="inner-block team-listing <?php echo join( ' ', $classes ) ?>">
    
    <?php 
        // seperator
        if($blockData['title']):
            Load::atom(
                'text/seperator',
                [
                    'base'            => ['team-listing'],
                    'heading'         => $blockData['title'],
                    'heading_level'   => $blockData['title_level'],
                ]
            );
        endif;
    ?>

    <div class="list__team-listing team-listing__grid">
        <?php 
        // Team Member list
        if($blockData['pull_type']=='manual'):
            $personlisting = [];
            $content = get_field('manual_content');
            foreach($content as $id){
                $personlisting[] = personFromID($id);
            }
        else:
            $personlisting = personsFromQuery(
                get_field('filter_category'),
            );
        endif;
        foreach( $personlisting as  $key=>$person):
            $personTitle = $person['first_name'].' '.$person['last_name'];
            if($person['credentials']):
                $personTitle .= ', '.$person['credentials'];
            endif;
        ?>
            <div class="team-item">
                <?php 
                Load::atom(
                    'text/heading',
                    [
                        'heading'         => $personTitle,
                        'heading_level'   => 'h3',
                        'heading_style'   => 'h5 u-marginBottom2gu',
                    ]
                );?>
                <div class="inner-block--divider u-marginVert3gu u-bgColorNone">
                    <span class="u-bgColorBlue"></span>
                </div>
                <div class="h--smNavLines">
                    <?php echo $person['position'];?>
                </div>
            </div> 
        <?php endforeach;?>
    </div>
</div>