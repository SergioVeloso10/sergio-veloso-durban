@extends('adminlte::auth.auth-page')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('auth_header', __('Registrarse'))

@section('auth_body')
    <form action="" method="post">
        @csrf
        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="text" name="rut" class="form-control @error('rut') is-invalid @enderror"
                   value="" placeholder="Rut" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>

            @error('rut')
                <span class="invalid-feedback" role="alert">
                    <strong>Error</strong>
                </span>
            @enderror
        </div>
        {{-- razon social --}}
        <div class="input-group mb-3">
            <input type="text" name="razonsocial" class="form-control @error('razonsocial') is-invalid @enderror"
                   value="" placeholder="Razon Social" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>

            @error('razonsocial')
                <span class="invalid-feedback" role="alert">
                    <strong>Error</strong>
                </span>
            @enderror
        </div>

        {{-- giro --}}

        <div class="input-group mb-3">
            <input type="text" name="giro" class="form-control @error('giro') is-invalid @enderror"
                   value="" placeholder="Giro" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>

            @error('giro')
                <span class="invalid-feedback" role="alert">
                    <strong>Error</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="contrasena" class="form-control @error('contrasena') is-invalid @enderror"
                   placeholder="">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock "></span>
                </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>Error</strong>
                </span>
            @enderror
        </div>
        {{-- Login field --}}
        <div class="row">

            <div class="col-12">
                <button type=submit class="btn btn-block">
                    <span class="fas fa-sign-in-alt"></span>
                    <a href="home" class="btn">Registrar</a>
                </button>
            </div>
  
        </div>

    </form>
    <div class="col-5">
        <a class="text-light font-weight-bold text-decoration-none">Ya tengo una cuenta</a>
    </div>
@stop
