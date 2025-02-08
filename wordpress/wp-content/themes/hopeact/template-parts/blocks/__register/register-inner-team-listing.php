<?php 

// Register Block: team Listing
acf_register_block_type(array(
    'name'              => 'team-listing',
    'title'             => __('Team Listing'),
    'description'       => __('Select team members to display manually, or by tag'),
    'render_template'   => 'template-parts/blocks/_innerBlock/team-listing/team-listing.php',
    'category'          => 'design',
    'icon'              => 'align-wide',
    'keywords'          => array( 'team-listing', 'inner', 'blocks', 'content', 'page', 'build' ) ,
    'supports'          => array(
        'anchor' => true, 
        'align' => false, 
        'align_text' => false, 
        'align_content' => false,
    ),
));
