$(document).ready(function() {

    /* Scrolling to sections */
    $('.jq--scroll-to-about').click(function() {
        $('html, body').animate({scrollTop: $('.jq--section-about').offset().top}, 1500);
    });

    $('.jq--scroll-to-portfolio').click(function() {
        $('html, body').animate({scrollTop: $('.jq--section-portfolio').offset().top}, 1500);
    });

    $('.jq--scroll-to-contact').click(function() {
        $('html, body').animate({scrollTop: $('.jq--section-contact').offset().top}, 1500);
    });



    /* The smooth scrolling feature bellow allows for smooth scrolling to IDs but I don't want to use it */
    /* NAVIGATION SCROLL (smooth scrolling found on css-tricks.com:
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
      */
});