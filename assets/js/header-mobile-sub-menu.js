jQuery(function($) {
    $('.navbar-nav .menu-item-has-children > a').click(function(e) {
      var $subMenu = $(this).siblings('.sub-menu');
      if ($subMenu.length > 0) {
        if (!$subMenu.hasClass('show')) {
          e.preventDefault();
          $subMenu.addClass('show');
        } else {
          $subMenu.removeClass('show');
        }
      }
    });
  });