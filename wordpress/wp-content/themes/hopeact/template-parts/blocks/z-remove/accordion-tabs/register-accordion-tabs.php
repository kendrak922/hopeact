<?php

// Register Block: Accordions / Tabs
acf_register_block_type(array(
    'name'              => 'accordion-tabs',
    'title'             => __('Accordions / Tabs'),
    'description'       => __('Add content in hidden drawers or tabs for more efficiant display'),
    'render_template'   => 'template-parts/blocks/accordion-tabs/accordion-tabs.php',
    'category'          => $themeGlobals['guten_category'],
    'icon'              => 'list-view',
    'keywords'          => array('custom', 'accordion', 'tabs', 'drawers', 'responsive'),
    'supports'          => array(
        'customClassName' => true,
        'anchor' => true,
        'align' => false,
        'align_text' => false,
        'align_content' => false
    ),
));
