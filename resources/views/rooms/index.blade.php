@extends ('layouts.master')

@section('title', 'List Of Rooms')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">

        <h1 class="mb-0">List Of Room</h1>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">Add Room</a>
    </div>
    <hr />
    @if(Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Type</th>
            <th>Price</th>
            <th>Availability</th>
            <th>Action</th>
        </tr>

        @foreach($room as $rm)
            <tr>
                <td>{{$rm->id}}</td>
                <td><img src="/image/{{$rm->image}}" alt="image" width="100px" height="100px"></td>
                <td>{{$rm->type}}</td>
                <td>{{$rm->prix}}</td>
                @if($rm->is_enable > 0)
                    <td><span class="badge badge-success">Available</span></td>
                @else
                    <td><span class="badge badge-danger">Unavailable</span></td>
                @endif
                <td>
                <td>
                    <form action="{{route('rooms.destroy', $rm->id)}}" method="post">
                        <a href="{{route('rooms.show', $rm->id)}}" class="btn btn-info">Show</a>
                        <a href="{{route('rooms.edit', $rm->id)}}" class="btn btn-primary">Edit</a>

                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

    {!! $room->links() !!}

@endsection
