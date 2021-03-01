/********** INITIALIZATION **********/
loadHolograms();
const hologramList = document.querySelectorAll(".hologram-image");
let viewportMarkers = new Array(4);
createViewportMarkers(viewportMarkers);


/********** GLOBAL VARIABLES **********/
const nameWrapper = document.querySelector(".name-wrapper");
const nameArray = ["", "J", "A", "M", "E", "S", "", "Y", "O", "A", "N", "N", "O", "U"];
const webDeveloper = document.querySelector(".web-developer");

const hologram = document.querySelector(".about-left");
//const hologram = document.getElementById("hologram-image");

/********** ADDING MY NAME **********/
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


/********** ROTATING FACE **********/
/* Preload images 
for (let i=0; i<5; i++) {

}
*/

/* START

window.addEventListener('resize', () => { createViewportMarkers(viewportMarkers) });

document.addEventListener('scroll', () => {
    if (isInViewport(hologram)){
        let hologramPos = hologram.getBoundingClientRect();
        if (hologramPos.top > viewportMarkers[0]) {
            hologram.src = "resources/img/compressedpng/holo1-min.png";
            hologram.style = "opacity: 0.5;";
        }
        else if (hologramPos.top > viewportMarkers[1]){
            hologram.src = "resources/img/compressedpng/holo2-min.png";
            hologram.style = "opacity: 0.6;";
        }
        else if (hologramPos.bottom < viewportMarkers[3]){
            hologram.src = "resources/img/compressedpng/holo5-min.png";
            hologram.style = "opacity: 0.5;";
        }
        else if (hologramPos.bottom < viewportMarkers[2]){
            hologram.src = "resources/img/compressedpng/holo4-min.png";
            hologram.style = "opacity: 0.6;";
        }
        else {
            hologram.src = "resources/img/compressedpng/holo3-min.png";
            hologram.style = "opacity: 0.7;";
        }
    }
});

END  */

/********** ALTERNATE ROTATING FACE **********/
/* This version should run faster */
window.addEventListener('resize', () => { createViewportMarkers(viewportMarkers) });

document.addEventListener('scroll', () => {
    if (isInViewport(hologram)){
        let marker;
        let hologramPos = hologram.getBoundingClientRect();
        if (hologramPos.top > viewportMarkers[0]) {
            marker = 1;
        }
        else if (hologramPos.top > viewportMarkers[1]){
            marker = 2;
        }
        else if (hologramPos.bottom < viewportMarkers[3]){
            marker = 5;
        }
        else if (hologramPos.bottom < viewportMarkers[2]){
            marker = 4;
        }
        else {
            marker = 3;
        }
        for(let i = 0; i < hologramList.length; i++) {
            if(hologramList[i].id == `hologram-image-${marker}`){
                hologramList[i].classList.remove("hidden");
            }
            else {
                hologramList[i].classList.add("hidden");
            }
        }
    }
})


/*********************
 ***** FUNCTIONS *****
 *********************/

/* Animates name letters in one-by-one */
function addLetter(){
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

/* Preloads hologram images */
function loadHolograms() {
    for(let i=1; i<=5; i++) {
        let hologramImageI = document.createElement("img");
        hologramImageI.id = `hologram-image-${i}`;
        hologramImageI.classList.add("hologram-image");
        if(i != 1) {
            hologramImageI.classList.add("hidden");
        }
        hologramImageI.src = `resources/img/compressedpng/holo${i}-min.png`;
        document.querySelector(".about-left").appendChild(hologramImageI);
    }
}