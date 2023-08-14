@extends('admin.layouts.master')

@section('title', 'Create User')

@section('main-content')
    <h1 class="mb-0">Add User</h1>
    <hr />
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="tel" class="form-control" placeholder="Phone Number">
            </div>
            <div class="col">
                <input type="datetime-local" name="check_in" class="form-control" placeholder="Arrival">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="datetime-local" name="check_out" class="form-control" placeholder="Departure">
            </div>
            <div class="col">
                <input type="text" name="role" class="form-control" placeholder="Status">
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
