<?php

remove_theme_support('genesis-menus');

add_action('init', 'register_navigation');
function register_navigation()
{
    register_nav_menus(array(
        'top_nav_primary' => __('Top Nav Primary Nav')
    ));
}

function get_nav_menu($target) {
    $menus = wp_get_nav_menus();
    $menu_locations = get_nav_menu_locations();

    if (isset($menu_locations[$target])) {
        foreach ($menus as $menu) {
            if ($menu->term_id == $menu_locations[$target]) {
                return array (
                    'object' => wp_get_nav_menu_object($menu_locations[$target]),
                    'items' => wp_get_nav_menu_items($menu)
                );
            }
        }
    }

    return;
}
