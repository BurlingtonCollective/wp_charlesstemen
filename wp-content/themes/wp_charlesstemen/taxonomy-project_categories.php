<?php

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'bc_do_loop');

function bc_do_loop ()
{
    global $wp_query; ?>
    <main id="archive">
        <div class="container project-gallery">
            <div class="row">
                <?php
                if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?php include('lib/includes/components/project-thumbnail.php'); ?>
                    </div>
                    <?php
                endwhile; endif; ?>
            </div>
        </div>
    </main>
    <?php
}

genesis_custom();
