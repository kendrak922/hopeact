<?php

use Lean\Load;

// Load::atom(
//     'text/seperator',
//     [
//         'base'            => ['content-seperator'],
//         'heading'         => 'seperator Title',
//         'heading_level'   => 'h3',
//         'heading_style'   => 'h--seperator',
//     ]
// );

$base =  $args['base'] ?? [];
$classes = $args['classes'] ?? [];
$heading = $args['heading'] ?? null;
$heading_level = $heading ? $args['heading_level'] ?? 'h3' : 'div';
$heading_style = $args['heading_style'] ?? 'h--divider'; ////force a heading style

$base_classes = preg_filter('/$/', '__seperator', $base);
$classes = array_merge($classes, $base_classes);
$classes[] = $heading_style;
if($heading):
    $classes[] = 'has-text';
endif;
$classes = $classes ? implode(' ', $classes) : '';
?>

<<?php echo $heading_level; ?> data-atom="seperator" class="content-seperator <?php echo $classes; ?>">
    <?php echo $heading; ?>
</<?php echo $heading_level; ?>>