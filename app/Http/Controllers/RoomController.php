<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $room = Room::orderBy('created_at', 'DESC')->get();
        $room = Room::latest()->paginate(5);

        return view('rooms.index', compact('room'))
            ->with('i', (request()->input('page', 1) -1) * 5);
//        return view('rooms.index', compact('room'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('rooms.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request -> validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif;svg|max:2048',
            'type',
            'price' => 'required',
            'is_enable'
        ]);

//        if($request->has('is_enable')){
//
//        }else{
//            //Checkbox not checked
//        }

        $input = $request->all();
//
//        $room = Room::create($request);
//        $room->is_enable()->attach($request->input('is_enable'));

        if($image = $request->file('image')){
            $destinationPath = 'image/';
            $profileImage = date('Y-m-d') . "." .$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";

        }
//
        Room::create($input);

        return redirect()->route('room')
            ->with('success','Room created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Room $room)
    {
        //
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Room $room)
    {
        //
//        $room = Room::findOrFail($id);

        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Room $room)
    {
        //
        $request -> validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif;svg|max:2048',
            'type',
            'prix' => 'required',
            'is_enable'=>'',
        ]);

        $input = $request->all();

        if($image = $request->file('image')){
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";

        }else{
            unset($input['image']);
        }


//        $room = Room::findOrFail($id);

        $room->update($input);

        return redirect()->route('index')
            ->with('success', 'Room detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('room')
            ->with('success','Room deleted successfully');
    }
}
