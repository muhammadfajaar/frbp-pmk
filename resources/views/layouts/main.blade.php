<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS Online-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap CSS Offline-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Blog CSS --}}
    <link rel="stylesheet" href="/css/blog.css">
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="/css/custom.css">
    {{-- Favicon --}}
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    {{-- Title --}}
    <title>FRPB | {{ $title }}</title>
    <style>
        
    </style>
</head>

<body>

    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>

    <footer class="blog-footer" style="background-color:#393E46">
        <p><span class="fs-2" style="color: #EEEEEE">Blog template built for</span> <a
                href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
    <!-- Skrip JavaScript Bootstrap Online -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Skrip JavaScript Bootstrap Offline -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
