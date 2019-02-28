@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-sm" id="image-holder">
        <img data-string-id="{{ $imageStringId  }}" id="main-image" src="{{ $imageURL }}" />
    </div>
    <div class="col-sm" id="image-info">
        <div class="form-group">
            <label>Tags</label>
            <input type="text" class="tag-editor" id="tags" data-initial-tags="{{ $dataTags }}" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="save-tags-btn">Save</button>
        </div>
    </div>
</div>
@endsection