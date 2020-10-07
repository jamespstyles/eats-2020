app.menuToggle = (($) => {
  'use strict';

  const init = () => {
    $('.js-toggle-menu').on('click', function() {

      // Check current state of menu
      if (!$('body').hasClass('menu-open')) {

        // If the menu is closed - check if search is open and close it
        if ($('body').hasClass('search-open')) {
          $('body').removeClass('search-open');
          $('.js-toggle-search').removeClass('is-active');
        }

        // Open menu
        $(this).addClass('is-active');
        $('body').addClass('menu-open');
      } else {
        // Close menu
        $(this).removeClass('is-active');
        $('body').removeClass('menu-open');
      }

    });

  };

  init();

})(jQuery);
