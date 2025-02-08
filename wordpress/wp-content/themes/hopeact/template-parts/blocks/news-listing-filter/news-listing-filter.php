<?php

/**
 * Block: News Listing
 * - Slug: news-listing
 */

// Local Variables
$blockID = (!empty($block['anchor']) ? $block['anchor'] : $block['id']);
$blockData = [
    // 'title' => get_field('title')
];

/***** ADMIN LABEL *****/
echo hopeact_blockAdminHead($block);

$cat_id = $_GET['cat'] ?? null;
$cat_current = $cat_id ? get_cat_name($cat_id) : 'All Categories';

?>

<!-- BLOCK CONTENT -->
<section id="<?php echo $blockID; ?>" class="block block--news-listing  <?php echo isset($block["className"]) ? $block["className"] : '' ?>">
    <div class="container">

        <div class="news-listing__jumpnav jumpnav u-marginBottom10gu u-md-marginBottom12gu">
            <div class="jumpnav__label u-md-hidden">CHOOSE FILTER</div>
            <div class="jumpnav__wrapper">
                <button id="toggle-<?php echo $blockID ?>" class="toggle jumpnav__toggle u-md-hidden" tabindex="0" aria-haspopup="true" aria-expanded="false" aria-controls="contain-<?php echo $blockID ?>">
                    <span class="toggle__text"><?php echo $cat_current; ?></span><span class="fa fa-angle-down u-marginLeft3gu"></span>
                </button>
                <div id="contain-<?php echo $blockID ?>" class="news-listing__container jumpnav__container">
                    <button data-category="" class="<?php if (!$cat_id) : ?>is-active<?php endif; ?> news-listing__filter chip chip--clickable">All Categories</button>
                    <?php $categories = get_field('categories');
                    foreach ($categories as $category) {
                        $category = $category['category'];
                        $category_class = $cat_id == $category->term_id ? 'is-active' : '';
                        print '<button data-category="' . $category->term_id . '" class="' . $category_class . ' news-listing__filter chip chip--clickable" aria-label="Filter by ' . $category->name . '">' . $category->name . '</button>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <ul id="results" class="results u-normalize grid grid--gutters-ultra-wide">
            <div class="grid__col--loading u-textAlignCenter">
                Loading...
            </div>
        </ul>
        <div class="loadmore u-marginTop10gu u-md-marginTop20gu u-textAlignCenter u-hidden">
            <button class="btn btn--large btn--load-more">Load More</button>
        </div>


    </div>
</section>