document.addEventListener('DOMContentLoaded', function() {
    var closeButton = document.querySelector('.alert .close');
    if (closeButton) {
        closeButton.addEventListener('click', function() {
            var alertElement = this.closest('.alert');
            if (alertElement) {
                alertElement.remove();
            }
        });
    }

    tinymce.init({
        selector: '.text',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        relative_urls: false,
        file_picker_callback: elFinderBrowser,
        language: 'uk',
    });

    function elFinderBrowser(callback, value, meta) {
        tinymce.activeEditor.windowManager.openUrl({
            title: 'File Manager',
            url: '/elfinder/tinymce5',
            /**
             * On message will be triggered by the child window
             *
             * @param dialogApi
             * @param details
             * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
             */
            onMessage: function(dialogApi, details) {
                if (details.mceAction === 'fileSelected') {
                    const file = details.data.file;

                    // Make file info
                    const info = file.name;

                    // Provide file and text for the link dialog
                    if (meta.filetype === 'file') {
                        callback(file.url, {
                            text: info,
                            title: info
                        });
                    }

                    // Provide image and alt text for the image dialog
                    if (meta.filetype === 'image') {
                        callback(file.url, {
                            alt: info
                        });
                    }

                    // Provide alternative source and posted for the media dialog
                    if (meta.filetype === 'media') {
                        callback(file.url);
                    }

                    dialogApi.close();
                }
            }
        });
    }

     // Функція для перевірки кількості доданих форм зображень та приховування кнопки "Додати зображення", якщо досягнуто максимальної кількості
    function checkImageFormCount() {
        var currentImages = $('.image-container .form-group').length; // Отримання поточної кількості форм зображень
        if (currentImages >= maxImages) {
            $('.add-more').hide(); // Приховування кнопки "Додати зображення", якщо досягнуто максимальної кількості
        } else {
            $('.add-more').show(); // Показ кнопки "Додати зображення", якщо не досягнуто максимальної кількості
        }
    } 

    // Визначення максимальної кількості зображень
    var maxImages = 6;

    // Перевірка кількості доданих зображень при завантаженні сторінки
    checkImageFormCount();

     /* Додавання форми для завантаження зображення */
     
    $('.add-more').click(function() {
        if ($('.image-container .form-group').length >= maxImages) {
            alert('Максимальна кількість зображень досягнута');
            return;
        }

        var imageIndex = $('.image-container .form-group').length + 1;

        var html = '<div class="form-group">' +
            '<label for="img_' + imageIndex + '">Картинка ' + imageIndex + '</label>' +
            '<img src="" alt="" class="img-uploaded_' + imageIndex + '"><br>' +
            '<input type="text" class="form-control" id="img_' + imageIndex + '" name="img[]" value="" readonly>' +
            '<span class="invalid-feedback" role="alert" style="display: none;"></span>' +
            '<div class="butons_img">' +
            '<button type="button" class="btn btn-sm btn-outline-success btn-lg popup_selector" data-inputid="img_' + imageIndex + '">Виберіть зображення</button>' +
            '<button type="button" class="btn btn-sm btn-outline-danger delete-image-btn" data-index="' + imageIndex + '">Видалити</button>' +
            '</div>' +
            '</div>';
        $('.image-container').append(html);

        // Перевірка кількості доданих форм та приховування кнопки "Додати зображення", якщо досягнуто максимальної кількості
        checkImageFormCount();
    });


    /* Валідація на відправку форми */

    $('form').submit(function(event) {
        var invalid = false;
    
        // Перевірка чи знаходимось ми на сторінці створення або редагування новини
        var newsPage = $(this).data('news-page');
    
        // Якщо ми на сторінці створення або редагування новини, виконуємо перевірку орієнтації зображення
        if (newsPage === 'create' || newsPage === 'edit') {
            $('[class^="img-uploaded_"]').each(function() {
                var img = $(this)[0]; // Отримання DOM-елементу зображення
                if (img.naturalWidth < img.naturalHeight) {
                    $(this).addClass('is-invalid');
                    $(this).siblings('.form-control').addClass('is-invalid');
                    $(this).siblings('.invalid-feedback').text('Картинка має бути альбомної орієнтації').show();
                    invalid = true;
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).siblings('.form-control').removeClass('is-invalid');
                    $(this).siblings('.invalid-feedback').hide();
                }
            });
        }
    
        // Якщо є помилки валідації, зупиняємо відправку форми
        if (invalid) {
            event.preventDefault();
        }
    });
    


    /* Відкриття elfinder через popup */

    $(document).on('click', '.popup_selector', function(event) {
        event.preventDefault();
        var updateID = $(this).attr('data-inputid'); // ID кнопки, на яку натиснули
        var elfinderUrl = '/elfinder/popup/';

        // Запуск модального вікна з elfinder всередині
        var triggerUrl = elfinderUrl + updateID;
        $.colorbox({
            href: triggerUrl,
            fastIframe: true,
            iframe: true,
            width: '70%',
            height: '80%',
            // Після закриття модального вікна оновлюємо зображення
            onClosed: function() {
                var filePath = $('#' + updateID).val(); // Отримуємо шлях до вибраного файлу
                var imageElementId = updateID + '-image'; // Припустимо, що ви створюєте елемент зображення з ідентифікатором updateID-image
                var index = updateID.split('_')[1]; // Отримайте індекс з ID поля
                processSelectedFile(filePath, updateID, imageElementId, index); // Викликаємо функцію для оновлення зображення
            }
        });
    });


    /* Видалення картинки в новині */

    $(document).on('click', '.delete-image-btn', function(event) {
        var index = $(this).attr('data-index'); // Отримуємо індекс картинки, яку потрібно видалити
        $(this).closest('.form-group').remove(); // Видаляємо відповідний блок зображення

        // Перевірка кількості доданих форм та приховування кнопки "Додати зображення", якщо досягнуто максимальної кількості
        checkImageFormCount();
    });


    /* Виділення активної вкладки бокового меню */

    $(".nav-treeview .nav-link, .nav-link").each(function() {
        var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        var link = this.href;
        if (link == location2) {
            $(this).addClass('active');
            $(this).parent().parent().parent().addClass('menu-is-opening menu-open');

        }
    });


    /* Підтвердження видлення елементу списку */

    $('.delete-btn').click(function() {
        var res = confirm('Підтвердити видалення?');
        if (!res) {
            return false;
        }
    }); 
    
});
