@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
    
                        <div class="form-group row">
                            <label for="primer_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Primer nombre') }}</label>

                            <div class="col-md-6">
                                <input id="primer_nombre" type="text" class="form-control{{ $errors->has('primer_nombre') ? ' is-invalid' : '' }}" name="primer_nombre" value="{{ old('primer_nombre') }}" required autofocus>

                                @if ($errors->has('primer_nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('primer_nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="segundo_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Segundo nombre') }}</label>

                            <div class="col-md-6">
                                <input id="segundo_nombre" type="text" class="form-control{{ $errors->has('segundo_nombre') ? ' is-invalid' : '' }}" name="segundo_nombre" value="{{ old('segundo_nombre') }}" required autofocus>

                                @if ($errors->has('segundo_nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('segundo_nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="primer_apellido" class="col-md-4 col-form-label text-md-right">{{ __('Primer apellido') }}</label>

                            <div class="col-md-6">
                                <input id="primer_apellido" type="text" class="form-control{{ $errors->has('primer_apellido') ? ' is-invalid' : '' }}" name="primer_apellido" value="{{ old('primer_apellido') }}" required autofocus>

                                @if ($errors->has('primer_apellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('primer_apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="segundo_apellido" class="col-md-4 col-form-label text-md-right">{{ __('Segundo apellido') }}</label>

                            <div class="col-md-6">
                                <input id="segundo_apellido" type="text" class="form-control{{ $errors->has('segundo_apellido') ? ' is-invalid' : '' }}" name="segundo_apellido" value="{{ old('segundo_apellido') }}" required autofocus>

                                @if ($errors->has('segundo_apellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('segundo_apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date" class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required autofocus>

                                @if ($errors->has('fecha_nacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="edad" class="col-md-4 col-form-label text-md-right">{{ __('Edad') }}</label>

                            <div class="col-md-6">
                                <input id="edad" type="number" class="form-control{{ $errors->has('edad') ? ' is-invalid' : '' }}" name="edad" value="{{ old('edad') }}" required autofocus>

                                @if ($errors->has('edad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('edad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ciudad_residencia" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad residencia') }}</label>

                            <div class="col-md-6">
                                <input id="ciudad_residencia" type="text" class="form-control{{ $errors->has('ciudad_residencia') ? ' is-invalid' : '' }}" name="ciudad_residencia" value="{{ old('ciudad_residencia') }}" required autofocus>

                                @if ($errors->has('ciudad_residencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ciudad_residencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="calle_residencia" class="col-md-4 col-form-label text-md-right">{{ __('Calle residencia') }}</label>

                            <div class="col-md-6">
                                <input id="calle_residencia" type="text" class="form-control{{ $errors->has('calle_residencia') ? ' is-invalid' : '' }}" name="calle_residencia" value="{{ old('calle_residencia') }}" required autofocus>

                                @if ($errors->has('calle_residencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('calle_residencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label for="pais_residencia" class="col-md-4 col-form-label text-md-right">{{ __('Pais residencia') }}</label>

                            <div class="col-md-6">
                                <input id="pais_residencia" type="text" class="form-control{{ $errors->has('pais_residencia') ? ' is-invalid' : '' }}" name="pais_residencia" value="{{ old('pais_residencia') }}" required autofocus>

                                @if ($errors->has('pais_residencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pais_residencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero_celular" class="col-md-4 col-form-label text-md-right">{{ __('Número celular') }}</label>

                            <div class="col-md-6">
                                <input id="numero_celular" type="text" class="form-control{{ $errors->has('numero_celular') ? ' is-invalid' : '' }}" name="numero_celular" value="{{ old('numero_celular') }}" required autofocus>

                                @if ($errors->has('numero_celular'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numero_celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo_documento" class="col-md-4 col-form-label text-md-right">{{ __('Tipo documento') }}</label>

                            <div class="col-md-6">
                                <input id="tipo_documento" type="number" class="form-control{{ $errors->has('tipo_documento') ? ' is-invalid' : '' }}" name="tipo_documento" value="{{ old('tipo_documento') }}" required autofocus>

                                @if ($errors->has('tipo_documento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo_documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo_pago" class="col-md-4 col-form-label text-md-right">{{ __('Tipo pago') }}</label>

                            <div class="col-md-6">
                                <input id="tipo_pago" type="number" class="form-control{{ $errors->has('tipo_pago') ? ' is-invalid' : '' }}" name="tipo_pago" value="{{ old('tipo_pago') }}" required autofocus>

                                @if ($errors->has('tipo_pago'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo_pago') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <input id="estado" type="number" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" value="{{ old('estado') }}" required autofocus>

                                @if ($errors->has('estado'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
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
