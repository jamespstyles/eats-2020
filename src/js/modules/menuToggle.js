app.menuToggle = (() => {
  'use strict';

  const init = () => {

    document.addEventListener('click', function (event) {

      // If users not clicking menu toggle return
      if (!event.target.matches('.js-toggle-menu')) return;

      var body = document.body,
          toggle = event.target;

      // Check if menu is currently closed
      if(!body.classList.contains('menu-open')){

        // Before opening menu, check for open search and close if necessary
        if(body.classList.contains('search-open')){
          body.classList.remove('search-open');
          document.querySelector('.js-toggle-search').classList.remove('is-active');
        }

        // Open menu
        body.classList.add('menu-open');
        toggle.classList.add('is-active');

      } else {

        body.classList.remove( 'menu-open' );
        toggle.classList.remove('is-active');
      }

    }, false);

  }

  init();

})();
