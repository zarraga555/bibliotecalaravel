<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.1.1/gsap.min.js"></script>
    <style>
@import url("https://fonts.googleapis.com/css?family=Nunito+Sans");

:root {
	--blue: #0e0620;
	--white: #fff;
	--green: #2ccf6d;
}

html,
body {
	height: 100%;
}

body {
	display: flex;
	align-items: center;
	justify-content: center;
	font-family: "Nunito Sans";
	color: var(--blue);
	font-size: 1em;
}

.btn{
    padding: 8px 50px;
}
h1 {
	font-size: 7.5em;
	margin: 15px 0px;
	font-weight: bold;
}

h2 {
	font-weight: bold;
}


@media screen and (max-width: 768px) {
	body {
		display: block;
	}

	.container {
		margin-top: 70px;
		margin-bottom: 70px;
	}
}
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    {{-- <img class="img-fluid mb-4" src="/img/book-404.svg" alt=""> --}}
                    <img class="img-fluid mb-4" src="/img/torn2.svg" alt="">
                    {{-- <img class="img-fluid mb-4" src="/img/paper.svg" alt=""> --}}
                </div>
                <div class="col-md-6 align-self-center">
                    <h1>404</h1>
                    <h2>Ooops Estas perdido.</h2>
                    <p>La página que busca no existe.
                        Cómo llegaste aquí es un misterio. Pero puedes hacer clic en el botón de abajo
                        para volver a la página de inicio.
                    </p>
                    <a href="{{route('home')}}" class="btn btn-primary">Inicio</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
