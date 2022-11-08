@extends('adminlte::auth.auth-page')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('auth_header', __('Iniciar Sesion'))

@section('auth_body')
    <form action="" method="post">
        @csrf
        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="" placeholder="" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>Error</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
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
            <div class="col-7">
                <div class="icheck-primary" title="">
                    <input type="checkbox" name="remember" id="remember">

                    <label for="remember">
                        {{ __('adminlte::adminlte.remember_me') }}
                    </label>
                </div>
            </div>

            <div class="col-5">
                <button type="button" class="btn btn-block" onclick="window.location='{{ url("") }}'">
                    <span class="fas fa-sign-in-alt"></span>
                    {{ __('adminlte::adminlte.sign_in') }}
                </button>
            </div>

            <div class="col-5">
                <button type="button" class="btn btn-block" onclick="window.location='{{ url("registrar") }}'">
                    <span class="fas fa-sign-in-alt"></span>No tengo una cuenta
                </button>
            </div>

          
        </div>

    </form>
@stop
