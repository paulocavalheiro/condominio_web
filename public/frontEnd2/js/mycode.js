$(document).ready(function () {

    // datepicker
    $('[data-toggle="datepicker"]').datepicker({
        language: 'pt-BR',
        format: 'dd/mm/yyyy'
    });

    // editor textarea
    tinymce.init({
        selector: '#description',
        height: 400,
        plugins: ['image code','autolink','textcolor','colorpicker' ,'anchor' ,'link'],
        toolbar: 'undo redo | link image | code | forecolor backcolor | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | bullist numlist',
        //toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor',
        // enable title field in the Image dialog
        image_title: true,
        // enable automatic uploads of images represented by blob or data URIs
        automatic_uploads: true,
        // add custom filepicker only to Image dialog
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    // call the callback and populate the Title field with the file name
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        }
    });

});