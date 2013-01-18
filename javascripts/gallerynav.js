$(function() {

  $('ul#galleryNav a').click(function() {
    var el = $(this);
    $('#galleryNav a').removeClass('active');
    el.addClass('active');
    
    var onTab = $(this).attr('rel');
    $('.gallery').hide();
    $(onTab).fadeIn(1500);
    return false;
  });

});
