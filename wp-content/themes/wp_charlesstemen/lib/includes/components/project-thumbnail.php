<article class="project thumbnail">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
    </a>
    <p class="caption">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </p>
</article>
