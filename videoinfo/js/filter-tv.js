var $btns = $('.btn').click(function() {
  if (this.id == 'all') {
    $('#filter-tv > div').fadeIn(450);
  } else {
    var $el = $('.' + this.id).fadeIn(450);
    $('#filter-tv > div').not($el).hide();
  }
  $btns.removeClass('active');
  $(this).addClass('active');
})