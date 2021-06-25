
/* BUTTONS */
const soundToggleButton = document.getElementById("sound-toggle-button");

/* SOUNDS */
const backgroundMusic = document.getElementById('background-music');


/* PROGRAM */

let soundEnabled = false;
soundToggleButton.addEventListener("click", toggleBackgroundMusic);

/*

SCROLL SOUNDS

scrollDown.addEventListener("mouseenter", () => {
    if (soundEnabled == true) {
        scrollHover.play();
    }
})
scrollDown.addEventListener("click", () => {
    if (soundEnabled == true) {
        scrollClick.play();
    }
})


const scrollClick = document.getElementById('scroll-click');
const scrollHover = document.getElementById('scroll-hover');
*/

/* FUNCTIONS */
function toggleBackgroundMusic(){
    soundToggleButton.classList.toggle("sound-on");
    if (soundEnabled == false) {
        soundEnabled = true;
        soundToggleButton.setAttribute("name", "volume-high");
        backgroundMusic.play();
    }
    else {
        soundEnabled = false;
        soundToggleButton.setAttribute("name", "volume-mute");
        backgroundMusic.pause();
    }
}