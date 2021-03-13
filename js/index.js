function openForm() {
document.getElementById("popupForm").style.display = "block";
document.getElementsByClassName("overlay")[0].style.display = "block";
bg = document.getElementsByClassName("main-content")[0].style;
}

function closeForm() {
document.getElementById("popupForm").style.display = "none";
document.getElementsByClassName("overlay")[0].style.display = "none";
}
