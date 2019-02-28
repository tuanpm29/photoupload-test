(function($){
    var tagManager = {
        init: function() {
            var tagEditorElement = $('input#tags');

            if(tagEditorElement.length === 0) return false;

            var initialTags = tagEditorElement.attr('data-initial-tags').split(',');
            tagEditorElement.tagEditor({initialTags: initialTags});

            tagManager.saveButtonListen();
        },
        bind: function(imageId, tags) {
            $.ajax({
                url: app.url.api.bindTag,
                type: 'POST',
                data: {image_id: imageId, tags: tags},
                success: function(data) {
                    app.notify('Save successfully');
                },
                error: function(error) {
                    app.notify(error.responseJSON.message);
                }
            });
        },
        saveButtonListen: function() {
            $('#save-tags-btn').click(function(){
                var imageId = $('#main-image').attr('data-string-id');
                var tags = $('input#tags').tagEditor('getTags')[0].tags;

                tagManager.bind(imageId, tags);
            })
        }
    };

    $(function(){
        tagManager.init();
    });
})(jQuery);