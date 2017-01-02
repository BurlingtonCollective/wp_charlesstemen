<?php

function getThemeImg ($path) {
    return get_stylesheet_directory_uri() . '/images' . $path;
}

function make_srcset ($img2x, $img1x) {
    return $img1x . ', ' . $img2x . ' 2x';
}

add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
