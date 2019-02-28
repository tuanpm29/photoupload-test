@extends('layouts.main')

@section('content')
<div id="tag-list-header">
    <h2>{{ __('view.tags') }}</h2>
</div>
<div id="list-tag">
@foreach($tags as $tag)
    <a href="{{ route('web.image.listByTag', $tag) }}" class="badge badge-primary">{{ $tag }}</a>
@endforeach
</div>
@endsection