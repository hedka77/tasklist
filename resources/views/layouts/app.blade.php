<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 12 Tasks List App</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">

        {{--@vite(['resources/css/styles.css'])--}}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>


        <style type="text/tailwindcss">
            .btn {
                @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/90 hover:bg-slate-50 text-gray-600
            }

            .link {
                @apply font-medium text-gray-700 underline decoration-pink-500
            }

            label {
                @apply block uppercase text-slate-300 mb-2
            }

            input, textarea {
                @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-300 leading-tight focus:outline-none
            }

            .error {
                @apply text-red-500 text-sm
            }
        </style>


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

    <body class="container mx-auto mt-10 mb-10 max-w-lg">
        <h2 class="text-2xl mb-4">@yield('title')</h2>
        <div x-data="{ flash:true }">
            <div>
                @if(session()->has('success'))
                    <div x-show="flash"
                         class="relative mb-10 rounded text-lg text-green-700 border-2 border-green-400 bg-green-100 px-4 py-3"
                         role="alert">
                        <strong class="font-bold">Success!</strong>
                        <div>
                            {{ session('success') }}
                        </div>

                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor"
                                 class="h-6 w-6 cursor-pointer"
                                 @click="flash = false">
                                <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </body>
</html>
