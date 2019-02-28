<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        app = {
            url : {
                api : {
                    upload: '{{ $url['api']['upload'] }}',
                    bindTag: '{{ $url['api']['bindTag'] }}'
                },
                web : {
                    upload: '{{ $url['web']['upload'] }}',
                    image: '{{ $url['web']['image'] }}',
                    tags: '{{ $url['web']['tag'] }}'
                }
            },
            currentAction: '{{ $currentAction }}'
        };
    </script>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" />
    <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">My library</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $url['web']['upload'] }}">{{ __('view.upload') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $url['web']['tag'] }}">{{ __('view.tags') }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="body">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>