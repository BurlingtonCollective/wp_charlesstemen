jQuery(function ($) {
    $(document).ready(function () {
        var $affixContainer = $('.affix-container');
        var navbarHeight = $('.navbar-fixed-top').outerHeight;

        function setAffixContainerSize () {
            $affixContainer.css({
                width: function () {
                    return $(this).parent().width() + 'px';
                }
            });

            $affixContainer.affix({
                offset: {
                    top: function () {
                        return $affixContainer.parents('.layout-default').offset().top - navbarHeight;
                    }
                }
            });
        }

        if ($affixContainer.length > 0) {
            $(window)
                .on('resize', setAffixContainerSize)
                .trigger('resize');
        }

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
