(function($){
    if(!app) { return false; }

    var photoUploader = {
        init: function() {
            this.uploaderEventListen();
            this.fileChangeEventListen();
        },

        uploaderEventListen: function() {
            $('#uploader').on('dragover', function(e){
                e.preventDefault();
                $(this).addClass('hover');

            }).on('dragend, drop', function(e){
                $(this).removeClass('hover');

            }).on('drop', function(e) {
                e.preventDefault();
                photoUploader.uploadFile(e.originalEvent.dataTransfer.files);

            }).on('click', function(e){
                $('#files').trigger('click');
            });
        },

        fileChangeEventListen: function() {
            $('#files').change(function(e){
                photoUploader.uploadFile(e.target.files);
            });
        },

        uploadFile: function(file) {
            if(file.length === 0) {
                app.error('No file selected');
                return false;
            }

            app.loading(true);

            var formData = new FormData();
            formData.append('file', file[0]);

            $.ajax({
                url: app.url.api.upload,
                type: 'POST',
                processData: false,
                contentType: false,
                dataType : 'json',
                data: formData,
                success: function(data) {
                    app.redirect(app.getImageURL(data.string_id));
                },
                error: function(error) {
                    app.loading(false);
                    app.notify(error.responseJSON.message);
                }
            });
        }
    };


    $(function() {
        photoUploader.init();
    });
})(jQuery);