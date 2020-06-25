@extends('layaout')

@section('content')
<div class="container">
    {{-- <div class="row shadow">
        {{-- <div class="col-md-6 align-self-center">
            <img class="img-fluid mb-4" src="/img/login2.svg" alt="">
        </div> --}}

    {{-- </div> --}}
    <div class="col-md-5 align-self-center py-5 px-5 shadow" style="margin: auto;">
        <div class="py-3 text-center">
            <h1 class="title">Iniciar Sesion</h1>
        </div>
        <div class="py-3">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">



                        <label for="email"
                        class=" col-form-label text-md-right">Correo Electronico</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="form-group">


                        <label for="password"
                        class="col-form-label text-md-right">Contraseña</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                </div>

                <div class="form-group mb-0 offset-md-3">

                        <button type="submit" class="btn btn-primary" style="padding: 8px 50px;" >
                            Iniciar Sesion
                        </button>
                        {{--
                        @if(Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                        </a>
                        @endif--}}
                </div>
            </form>
        </div>
    </div>

    @endsection
