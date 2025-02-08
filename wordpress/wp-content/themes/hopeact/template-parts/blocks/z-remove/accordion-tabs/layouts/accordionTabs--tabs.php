<?php

/**
 * Block Layout: Tabs > Accordion
 */

// Debug
// debug_to_console($accordionTabs, '$accordionTabs');
?>


<?php if (have_rows('content_items')) : ?>

	<?php /********** TABS TOP **********/ ?>
	<div class="accordionTabs__top">
		<?php
		$itemCounter = 0;
		while (have_rows('content_items')) : the_row();
			$item = [
				'count' => $itemCounter++,
				'title' => get_sub_field('item_title'),
				'content' => get_sub_field('item_content'),
				'type' => get_row_layout(),
			];
			$row_id = $block['id'] . '-' . $item['count'];
		?>
			<div class="accordionTab" data-layout="<?php echo $item['type']; ?>">
				<button class="accordionTab__trigger toggle__wrapper <?php echo ($item['count'] === 0 ? "active" : ""); ?>" data-tab="<?php echo $row_id; ?>">
					<?php echo $item['title']; ?>
					<div class="toggle"></div>
				</button>
				<div class="accordionTab__content">
					<div class="container">
						<?php echo $item['content']; ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>


	<?php /********** TABS BOTTOM **********/ ?>
	<div class="accordionTabs__bottom">
		<?php
		$itemCounter = 0;
		while (have_rows('content_items')) : the_row();
			$item = [
				'count' => $itemCounter++,
				'content' => get_sub_field('item_content'),
				'type' => get_row_layout(),
			];
			$row_id = $block['id'] . '-' . $item['count'];
		?>
			<div id="<?php echo $row_id; ?>" class="accordionTab__content <?php echo ($item['count'] === 0 ? 'active' : ""); ?>" <?php echo ($item['count'] === 0 ? 'style="display:block;"' : ""); ?>>
				<?php echo $item['content']; ?>
			</div>
		<?php endwhile; ?>
	</div>

<?php endif; ?>