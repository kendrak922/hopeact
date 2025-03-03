<?php 

// Register Block: News Listing
acf_register_block_type(array(
    'name'              => 'news-listing',
    'title'             => __('News Listing'),
    'description'       => __('Select news to display manually, or by tag'),
    'render_template'   => 'template-parts/blocks/_innerBlock/news-listing/news-listing.php',
    'category'          => 'design',
    'icon'              => 'align-wide',
    'keywords'          => array( 'news-listing', 'inner', 'blocks', 'content', 'page', 'build' ) ,
    'supports'          => array(
        'anchor' => true, 
        'align' => false, 
        'align_text' => false, 
        'align_content' => false,
    ),
));
