@extends('layouts.master')

@section('title', 'Edit Users')

@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}" >
            </div>

            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" >
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="tel" class="form-control" value="{{ $user->tel }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Arrival</label>
                <input type="datetime-local" class="form-control" name="chek_in" placeholder="Arrival" >{{ $user->chek_in }}
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Departure</label>
                <input type="datetime-local" name="chek_out" class="form-control" placeholder="Departure" value="{{ $user->chek_out }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Status</label>
                <input type="text" class="form-control" value="{{ $user->role }}" name="role">
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
