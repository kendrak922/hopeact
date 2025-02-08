<?php 

// Register Block: Grant Project Listing
acf_register_block_type(array(
    'name'              => 'project-grant-listing',
    'title'             => __('Grant Projects Listing'),
    'description'       => __('Select Grant Projects to display manually, or by tag'),
    'render_template'   => 'template-parts/blocks/_innerBlock/project-grant-listing/project-grant-listing.php',
    'category'          => 'design',
    'icon'              => 'align-wide',
    'keywords'          => array( 'project-grant', 'inner', 'blocks', 'content', 'page', 'build' ) ,
    'supports'          => array(
        'anchor' => true, 
        'align' => false, 
        'align_text' => false, 
        'align_content' => false,
    ),
));
