/* INITIALIZE */
$(function(){
    $.scrollify({
        section: ".section",
        scrollSpeed: 1200,
        scrollbars: false,
        easing: "linear",
    });
});

/* GLOBAL VARIABLES */
const aboutLink = document.getElementById("about-link");
const portfolioLink = document.getElementById("portfolio-link");
const contactLink = document.getElementById("contact-link");
const scrollDown = document.getElementById("scroll-down-button");
scrollCount = 0;

/* NAV LINKS */
aboutLink.addEventListener('click', () => {
    $.scrollify.move("#About");
});
portfolioLink.addEventListener('click', () => {
    $.scrollify.move("#Portfolio");
});
contactLink.addEventListener('click', () => {
    $.scrollify.move("#Contact");
})

/* SCROLL DOWN BUTTON */
scrollDown.addEventListener('click', () => {
    $.scrollify.next();
})