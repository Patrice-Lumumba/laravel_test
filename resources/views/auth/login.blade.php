@include('admin.layouts.head')


<div class="container">
    <div class="container-fluid container-application">
        <div class="main-content position-relative">
            <div class="page-content">
                <div class="min-vh-100 py-5 d-flex align-items-center">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-sm-8 col-lg-5">
                                <div class="row justify-content-center mb-3">
                                    <a class="navbar-brand">
                                    </a>
                                </div>
                                <div class="card shadow zindex-100 mb-0">
                                    <div class="card-body px-md-5 py-5">
                                        <div class="mb-5">
                                            <h6 class="h4 text-center">Connectez-vous à votre compte</h6>
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

                                        @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <span class="alert-text">{{ session('success') }}</span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{route('login')}}" role="form">
                                            @csrf


                                            <div class="form-group required">
                                                <label class="form-control-label">Adresse Email</label>
                                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
                                                    </div>
                                                    <input id="email" type="email" placeholder="{{ __('E-Mail') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

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
                                                    <input id="password"  type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-4">
                                                <div class="col-12">
                                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                                        <label class="custom-control-label" for="customCheckRegister">
                                                            <span class="text-muted"> J'accepte les termes et conditions {{--<a href="#!">{{ _('Privacy Policy') }}</a>--}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="mt-4 text-center">
                                                <button id="btn_register_firma" type="submit" class="btn btn-sm btn-primary btn-icon btn-register">Se connecter</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer px-md-5"><small style="font-size: 17px !important;">Vous avez déjà un compte?</small>
                                        <a href="{{ route('register') }}" class="small font-weight-bold" style="font-size: 17px !important;">{{__('Enregistrer')}}</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

