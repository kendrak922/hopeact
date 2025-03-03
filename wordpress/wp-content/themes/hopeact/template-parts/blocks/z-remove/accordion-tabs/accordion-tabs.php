<?php

/**
 * Block: Accordion + Tabs 
 * - Slug: accordion-tabs 
 * - Admin name: Accordion Tabs
 */

// Global Variables
global $accordionTabs;

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);

// Local Variables
$accordionTabs = [
	'classes' => [],
	'layout' => get_field('section_type'),
	'jump_nav_label' => get_field('jump_nav_label'),
	'content_top' => '',
	'content_bottom' => ''
];

/***** ADMIN LABEL *****/
echo hopeact_blockAdminHead($block);

// section class: gutenburg
if (isset($block["className"])) {
	$blockData['classes'][] =  $block["className"];
}
// section class: background / dark mode
if (get_field('dark_mode')) {
	$blockData['classes'][] = 'u-darkMode';
	$blockData['classes'][] = 'u-bgColorPrimary';
} else {
	$blockData['classes'][] = 'u-bgColorNone';
}
?>

<section id="<?php echo $blockID; ?>" class="block block--accordionTabs <?php echo implode(' ', $blockData['classes']); ?>">
	<div class="container">

		<?php /*************** ACCORDION / TABS ***************/ ?>
		<div class="accordionTabs__wrapper item__wrapper" data-type="<?php echo $accordionTabs['layout']; ?>">
			<?php
			switch ($accordionTabs['layout']): // Section Type

					/*** ACCORDIONS ***/
				case 'accordion':
					include(__DIR__ . '/layouts/accordionTabs--accordion.php');
					break;

					/*** TABS > JUMPNAV ***/
				case 'tabs-jumpnav':
					include(__DIR__ . '/layouts/accordionTabs--jumpnav.php');
					break;

					/*** TABS > ACCORDIONS ***/
				case 'tabs-accordion':
				default:
					include(__DIR__ . '/layouts/accordionTabs--tabs.php');
					break;

			endswitch;
			?>
		</div>
	</div>
</section>