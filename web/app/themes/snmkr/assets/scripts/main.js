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

        //  add & remove class on click
        $('.menu-icon').click(function(e) {
          
          e.preventDefault();

          $this = $(this);

          if ($this.hasClass('is-opened')) {
            $this.addClass('is-closed').removeClass('is-opened');
          } else {
            $this.addClass('is-opened').removeClass('is-closed');
          };


          
        });

        //smoothscrol
        $("a[href='#top']").click(function() {
          var speed = 750;
          $("html, body").animate({ scrollTop: 0 }, speed);
          return false;
        });

        $("a[href='#anchor']").click(function() {
          var speed = 750;
          $("html, body").animate({ scrollTop: $('#anchor').offset().top }, speed);
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
        //  Searchform
        //  Au focus
        $('.field-control').focus(function(){
          $(this).parent().addClass('is-focused has-label');
        });

        // à la perte du focus
        $('.field-control').blur(function(){
          $parent = $(this).parent();
          if($(this).val() == ''){
            $parent.removeClass('has-label');
          }
          $parent.removeClass('is-focused');
        });

        // si un champs est rempli on rajoute directement la class has-label
        $('.field-control').each(function(){
          if($(this).val() != ''){
            $(this).parent().addClass('has-label');
          }
        });
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'adhesion': {
      init: function() {
        // JavaScript to be fired on the about us page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS

        $('#input_2_19').val('');
        $('.product_totals').hide();
        $('.gform_next_button_2_17').show();
        $('#input_2_19').change(function() {
          $('.product_totals').show();
        });
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
