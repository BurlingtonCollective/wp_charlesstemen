<article class="container layout-default">
    <div class="row">
        <div class="col-xs-12 visible-xs col-description">
            <h1><?php the_title(); ?></h1>
            <div class="wysiwyg-content">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="col-sm-6 col-md-8 col-content">
            <?php
            if (have_rows('block_sections')) {
                foreach (get_field('block_sections') as $blockIndex => $block) {
                    include($block['acf_fc_layout'] . '.php');
                }
            } ?>
        </div>
        <div class="col-sm-6 col-md-4 visible-sm visible-md visible-lg col-description">
            <div class="affix-container">
                <h1><?php the_title(); ?></h1>
                <div class="wysiwyg-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</article>
