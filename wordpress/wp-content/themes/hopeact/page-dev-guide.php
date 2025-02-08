<?php

/**
 * The default page template file
 */

get_header();

// Declare global variables
global $templateData;

// Set Global Template Data
$templateData = [
  'post' => get_post(),
  'blocks' => '',
];


// Parse page blocks
if (has_blocks($templateData['post']->post_content)) {
    $templateData['blocks'] = parse_blocks($templateData['post']->post_content);
}

// Debug
// debug_to_console($templateData, 'Page $templateData');
?>

<div <?php post_class('page__wrapper'); ?>>

  <section class="block">
    <div class="container">
      <h1>Banshee Studio Dev Guide</h1>
    </div>
  </section>

  <?php
    /**
     * GENERAL
     */
    ?>

  <section class="block">
    <div class="container container--narrow">
      <h2>General Best Practices:</h2>
      <h3>Sass</h3>
      <h4>Specificity</h4>
      <p>When writing Sass, use 1 selector (element or class, not both). Follow a BEM naming convention for all class names and elements.</p>
      <h4>Architecture</h4>
      <p>
        <br>Abstracts &ndash; refers to all variables, mixins and functions.
        <br>Base &ndash; Top level theme styles such as font sizes, grid and the basic style guide.
        <br>Global &ndash; Globle components: forms, menu, header and footer etc.
        <br>Components &ndash; Atoms/components. Buttons, cards, things that appear within layouts across multiple blocks
        <br>Utilities &ndash; Utility classes. 
      </p>
      <h3>Measurements</h3>
      <p>All measurements are on a base 16 system, with 1 Grid Unit being 0.25rem. Throughout the code you may see utility classes like <strong>u-marginBottom8gu</strong>. This means add a margin-bottom of 8 grid units (0.25rem * 8 = 2rem = 32px). Use rems. Do not use px values for spacing.</p>
    </div>
    <!--.container-->
  </section>
  <!--.block-->

  <?php
    /**
     * COLORS
     */
    ?>

  <section class="block">
    <div class="container container--narrow">
      <h2>Colors:</h2>
          <p>Utility classes, CSS, SCSS variables are generated with every project and are theme specific.</p>
      <pre>
      swatch(<em>'color'</em>);

      in action:

      .u-bgColorPink {
        background-color: swatch('Pink');
      }
    </pre>
      <p>Full List:</p>

      <ul>
        <li>Green</li>
        <li>Blue</li>
        <li>Pink</li>
        <li>Orange</li>
        <li>Yellow</li>
        <li>Gray</li>
        <li>Neutral</li>
        <li>Black</li>
        <li>White</li>
        <li>Error</li>
        <li>Success</li>
      </ul>

    </div>

    <?php

    $colors = [
      'Primary',
      'Secondary',
      'Tertiary',
      // Text color
      'Neutral',
      // Style Guide
      'Blue',
      'Orange',
      'Yellow',
      'Green',
      'Pink',
      'Gray',
      'Black',
      'White',
      'Success',
      'Error',
    ];
    ?>

    <div class="container grid grid--gutters">
      <?php foreach ($colors as $key => $color) : ?>
        <div class="grid__col grid__col--12 grid__col-sm--6--spaced grid__col-md--4--spaced u-marginBottom8gu grid grid--column">
          <h5 class="u-textColorBlack u-bgColor<?php echo $color; ?> u-paddingVert8gu u-paddingHoriz4gu u-textSizePlus2 u-marginBottom2gu u-textUppercase"><?php echo $color; ?></h5>
        </div>
        <!--.grid__col-->
      <?php endforeach; ?>
    </div>
    <!--.container-->
  </section>
  <!--.block-->


  <?php
    /**
     * FONTS
     */
    ?>

  <section class="block">
    <div class="container container--narrow">
      <h2>Fonts and Type Scale:</h2>
      <p>This site follows a <strong>Minor Third</strong> on a base size of <strong>16px</strong> or <strong>1rem</strong>. This means that each step up is 1.2^step size power, and each step down is 0.833^step size. For more on this see <a href="https://type-scale.com/" target="_blank">type-scale.com</a> and select the minor third scale.</p>
      <p>That's a lot of math, so rather than calculating use the 2 functions where the number you enter is the step away from the baseline.</p>
      <pre>
      typeScalePlus($number)
      typeScaleMinus($number)
    <p>For example, the copyright in the footer is 2 steps below the baseline so the scss for that could be written like so:</p>
    <pre>
      .copyright {
        font-size: typeScaleMinus(2);
      }
    </pre>
      <p>There are also utility classes where this can be applied:</p>
      <p class="u-textSizePlus5">.u-textSizePlus5 = 39.81px</p>
      <p class="u-textSizePlus2">.u-textSizePlus2 = 23.04px</p>
      <p class="u-textSizePlus1">.u-textSizePlus1 = 19.20px</p>
      <p class="u-textSizeMinus1">.u-textSizeMinus1 = 13.33px</p>
    </div>
    <!--.container-->
  </section>
  <!--.block-->

  <?php
    /**
     * LAYOUTS
     */
    ?>
  <section class="block">
    <div class="container container--narrow">
      <h2>Layouts:</h2>
      <p>All layouts are to be built on a consistent layout with blocks, containers, then columns if needed. For code reference see
      <pre>assets/src/sass/base/_grid.scss</pre>
      </p>

      <h3>The basics</h3>
      <p>The basic structure is this:</p>
      <pre type="html">
      &lt;section class="block block--<em>modifier</em>"&gt;
        &lt;div class="container container--<em>modifier</em>"&gt;
          <strong>Contents</strong>
        &lt;/div&gt;&lt;!--.container--&gt;
      &lt;/section&gt;&lt;!--.block--&gt;
    </pre>

      <p>Or for a multi-column layout:</p>

      <pre type="html">
      &lt;section class="block block--<em>modifier</em>"&gt;
        &lt;div class="container container--<em>modifier</em> <strong>grid</strong> <strong>grid--<em>modifier</em></strong>"&gt;
          &lt;div class="grid__col"&gt;
            Content
          &lt;/div&gt;&lt;!--.grid__col--&gt;

          &lt;div class="grid__col"&gt;
            Content
          &lt;/div&gt;&lt;!--.grid__col--&gt;
        &lt;/div&gt;&lt;!--.container--&gt;
      &lt;/section&gt;&lt;!--.block--&gt;
    </pre>
    </div>
    <!--.container-->

    <div class="container container--narrow">
      <h3>Containers</h3>
      <p>There are a number of container widths that can be added as class modifiers. The base container class is 85% mobile/95% tablet and up, with a max width to keep it centered. Modifiers will change the max-width or the overall width percentage</p>
    </div>
    <!--.container-->

    <div class="container container--narrow u-bgColorSecondary50 u-textAlignCenter u-paddingVert4gu u-marginBottom8gu">
      <span>.container--narrow container minus 1 column on each side</span>
    </div>
    <!--.container-->
    <div class="container u-bgColorSecondary100 u-textAlignCenter u-paddingVert4gu u-marginBottom8gu">
      <span>.container</span>
    </div>
    <!--.container-->
    <div class="container container--wide u-bgColorSecondary50 u-textAlignCenter u-paddingVert4gu u-marginBottom8gu">
      <span>.container--wide - container plus 1 column on each side</span>
    </div>
    <!--.container-->
    <div class="container container--ultra-wide u-bgColorSecondary100 u-textAlignCenter u-paddingVert4gu u-marginBottom8gu">
      <span>.container--ultra-wide - container with no max width</span>
    </div>
    <!--.container-->
    <div class="container container--full u-bgColorSecondary50 u-textAlignCenter u-paddingVert4gu u-marginBottom8gu">
      <span>.container--full - 100% container, no max-width</span>
    </div>
    <!--.container-->

    <div class="container container--narrow">
      <h3>Multi-column Layouts</h3>
      <p>As mentioned this is a flexbox grid, based on 12 columns. There are 2 main styles, standard or gutters. In a standard layout all columns are flush, gutters adds gutters.
      <p>
      <p><em>Note: you can overlay a basic guide over any page of the site by adding <strong>?guides=standard</strong> or <strong>?guides=gutters</strong> to the url.</em></p>
      <div class="btn__container">
        <a class="btn btn--primary brn--large" href="?guides=standard">See Standard Guide</a>
        <a class="btn btn--primary" href="?guides=gutters">See Gutter Guide</a>
        <a class="btn btn--outline" href="?guides=none">Turn Off Guides</a>
      </div>
    </div>
    <!--.container-->

    <div class="container container--narrow grid">
      <div class="grid__col grid__col--12">
        <h4>In Action:</h4>
        <p>To make it work add a <strong>grid</strong> class to your container, and give all child columns the <strong>grid__col</strong> class. This will make it a flex layout, by default all .grid__col's are even. There are also modifiers for the grid itself that match up with flexbox properties, examples below. You can also reference
        <pre>assets/src/sass/base/_grid.scss</pre>
        </p>
      </div>
      <!--.grid__col-->

      <div class="grid__col grid__col--12 grid__col-md--6">
        <h5>.grid modifiers</h5>
        <dl>
          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid--justify-(start, center, end, space-around, space-between)</dt>
          <dd>Adjusts how the columns are aligned horizontall</dd>

          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid--align-(top, center, bottom, stretch)</dt>
          <dd>Adjusts how the columns are aligned vertically</dd>

          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid--(row, row-reverse, column, column-reverse)</dt>
          <dd>Directions and row/columns</dd>

          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid--(no-wrap, wrap, wrap-reverse)</dt>
          <dd>Rarely used, but they're there</dd>

          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid-(sm, md, lg, xl)--(property)</dt>
          <dd>Breakpoint modifiers!! Super important, adding these will apply that class to the specified breakpoint and up. <strong>Mobile requires none</strong>. .grid-md--row-reverse means that from the medium breakpoint up, the grid will be row reverse.</dd>
        </dl>
      </div>
      <!--.grid__col-->
      <div class="grid__col grid__col--12 grid__col-md--6">
        <h5>.grid__col modifiers</h5>
        <dl>
          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid__col--(1 thru 12)</dt>
          <dd>How many columns this should span</dd>

          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid__col--#--strict</dt>
          <dd>By default these will grow. If you only want it to be X columns, add --strict to it.</dd>

          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid__col--#--spaced</dt>
          <dd>For use with the .grid--gutters wrapper, this will add in some margin to create gutters around this column.</dd>

          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid__col--offset-(1-11)</dt>
          <dd>Adds margin before this element equal to the columns specified. .grid__col--offset-1 would add 1 column space before, 2 would add 2 etc.</dd>

          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid__col--fit-content</dt>
          <dd>Makes this column take up the width of it's children.</dd>

          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid__col--flex-(first, last)</dt>
          <dd>Moves this first or last in the order</dd>

          <dt class="u-textColorNeutral700 u-marginVert2gu u-textWeightMedium u-textSizePlus1">.grid__col-(sm, md, lg, xl)--(property)</dt>
          <dd>Breakpoint modifiers!! Super important, adding these will apply that class to the specified breakpoint and up. <strong>Mobile requires none</strong>. .grid__col--12 .grid__col-md--8 would mean at mobile it's full width, at the medium breakpoint and up it's 8 columns.</dd>
        </dl>
      </div>
      <!--.grid__col-->
    </div>
    <!--.container-->

    <div class="container grid">
      <div class="grid__col--11 u-marginBottom8gu grid__col--offset-1">
        <h4>Standard</h4>
      </div>
      <div class="grid__col u-paddingVert4gu u-bgColorSecondary50">
        <div class="u-padding4gu">.grid__col</div>
      </div>
      <div class="grid__col u-paddingVert4gu u-bgColorSecondary200">
        <div class="u-padding4gu">.grid__col</div>
      </div>
      <div class="grid__col u-paddingVert4gu u-bgColorSecondary50">
        <div class="u-padding4gu">.grid__col</div>
      </div>
      <div class="grid__col u-paddingVert4gu u-bgColorSecondary200">
        <div class="u-padding4gu">.grid__col</div>
      </div>
      <div class="grid__col u-paddingVert4gu u-bgColorSecondary50">
        <div class="u-padding4gu">.grid__col</div>
      </div>
      <div class="grid__col u-paddingVert4gu u-bgColorSecondary200">
        <div class="u-padding4gu">.grid__col</div>
      </div>
    </div>
    <!--.container-->

    <div class="container grid grid--justify-center">
      <div class="grid__col--11 u-marginBottom8gu grid__col--offset-1">
        <h4>Horizontally centered, capped column width</h4>
      </div>
      <div class="grid__col grid__col--12 grid__col-md--3--strict u-paddingVert4gu u-bgColorSecondary50">
        <div class="u-padding4gu">.grid__col--12<br>.grid__col-md--3--strict</div>
      </div>
      <div class="grid__col grid__col--12 grid__col-md--2--strict u-paddingVert4gu u-bgColorSecondary200">
        <div class="u-padding4gu">.grid__col--12<br>.grid__col-md--2--strict</div>
      </div>
      <div class="grid__col grid__col--12 grid__col-md--5--strict u-paddingVert4gu u-bgColorSecondary50">
        <div class="u-padding4gu">.grid__col--12<br>.grid__col-md--5--strict</div>
      </div>
    </div>
    <!--.container-->

    <div class="container grid--gutters grid grid--align-center">
      <div class="grid__col--11 u-marginBottom8gu grid__col--offset-1">
        <h4>Vertically centered, gutters</h4>
      </div>
      <div class="grid__col grid__col--12 grid__col-md--4--spaced u-paddingVert4gu u-bgColorSecondary50">
        <div class="u-paddingHoriz4gu u-paddingVert20gu">.grid__col--12<br>.grid__col-md--4--spaced</div>
      </div>
      <div class="grid__col grid__col--12 grid__col-md--2--spaced u-bgColorSecondary200">
        <div class="u-padding4gu">.grid__col--12<br>.grid__col-md--2--spaced</div>
      </div>
      <div class="grid__col grid__col--12 grid__col-md--6--spaced u-paddingVert8gu u-bgColorSecondary50">
        <div class="u-padding4gu">.grid__col--12<br>.grid__col-md--6--spaced</div>
      </div>
    </div>
    <!--.container-->
  </section>
  <!--.block-->

  <?php
    /**
     *  UTILITY CLASSES
     */
    ?>

  <section class="block">
    <div class="container container--narrow">
      <h2>Utility Classes</h2>
      <p>This theme has a large number of premade Utility Classes that are available for use. You do not need to use them, but know that they do exist and you're welcome to them. The goal of having them is so you can make small style changes to elements without having to write additional Sass.</p>
      <p>All follow the same naming convention, <strong>u-camalcasePropertyValue</strong> Some examples are below:</p>
      <h3>Text Color</h3>
      <ul>
        <li class="u-textColorPrimary">u-textColorPrimary</li>
        <li class="u-textColorPrimary300">u-textColorPrimary300</li>
        <li class="u-textColorSecondary">u-textColorSecondary</li>
        <li class="u-textColorSecondary300">u-textColorSecondary300</li>
        <li class="u-textColorNeutral900">u-textColorNeutral900</li>
      </ul>

      <h3>Background Color</h3>
      <ul>
        <li class="u-bgColorBlack u-textColorWhite">u-bgColorBlack, u-textColorWhite</li>
        <li class="u-bgColorNeutral900 u-textColorPrimary100">u-bgColorNeutral900, u-textColorPrimary100</li>
        <li class="u-bgColorSecondary">u-bgColorSecondary</li>
      </ul>

      <h3>Padding/margin</h3>
      <p>These behave the same, so they're grouped. These also accept breakpoint modifiers: u-{sm, md, lg, xl}-marginBottom12gu for example.</p>
      <div class="u-inlineBlock u-padding8gu u-bgColorNeutral50">u-padding8gu</div>
      <div class="u-inlineBlock u-paddingHoriz12gu u-bgColorNeutral900 u-textColorWhite">u-paddingHoriz12gu</div>
      <div class="u-inlineBlock u-paddingVert20gu u-paddingLeft12gu u-paddingRight4gu u-bgColorSecondary300 u-textColorPrimary700">u-paddingVert20gu u-paddingLeft12gu u-paddingRight4gu</div>

      <div class="u-bgColorBlack u-marginBottom8gu u-padding1gu u-textColorPrimary">u-marginBottom8gu</div>
      <div class="u-bgColorBlack u-padding2gu u-textColorWhite u-textUppercase">u-textUppercase</div>

      <h3>Others</h3>
      <p>There are others, check the Sass directory for more.
      <pre>/assets/src/sass/utilities/</pre> There are some for positions: u-positionFixed, u-positionRelative etc. and displays: u-hidden u-md-block (to show on desktop) as well as others.</p>
    </div>
    <!--.container-->
  </section>
  <!--.block-->

</div><?php // end page wrapper 
?>




<?php get_footer(); ?>