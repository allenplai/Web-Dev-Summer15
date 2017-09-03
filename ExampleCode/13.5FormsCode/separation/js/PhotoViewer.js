window.onload = main;

function main() {
    document.getElementById("displayPhotoButton").onclick = displayPhoto; // DO NOT PUT ()   
}

function displayPhoto() {
    var photoToDisplay = document.getElementById("photoName").value;
    var imageElement = document.getElementById("myImage");
    imageElement.setAttribute("src", photoToDisplay);
}