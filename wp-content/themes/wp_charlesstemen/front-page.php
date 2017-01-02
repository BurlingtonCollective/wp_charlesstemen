<?php

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'bc_do_loop');

function bc_do_loop ()
{
    global $post; setup_postdata($post); ?>
    <main id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <article class="project thumbnail">
                        <a href="#">
                            <img class="img-responsive" src="http://placehold.it/800x800">
                        </a>
                        <p class="caption">
                            <a href="#"><?php the_title(); ?></a>
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </main>
    <?php
}

genesis_custom();
