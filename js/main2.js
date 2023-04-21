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

//form
function viewform() {//not in use..
    document.getElementById("regform").style.display = "block";
    document.getElementById("process").style.display = "none";
}
function validate(){
    let x = document.forms["trystform"]["email"].value;
    prompt("Please confirm the email address is following:\nAfter successful registration you will be reciving Confirmation on this email ", x);
    return true;
}
let fileInput = document.getElementById("file-input");
let fileResult = document.getElementById("file-result");
let fileSubmit = document.getElementById("file-submit");
fileInput.addEventListener("change", function () {
    if (fileInput.files.length > 0) {
      const fileSize = fileInput.files.item(0).size;
      const fileKb = fileSize / 1024;
      if (fileKb > 100) {
        fileResult.innerHTML = "Please select a file less than 100KB.";
        fileSubmit.disabled = true;
      } else {
        fileResult.innerHTML = "Success, your file is " + fileKb.toFixed(1) + "Kb.";
        fileSubmit.disabled = false;
      }
    }
  });


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