<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('images/logo-10-1-15.png') }}" />
    <title>Dashboard | @yield('title')</title>

    <script src='{{ asset('js/wind.js') }}'></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#B11E38",
                        primaryL:"#E25B71",
                        primaryD:"#8E182D",
                        primaryText: "#B11E38",
                        secondaryText: "#C9962A",
                        thirdText: "#0E733D",

                    },
                },
            },
        };
    </script>

    {{-- <script src="{{ asset('css/admin/admin.js') }}" defer></script> --}}

    {{-- @vite(['public/css/admin/app.css', 'public/css/admin/app.js']) --}}
    @stack('styles')


</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex h-screen overflow-hidden">

        @include('admin.components.sidebar')

        <div class="flex-1 flex flex-col relative overflow-hidden">

            @include('admin.components.navbar')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @yield('content')

            </main>
        </div>
    </div>
    @stack('scripts')
    @stack('script')

</body>

</html>
