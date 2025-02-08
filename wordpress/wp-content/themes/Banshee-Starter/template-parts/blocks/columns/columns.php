 <?php
 /**
  * Block: Columns
  * - Slug: columns
  */


 if (!defined('ABSPATH')) {
     exit; // Exit if accessed directly.
 }

 if (!have_rows('column')) {
     return; // return early if there is no title, text, and actions to display
 }

    ?>
<section class="section">
<div class="columns">
    <?php if (have_rows('column')) : ?>
        <?php while(have_rows('column')) :
            the_row();
            $image = get_sub_field('image')['url'];
            $title = get_sub_field('title');
            $text = get_sub_field('text');

            if ($title) : ?>
                <div class="column__single">
                    <?php if($image) : ?>
                        <img src="<?php echo $image; ?>"  />
                    <?php endif; ?>
                        <h3><?php echo $title; ?> </h3>
                        <p><?php echo $text; ?> </p>
                </div>
            <?php endif;?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
</section>
