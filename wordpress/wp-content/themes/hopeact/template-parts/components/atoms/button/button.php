<?php

/**
 * Atom: Button
 */

use Lean\Load;

$base =  $args['base'] ?? [];
$classes = $args['classes'] ?? [];
$button = $args['button'] ?? [];

if (!$button) {
    //exit atom
    return;
}

$href = '';
$label = '';
$target = '';
$aria = '';

// Default classes to empty string
if (!isset($button['classes'])) {
    $button['classes'] = '';
}

// Define button style via classes
if (isset($button['button_style'])) {
    $button['classes'] .= ' btn--' . $button['button_style'] . ' ';
    if ($button['button_style'] === 'solid') :
        $button['classes'] .= ' btn--primary ';
    elseif ($button['button_style'] === 'border') :
        $button['classes'] .= ' btn--outline ';
    endif;
}

// $button['button_icon'] = 'utility-login';  //test icon
if (isset($button['button_icon'])) :
    $button['classes'] .= ' btn--icon';
endif;

// Button size variants
if (isset($button['button_size'])) {
    $button['classes'] .= ' btn--' . $button['button_size'] . ' ';
}

// Ensure the button has a link value
if (array_key_exists('button_type', $button)) :
    if ($button['button_type'] == 'link' && $button['button_link']) :
        $href = $button['button_link']['url'];
        $label = $button['button_link']['title'];
        $target = $button['button_link']['target'] ?? '';
        // Build ADA aria-label - provide link destination context based on external/internal
        $aria = $button['button_aria_label'] ?? $button['button_link']['title'] . ' - Navigate to' . ($target === '_blank' ? ' offsite link: ' : ': ') . $href;

    elseif ($button['button_type'] == 'anchor' && $button['button_anchor']) :
        $button['classes'] .= ' btn--anchor ';
        $href = $button['button_anchor'];
        $label = $button['button_label'];
        // Build ADA aria-label - provide destination context based on anchor
        $aria = $button['button_aria_label'] ? $button['button_aria_label'] : $button['button_label'] . ' - Jump to' . $href;

    elseif ($button['button_type'] == 'file') :
        if ($button['button_file']) :
            $href = $button['button_file']['url'];
            $label = $button['button_label'];
            $aria = (strpos($button['button_label'], "Download") !== false) ? $button['button_label'] : 'Download ' . $button['button_file']['filename'];
        endif;
    endif;
endif;

if (!$label) {
    //exit atom
    return;
}

$aria = str_replace('"', "'", $aria);

?>

<?php /**********
       * BUILD BUTTON HTML 
       **********/

?>
<a data-atom="button" class="btn <?php echo $button['classes']; ?>" href="<?php echo $href; ?>" target="<?php echo $target; ?>" <?php if($aria) :?>aria-label="<?php echo $aria; ?>"<?php 
endif;?> <?php echo isset($button['button_file']) && $button['button_file'] ? 'download' : ''; ?>>
<?php if ($button['button_style'] == 'arrow') :?>
        <span>
            <?php echo $label; ?>
        </span>
        <svg width="31" height="20" viewBox="0 0 31 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <rect width="31" height="20" fill="url(#pattern0_197_329)"/>
            <defs>
                <pattern id="pattern0_197_329" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_197_329" transform="matrix(0.00606061 0 0 0.00939394 0 -0.0166667)"/>
                </pattern>
                <image id="image0_197_329" width="165" height="110" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKUAAABuCAYAAABGBNOtAAAACXBIWXMAAAsSAAALEgHS3X78AAAEBUlEQVR4nO3d3VFTURiF4fU53scOpAPogHQgHRgrECsAKxAqUCsQKiBUoHQQOoAKthebzKCELxxyzv59n0tImH2xZu0sBhILIQjTMLOjEMJF7nPU5k3uAzTu2Mz+mNlB7oPUhFBOb1/S0syOcx+kFoQyjZmkb2Z2YWbvch+mdIQyrQ+SVmY2z32QkhHK9GaSrszsLPdBSkUo8/nMCNqMUObFCNqAUObHCPoPoSwHI+gBoSwLI0iEslRdjyBCWa5uRxChLNt6BC17GkGEsg6HiiPoKPdBUiCU9ZhJ+mVmZ623JqGsz2fF15rNjiBCWad9Sb9bHUGEsm5NjiBCWb/mRhChbENTI4hQtqWJEUQo21P9CCKU7ap2BBHKtlU5gghl+6obQYSyH9WMIELZlypGEKHsU9EjiFD2q9gRRCj7th5BP0pqTUIJSfooqZj/CSKUWHuvOIJOcx+EUOJ/Jw8jaC/XAQglNjlUvM6zjCBCiedkG0GEEtskH0GEEi+RdAQRSgyRZAQRSgw1+QgilHiNSUcQocQuJhlBhBK7Gn0EEUqMZbQRRCgxplFGkEk6kNT12xlP6EBxFPTop6TjEMLd0CeapLmkq7FPBEi6lbQIISyHPInrG1N6r/jBAqdDnkQokcLJwwcL7L3kwYQSqewrjqDFtgcSSqQ0k/R926erEUrk8EGxNeebvkkokcuzI4hQIrcnI4hQogT/jCBCiVLMJC3M7B2hRCm+hhDmIYS7t7lPgu7dSjoKIfxZf4GmRE4/JR08DqQk0ZTI4V7xDzUuNn2TpkRq14rtuDGQEqFEWusxs/IexPWNFJ6MGQ9NialtHDMemhJTcceMh6bEFLaOGQ+hxNheNGY8XN8Yy6Ax46EpMYbBY8ZjkvYkLcb4YXhiofjHrK169ZjxWAhhzJ+HR8xsqfiuES26VgzkauwfzPWN1/iy65jxMHQwxI1iO47y2vE5NCVe6lzSfOpASjQltptkzHgIJTzXir97HPzOabvg+sZz1mMmaSAlmhJPJRkzHpoSjyUbMx6aElKGMeMhlMgyZjxc333LNmY8NGWfso8ZD03ZnyLGjIem7EdRY8ZDKPtQ3JjxcH237V6FjhkPTdmuoseMh6Zs03kIYbT/mUmNpmzLveJrx2Xug+yCpmzHpaS92gMpEcoWrMdMNet6G67vulU7Zjw0Zb2qHjMemrI+TYwZD01Zl2bGjIdQ1qG5MePh+i5fk2PGQ1OWrdkx46Epy9T8mPHQlOXpYsx4CGU5uhozHq7vMnQ3Zjw0ZX5fexwzHpoyn1vFdlzmPkhpaMo8LhXfuH6Z+yAlIpRp3Uv6xJjxcX2nc6P4u8dV7oOUjqZMYz1mVrkPUgOaclorSae8dhzmL0QJmlpoPXOfAAAAAElFTkSuQmCC"/>
            </defs>
        </svg>

    <?php else:
        if (isset($button['button_icon'])) :
            Load::atom(
                'icon/icon',
                [
                    'icon'     => [
                        'type'  => 'inline',
                        'svg_icon' => $button['button_icon'], // type: svg
                    ]
                ]
            );
        endif; ?>
        
        <span>
            <?php echo $label; ?>
        </span>

        <?php // download arrow
        if($button['button_type'] == 'file') :?>
            <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg" role="presentation">
                <path d="M1 5.5L6 10.5L11 5.5" stroke="#1A1818" stroke-width="1.5"/>
                <path d="M6 0.5V10.5" stroke="#1A1818" stroke-width="1.5"/>
                <path d="M0 13.5H12" stroke="#1A1818" stroke-width="0.5"/>
            </svg>
        <?php endif?>
    <?php endif;?>
</a>