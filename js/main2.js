//dropdown
function toggleshow() {
    var y = document.getElementById("options2");
    var z = document.getElementById("menulogo");
    z.src = "images/close.png";

    if (y.style.display === "none") {
        y.style.display = "block";
        z.src = "images/close.png";
    }
    else {
        y.style.display = "none";
        z.src = "images/hamburger.png";
    }
}
function viewform() {
    document.getElementById("regform").style.display = "block";
    document.getElementById("process").style.display = "none";
}
//functioning
window.addEventListener("popstate", handelBack);
function ShowSE(ID) {
    var elem = "SE-" + ID;
    document.getElementById("AE").style.display = "none";
    document.getElementById("foot").style.display = "none";
    document.getElementById(elem).style.display = "block";
    window.history.pushState({ id: 1 }, null, "?q=1234&u=beware");
}
function handelBack() {
    document.getElementById("foot").style.display = "flex";
    document.getElementById("AE").style.display = "block";
    var x = document.getElementsByClassName("Single-event");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = 'none';
    }
}