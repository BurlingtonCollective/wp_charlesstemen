<?php

function genesis_custom() {
    get_header();
    do_action('genesis_loop');
    get_footer();
}
