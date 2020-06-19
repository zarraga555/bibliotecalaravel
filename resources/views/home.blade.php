@extends('layaout')

@section('title')
    Inicio

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <h1 class="display-4 text-primary">Biblioteca</h1>
            <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, corrupti alias! Dolorem iste quis ex cumque maiores, sequi natus quidem! Tempora quod eligendi officia libero doloremque cum, porro vitae ex!</p>
            <a class="btn btn-lg btn-block btn-primary" href="{{ route('libro') }}">Libros Disponibles</a>
            <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('prestamo') }}">Reserva tu libro</a>
        </div>
        <div class="col 12 col-lg-6">
            <img class="img-fluid mb-4" src="/img/biblioteca.svg" alt="">
        </div>
    </div>
</div>
@endsection
