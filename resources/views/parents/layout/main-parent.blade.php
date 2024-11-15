<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/css/output.css')
    <title>@yield('title')</title>
</head>
<body>
        @include('parents/layout/header-parent')
        <div class="flex lg:gap-14">
            @include('parents/layout/sidebar-parent')
            <div class="w-full flex flex-col md:-ml-72 transition-all ease-in-out" id="main-content">
                @yield('content')
            </div>
        </div>
        @include('parents/layout/footer-parent')
        <script>
            if (document.getElementById('alertMessage')) {
                setTimeout(function() {
                    document.getElementById('alertMessage').style.display = 'none';
                }, 5000); // Menghilangkan pesan setelah 5 detik (5000 milidetik)
            }
        </script>
        <script src="{{ asset('script.js') }}"></script>
</body>
</html>