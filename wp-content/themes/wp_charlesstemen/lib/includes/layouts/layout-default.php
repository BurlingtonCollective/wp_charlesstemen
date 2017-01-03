<article class="container layout-default">
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
            <?php
            if (have_rows('block_sections')) {
                foreach (get_field('block_sections') as $blockIndex => $block) {
                    include($block['acf_fc_layout'] . '.php');
                }
            } ?>
        </div>
    </div>
</article>
