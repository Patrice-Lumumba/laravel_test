@extends('layouts.app')

@php
    $title_page= "S'enregistrer'";
@endphp

@section('content')
    <div class="col-sm-8 col-lg-5">
        <div class="row justify-content-center mb-3">
            <a class="navbar-brand">
            </a>
        </div>
        <div class="card shadow zindex-100 mb-0">
            <div class="card-body px-md-5 py-5">
                <div class="mb-5">
                    <h6 class="h3">Créer un compte</h6>
                    <p class="text-muted mb-0">Vous n'avez pas de compte? Créez votre compte, cela prend moins d'une minute.</p>
                </div>
                <span class="clearfix"></span>
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text">{{ session('error') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif

                <form method="POST" action="{{route('register')}}" role="form">
                    @csrf

                    <div class="form-group required">
                        <label class="form-control-label">Nom</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>

                            <input id="firstname" type="text" placeholder="Nom" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" >
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="form-control-label">Prénom</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>

                            <input id="username" type="text" placeholder="Prénom" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" >
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="form-control-label">Adresse email</label>
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
                            </div>
                            <input id="email" type="email" placeholder="Adresse email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group required">
                        <label class="form-control-label">Mot de passe</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input id="password"  type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div id="password-strength"></div>
                    </div>
                    <div class="form-group required">
                        <label class="form-control-label">Confirnamtion du mot de passe</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirnamtion du mot de passe" name="password_confirmation"  autocomplete="new-password">
                        </div>
                    </div>

                    @error('password_confirmation')
                    <span class="error invalid-password_confirmation text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <!--<div class="row my-4">
                        <div class="col-12">
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                <label class="custom-control-label" for="customCheckRegister">
                                    <span class="text-muted"> {{ _('Remember me') }} {{--<a href="#!">{{ _('Privacy Policy') }}</a>--}}</span>
                                </label>
                            </div>
                        </div>
                    </div>-->

                    <div class="mt-4">
                        <button id="btn_register_firma" type="submit" class="btn btn-sm btn-primary btn-icon btn-sign">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div class="card-footer px-md-5"><small style="font-size: 17px !important;">Vous avez déjà un compte?</small>
                <a href="{{ route('login') }}" class="small font-weight-bold" style="font-size: 17px !important;">Se connecter</a>
            </div>
        </div>
    </div>
@endsection
