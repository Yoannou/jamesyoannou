
/* BUTTONS */
const soundToggleButton = document.getElementById("sound-toggle-button");
const scrollDownButton = document.getElementById("scroll-down-button");

/* SOUNDS */
const backgroundMusic = document.getElementById('background-music');
const scrollClick = document.getElementById('scroll-click');
const scrollHover = document.getElementById('scroll-hover');

/* PROGRAM */

let soundEnabled = false;
soundToggleButton.addEventListener("click", toggleBackgroundMusic);

scrollDownButton.addEventListener("mouseenter", () => {
    if (soundEnabled == true) {
        scrollHover.play();
    }
})
scrollDownButton.addEventListener("click", () => {
    if (soundEnabled == true) {
        scrollClick.play();
    }
})

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