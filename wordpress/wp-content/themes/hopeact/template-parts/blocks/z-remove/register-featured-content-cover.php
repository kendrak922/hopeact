<?php 

// Register Block: Featured Content - Cover Image
acf_register_block_type(array(
    'name'              => 'featured-content-cover',
    'title'             => __('Featured Content - Cover Image'),
    'description'       => __('Full width banner for featured content, like case studies'),
    'render_template'   => 'template-parts/blocks/featured-content-cover/featured-content-cover.php',
    'category'          => $themeGlobals['guten_category'],
    'icon'              => 'format-image',
    'keywords'          => array( 'hero', 'banner', 'full', 'width', 'media', 'content', 'image', 'bleed', 'flexible', 'page', 'build' ) ,
    'supports'          => array(
        'jsx' => true, // allow inner blocks
        'customClassName' => true,
        'anchor' => true, 
        'align' => true, 
        'align_text' => false, 
        'align_content' => true,
        'ariaLabel'=> true
    ),
));