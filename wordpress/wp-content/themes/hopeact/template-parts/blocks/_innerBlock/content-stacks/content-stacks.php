 <?php
 /**
  * Block: Content Stack    
  * - Slug: content-stack
  */

// Block Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);
 

use Lean\Load;

if (!defined('ABSPATH')) {
     exit; // Exit if accessed directly.
 }

 if (!have_rows('content_stack')) {
     return; // return early if there is no title, text, and actions to display
 }

    ?>
<section class="section">
<div class="content-stacks">
    <?php if (have_rows('content_stack')) : ?>
        <?php while(have_rows('content_stack')) :
            the_row();
            $image = get_sub_field('image')['url'];
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $button = get_sub_field('button');

            if ($title) : ?>
                <div class="content-stack__single">
                    <?php if($image) : ?>
                        <div class="content-stack__single-image">
                            <img src="<?php echo $image; ?>"  />
                        </div>
                    <?php endif; ?>
                    <?php         // heading
                            Load::atom(
                                'text/heading',
                                [
                                    'heading'         =>  $title,
                                    'heading_level'   => 'h3',
                                    'heading_style'   => 'h4'
                                ]
                            );
                    ?>
                    <p><?php echo $text; ?> </p>
                    <?php if ($button) {
                        Load::atom(
                            'button/button',
                            [
                                'button'         => get_sub_field('button'),
                            ]
                        );
                    }?>
                </div>
            <?php endif;?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
</section>
