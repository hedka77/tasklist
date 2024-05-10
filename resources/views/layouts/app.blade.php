<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 11 Tasks List App</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
        {{--@vite(['resources/css/styles.css'])--}}
        @yield('styles')
    </head>

    @section('styles')
        <style>
            .success-message {
                color     : #0c4f00;
                font-size : 1.5rem;
            }
        </style>
    @endsection

    <body>
        <h2>@yield('title')</h2>
        <div>
            @if(session()->has('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </div>
    </body>
</html>
