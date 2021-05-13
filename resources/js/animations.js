/**************
 INITIALIZATION 
 **************/

 window.addEventListener('load', (event) => {
    console.log('page is fully loaded');
  });

const hologramList = document.querySelectorAll(".hologram-image");

let buttonLeft = document.getElementById("intro-video-button");
let buttonRight = document.getElementById("learn-more-button")
let aboutPanelLeft = document.querySelector(".intro-video-panel");
let aboutPanelRight = document.querySelector(".learn-more-panel");
let currentAboutPanel = "center";


/****************
 GLOBAL VARIABLES 
 ****************/

const nameWrapper = document.querySelector(".name-wrapper");
const nameArray = ["", "J", "A", "M", "E", "S", "", "Y", "O", "A", "N", "N", "O", "U"];
const webDeveloper = document.querySelector(".web-developer");

const hologram = document.querySelector(".about-left");
const hologramRef = document.getElementById("hologram-reference");


/**********
 ANIMATIONS
 **********/

/********** HOME-PAGE NAME ANIMATION **********/
/* Add my name to the grid with 0 opacity */
for(let i = 0; i < nameArray.length; i++) {
    let nameLetter = document.createTextNode(nameArray[i]);
    let newDiv = document.createElement("div");
    let newSpan = document.createElement("span");
    newSpan.appendChild(nameLetter);
    newSpan.setAttribute("class", "name-letter");
    newSpan.setAttribute("id", "name-letter-" + i);
    newDiv.appendChild(newSpan);
    newDiv.setAttribute("class", "name-letter-holder");
    nameWrapper.appendChild(newDiv);
}
/* Add a letter every 10th of a second */
let count = 0;
let timer = setInterval(addLetter, 85);

/********** HOME-PAGE CANVAS **********/



/********** ABOUT-SECTION ROTATING FACE **********/

/* Handled with jQuery */


/********** ABOUT-SECTION CHANGING PANELS **********/
buttonLeft.addEventListener("click", ()=>{
    if (currentAboutPanel !== "left") {
        currentAboutPanel = "left";
        console.log(currentAboutPanel);
        aboutPanelLeft.style.transform = "translateX(100%)";
    }
});

buttonRight.addEventListener("click", ()=>{
    if (currentAboutPanel !== "right") {
        currentAboutPanel = "right";
        aboutPanelRight.style.transform = "translateX(-100%)";
    }
});

document.querySelectorAll(".panel-exit").forEach(el => el.addEventListener("click", ()=> {
    if (currentAboutPanel == "left") {
        aboutPanelLeft.style.transform = "translateX(-100%)";
    }
    if (currentAboutPanel == "right") {
        aboutPanelRight.style.transform = "translateX(100%)";
    }
    currentAboutPanel = "center";
}));


 /********
 FUNCTIONS
 *********/

 /* Animates name letters in one-by-one */
 /* This function may be too specific */
function addLetter() {
    if (count === nameArray.length) {
        clearInterval(timer);
        timer = null;
        webDeveloper.classList.add("slide-in");
        return;
    }
    else {
        const cell = nameWrapper.querySelectorAll('div')[count];
        if (count < 7) {
            cell.firstChild.classList.add("james");
        }
        else {
            cell.firstChild.classList.add("yoannou");
        }
        count++;
    }
}

/* Checks if element is in the viewport */
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top < (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom > 0
    );
}

/* Preloads hologram images */
function loadHolograms(div) {
    for(let i=1; i<=5; i++) {
        let hologramImageI = document.createElement("img");
        hologramImageI.id = `hologram-image-${i}`;
        hologramImageI.classList.add("hologram-image");
        if(i != 3) {
            hologramImageI.classList.add("hologram-hidden");
        }
        hologramImageI.src = `resources/img/compressedpng/holo${i}-min.png`;
        document.querySelector(`.${div}`).appendChild(hologramImageI);
    }
}

function rotateFace(direction) {
    if (direction == "left") {
        console.log("left!");
    }
    else if (direction == "right") {
        console.log("right!");
    }
    else {
        console.loge("invalid face direction for function rotateFace");
    }
}