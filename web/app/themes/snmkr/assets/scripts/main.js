/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        //smoothscrol
        $("a[href='#top']").click(function() {
          var speed = 750;
          $("html, body").animate({ scrollTop: 0 }, speed);
          return false;
        });

        $( '.submenu .active' ).parents('.panel').find('.submenu-link').removeClass( 'collapsed');
        $( '.submenu .active' ).parents('.submenu').addClass( 'in');

      
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired

        var url = 'http://' + $(location).attr('host');

        //svg map
        $('#map').vectorMap({
            map: 'france_fr',
            hoverOpacity: 0.8,
            hoverColor: "#a0171e",
            backgroundColor: "transparent",
            color: "#736f80",
            selectedColor: '#a0171e',
            borderColor: "#fff",
            enableZoom: false,
            showTooltip: true,
            onRegionClick: function(element, code, region) {
              location.href= url + '/regions/' + region + '/';
            }
        });

      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
         $('.owl-carousel').owlCarousel({
            items:1,
            autoHeight:true
        });
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
