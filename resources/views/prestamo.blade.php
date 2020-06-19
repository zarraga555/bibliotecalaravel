@extends('layaout')

@section('title')
Prestamo de Libros
@endsection
@section('formulario')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <h1 class="display-4 text-primary">Solicita un prestamo de un libro para tus estudios</h1>
            <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, corrupti alias! Dolorem iste quis ex cumque maiores, sequi natus quidem! Tempora quod eligendi officia libero doloremque cum, porro vitae ex!</p>
            <a class="btn btn-lg btn-block btn-primary" href="{{ route('prestamo.create') }}">Reserva tu libro</a>
            <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('libros.index') }}">Buscar libro</a>
        </div>
        <div class="col 12 col-lg-6">
            <img class="img-fluid mb-4" src="/img/studying.svg" alt="">
        </div>
    </div>
</div>
@endsection
