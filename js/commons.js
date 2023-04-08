
// //dropdown
// function toggleshow() {
//     var y = document.getElementById("options2");
//     var z = document.getElementById("menulogo");
//     z.src = "images/close.png";

//     if (y.style.display === "none") {
//         y.style.display = "block";
//         z.src = "images/close.png";
//     }
//     else {
//         y.style.display = "none";
//         z.src = "images/hamburger.png";
//     }
// }

// Animation

// const canvas = document.querySelector("canvas");
const canvas = document.getElementById("canvas");

const ctx = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const lines = [];
const numLines = 2500; /* decrease the number of lines */
const speed = 1.25;

class Line {
    constructor(x, y, length, direction) {
        this.x = x;
        this.y = y;
        this.length = length;
        this.direction = direction;
    }

    draw() {
        ctx.beginPath();
        ctx.moveTo(this.x, this.y);
        ctx.lineTo(this.x + this.length * Math.cos(this.direction), this.y + this.length * Math.sin(this.direction));
        ctx.strokeStyle = `rgba(25, 150, 255, ${this.length / 300})`;
        ctx.lineWidth = 2.5; /* decrease the width of the lines */
        ctx.stroke();
    }

    update() {
        this.direction += speed * 0.01;
        this.x += speed * Math.cos(this.direction);
        this.y += speed * Math.sin(this.direction);

        if (this.x > canvas.width + 100 || this.x < -100 || this.y > canvas.height + 100 || this.y < -100) {
            const index = lines.indexOf(this);
            lines.splice(index, 1);
        }
    }
}

function init() {
    for (let i = 0; i < numLines; i++) {
        const x = Math.random() * canvas.width;
        const y = Math.random() * canvas.height;
        const length = Math.random() * 100 + 45; /* increase the length of the lines */
        const direction = Math.random() * Math.PI * 2;
        const line = new Line(x, y, length, direction);
        lines.push(line);
    }
}

function animate() {
    requestAnimationFrame(animate);
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (let i = 0; i < lines.length; i++) {
        lines[i].draw();
        lines[i].update();
    }

    if (lines.length < numLines) {
        const x = Math.random() * canvas.width;
        const y = Math.random() * canvas.height;
        const length = Math.random() * 100 + 45;
        const direction = Math.random() * Math.PI * 2;
        const line = new Line(x, y, length, direction);
        lines.push(line);
    }
}

init();
animate();
