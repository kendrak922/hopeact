<?php 

// Register Block: Map
acf_register_block_type(array(
    'name'              => 'map',
    'title'             => __('Map'),
    'description'       => __('Map with locations manually entered, or pulling organization/grantees by tags'),
    'render_template'   => 'template-parts/blocks/_innerBlock/map/map.php',
    'category'          => 'design',
    'icon'              => 'align-wide',
    'keywords'          => array( 'map', 'inner', 'blocks', 'content', 'page', 'build' ) ,
    'supports'          => array(
        'jsx' => true, // allow inner blocks
        'anchor' => true, 
        'align' => false, 
        'align_text' => false, 
        'align_content' => false 
    ),
));
