<?php

/**
 * The default page template file
 */

use Lean\Load;

get_header();

// Declare global variables
global $templateData;

// Set Page Data
$templateData = [
    'post' => get_post(),
    'blocks' => '',
    'show_menu' =>  get_field('show_menu') ? true : false,
];

// Parse page blocks
if (has_blocks($templateData['post']->post_content)) {
    $templateData['blocks'] = parse_blocks($templateData['post']->post_content);
}

global $themeGlobals;
$id = get_queried_object_id();

// DEBUG
// debug_to_console($templateData, 'Single $templateData');

?>


<a class="screen-reader-text skip-link" href="#page_content">Skip to content</a>

<div class='page__wrapper'>
    <?php if (have_posts()) : ?>
        <div id="page_content" class="content container--full">
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <section class="section--full-width">
          <div class="project">
            <div class="project__image project__left">
                <a href="https://withwonderly.com/hailee-catalano/" target="_blank">
                    <img src="<?php echo $themeGlobals['theme_url']; ?>/assets/media/images/hailee.jpeg" alt="screenshot" />
                </a>
            </div>
              <div class="project__body">
                <h3>Hailee Catalano</h3>
                <p>
                  I worked with <a class="txt txt--500 txt--pink" href="https://thewonderjam.com/">Wonderly</a> to create this recipe site for Hailee Catalano. My goal on this project was to create an easy to use website that honored the beautiful, playful designs and branding. Check out my work and pick out your next meal (yes - I WAS hungry the entire time I was building this)! 
                </p>
                <div class="pill__container"><span class="pill__tag">WordPress</span><span class="pill__tag">Beaver Builder</span><span class="pill__tag">SCSS</span><span class="pill__tag">SEO</span><span class="pill__tag">PHP</span></div>
            </div>
          </div>
          <div class="project">
            <div class="project__image project__right">
            <a href="https://www.switchplace.com/" target="_blank">
              <img src="<?php echo $themeGlobals['theme_url']; ?>/assets/media/images/switchplace.png" alt="screenshot" />
            </a>
            </div>
              <div class="project__body">
                <h3>Switchplace</h3>
                <p>
                    The client wanted a new HubSpot website to create cohesion in their marketing and sales funnels and that's what we gave them! For this project I worked with the agency <a class="txt txt--500 txt--pink" href="https://www.little-fork.com/">Little Fork</a> to create an accessible and easy to use website that would serve their team for years to come. 
                </p>
                <div class="pill__container"><span class="pill__tag">HubSpot</span><span class="pill__tag">Theme Development</span><span class="pill__tag">CSS</span><span class="pill__tag">Templating</span><span class="pill__tag">Accessibility</span></div>
            </div>
          </div>
          <div class="project">
            <div class="project__image project__left">
              <a href="https://amainsure.com/" target="_blank">
                  <img src="<?php echo $themeGlobals['theme_url']; ?>/assets/media/images/amai.png" alt="screenshot" />
              </a>
            </div>
            <div class="project__body">
              <h3>American Medical Association Insurance</h3>
              <p>
                During the two years it took to develop this site we took the large product from a clunky, impossible to use,
                overenginered site into a lean WordPress build utilizing ACF and
                custom blocks. We then built out features such as a dynamic
                blog, A/B testing, and improved site speed.
              </p>
              <div class="pill__container"><span class="pill__tag">PHP</span><span class="pill__tag">ACF</span><span class="pill__tag">SCSS</span><span class="pill__tag">Site Speed</span><span class="pill__tag">Plugin Development</span><span class="pill__tag">WordPress</span></div>
            </div>
          </div>
</section>
</div>

<?php get_footer('default'); ?>