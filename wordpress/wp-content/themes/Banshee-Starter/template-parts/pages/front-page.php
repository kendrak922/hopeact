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
          <p>I am a custom web developer based in Minneapolis, Minnesota. A passionate creator and a coding enthusiast with a love for cool outfits, my cat, and conversations about star signs.</p>
          <p>My clients are typically agencies who need an extra set of hands or small businesses who want help with their websites, SEO, marketing, social media, or branding. The people who need me to fit within their team and actively participate while not getting in the way of their flow.  </p>
          <p>I really love to code and collaborate which is why I founded <a class="txt txt--500 txt--pink"href="http:bansheestud.io">Banshee Studio</a>, a place where I get to help people create their digital presence with a bunch of my talented friends.</p>
        </div>
</section>
<section class="section__resume">
          <h2>My Experience</h2>
          <div>
            <h3>My Own Thing | 2019 - present</h3>
            <ul>
              <li>
                I have been developing WordPress websites on the side since 2019. In 2024 I decided to transition to full time freelancing. I am a developer-for-hire who specializes in helping people create, improve, and maintain their online presence. I get excited about working with tools like WordPress, Shopify, and HubSpot.
              </li>
              <li> Whatever the technology, I love figuring out how to fix someone's problem and working with their team to make everyone's life a little easier.</li>
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
                At fjorge I learned how to code defensively so that my programs
                would be able to withstand the changing landscape of technology for years to come. 
              </li>
            </ul>
          </div>
          <div>
            <h3>Trinity Insight | 2021 - 2022</h3>
            <ul>
              <li>
                At Trinity (it's no longer around) I built extensive eCommerce websites on platforms like
                WordPress, Shopify, and BigCommerce, prioritizing performance,
                accessibility, and maintainability. I also integrated custom Google
                Analytics events to monitor user interactions on client
                websites and conducted A/B tests incorporating UX best practices.
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