@extends('admin.layouts.master')

@section('title', 'Create User')

@section('main-content')
    <h2 class="mb-0">Ajouter un client</h2>
    <hr/>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <h5>Informations générales</h5>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-form-label">Matricule</label>
                            <input type="number" class="form-control" name="mat_client" value="0">
                            @error('v')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">Sexe</label>
                            <select name="sexe" id="sexe" class="form-control">
                                <option value="">Selectionner</option>
                                <option value='M'>Masculin</option>
                                <option value='F'>Féminin</option>
                            </select>
                            @error('sexe')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-form-label">Nom</label>
                            <input type="text" class="form-control" name="firstname">
                            @error('firstname')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">Civilité</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Selectionner</option>
                                <option value='Mr'>Monsieur</option>
                                <option value='Mme'>Madame</option>
                            </select>
                            @error('gender')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-form-label">Date de naissance</label>
                            <input type="date" class="form-control" name="date_naiss">
                            @error('date_naiss')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-8">
                            <label class="col-form-label">Lieu de naissance</label>
                            <input type="text" class="form-control" name="lieu_naiss">
                        </div>
                    </div>
                </div>

                <h5 class="mt-5">Informations supplémentaires</h5>

                <div class="form-group">
                    <label class="col-form-label">N° Piece d'identité</label>
                    <input type="text" class="form-control" name="numb_identite"
                           placeholder="Numéro de piece d'identité">
                </div>

                <div class="form-group">
                    <label class="col-form-label">N° Passport</label>
                    <input type="text" class="form-control" name="numb_passport" placeholder="Numéro de passport">
                </div>

                <div class="form-group">
                    <label class="col-form-label">Nom du père</label>
                    <input type="text" class="form-control" name="name_father" placeholder="Numéro du père">
                </div>

                <div class="form-group">
                    <label class="col-form-label">Nom de la mère</label>
                    <input type="text" class="form-control" name="name_mother" placeholder="Numéro de la mère">
                </div>

                <div class="form-group">
                    <label class="col-form-label">Société</label>
                    <input type="text" class="form-control" name="company" placeholder="Société">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-form-label">Type de carte bancaire</label>
                            <select name="type_carb_bank" id="type_carb_bank" class="form-control">
                                <option value="">Selectionner</option>
                                <option value='mastercard'>Mastercard</option>
                                <option value='visa'>Visa</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">N°</label>
                            <input type="text" class="form-control" name="numb_card_bank"
                                   placeholder="Numéro de la carte bancaire">
                        </div>
                    </div>

                </div>


            </div>

            <div class="col-md-5">
                <h5>Coordonnées</h5>
                <div class="form-group">
                    <label class="col-form-label">Adresse</label>
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse">
                </div>

                <div class="form-group">
                    <label class="col-form-label">Ville</label>
                    <select name="city" id="city" class="form-control">
                        <option value="">Selectionner</option>
                        @foreach(\App\Helpers\Helper::getCity() as $key=>$t)
                            <option value='<?=$key?>'>{{$t}} </option>
                        @endforeach
                    </select>
                    @error('city')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="col-form-label">Téléphone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Téléphone">
                </div>

                <div class="form-group">
                    <label class="col-form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Adresse email">
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <button type="reset" class="btn btn-warning">Réinitialiser</button>
            <button class="btn btn-success" type="submit">Enregistrer</button>
        </div>
    </form>
@endsection
