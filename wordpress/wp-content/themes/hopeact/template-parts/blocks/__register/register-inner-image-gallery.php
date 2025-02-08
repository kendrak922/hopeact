<?php

// Register Block: Image Gallery
acf_register_block_type(array(
    'name'              => 'image-gallery',
    'title'             => __('Image Gallery (Custom Grid)'),
    'description'       => __('Gallery of images, good for things like event photos and blogs'),
    'render_template'   => 'template-parts/blocks/_innerBlock/image-gallery/image-gallery.php',
    'category'          => $themeGlobals['guten_category'],
    'icon'              => 'images-alt',
    'keywords'          => array('image', 'gallery', 'logos', 'content', 'page', 'build'),
    'supports'          => array(
        'customClassName' => true,
        'anchor' => true,
        'align' => false,
        'align_text' => false,
        'align_content' => false
    ),
));
