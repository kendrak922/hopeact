<?php 

// Register Block: Accordion
acf_register_block_type(array(
    'name'              => 'accordion',
    'title'             => __('Accordion'),
    'description'       => __('Accordion to align widths of inner content'),
    'render_template'   => 'template-parts/blocks/_innerBlock/accordion/accordion.php',
    'category'          => 'design',
    'icon'              => 'align-wide',
    'keywords'          => array( 'accordion', 'inner', 'blocks', 'content', 'page', 'build' ) ,
    'supports'          => array(
        'jsx' => true, // allow inner blocks
        'anchor' => true, 
        'align' => true, 
        'align_text' => false, 
        'align_content' => false,
        "spacing" => array(
            "padding" => true,
            "margin" => true
        )
    ),
));
