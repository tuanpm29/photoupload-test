@extends('layouts.main')

@section('content')
<div id="uploader">
    <div id="plus">+</div>
</div>
<input type="file" style="display: none" id="files" />
<div class="drop-file-text">
    <span id="status-text">Drop your photo here</span>
</div>
@endsection