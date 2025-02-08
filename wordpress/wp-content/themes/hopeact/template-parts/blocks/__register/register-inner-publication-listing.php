<?php 

// Register Block: Publication Listing
acf_register_block_type(array(
    'name'              => 'publication-listing',
    'title'             => __('Publication Listing'),
    'description'       => __('Select Publications to display manually, or by tag'),
    'render_template'   => 'template-parts/blocks/_innerBlock/publication-listing/publication-listing.php',
    'category'          => 'design',
    'icon'              => 'align-wide',
    'keywords'          => array( 'publications', 'inner', 'blocks', 'content', 'page', 'build' ) ,
    'supports'          => array(
        'anchor' => true, 
        'align' => false, 
        'align_text' => false, 
        'align_content' => false,
    ),
));
