<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Biblioteca')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    {{-- <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="/js/jquery.js "></script>
    <style>
        .circle{
            top: 85%;
            left: 50%;
            position: absolute;
            transform: translate(-50%,-50%);
            width: 100px;
            height: 100px;
            text-align: center;
            line-height: 110px;
            font-size: 50px;
            overflow: hidden;
        }
        .circle .far{
            color: #007bff!important;
            margin: 0;
            padding: 0;
            animation: animate 1.5s linear infinite;
        }
        @keyframes animate{
            0%{
                transform: translateY(-50px);
                text-shadow: 0 50px 0 #007bff;
            }
            20%{
                transform: translateY(0px);
                text-shadow: 0 10px 0 #007bff;
            }
            40%{
                transform: translateY(0px);
                text-shadow: 0 -10px 0 #007bff;
            }
            60%{
                transform: translateY(0px);
                text-shadow: 0 0px 0 #007bff;
            }
            100%{
                transform: translateY(100px);
                text-shadow: 0 50px 0 #007bff;
            }
        }
        .row2{
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: -85px;
        }
        a {
            text-decoration: none;
        }
        .btnT{
                height: 38px;
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

        @media (min-width: 769px) {
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
            .divTable{
                position: relative;
                margin: auto;
            }
            #list-Autor{
                position: relative;
                margin: auto;
            }
            table{
                position: relative;
                margin: auto;
                width: 100%;
                display: inline-table;
            }
            .table-responsive {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                display: inline-table;
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

        </main>
        @yield('content')
        <footer class="bg-white text-center text-black-50 py-3 shadow">
            {{ config('app.name') }} | Copyright @ {{ date('Y') }}
        </footer>
    </div>

</body>

</html>
