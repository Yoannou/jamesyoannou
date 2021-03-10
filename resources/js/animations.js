/********** GLOBAL VARIABLES **********/

const nameWrapper = document.querySelector(".name-wrapper");
const nameArray = ["", "J", "A", "M", "E", "S", "", "Y", "O", "A", "N", "N", "O", "U"];
const webDeveloper = document.querySelector(".web-developer");

/********** MAIN PROGRAM **********/

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
let timer = setInterval(addLetter, 100);


/********** FUNCTIONS **********/

/* Used to animate name letters in one-by-one */
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