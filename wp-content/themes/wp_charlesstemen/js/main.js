jQuery(function ($) {
  $(document).ready(function () {
    $('.wysiwyg-content').fitVids();

    $('.carousel-block')
      .on('slid.bs.carousel', function (e) {
        $(this).find('.carousel-index').text($(e.relatedTarget).index() + 1);
      });

    $('.carousel-block-video')
      .on('slide.bs.carousel', function (e) {
        $.each($(this).find('iframe'), function () {
          //pause video hack
          var source = $(this).attr('src');
          $(this).attr('src', '');
          $(this).attr('src', source);
        })
      });


  });
});
