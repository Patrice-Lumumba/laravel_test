@extends('layouts.master')

@section('title', 'Show Product')

@section('contents')
    <h1 class="mb-0">Edit Room</h1>
    <hr />
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
            <img src="/image/{{$room->image}}" alt="Room Picture" width="350px">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <label class="form-label">Type: </label>
{{--            <input type="text" name="type" class="form-control" placeholder="Title" value="{{ $room->type }}">--}}
            <select class="form-control" name="type">
                <option value="{{ $room->type }}" name="type" selected></option>
                <option value="climatisé">Climatisé</option>
            </select>
        </div>

        <div class="col mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="prix" class="form-control" placeholder="Price" value="{{ $room->prix }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Availability</label>
            <input type="text" name="is_enable" class="form-control" placeholder="" value="{{ $room->is_enable }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $room->created_at }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $room->updated_at }}">
        </div>
    </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection
