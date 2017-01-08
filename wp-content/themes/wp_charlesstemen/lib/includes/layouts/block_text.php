<section class="block-text">
    <?php if ($block['block_heading']) : ?>
        <h2 class="section-title"><?php echo $block['block_heading']; ?></h2>
    <?php endif; ?>
    <div class="wysiwyg-content">
        <?php echo $block['block_copy']; ?>
    </div>
</section>
