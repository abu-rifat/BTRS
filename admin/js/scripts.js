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

/////////////////////////////////////////////

// Hide submenus
$('#body-row .collapse').collapse('hide');

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left');

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
  SidebarCollapse();
});

function SidebarCollapse() {
  $('.menu-collapsed').toggleClass('d-none');
  $('.sidebar-submenu').toggleClass('d-none');
  $('.submenu-icon').toggleClass('d-none');
  $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

  // Treating d-flex/d-none on separators with title
  var SeparatorTitle = $('.sidebar-separator-title');
  if (SeparatorTitle.hasClass('d-flex')) {
    SeparatorTitle.removeClass('d-flex');
  } else {
    SeparatorTitle.addClass('d-flex');
  }

  // Collapse/Expand icon
  $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}
