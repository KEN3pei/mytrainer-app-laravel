require('./bootstrap');


let hiddenPopup = document.getElementById('hidden-section');
let closeIcon = document.getElementById('close-icon');
let createMenu = document.getElementById('create-menu');

createMenu.onclick = () => {
    hiddenPopup.style.display = "block";
};
closeIcon.onclick = () => {
    hiddenPopup.style.display = "block";
}

