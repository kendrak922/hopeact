<?php 

// Register Block: Location Listing
acf_register_block_type(array(
    'name'              => 'location-listing',
    'title'             => __('Location Listing'),
    'description'       => __('Select locations to display manually, or by tag'),
    'render_template'   => 'template-parts/blocks/_innerBlock/location-listing/location-listing.php',
    'category'          => 'design',
    'icon'              => 'align-wide',
    'keywords'          => array( 'location-listing', 'inner', 'blocks', 'content', 'page', 'build' ) ,
    'supports'          => array(
        'anchor' => true, 
        'align' => false, 
        'align_text' => false, 
        'align_content' => false,
    ),
));
