<?php

/**
 * The template that generates the html for the Spacer component.
 *
 * @package BansheeStudio
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$spacer_sm      = get_sub_field('spacer_sm');
$spacer_md      = get_sub_field('spacer_md');
$spacer_lg      = get_sub_field('spacer_lg');

$spacer_style   = "--spacer-sm-height: {$spacer_sm}; --spacer-md-height: {$spacer_md}; --spacer-lg-height: {$spacer_lg};"

?>

<?php if ($spacer_sm && $spacer_lg) : ?>
    <div class="spacer" style="<?php echo $spacer_style ;?>"></div>
<?php endif; ?>
