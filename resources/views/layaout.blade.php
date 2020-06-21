<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="/js/jquery.js "></script>
    <style>
        a {
            text-decoration: none;
        }

        .active a {
            color: red;
            text-decoration: none;
        }

        small {
            color: red;
            padding: 5px;

        }

        .btnTable {
            padding: 2.5px 2.5px;
        }

        /* table{
            font-size: 0.82rem;
            margin: auto;
        } */
        table {
            position: relative;
            margin: auto;
            width: 100%;
            /*left:-15%*/
            ;
        }

        .wrapper {
            display: flex;
            position: relative;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .h-screen {
            height: 100vh;
        }

        @media (min-width: 768px) {
            .navbar{
            height: 80px;
            }
        .btn-block {
            display: inline-block;
            width: auto;
            margin-top: 0rem;
        }

        .btn-block+.btn-block {
            margin-top: 0rem;
        }
        }
    </style>
</head>

<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <header>
            @include('partials.nav')
        </header>
        <main>
            @yield('formulario')
            @yield('content')
        </main>
        <footer class="bg-white text-center text-black-50 py-3 shadow">
            {{ config('app.name') }} | Copyright @ {{ date('Y') }}
        </footer>
    </div>

</body>

</html>
