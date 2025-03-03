<?php
/**
 * Block: Grant Projects
 * - Slug: grant-projects
 */

use Lean\Load;

// see functions--listing-queries.php for data handling

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);

// BLOCK :: DATA
$blockData = array(
    'title' => get_field('title') ?? 'Grant Project Descriptions',
    'title_level' => get_field('title_level') ?? 'h2',
    'pull_type' => get_field('pull_type') ?? 'manual',
);

// BLOCK :: CLASSES
$classes = [ 'inner-block--project-listing' ];
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}


// BLOCK :: RENDER
?>

<div id="<?php echo $blockID; ?>" class="inner-block glossary-listing grant-projects <?php echo join( ' ', $classes ) ?>">
    
    <?php 
        // seperator
        if($blockData['title']):
            Load::atom(
                'text/seperator',
                [
                    'base'            => ['project-listing'],
                    'heading'         => $blockData['title'],
                    'heading_level'   => $blockData['title_level']
                ]
            );
        endif;
    ?>

    <div class="list__grant-projects">
        <?php 
        // Project list
        if($blockData['pull_type']=='manual'):
            $projects = [];
            $content = get_field('manual_content');
            foreach($content as $id){
                $projects[] = projectFromID($id);
            }
        else:
            $projects = projectGrantsFromQuery(
                get_field('filter_project_tags'),
            );
        endif;

        foreach( $projects as  $key=>$project):
        ?>

                <div class="grant-project__overview glossary-entry glossary-entry--left-wide text-xs">

                    <div class="glossary-entry__left">
                        <?php 
                        Load::atom(
                            'text/heading',
                            [
                                'heading'         => $project['grantee'] ? $project['grantee']['city'].', '.$project['grantee']['state'] : 'Grant Project',
                                'heading_level'   => 'div',
                                'heading_style'   => 'h--smNav u-marginBottom6gu',
                            ]
                        );
                        Load::atom(
                            'text/heading',
                            [
                                'heading'         => $project['grantee'] ? $project['grantee']['title'] : 'Grant Project',
                                'heading_level'   => 'h3',
                                'heading_style'   => 'h4 u-marginBottom6gu',
                            ]
                        );?>
                        <?php 
                        Load::atom(
                            'text/heading',
                            [
                                'heading'         => $project['title'],
                                'heading_level'   => 'h4',
                                'heading_style'   => 'h--smNav u-marginBottom2gu',
                            ]
                        );?>
                        <div >
                            <?php echo $project['description'];?>
                        </div>
                        <?php
                        $button = [
                            'button_type' => 'link',
                            'button_style' => 'outline',
                            'button_link' => $project['link'],
                            'classes' => 'u-marginTop6gu'
                        ];
                        Load::atom(
                            'button/button',
                            [
                                'button' => $button,
                            ]
                        ); ?>
                    </div>
                    <div class="glossary-entry__right">
                        <div>
                            <div class="h--caption u-marginBottom1gu">Partner Organization:</div>
                            <?php foreach( $project['partner_organization'] as  $key=>$partner):?>
                                <div class="<?php if($key > 0):?>u-marginTop4gu<?php endif;?>">
                                    <?php echo $partner['title'];?>
                                    <br/>
                                    <?php
                                    $button = [
                                        'button_type' => 'link',
                                        'button_style' => 'text',
                                        'button_link' => $partner['link'], 
                                    ];
                                    Load::atom(
                                        'button/button',
                                        [
                                            'button' => $button,
                                        ]
                                    ); ?>
                                </div>
                            <?php endforeach;?>
                        </div>

                        <div class="u-textSecondary u-marginTop8gu">
                            <div class="h--caption u-marginBottom1gu">Grant Amount and Tier:</div>
                            <div class="u-textWeightBold">
                                <?php echo $project['amount'];?><?php if($project['tier']):?>, <?php echo $project['tier'] ;?><?php endif;?>
                            </div>
                        </div>

                        <div class="u-textSecondary u-marginTop8gu">
                            <div class="h--caption u-marginBottom1gu">Grant Period:</div>
                            <div class="u-textWeightBold">
                                <?php echo $project['period'];?>
                            </div>
                        </div>
                    </div>
                </div> 

        <?php endforeach;?>
    </div>
</div>