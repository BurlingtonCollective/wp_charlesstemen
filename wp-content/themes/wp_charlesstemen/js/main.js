jQuery(function ($) {
    $(document).ready(function () {
        $('.wysiwyg-content').fitVids();

        $('.carousel-block')
            .on('slid.bs.carousel', function (e) {
                $(this).find('.carousel-index').text($(e.relatedTarget).index() + 1);
            });

        $('.carousel-block-video')
            .on('slid.bs.carousel', function (e) {
                $items = $(this).find('.item').not(e.relatedTarget);
                $.each($items, function () {
                    //pause video hack
                    var $iframe = $(this).find('iframe');
                    var source = $iframe.attr('src');
                    $iframe.attr('src', '');
                    $iframe.attr('src', source);
                });
            });
    });
});
