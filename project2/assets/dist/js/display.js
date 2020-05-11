function triggerClick(e) {
    document.querySelector('#profileImage').click();
}

function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}

function triggerClick1(e) {
    document.querySelector('#editImage').click();
}

function displayImage1(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector('#editDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}