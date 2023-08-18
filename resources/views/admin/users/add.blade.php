@extends('admin.layouts.master')

@section('title', 'Create User')

@section('main-content')
    <h4 class="mb-0">Add User</h4>
    <hr/>
    <form method="post" action="{{ route('users.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label class="col-form-label">Nom</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Entrer votre nom">
                    @error('firstname')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="col-form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Adresse email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label class="col-form-label">Téléphone</label>
                    <input type="text" class="form-control" name="tel" placeholder="Téléphone">
                    @error('tel')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="col-form-label">Arrival</label>
                    <input type="date" name="check_out" class="form-control" placeholder="Arrival">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label class="col-form-label">Departure</label>
                    <input type="date" name="check_in" class="form-control" placeholder="Arrival">
                </div>

                <div class="col-md-6">
                    <label for="role" class="col-form-label">Status</label>
                    <select name="role" class="form-control">
                        <option value="">-----Select Role-----</option>
                        <option value="admin">Admin</option>
                        <option value="user" selected>User</option>
                    </select>
                    @error('role')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <button class="btn btn-success" type="submit">Enregistrer</button>
        </div>
    </form>
@endsection
