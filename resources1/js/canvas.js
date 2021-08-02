// HELPER FUNCTIONS
function randomIntFromRange(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min)
}
function randomFromSelection(selection) {
    return selection[Math.floor(Math.random() * selection.length)];
}

// VARIABLES
const canvas = document.getElementById('canvas-header');
const c = canvas.getContext('2d');


//Do I need these if I'm using CSS? Do I need CSS if I'm using these?
canvas.width = innerWidth;
canvas.height = innerHeight

const mouse = {
    x: innerWidth / 2,
    y: innerWidth / 2
};

const colors = ['#001010', '#007070', '#00F0F0']

// EVENT LISTENERS
addEventListener('mousemove', (event) => {
    mouse.x = event.clientX
    mouse.y = event.clientY
    console.log(canvas.height / 2 - mouse.y);
})

addEventListener('resize', () => {
    canvas.width = innerWidth;
    canvas.height = innerHeight;
    init();
})

// OBJECTS
class Particle {
    constructor(x, y, radius, color) {
      this.originX = x;
      this.originY = y;
      this.x = x
      this.y = y
      this.rotation = Math.random();
      //this.radius = radius; //For circle or line, but must make dimensions work this way
      this.dimensions = Math.floor(Math.random()*40 + 10);
      this.color = color
      this.radians = Math.random() * Math.PI * 2; // Circumference of circle
      this.baseVelocity = randomIntFromRange(1, 3) / 1000;
      this.velocity = 0.05; //Randomize this using the random func, add to the computed velocity
      this.distanceFromCenter = {
        x: randomIntFromRange(100, 550),
        y: randomIntFromRange(100, 550),
      };
    }

    draw() {
        c.beginPath();
        c.fillRect(this.x, this.y, this.dimensions, this.dimensions);
        c.fillStyle = this.color;
        c.closePath()
    }

    // Version to rotate the rect (not working properly)
    drawRotated() {
        let middle = this.dimensions / 2;
        c.save();
        c.beginPath();
        c.translate(this.x + this.middle, this.y + this.middle);
        c.rotate(this.rotation);
        c.rect(this.x, this.y, this.dimensions, this.dimensions);
        c.fillStyle = this.color;
        c.fill();
        c.restore();
    }

    update(){
        this.velocity = Math.abs((canvas.height / 2 - mouse.y)/30000);// + this.baseVelocity;
        // Circular Motion:
        // This will require heavy modification to account for mouse movement:
        if(mouse.y > canvas.height / 2) {
            this.radians += this.velocity;
        }
        else {
            this.radians -= this.velocity;
        }
        this.x = this.originX + Math.sin(this.radians) * this.distanceFromCenter.x;
        this.y = this.originY + Math.cos(this.radians) * this.distanceFromCenter.y;

        this.draw();
    }
}



// IMPLEMENTATION
console.log("Canvas loaded.");

let particles
function init() {
    particles = [];
    for (let i = 0; i < 100; i++) {
        const radius = (Math.random()*5) + 1;
        particles.push(new Particle(canvas.width, canvas.height/2+100, radius, randomFromSelection(colors)));
      }
}


// ANIMATION LOOP
function animate() {
    requestAnimationFrame(animate);
    // A) Full clear:
    c.clearRect(0, 0, canvas.width, canvas.height);

    // B) Opacity change (for trailing look):
    /*
    c.fillStyle = "rgba(29, 29, 29, 0.6";
    c.fillRect(0, 0, canvas.width, canvas.height)
    */
    particles.forEach(particle => {
        particle.update();
    })
}

init();
animate();