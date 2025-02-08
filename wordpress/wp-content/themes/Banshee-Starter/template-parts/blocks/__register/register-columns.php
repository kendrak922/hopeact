<?php
//  Register Block: Column
acf_register_block_type(
    array(
    'name'              => 'columns',
    'title'             => __('Columns'),
    'description'       => __('Content in a column layout'),
    'render_template'   => 'template-parts/blocks/columns/columns.php',
    'category'          => 'design',
    'icon'              => 'share',
    'keywords'          => array('share', 'facebook', 'twitter', 'linkedin', 'text', 'copy', 'body', 'content', 'page', 'build'),
    'supports'          => array(
        'customClassName' => true,
        'anchor' => true,
        'align' => false,
        'align_text' => false,
        'align_content' => false
    ),
    )
);
