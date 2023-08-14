@extends('admin.layouts.master')

@section('title', 'List Of Users')

@section('main-content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Of Users</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if($user->count() > 0)
            @foreach($user as $rs)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $rs->name }}</td>
                    <td class="align-middle">{{ $rs->email }}</td>
                    <td class="align-middle">{{ $rs->tel }}</td>
                    <td class="align-middle">{{ $rs->check_in }}</td>
                    <td class="align-middle">{{ $rs->check_out }}</td>
                    @if( $rs->status == 'active')
                        <td class="align-middle"><span class="badge badge-success">Active</span></td>
                    @else
                        <td class="align-middle"><span class="badge badge-danger">Inactive</span></td>
                    @endif
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('users.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('users.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('users.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Product not found</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
