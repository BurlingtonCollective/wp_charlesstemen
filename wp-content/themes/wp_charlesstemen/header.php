<?php
add_theme_support('genesis-responsive-viewport');
add_action('wp_enqueue_scripts', 'dl_enqueue_scripts_styles');
function dl_enqueue_scripts_styles() {
    $bowerDir = get_bloginfo('stylesheet_directory') . '../../../bower_components';

    wp_enqueue_style("brochure-styles", get_bloginfo('stylesheet_directory') . "/style.css");

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', $bowerDir . '/bootstrap/dist/js/bootstrap.min.js', array(), false, true);
}

do_action('genesis_doctype');
do_action('genesis_title');
do_action('genesis_meta');

wp_head();

echo '</head>';
genesis_markup(array(
    'html5'   => '<body %s>',
    'xhtml'   => sprintf('<body class="%s">', implode(' ', get_body_class())),
    'context' => 'body',
));

remove_action('genesis_header', 'genesis_header_markup_open', 5);
remove_action('genesis_header', 'genesis_do_header');

remove_action('genesis_header', 'genesis_header_markup_close', 15);
remove_action('genesis_after_header', 'genesis_do_nav');
remove_action('genesis_after_header', 'genesis_do_subnav');

add_action('genesis_header', 'dl_do_header');
function dl_do_header()
{
    ?>
    <nav></nav>
    <?php
}

do_action('genesis_before');

do_action('genesis_before_header');
do_action('genesis_header');
do_action('genesis_after_header');
