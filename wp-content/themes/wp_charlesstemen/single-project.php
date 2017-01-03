<?php

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'bc_do_loop');

function bc_do_loop ()
{
    global $post; setup_postdata($post); ?>
    <main id="single-project">
        <article class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-push-6 col-md-4 col-md-push-8">
                    <div class="affix-container">
                        <h2><?php the_title(); ?></h2>
                        <div class="wysiwyg-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 co-sm-pull-6 col-md-8 col-md-pull-4">

                </div>
            </div>
        </article>
    </main>
    <?php
}

genesis_custom();