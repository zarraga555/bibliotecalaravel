@extends('layaout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registers.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if (auth()->check() && auth()->user()->rol == "Administrador")
                        <div class="form-group row">
                            <label for="bibliotecario_id" class="col-md-4 col-form-label text-md-right">Bibliotecario</label>
                            <select class="col-md-4 form-control" id="idBibliotecario" name="idBibliotecario" required>
                                <div class="invalid-feedback">
                                    Seleccione bibliotecario.
                                </div>
                                <option value="">Seleeciona una Opcion</option>
                                @foreach($bibliotecario as $bibliotecarioItem)
                                    <option value="{{ $bibliotecarioItem->id }}"> {{ $bibliotecarioItem->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="bibliotecario_id" class="col-md-4 col-form-label text-md-right">Persona</label>
                            <select class="col-md-4 form-control" id="idPersona" name="idPersona" required>
                                <div class="invalid-feedback">
                                    Seleccione Persona.
                                </div>
                                <option value="">Seleeciona una Opcion</option>
                                @foreach($persona as $personaItem)
                                    <option value="{{ $personaItem->id }}"> {{ $personaItem->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                    
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="turno" class="col-md-4 col-form-label text-md-right">Rol</label>
                            <select class="col-md-4 form-control @error('turno') is-invalid @enderror" name="rol" id="rol">
                                <option value="">Selecciona una opcion</option>
                                @if (auth()->check() && auth()->user()->rol == "Administrador")
                                <option value="Administrador">Administrador</option>
                                <option value="Asistente">Asistente</option>
                                @endif
                                <option value="Estudiante">Estudiante</option>
                            </select>
                            {!! $errors->first('turno', '<small>:message</small><br>') !!}
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
