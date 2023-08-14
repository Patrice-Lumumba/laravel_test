@extends('admin.layouts.master')

@section('title', 'Edit Users')

@section('main-content')
    <h1 class="mb-0">Edit Product</h1>
    <hr/>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}">
            </div>

            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="tel" class="form-control" value="{{ $user->tel }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Arrival</label>
                <input type="datetime-local" class="form-control" name="chek_in"
                       placeholder="Arrival">{{ $user->chek_in }}
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Departure</label>
                <input type="datetime-local" name="chek_out" class="form-control" placeholder="Departure"
                       value="{{ $user->chek_out }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-control">
                    @foreach(\App\Helpers\Helper::getRole() as $r => $rol)
                        <option value="{{ $r }}"
                                @if (old('role', $user->role) == $r)
                                    selected="selected"
                            @endif
                        >
                            {{ $rol }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
