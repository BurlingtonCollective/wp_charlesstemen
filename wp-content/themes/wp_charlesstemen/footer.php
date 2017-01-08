<?php
remove_action('genesis_footer', 'genesis_do_footer');
add_action('genesis_footer', 'dl_do_footer');
function dl_do_footer ()
{
    ?>
    <footer></footer>
    <?php
}

remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
remove_action('genesis_footer', 'genesis_footer_markup_close', 15);
remove_action('genesis_footer', 'genesis_do_footer');

do_action('genesis_before_footer');
do_action('genesis_footer');
do_action('genesis_after_footer');

do_action('genesis_after');
wp_footer();
?>
</body>
</html>
