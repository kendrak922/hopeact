<?php

/**
 * Block Layout: Accordion
 */

// Debug
// debug_to_console($accordionTabs, '$accordionTabs');

use Lean\Load;
?>


<?php if (have_rows('content_items')) :
	$itemCounter = 0;
	$base = ['accordionTab'];
?>

	<?php /********** ACCORDIONS TOP **********/ ?>
	<div class="accordionTabs__top u-animation">
		<?php while (have_rows('content_items')) : the_row();
			$item = [
				'count' => $itemCounter++,
				'image' => get_sub_field('item_image'),
				'title' => get_sub_field('item_title'),
				'content' => get_sub_field('item_content'),
				'buttons' => get_sub_field('buttons'),
				'type' => get_row_layout(),
			];
		?>

			<div class="accordionTab" data-layout="<?php echo $item['type']; ?>">
				<button class="accordionTab__trigger toggle__wrapper">
					<?php echo $item['title']; ?>
					<div class="toggle"></div>
				</button>
				<div class="accordionTab__content">
					<div class="grid grid--column grid-md--row-reverse">
						<?php if ($item['image']) : ?>
							<div class="grid__col">
								<?php
								$image_url = $item['image']['url'];
								$image_alt = $item['image']['alt'] ? $item['image']['alt'] : $item['image']['title'];
								Load::atom(
									'media/image',
									[
										'base' => [],
										'classes' => [],
										'image' => [
											'url' => $image_url,
											'alt' => $image_alt
										]
									]
								);
								?>
							</div>
						<?php endif; ?>
						<div class="grid__col u-wysiwyg">

							<?php echo $item['content']; ?>

							<?php
							// Molecule: Button Group
							if (isset($item['buttons']) && $item['buttons']) :
								Load::molecule(
									'buttons/button-group',
									[
										'base'            => $base,
										'buttons'         => $item['buttons'],
									]
								); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

	</div>

<?php endif; ?>