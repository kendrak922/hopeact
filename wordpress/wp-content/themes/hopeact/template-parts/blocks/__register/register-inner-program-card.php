<?php 

// Register Block: Inner Block Program Card
acf_register_block_type(array(
    'name'              => 'program-card',
    'title'             => __('Program Preview (Card)'),
    'description'       => __('Program in the format of colored block'),
    'render_template'   => 'template-parts/blocks/_innerBlock/program-card/program-card.php',
    'category'          => 'design',
    'icon'              => 'align-wide',
    'keywords'          => array( 'program', 'card', 'inner', 'blocks', 'content', 'page', 'build' ) ,
    'supports'          => array(
        'jsx' => true, // allow inner blocks
        'anchor' => true, 
        'align' => false, 
        'align_text' => false, 
        'align_content' => false,
        'color' => true,
    ),
));
