$(document).ready(function() {

  /* Initialize my face to make most sections invisible */
  $( '#hologram-image-3' ).show();

  /* SCROLLING TO SECTIONS */

  $('.jq--scroll-to-about').click(function() {
      $('html, body').animate({scrollTop: $('.jq--section-about').offset().top}, 800);
  });

  $('.jq--scroll-to-portfolio').click(function() {
      $('html, body').animate({scrollTop: $('.jq--section-portfolio').offset().top}, 1500);
  });

  $('.jq--scroll-to-contact').click(function() {
      $('html, body').animate({scrollTop: $('.jq--section-contact').offset().top}, 1500);
  });


  /* ABOUT-SECTION ROTATING FACE */

  /*
  Move all of this code into animations.js. Create a "faceLock" variable
  that locks up my face when a button is clicked.
  If my face is locked, jamesLookLeft won't run (make it conditional if !faceLock)
  When a "back" button is click, unlock face and then run either jamesLookLeft or jamesLookRight
  depending on side.

  ^ Not necessary, instead used delay on the face rotation back.
  */

  $( '#intro-video-button' ).hover(jamesLookLeftIn, jamesLookLeftOut);
  $( '#learn-more-button' ).hover(jamesLookRightIn, jamesLookRightOut);

  function jamesLookLeftIn(){
      $( '.hologram-image' ).eq(2).fadeToggle(300);
      $( '.hologram-image' ).eq(1).delay(100).fadeToggle(80).fadeToggle(100);
      $( '.hologram-image' ).eq(0).delay(100).fadeToggle(240);
  }

  function jamesLookLeftOut(){
    $( '.hologram-image' ).eq(0).delay(300).fadeToggle(300);
    $( '.hologram-image' ).eq(1).delay(400).fadeToggle(80).fadeToggle(100);
    $( '.hologram-image' ).eq(2).delay(400).fadeToggle(240);
  }

  function jamesLookRightIn(){
    $( '.hologram-image' ).eq(2).fadeToggle(300);
    $( '.hologram-image' ).eq(3).delay(100).fadeToggle(80).fadeToggle(100);
    $( '.hologram-image' ).eq(4).delay(100).fadeToggle(240);
  }
  function jamesLookRightOut(){
    $( '.hologram-image' ).eq(4).delay(300).fadeToggle(300);
    $( '.hologram-image' ).eq(3).delay(400).fadeToggle(80).fadeToggle(100);
    $( '.hologram-image' ).eq(2).delay(400).fadeToggle(240);
  }

});