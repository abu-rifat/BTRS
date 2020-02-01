$('#datepicker').datepicker();
function today() {
  var d = new Date();
  var curr_date = d.getDate();
  var curr_month = d.getMonth() + 1;
  var curr_year = d.getFullYear();
  document.write(curr_date + '-' + curr_month + '-' + curr_year);
}

(function() {
  'use strict';

  // custom scrollbar

  $('html').niceScroll({
    styler: 'fb',
    cursorcolor: '#C3B400',
    cursorwidth: '4',
    cursorborderradius: '10px',
    background: '#ccc',
    spacebarenabled: false,
    cursorborder: '0',
    zindex: '1000'
  });

  $('.scrollbar1').niceScroll({
    styler: 'fb',
    cursorcolor: '#C3B400',
    cursorwidth: '4',
    cursorborderradius: '0',
    autohidemode: 'false',
    background: '#ccc',
    spacebarenabled: false,
    cursorborder: '0'
  });

  $('.scrollbar1').getNiceScroll();
  if ($('body').hasClass('scrollbar1-collapsed')) {
    $('.scrollbar1')
      .getNiceScroll()
      .hide();
  }
})(jQuery);
