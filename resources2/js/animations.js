/**************
 INITIALIZATION
 **************/

 // Node lists
const portfolioItems = document.querySelectorAll(".portfolio-grid-item");
const skillsetList = document.querySelectorAll(".bar-inner");


// Nodes
let aboutPanelLeft = document.querySelector(".about-panel-left");
let aboutPanelRight = document.querySelector(".about-panel-right");
let currentAboutPanel = "center";


/****************
 GLOBAL VARIABLES
 ****************/



/**********
 ANIMATIONS
 **********/

 /********** DARK MODE **********/
const r = document.querySelector(':root');
const lightSwitchContainer = document.getElementById('light-switch-container');
const lightSwitch = document.getElementById('light-switch');
let darkMode = false;

function swapColours(colourVars, values) {
    for(let i in colourVars) {
        r.style.setProperty(colourVars[i], values[i]);
    }
}

function toggleColourMode() {
    if(!darkMode) {
        swapColours(['--text', '--header_bg', '--portfolio_bg', '--contact_bg'], ['#fff', '#1d1d1d', '#181818', '#343434']);
        lightSwitch.src = "resources2/img/pixel art/lightbulb_off.png";
        darkMode = true;
    }
    else {
        swapColours(['--text', '--header_bg', '--portfolio_bg', '--contact_bg'], ['#111', '#eee', '#d1d6d6', '#d1d6d6']);
        lightSwitch.src = "resources2/img/pixel art/lightbulb_on.png";
        darkMode = false;
    }
}

lightSwitch.addEventListener('click', ()=>{
    toggleColourMode();
})


/********** NAV DISPLAY TOGGLE HAMBURGER BUTTON **********/

let nav = document.getElementById("nav");
let burger = document.getElementById("nav-toggle-display")
burger.addEventListener("click", ()=>{
    burger.classList.toggle('burger-x');
    if (burger.classList.contains('burger-x')) {
        nav.classList.remove('nav-hidden');
    }
    else {
        nav.classList.add('nav-hidden');
    }
})


/********** SCROLLING TO SECTIONS **********/

/* NAV BUTTONS */
$('.jq--scroll-to-header').click(function() {
    $('html, body').animate({scrollTop: $('.jq--section-header').offset().top}, 1000);
});

$('.jq--scroll-to-about').click(function() {
    $('html, body').animate({scrollTop: $('.jq--section-about').offset().top}, 1000);
});

$('.jq--scroll-to-portfolio').click(function() {
    $('html, body').animate({scrollTop: $('.jq--section-portfolio').offset().top}, 1500);
});

$('.jq--scroll-to-contact').click(function() {
    $('html, body').animate({scrollTop: $('.jq--section-contact').offset().top}, 1500);
});

/* SCROLL-DOWN BUTTON */
const scrollButtonContainer = document.getElementById('scroll-button-container');

setTimeout(()=>{scrollButtonContainer.style = "bottom: 0"}, 1000);

const sectionsArray = [
    document.getElementById('section-header'),
    document.getElementById('section-portfolio'),
    document.getElementById('section-about'),
    document.getElementById('section-contact'),
    document.getElementById('section-footer')
]


const scrollButton = document.getElementById('scroll-button');
const footer = document.getElementById('section-footer');
try {
    scrollButton.addEventListener('click', ()=>{
        // If we are at the bottom of the page (footer bottom distance from vp height = vp height), back to top:
        if(sectionsArray[4].getBoundingClientRect().bottom < window.innerHeight + 10) {
            $('html, body').animate({scrollTop: $('.jq--section-header').offset().top}, 1000);
        }
        // Check each section and if it is in correct range, scroll to next section:
        else {
            console.log('down one');
            for(let i=0; i<sectionsArray.length; i++) {
                let sectionToViewport = sectionsArray[i].getBoundingClientRect();
                if( sectionToViewport.y < 200 && sectionToViewport.bottom > 200) {
                    $('html, body').animate({scrollTop: $(sectionsArray[i+1]).offset().top}, 1000);
                }
            }
        }
    })

}
catch(err) {
    console.log("ERROR: Element of class scroll-down does not exist");
    console.log(err.message);
}

const scrollArrowDown = document.querySelector('.scroll-arrow-down');
const scrollArrowUp = document.querySelector('.scroll-arrow-up');
// Change arrow direction to up when user hits bottom of page:
document.addEventListener('scroll', (e) => {
  if (scrollButton.getBoundingClientRect().bottom >= footer.getBoundingClientRect().bottom - 10) {
    scrollArrowUp.style.transform = "translateY(0px)";
    scrollArrowDown.style.transform = "translateY(-120px)";
  }
  else {
    scrollArrowUp.style.transform = "translateY(120px)";
    scrollArrowDown.style.transform = "translateY(0px)";  }
});

/********** HOME-PAGE INITIAL ANIMATION **********/
const nameWrapper = document.querySelector(".name-wrapper");
const nameArray = ["", "J", "A", "M", "E", "S", "", "Y", "O", "A", "N", "N", "O", "U"];
const webDeveloper = document.querySelector(".web-developer");

 /* Animates name letters in one-by-one */
 /* This function is too specific, must be merged with waypointSkillset logic */
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


/********** ABOUT-SECTION CHANGING PANELS **********/

let panelsOpen = false;
function togglePanel(panel, direction) {
    panel.style.transform = "translateX("+direction+"%)";
}
function toggleAboutPanels() {
    let left=-100, right=100, center=0;
    if(panelsOpen) {
        togglePanel(aboutPanelLeft, center);
        setTimeout(togglePanel, 200, aboutPanelRight, center);
        panelsOpen = false;
    }
    else {
        togglePanel(aboutPanelLeft, left);
        setTimeout(togglePanel, 200, aboutPanelRight, right);
        panelsOpen = true;
    }
}


/******************
ON-SCROLL WAYPOINT ANIMATIONS
*******************/

 // Animations when reaching About section
 let waypointAbout = new Waypoint({
    element: document.querySelector('.waypoint-about'),
    handler: function() {
        document.querySelector('.about-right').style.opacity = "100";
        toggleAboutPanels();
    },
    offset: 600
})

// Animations when reaching Contact section
let waypointContact = new Waypoint({
    element: document.querySelector('.waypoint-contact'),
    handler: ()=>{
        toggleAboutPanels();
    },
    offset: 200
})

