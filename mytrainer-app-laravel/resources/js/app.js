require('./bootstrap');

let hiddenSection = document.getElementById('hidden-section');
let closeIcon = document.getElementById('close-icon');
let createMenu = document.getElementById('create-menu');
if(createMenu !== null){
    createMenu.onclick = () => {
        hiddenSection.style.display = "block";
    };
    closeIcon.onclick = () => {
        hiddenSection.style.display = "none";
    }
}

let threePoints = Array.from(document.getElementsByClassName('three-point'));
threePoints.forEach(threePoint => {
    // threePoint.addEventListener('mouseover', () => {
    //     threePoint.firstElementChild.style.display = "inline-block";
    // }, false);
    // threePoint.addEventListener('mouseleave', () => {
    //     setTimeout(() => {
    //         threePoint.firstElementChild.style.display = "none";
    //     }, 2000);
    // }, false);
    threePoint.onclick = () => {
        threePoint.firstElementChild.style.display = "inline-block";
        setTimeout(() => {
            threePoint.firstElementChild.style.display = "none";
        }, 5000)
    }
});

let deletePopups = Array.from(document.getElementsByClassName('delete-popup'));
deletePopups.forEach(deletePopup => {
    deletePopup.onclick = () => {
        console.log(deletePopup.id);
        axios.post('/top/menulist/delete', {
            list_id: deletePopup.id,
          })
          .then(function (response) {
                console.log(response.data);
                // location.reload();
          })
    }
});


let addItemButtons = Array.from(document.getElementsByClassName('addItemButton'));
addItemButtons.forEach(addItemButton => {
    addItemButton.onclick = () => {
        //FIXME 連続クリックに対応できていない
        axios.post('/top/menulist', {
            item_id: addItemButton.id,
            list_name: location.search.slice(10)
          })
          .then(function (response) {
                // console.log(response.data);
                location.reload();
          })
    }
});

