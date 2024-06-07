$(document).on('click','.popup_selector',function (event) {
    event.preventDefault();
    var updateID = $(this).attr('data-inputid'); // Btn id clicked
    var elfinderUrl = '/elfinder/popup/';

    // trigger the reveal modal with elfinder inside
    var triggerUrl = elfinderUrl + updateID;
    $.colorbox({
        href: triggerUrl,
        fastIframe: true,
        iframe: true,
        width: '70%',
        height: '80%'
    });

});

/* // function to update the file selected by elfinder
function processSelectedFile(filePath, requestingField, imageElementId, index) {
    $('#' + requestingField).val(filePath).trigger('change'); // Оновлення значення поля запиту
    $('.img-uploaded_' + index).attr('src', '/' + filePath).trigger('change'); // Оновлення відображення вибраного файлу
    $('.video').attr('src', '/' + filePath).trigger('change'); // Оновлення відображення вибраного файлу
    $('.model').attr('src', '/' + filePath).trigger('change'); // Оновлення відображення вибраного файлу
    $('.document').attr('src', '/' + filePath).trigger('change'); // Оновлення відображення вибраного файлу
} */

// function to update the file selected by elfinder
function processSelectedFile(filePath, requestingField, imageElementId, index) {
    $('#' + requestingField).val(filePath).trigger('change'); // Оновлення значення поля запиту
    if(requestingField == 'img_' + index) {
        $('.img-uploaded_' + index).attr('src', '/' + filePath).trigger('change'); // Оновлення відображення вибраного файлу
    } else if (requestingField == 'model') {
        $('.model').attr('src', '/' + filePath).trigger('change'); // Оновлення відображення вибраного файлу
    } else if (requestingField == 'video') {
        $('.video').attr('src', '/' + filePath).trigger('change'); // Оновлення відображення вибраного файлу
    } else if (requestingField == 'document') {
        $('.document').attr('src', '/' + filePath).trigger('change'); // Оновлення відображення вибраного файлу
    }
}



