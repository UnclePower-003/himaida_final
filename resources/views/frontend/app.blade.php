<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="{{ asset('js/wind.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#B11E38",
                        primaryL: "#E25B71",
                        primaryD: "#8E182D",
                        primaryText: "#B11E38",
                        secondaryText: "#C9962A",
                        thirdText: "#0E733D",

                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                        inter: ['Inter', 'sans-serif'],
                    }
                },
            },
        };
    </script>
    @stack('style')
    <title>Himaida</title>
</head>

<body>
    <nav>@include('frontend.components.navbar')</nav>
    <main>@yield('content')</main>
    <footer>@include('frontend.components.footer')</footer>
    @stack('script')
</body>

</html>
