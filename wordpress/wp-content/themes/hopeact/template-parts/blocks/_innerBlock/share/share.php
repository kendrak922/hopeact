<?php
/**
 * Block: Share
 * - Slug: share
 */

use Lean\Load;

// Local Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);
$blockData = [
    'title' => get_field('title') ? get_field('title') : "Share:",
    'share_url' => get_field('link_override') ? get_field('link_override') : [
        'title' => get_the_title(),
        'url' => get_the_permalink()
    ]
];

/***** ADMIN LABEL *****/
// echo hopeact_blockAdminHead($block);
?>

<!-- BLOCK CONTENT -->
<div class="inner-block inner-block--share">
    <?php if ($blockData['title']) : ?>
    <div class="h--caption u-paddingBottom2gu"><?php echo $blockData['title']; ?></div>
    <?php endif; ?>
    <div class="grid grid--gutters-narrow">
        <button class="btn--normalize icon icon--small" data-sharer="facebook" data-url="<?php echo $blockData['share_url']['url']; ?>" data-title="<?php echo $blockData['share_url']['title'] ?>" data-hashtag="" aria-label="Share on Facebook">
            <i class="fa-brands fa-square-facebook fa-4x"></i>
        </button>
        <button class="btn--normalize icon icon--small" data-sharer="twitter" data-url="<?php echo $blockData['share_url']['url']; ?>" data-title="<?php echo $blockData['share_url']['title'] ?>" data-hashtags="" aria-label="Share on Twitter">
            <i class="fa-brands fa-square-x-twitter fa-4x"></i>
        </button>
        <button class="btn--normalize icon icon--small" data-sharer="linkedin" data-url="<?php echo $blockData['share_url']['url']; ?>" data-title="<?php echo $blockData['share_url']['title'] ?>" aria-label="Share on Linkedin">
            <i class="fa-brands fa-linkedin fa-4x"></i>
        </button>
        <!-- <button class="btn--normalize icon icon--small" data-sharer="instagram" data-url="<?php echo $blockData['share_url']['url']; ?>" data-title="<?php echo $blockData['share_url']['title'] ?>" aria-label="Share on Instagram">
            <i class="fa-brands fa-square-instagram fa-4x"></i>
        </button> -->
        <button class="btn--normalize icon icon--small" data-sharer="email" data-url="<?php echo $blockData['share_url']['url']; ?>" data-title="<?php echo $blockData['share_url']['title'] ?>" aria-label="Share on Instagram">
            <i class="fa-solid fa-square-envelope fa-4x"></i>
        </button>
        <button class="btn--normalize icon icon--small" onclick="window.print();" aria-label="Print page">
            <span class="fa-stack fa-2x">
                <i class="fa-solid fa-square fa-stack-2x"></i>
                <i class="fa-regular fa-print fa-stack fa-inverse"></i>
            </span>
        </button>
    </div>
</div>