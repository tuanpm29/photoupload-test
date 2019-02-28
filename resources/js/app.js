require('./bootstrap');
require('jquery-tageditor/jquery.caret.min');
require('jquery-tageditor/jquery.tag-editor.min');
require('gasparesganga-jquery-loading-overlay');

(function(){
    if(!app.url) return false;

    app.getImageURL = function(stringId) {
        return app.url.web.image.replace(/:id/, '')+stringId
    };
    app.notify = function(errorMessage) {
        alert(errorMessage);
    }
    app.redirect = function(url) {
        window.location.href = url;
    }
    app.loading = function(show) {
        if(show) {
            $.LoadingOverlay('show');
        } else {
            $.LoadingOverlay('hide');
        }
    }
})();


require('./uploader');
require('./imageViewer');