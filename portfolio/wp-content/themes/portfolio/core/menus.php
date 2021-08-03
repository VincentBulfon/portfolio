<?php

register_nav_menu('main', 'main menu');
register_nav_menu('secondary', 'seconday menu');
register_nav_menu('social', 'socials menu');


/**
 * Retrieves navigation objects for given locations
 *
 * @param string $location      nav menu loaction
 * @param string $baseClass     classe css used for BEM
 **/

function pf_get_menu($location, $baseClass)
{
    global $post;

    $items = [];


    $locations = get_nav_menu_locations();
    $id = $locations[$location];
    $menu = wp_get_nav_menu_items($id);

    foreach ($menu as $i => $object) {
        $item = new stdClass();
        $item->url = $object->url;
        $item->label = $object->title;
        $isTargettingHome = rtrim($object->url, '/') == rtrim(home_url(), '/');
        $item->current = (is_home() && $isTargettingHome) || ($object->object_id == $post->ID);
        $item->target = $object->target;
        //apply function on table elements
        $item->classes = array_map(function ($item) use ($baseClass) {
            return $baseClass . '--' . $item;
        //filter an array where two others array are merged, the first one if $item->current is true contain 'current' if not 'null' and the second the object classes
        }, array_filter(array_merge([$item->current ? 'current' : null], $object->classes)));
        array_unshift($item->classes, $baseClass);
        $items[] = $item;
    }

    return $items;
}

/**
 * return object, with an url, title, an hostname
 *
 * @param string $location
 * @return array array of objects, each as url, title, hostname
 */
function pf_get_menuAndHost($location)
{
    $items = [];
    $locations = get_nav_menu_locations();
    $id = $locations[$location];
    $menuData = wp_get_nav_menu_items($id);
    foreach ($menuData as $object) {
        $item = new stdClass();
        $item->url = $object->url;
        $item->label = $object->title;
        $item->class = rtrim(ltrim(pf_get_host($object->url), "www."), ".com");
        $items[]= $item;
    }
    return $items;
}

function pf_get_host($url)
{
    return parse_url($url, PHP_URL_HOST);
}
