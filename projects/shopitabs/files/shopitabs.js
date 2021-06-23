/*
Author: James Yoannou
Feb 14, 2021

Shopitabs allows merchants to create dynamic tab sections on their shopify pages!
To use, copy and paste the following to the end of the <body> section of theme.liquid:
    <script src="{{ 'shopitabs.js' | asset_url }}"></script>


CURRENT ISSUES: 
- Must find a way to center the tab button images if they are different sizes.
- Does not assume mobile-first
*/

class Shopitab {
  
    constructor(section){
      this.width = section.querySelector('.shopitabs-list');
      this.buttonList = section.querySelectorAll('.shopitab-button');
      this.contentList = section.querySelectorAll('.shopitab-content');
      this.contentContainer = section.children[1];
      this.shopitabID = Math.floor(Math.random()*10000);
      this.init();
    }
    
    // Core functionallity. Links the tab buttons to their respective content, and refreshes based on tab selected.
    init() {
      for (let i = 0; i < this.buttonList.length; i++) {
        let button = this.buttonList[i];
        let content = this.contentList[i];
        button.id = "shopitab_button_"+i+"_"+this.shopitabID;
        button.addEventListener("click", () => {
          // Loop through all the buttons to reset them:
          for (let j = 0; j < this.buttonList.length; j++) {
            // Unclick all buttons
            if(this.buttonList[j] != button){
              this.buttonList[j].classList.remove("clicked");      
            }
            // Hide all tabs (the content):
            this.contentList[j].classList.add("hidden");
            // Deactive all tabs other than the one being clicked:
            if ("shopitab_button_"+j+"_"+this.shopitabID != button.id) {
              this.contentList[j].classList.remove("active");
            }
          }
          // Make this button "clicked":
          if(button.classList.contains("clicked")){
            button.classList.remove("clicked");
          }
          else {
            button.classList.add("clicked");
          }
          // If current tab is not active, activate it and make it visible:
          if(!content.classList.contains("active")){
            content.classList.add("active");
            content.classList.remove("hidden")
          }
          // If current tab is active, deactivate it and leave it hidden:
          else {
            content.classList.remove("active");
          }    
        });
      }
    }
    
    // Move each tab of content under its corresponding button (for mobile)
    spreadContent() {
      for(let i=0; i<this.buttonList.length; i++) {
        this.buttonList[i].after(this.contentList[i]);
      }
    }
    
    // Move all tabs of content under all buttons (for desktop)
    consolodateContent() {
      for(let i=0; i<this.buttonList.length; i++) {
        this.contentContainer.appendChild(this.contentList[i]);
      }
    }
}


let isMobile = false; // Should eventually make this mobile-first
let shopitabs = [];

// Find all tab sections created by the merchant:
for(let i of document.querySelectorAll('.shopitabs-container')) {
  // Create a new tab object and store it in shopitabs array:
  shopitabs.push(new Shopitab(i));
}


// Organization of shopitabs section is based on screensize:
function checkMobile(){
  if(window.innerWidth <= 749) {
  isMobile = true;
  for(let i of shopitabs) {
      i.width.style.gridTemplateColumns = '1fr';
      i.spreadContent();
    }
  }
  else {
    isMobile = false;
    for(let i of shopitabs) {
      i.width.style.gridTemplateColumns = `repeat(${i.buttonList.length}, 1fr)`;
      i.consolodateContent();
    }
  }
}

checkMobile();
window.addEventListener('resize', checkMobile);