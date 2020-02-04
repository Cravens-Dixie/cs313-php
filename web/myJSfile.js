
document.getElementById("flowers").addEventListener("mouseenter", changePic);
document.getElementById("flowers").addEventListener("mouseleave", returnPic);

function changePic() {
    document.getElementById("flowers").src = "/mainPg_images/largeAppleblooms.jpg";
}

function returnPic() {
    document.getElementById("flowers").src = "/mainPg_images/appletreeinapril.jpg";
}