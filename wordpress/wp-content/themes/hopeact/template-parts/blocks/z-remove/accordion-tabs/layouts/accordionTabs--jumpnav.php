<?php

/**
 * Block Layout: Tabs > JumpNav
 */

// Debug
// debug_to_console($accordionTabs, '$accordionTabs');

use Lean\Load;
?>

<?php if (have_rows('content_items')) :
	$itemCounter = 0;
	$base = ['accordionTab'];
	$repeater_content_items = get_field('content_items');
	$jump_nav_label = get_field('jump_nav_label') ?? "Choose";
	$dark_mode = get_field('dark_mode');
	$repeater_content_items = get_field('content_items');
	$first_title = $repeater_content_items[0]['item_title'];
?>
	<div class="<?php if ($dark_mode) : ?>u-darkMode<?php endif; ?>">
		<?php /********** TABS TOP **********/ ?>
		<div class=" accordionTabs__jumpnav jumpnav">
			<div class="jumpnav__label u-md-hidden u-lightMode"><?php echo $jump_nav_label; ?></div>
			<div class="jumpnav__wrapper">
				<button id="toggle-<?php echo $blockID ?>" class="toggle jumpnav__toggle u-md-hidden" aria-haspopup="true" aria-expanded="false" aria-controls="contain-<?php echo $blockID ?>">
					<span class="toggle__text"><?php echo $first_title; ?></span><span class="fa fa-angle-down u-marginLeft3gu"></span>
				</button>
				<div id="contain-<?php echo $blockID ?>" class="jumpnav__container accordionTabs__top">

					<?php
					$itemCounter = 0;
					while (have_rows('content_items')) : the_row();
						$item = [
							'count' => $itemCounter++,
							'title' => get_sub_field('item_title'),
							'type' => get_row_layout(),
						];
						$row_id = $block['id'] . '-' . $item['count'];
					?>
						<div class="accordionTab" data-layout="<?php echo $item['type']; ?>">
							<button class="accordionTab__trigger toggle__wrapper <?php echo ($item['count'] === 0 ? "active" : ""); ?>" data-tab="<?php echo $row_id; ?>">
								<?php echo $item['title']; ?>
								<div class="toggle"></div>
							</button>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>


		<?php /********** TABS BOTTOM **********/ ?>
		<div class="accordionTabs__bottom">
			<?php
			$itemCounter = 0;
			while (have_rows('content_items')) : the_row();
				$item = [
					'count' => $itemCounter++,
					'image' => get_sub_field('item_image'),
					'title' => get_sub_field('item_title'),
					'content' => get_sub_field('item_content'),
					'buttons' => get_sub_field('buttons'),
					'type' => get_row_layout(),
				];
				$row_id = $block['id'] . '-' . $item['count'];

				$block_classes = [];
				if ($item['image']) {
					$block_classes[] = 'u-hasImage';
				}
			?>
				<div id="<?php echo $row_id; ?>" class="accordionTab__content <?php echo implode(' ', $block_classes); ?> <?php echo ($item['count'] === 0 ? 'active' : ""); ?>" <?php echo ($item['count'] === 0 ? 'style="display:block;"' : ""); ?>>
					<div class="container">
						<div class="grid grid--gutters grid-md--row-reverse grid-md--align-center">
							<div class="grid__col grid__col--12 grid__col-md--6 u-animation">

								<?php if ($item['image']) :
									$image_url = $item['image']['url'];
									$image_alt = $item['image']['alt'] ? $item['image']['alt'] : $item['image']['title'];
									Load::atom(
										'media/image',
										[
											'base' => [],
											'classes' => [],
											'image' => [
												'url' => $image_url,
												'alt' => $image_alt,
												'classes' => ['u-md-floatRight'],
											]
										]
									);
								endif; ?>
							</div>
							<div class="grid__col grid__col--12 grid__col-md--6">

								<div class="u-wysiwyg intro-copy">
									<?php echo $item['content']; ?>
								</div>
								<?php
								// Molecule: Button Group
								if (isset($item['buttons']) && $item['buttons']) :
									Load::molecule(
										'buttons/button-group',
										[
											'base'            => $base,
											'classes'		  => ['u-paddingTop8gu'],
											'buttons'         => $item['buttons'],
										]
									); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

			<?php
			endwhile; ?>
		</div>
	</div>

<?php endif; ?>