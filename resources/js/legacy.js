/* 
Old code that is no longer useful to the website but is still nice to have
for reference even in the latest branch.
 */

/********** ROTATING FACE ON SCROLL **********/

let viewportMarkers = new Array(4);
createViewportMarkers(viewportMarkers);
loadHolograms("hologram-container");

document.addEventListener('scroll', () => {
    if (isInViewport(hologram)){
        let image;
        let screenwidth = window.innerWidth;
        let holoMiddle = (hologram.getBoundingClientRect().top + hologram.getBoundingClientRect().bottom)/2;
        let holoReference = hologramRef.getBoundingClientRect().top;
        let comparison = holoMiddle - holoReference;
        console.log(`hologram: ${holoMiddle}\nreference: ${holoReference}\n ref-holo: ${comparison}`);
        /* Wish I could use a switch statement below: 
        /* Tablets and Smartphones: */
        if(screenwidth < 1200) {
            if(comparison > 450) {
                image = 1;
            }
            else if (comparison > 200) {
                image = 2;
            }
            else if (comparison > -250) {
                image = 3;
            }
            else if (comparison > -400) {
                image = 4;
            }
            else {
                image = 5;
            }
        }
        /* Desktop and Laptop: */
        else {
            if(comparison > 450) {
                image = 1;
            }
            else if (comparison > 220) {
                image = 2;
            }
            else if (comparison > -150) {
                image = 3;
            }
            else if (comparison > -320) {
                image = 4;
            }
            else {
                image = 5;
            }
        }
        for(let i = 0; i < hologramList.length; i++) {
            if(hologramList[i].id == `hologram-image-${image}`){
                hologramList[i].classList.remove("hologram-hidden");
            }
            else {
                hologramList[i].classList.add("hologram-hidden");
            }
        }
    }
})
/*
 * Make this run when hovering over the face as well.
 * Put the hologram template in the front (invisible) and make it the reference.
 * Or make it grow and get staticy on hover
 * */

/* Returns an array of 4 markers representing fractions of the viewport height */
function createViewportMarkers(arr) {
    console.log("Creating new viewport markers...");
    for(let i = 0; i < 4; i ++) {
        arr.pop();
    }
    arr.push(window.innerHeight - window.innerHeight / 4);
    arr.push(window.innerHeight - window.innerHeight / 3);
    arr.push(window.innerHeight / 2);
    arr.push(window.innerHeight / 3);
}


/********** CANVAS ANIMATIONS **********/
/* Definitely put these in functions later */
let aboutC = document.getElementById("canvas-about");
let aboutCtx = aboutC.getContext("2d");
aboutCtx.fillStyle = "rgba(250, 100, 100, 0.5)";
aboutCtx.fillRect(10, 10, 150, 100);

let contactC = document.getElementById("canvas-contact");
let contactCtx = contactC.getContext("2d");
contactCtx.fillStyle ="rgba(100, 250, 100, 0.5)";
contactCtx.fillRect(60, 30, 200, 100);



// OG JQUERY
$(document).ready(function() {

    /* Initialize my face to make most sections invisible */
    $( '#hologram-image-3' ).show();
  
    /* SCROLLING TO SECTIONS */
  
    $('.jq--scroll-to-about').click(function() {
        $('html, body').animate({scrollTop: $('.jq--section-about').offset().top}, 1000);
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