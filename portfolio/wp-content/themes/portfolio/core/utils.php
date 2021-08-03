<?php

/**
 * return the title of the page separated with a custom character on the rigth or on the left of the site title
 *
 * @param string $separator the separator between the blog and page title
 * @param boolean $positionRight the position of the page title to the blog title
 * @return string the title of page with a separator and the title of the blog
 */
//these parameters associated with values are their default values
function pf_get_title($separator='|', $positionRight = true)
{
    $separator = ' '. $separator .' ';
    $title = trim(wp_title(' ', false, 'left'));
    if (!$title) {
        return get_bloginfo('name');
    }
    if ($positionRight) {
        return get_bloginfo('name') . $separator . $title;
    } else {
        return $title  . $separator . get_bloginfo('name');
    }
}
/**
 * generate a link to the asset we want to retrive in the theme
 *
 * @param string  $assets
 * @return string return the path to the asset
 */
// this function get the path to the style.css file placed in the root directory and return this path concatenated with the path we want inside the root directory of the theme, we need to trim the "/" at the end of the wordpress generated path.
function pf_get_template_assets($assets)
{
    return get_stylesheet_directory_uri() . '/' . ltrim($assets, '/');
}

/**
 * return the correct number formatting for coherence in project
 *
 * @param number $number
 * @return string
 */
function pf_number_formatting($number)
{
    if ($number < 10) {
        return "0" . $number;
    } else {
        return $number;
    }
}
