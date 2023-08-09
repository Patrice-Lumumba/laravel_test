@extends('layouts.master')

@section('title', 'Add Room')

@section('contents')
    <h1 class="mb-0">Add User</h1>
    <hr />

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Error !!</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="file" name="image" class="form-control-file" placeholder="Choose you file">
            </div>
            <div class="col">
                <label class="form-label">Type: </label>
                <select class="form-control" name="type">
                    <option value=""></option>
                    <option value="">Ventilé</option>
                    <option value="">Climatisé</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="prix" class="form-control" placeholder="Price of the room">
            </div>
            <div class="col">
                <input type="checkbox" class="form-check-input" name="is_enable">
                <label class="form-check-label">Chambre disponible</label>
            </div>
        </div>


        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
