<?php

// Start Genesis
include_once(get_template_directory() . '/lib/init.php');

require_once('lib/post-type/index.php');
require_once('lib/structure/index.php');

if (!constant('WP_DEBUG')) {
    // Hide ACF in admin menus
    add_filter('acf/settings/show_admin', '__return_false');
}
