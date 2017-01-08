<?php

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'bc_do_loop');

function bc_do_loop ()
{
    global $post; setup_postdata($post); ?>
    <main id="single-project">
        <?php include('lib/includes/layouts/layout-default.php'); ?>
    </main>
    <?php
}

genesis_custom();
