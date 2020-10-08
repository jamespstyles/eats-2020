app.searchToggle = (($) => {
  'use strict';

  const init = () => {

    $('.js-toggle-search').on('click', function() {

      // Check current state of search
      if (!$('body').hasClass('search-open')) {

        // If search is closed - check if the menu is open and close it
        if ($('body').hasClass('menu-open')) {
          $('body').removeClass('menu-open');
          $('.js-toggle-menu').removeClass('is-active');
        }
        // Open search & focus in input
        $(this).addClass('is-active');
        $('body').addClass('search-open');
        $('#search-input').focus();
      } else {
        // Close search
        $(this).removeClass('is-active');
        $('body').removeClass('search-open');
      }

    });

  };

  init();

})(jQuery);
