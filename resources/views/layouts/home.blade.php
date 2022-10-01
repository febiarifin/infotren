<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <!-- My Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" />
</head>

<body>
    <!-- Nav -->
    <nav class="navbar bg-white shadow sticky-top">
        <div class="container">
            <a class="navbar-brand text-primary fw-bolder" href="{{ route('home') }}">
                INFOTREN
            </a>
            <div class="float-right">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="50">
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <div class="mt-5 mb-5">
        <div class="d-flex justify-content-center mt-5">Copyright &copy ITQ Universitas Sains Al-Qur'an</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <!-- My Js -->
    @if ($active == 'terbaru')
        <script src="{{ asset('assets/js/index.js') }}"></script>
    @endif
</body>

</html>
