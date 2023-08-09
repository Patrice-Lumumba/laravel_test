@extends('layouts.master')

@section('title', 'Show Product')

@section('contents')
    <h1 class="mb-0">Rooms Detail</h1>
    <hr />
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label class="form-label">Type: </label>
            <input type="text" name="type" class="form-control" placeholder="Title" value="{{ $room->type }}" readonly>
        </div>

        <div class="col mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $room->price }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Available</label>
            <input type="text" name="is_enable" class="form-control" placeholder="" value="{{ $room->is_enable }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Image</label>
            <img src="/image/{{$room->image}}" alt="Room Picture" width="100px">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $room->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $room->updated_at }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col-lg margin-tb">
            <div class="pull-left">
{{--                <h2> Show User</h2>--}}
            </div>
            <div class="pull-right">
                <a href="{{url('room')}}" class="btn btn-primary"> Back</a>
            </div>
        </div>
    </div>

@endsection
