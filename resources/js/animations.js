/********** GLOBAL VARIABLES **********/

const nameWrapper = document.querySelector(".name-wrapper");
const nameArray = ["", "J", "A", "M", "E", "S", "", "Y", "O", "A", "N", "N", "O", "U"];
const webDeveloper = document.querySelector(".web-developer");

const hologram = document.getElementById("hologram-image");
const hologramReference = document.getElementById("hologram-reference");
const aboutHeading = document.querySelector(".about-heading");
let viewportMarkers = new Array(4);
createViewportMarkers(viewportMarkers);


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

window.addEventListener('resize', () => { createViewportMarkers(viewportMarkers) });

document.addEventListener('scroll', () => {
    if (isInViewport(hologram)){
        let hologramPos = hologram.getBoundingClientRect();
        if (hologramPos.top > viewportMarkers[0]) {
            hologram.src = "resources/img/compressedpng/holo1(90 deg)-min.png";
            hologram.style = "opacity: 0.5;";
        }
        else if (hologramPos.top > viewportMarkers[1]){
            hologram.src = "resources/img/compressedpng/holo2(45 deg)-min.png";
            hologram.style = "opacity: 0.6;";
        }
        else if (hologramPos.bottom < viewportMarkers[3]){
            hologram.src = "resources/img/compressedpng/holo5(-90 deg)-min.png";
            hologram.style = "opacity: 0.5;";
        }
        else if (hologramPos.bottom < viewportMarkers[2]){
            hologram.src = "resources/img/compressedpng/holo4(-45 deg)-min.png";
            hologram.style = "opacity: 0.6;";
        }
        else {
            hologram.src = "resources/img/compressedpng/holo3(0 deg)-min.png";
            hologram.style = "opacity: 0.7;";
        }
    }
});


/********** FUNCTIONS **********/

/* Used to animate name letters in one-by-one */
function addLetter(){
    if (count === nameArray.length) {
        console.log("FUCKKKKK");
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

/* Returns an array of 4 markers representing fractions of the viewports height */
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