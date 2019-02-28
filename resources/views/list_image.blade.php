@extends('layouts.main')

@section('content')
<div class="header">
    <h2>{{ __('view.image_for', ['tag' => $tagName]) }}</h2>
</div>
<div class="row" id="image-container">
    <div class="column image-column"></div>
    <div class="column image-column"></div>
    <div class="column image-column"></div>
    <div class="column image-column"></div>
</div>
<script>
(function($){
    var imageDisplayer = {
        imagesData: {},
        currentColumnIndex: 0,
        init: function() {
            imageDisplayer.imagesData = imagesData;
        },
        append: function(images) {
            var columns = $('#image-container div.image-column');
            if(columns === 0) return false;

            $.each(images, function(key, image) {
                var newLink = $('<a />').attr('href', app.getImageURL(image.imageStringId));
                var newImg = $('<img />').attr('src', image.imageURL);
                newLink.append(newImg);

                columns.eq(imageDisplayer.currentColumnIndex).append(newLink);
                imageDisplayer.currentColumnIndex = (imageDisplayer.currentColumnIndex + 1) % columns.length;
            })
        }
    };

    $(function(){
        var imagesData = {!! json_encode($images) !!};

        imageDisplayer.append(imagesData);
    });
})(jQuery);
</script>
@endsection