<?php 

// Register Block: Resource Listing
acf_register_block_type(array(
    'name'              => 'resource-listing',
    'title'             => __('Resource Listing'),
    'description'       => __('Select resources to display manually, or by tag'),
    'render_template'   => 'template-parts/blocks/_innerBlock/resource-listing/resource-listing.php',
    'category'          => 'design',
    'icon'              => 'align-wide',
    'keywords'          => array( 'resource-listing', 'inner', 'blocks', 'content', 'page', 'build' ) ,
    'supports'          => array(
        'anchor' => true, 
        'align' => false, 
        'align_text' => false, 
        'align_content' => false,
    ),
));
