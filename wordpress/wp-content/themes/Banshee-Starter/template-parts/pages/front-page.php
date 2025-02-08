<?php

/**
 * The template that generates the html for most pages.
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
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

?>


<div class="hero--home">
  <div>
    <h1>Kendra Kyndberg</h1>
    <span class="subhead">Custom Web Developer</span>
    <div class="social-media">
            <a
                class="social-media__link"
                href="mailto:kendrak922@gmail.com"
                alt="email kendrak922@gmail.com">
                <img src="<?php echo $themeGlobals['theme_url']; ?>/assets/media/images/envelope-regular.svg" alt="email"></img>
            </a>
            <a
                class="social-media__link"
                href="https://www.linkedin.com/in/kendra-kyndberg/"
                target="_blank"
                rel="noopener noreferrer"
                alt="go to - linkedin">
                <img src="<?php echo $themeGlobals['theme_url']; ?>/assets/media/images/linkedin-in-brands.svg" alt="linkedin"></img>
            </a>
            <a
                class="social-media__link"
                href="https://github.com/kendrak922"
                target="_blank"
                rel="noopener noreferrer"
                alt="go to - github">
                <img alt="github" src="<?php echo $themeGlobals['theme_url']; ?>/assets/media/images/github-brands.svg"></img>
            </a>
    </div>
</div>
</div>

<section class="about">
        <div class="about__image">
            <img src="<?php echo $themeGlobals['theme_url']; ?>/assets/media/images/kendra.jpg" alt="I am really attractive." />
        </div>
        <div class="about__body">
          <h2>Meet Your Coder!</h2>
          <p>Custom web developer based in Minneapolis, Minnesota. Reluctant professional, passionate creator. A coding nerd with a soft spot for cats, grilled cheese, and star sign chats.</p>
          <p>I specialize in working with small businesses, creatives, and down-to-earth, cool people. I get it—websites are often the least favorite part of the job. Maybe tech isn’t your thing, or you’ve had a less-than-stellar experience with an agency in the past. Whatever the case, I’m here to make it better.</p>
          <p>Let me handle the digital side of things so you can focus on what you love. Building websites is my passion—let’s make it work for you.</p>
        </div>
</section>
<section class="section__resume">
          <h2>My Experience</h2>
          <div>
            <h3>My Own Thing | 2019 - present</h3>
            <ul>
              <li>
                I have been developing wordpress websites on the side since 2019. In 2024 I decided to transition to full time freelancing which led to founding <a class="txt txt--500 txt--pink"href="http:bansheestud.io">Banshee Studio</a> with my incredibly talented designer friend, Maxyne.
              </li>
              <li></li>
            </ul>
          </div>
          <div>
            <h3>fjorge | 2022 - 2024 </h3>
            <ul>
              <li>
                I oversaw projects to develop custom WordPress websites,
                harmonizing user experiences with captivating designs. I
                converted design concepts into responsive HTML, CSS, and
                JavaScript code for optimal performance across devices.
                Collaborating with cross-functional teams, I ensured cohesive
                project execution. Acting as the primary client liaison, I
                defined project scopes and maintained clear communication
                throughout.
              </li>
            </ul>
          </div>
          <div>
            <h3>Trinity Insight | 2021 - 2022</h3>
            <ul>
              <li>
                Built extensive eCommerce websites on platforms including
                Wordpress, Shopify, and BigCommerce, prioritizing performance,
                accessibility, and maintainability. Integrated custom Google
                Analytics events to monitor user interactions on client
                websites. Conducted A/B tests incorporating UX best practices
                and client input.
              </li>
            </ul>
          </div>
</section>
<?php if (have_posts()) : ?>
        <div id="page_content" class="content container--full">
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
        </div>
  <?php endif; ?>