$('#imageInput').on('change', function () {
    $('.progress-bar').width('0%');
});

$("#myForm button").click(function (event) {
    event.preventDefault()
    if ($(this).attr("value") == "imgLoadBtn") {

        var files = $('#imageInput').get(0).files,
            formData = new FormData();

        if (files.length === 0) {
            alert('Изображение не выбрано.');
            return false;
        }

        if (files.length > 1) {
            alert('Можно выбрать только 1 изображение');
            return false;
        }

        // Append the files to the formData.
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            formData.append('photos[]', file, file.name);
        }

        uploadFiles(formData);
    } else {
        $("#myForm").submit();
    }
});

function deleteCarFromAdminPage() {
    id = $(this).data("id");
    $.ajax({
        url: '/script.cgi',
        type: 'DELETE',
        success: function (result) {
            // Do something with the result
        }
    });
}

function uploadFiles(formData) {
    $.ajax({
        url: '/upload_photos',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        xhr: function () {
            var xhr = new XMLHttpRequest();

            xhr.upload.addEventListener('progress', function (event) {
                var progressBar = $('.progress-bar');

                if (event.lengthComputable) {
                    var percent = (event.loaded / event.total) * 100;
                    progressBar.width(percent + '%');

                    if (percent === 100) {
                        progressBar.removeClass('active');
                    }
                }
            });

            return xhr;
        }
    }).done(handleSuccess).fail(function (xhr, status) {
        alert(status);
    });
}

function handleSuccess(data) {
    if (data.length > 0) {
        var html = '';
        for (var i = 0; i < data.length; i++) {
            var img = data[i];

            if (img.status) {
                html += '<img class="card-img-top" src="/' + img.publicPath + '" alt="Card image cap">';
            } else {
                html += '<div class="col-xs-6 col-md-4"><a href="#" class="thumbnail">Invalid file type - ' + img.filename + '</a></div>';
            }
        }

        $('#itemImage').html(html);
    } else {
        alert('Ошибка. Изображение не загружено.')
    }
}