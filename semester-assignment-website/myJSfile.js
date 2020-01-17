
document.getElementById("flowers").addEventListener("mouseenter", changePic);
document.getElementById("flowers").addEventListener("mouseleave", returnPic);

function changePic() {
    document.getElementById("flowers").src = "largeAppleblooms.jpg";
}

function returnPic() {
    document.getElementById("flowers").src = "appletreeinapril.jpg";
}