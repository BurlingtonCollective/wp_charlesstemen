<?php

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'bc_do_loop');

function bc_do_loop ()
{
    global $post; setup_postdata($post);
    $projects = get_field('front_page_projects'); ?>
    <main id="front-page">
        <div class="container project-gallery">
            <div class="row">
                <?php
                if ($projects) : foreach ($projects as $post) :
                    setup_postdata($post); ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?php include('lib/includes/components/project-thumbnail.php'); ?>
                    </div>
                    <?php
                endforeach; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </main>
    <?php
}

genesis_custom();
