<section class="block-video">
    <?php
    if ($block['block_heading']) : ?>
        <h2><?php echo $block['block_heading']; ?></h2>
        <?php
    endif;
    if ($block['block_copy']) : ?>
        <div class="wysiwyg-content">
            <?php echo $block['block_copy']; ?>
        </div>
        <?php
    endif;
    if ($block['block_sections']) :
        if (count($block['block_sections']) === 1) :
            $theBlock = $block['block_sections'][0];
            if ($theBlock['block_video']) : ?>
                <div class="wysiwyg-content">
                    <?php echo $theBlock['block_video']; ?>
                </div>
                <?php
            endif;
            if ($theBlock['block_copy']) : ?>
                <div class="wysiwyg-content">
                    <?php echo $theBlock['block_copy']; ?>
                </div>
                <?php
            endif;
        else :
            $carouselId = "#block-video-carousel-" . $blockIndex; ?>
            <div id="<?php echo substr($carouselId, 1); ?>"
                 class="carousel carousel-block carousel-block-video slide"
                 data-ride="carousel"
                 data-interval="false">
                <p>
                    <a href="<?php echo $carouselId; ?>" role="button" data-slide="prev">Previous</a>
                    /
                    <a href="<?php echo $carouselId; ?>" role="button" data-slide="next">Next</a>
                    (<span class="carousel-index">1</span> out of <?php echo count($block['block_sections']); ?>)
                </p>
                <div class="carousel-inner" role="listbox">
                    <?php foreach ($block['block_sections'] as $itemIndex => $item) : ?>
                        <div class="item <?php echo $itemIndex === 0 ? 'active' : ''; ?>">
                            <?php
                            if ($item['block_video']) : ?>
                                <div class="wysiwyg-content">
                                    <?php echo $item['block_video']; ?>
                                </div>
                                <?php
                            endif;
                            if ($item['block_copy']) : ?>
                                <div class="wysiwyg-content">
                                    <?php echo $item['block_copy']; ?>
                                </div>
                                <?php
                            endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
        endif;
    endif;?>
</section>
