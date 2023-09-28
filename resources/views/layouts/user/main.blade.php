<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Required meta tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Mari Nugas</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        body{
            position:fixed;
            padding:0;
            margin:0;

            top:0;
            left:0;

            width: 100%;
            height: 100%;
            background:rgba(255,255,255,0.5);
        }
    </style>
</head>
<body class="overflow-y-hidden d-flex">
    {{-- CSRF HERE --}}

    {{-- Sidebar --}}
    <section id="sidebar">
        @include('partials.sidebar')
    </section>

    {{-- Content --}}
    <section id="main" style="width: -webkit-fill-available; padding: 1rem!important">
        <div class="container-fluid px-0">
            @yield('content')
        </div>
    </section>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>