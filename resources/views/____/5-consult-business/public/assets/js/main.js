// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
(function ($) {

    "use strict";


    //Hide Loading Box (Preloader)
    function handlePreloader() {
        if ($('.preloader').length) {
            $('.preloader').delay(100).fadeOut(500);
        }
    }


    /* Closes the Responsive Menu on Menu Item Click*/
    $('.navbar-collapse ul li a').on('click', function () {
        $('.navbar-toggle:visible').click();
    });
    /*END MENU JS*/
    /* ----------------------------------------------------------- */
    /*  Fixed header
     /* ----------------------------------------------------------- */

    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 70) {
            $('.site-navigation, .header-white, .header').addClass('navbar-fixed');
        } else {
            $('.site-navigation, .header-white, .header').removeClass('navbar-fixed');
        }
    });


    //    Animation
    AOS.init({
        duration: 1500,
    });


    jQuery(document).on('ready', function () {



        /* ----------------------------------------------------------- */
        /*  Mobile Menu
         /* ----------------------------------------------------------- */

        jQuery(".nav.navbar-nav li a").on("click", function () {
            jQuery(this).parent("li").find(".dropdown-menu").slideToggle();
            jQuery(this).find("i").toggleClass("fa-angle-down fa-angle-up");
        });
    });


    /* ==========================================================================
     When document is loading, do
     ========================================================================== */

    $(window).on('load', function () {
        handlePreloader();
    });


    $('#main-slide').carousel({
        pause: true,
        interval: 100000,
    });


    //    Animation
    AOS.init({
        duration: 1500,
    });


})(window.jQuery);