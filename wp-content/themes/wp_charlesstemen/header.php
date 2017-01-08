<?php
add_theme_support('genesis-responsive-viewport');
add_action('wp_enqueue_scripts', 'dl_enqueue_scripts_styles');
function dl_enqueue_scripts_styles() {
    $bowerDir = get_bloginfo('stylesheet_directory') . '../../../bower_components';

    wp_enqueue_style("brochure-styles", get_bloginfo('stylesheet_directory') . "/style.css");

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', $bowerDir . '/bootstrap/dist/js/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('fitvids-js', $bowerDir . '/fitvids/jquery.fitvids.js', array('jquery'), false, true);

    wp_enqueue_script('main', get_bloginfo('stylesheet_directory') . '/js/main.js', array('jquery'), false, true);
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
    $primaryNav = get_nav_menu('top_nav_primary'); ?>
    <header class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                    <img class="img-responsive" src="<?php echo getThemeImg('/logo.png'); ?>" alt="Charles Stemen">
                </a>
            </div>
            <?php if ($primaryNav['items']) : ?>
                <nav id="main-nav" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php foreach ($primaryNav['items'] as $item) : ?>
                            <li><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </header>
<!--    <section id="banner">-->
<!--        <h2 class="sr-only">Youth culture content creator - Since '92</h2>-->
<!--        <img src="http://placehold.it/2400x600" class="img-responsive">-->
<!--    </section>-->
    <?php
}

do_action('genesis_before');

do_action('genesis_before_header');
do_action('genesis_header');
do_action('genesis_after_header');
