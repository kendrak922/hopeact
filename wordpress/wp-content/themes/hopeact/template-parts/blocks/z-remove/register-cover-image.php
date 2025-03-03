<?php 
// Register Block: Cover Image
acf_register_block_type(array(
    'name'              => 'cover-image',
    'title'             => __('Cover Image (ACF)'),
    'description'       => __('Cover Image with caption block'),
    'render_template'   => 'template-parts/blocks/cover-image/cover-image.php',
    'category'          => 'design',
    'icon'              => 'align-wide',
    'keywords'          => array( 'image', 'cover', 'caption', 'blocks', 'content', 'page', 'build' ) ,
    'supports'          => array(
        'customClassName' => true,
        'anchor' => false, 
        'align' => false, 
        'align_text' => false, 
        'align_content' => false,
    ),
));
