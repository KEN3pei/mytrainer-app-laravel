require('./bootstrap');

// let hiddenPopup = document.getElementById('hidden-section');
// let closeIcon = document.getElementById('close-icon');
// let createMenu = document.getElementById('create-menu');

// createMenu.onclick = () => {
//     hiddenPopup.style.display = "block";
// };
// closeIcon.onclick = () => {
//     hiddenPopup.style.display = "block";
// }

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

