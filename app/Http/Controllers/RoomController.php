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

        return view('admin.rooms.index', compact('room'))
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
        return view('admin.rooms.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string|required',
            'description'=>'string|nullable',
            'type_house'=>'string|required',
            'is_featured'=>'sometimes|in:1',
            'status'=>'required|in:active,inactive',
            'price'=>'required|numeric',
        ]);

        $data=$request->all();

        $data['is_featured']=$request->input('is_featured',0);

        $status=Room::create($data);
        if($status){
            request()->session()->flash('success','Room Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('rooms.index');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
/*    public function store(Request $request)
    {
        //
        $request -> validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif;svg|max:2048',
            'type',
            'prix' => 'required',
            'is_enable'
        ]);

        $input = $request->all();


        if($image = $request->file('image')){
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";

        }
//
        Room::create($input);

        return redirect()->route('admin.rooms.index')
            ->with('success','Room created successfully');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Room $room)
    {
        //
        return view('admin.rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        //
        $room = Room::findOrFail($id);

        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $product=Room::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required',
            'description'=>'string|nullable',
            'image'=>'string|required',
            'is_featured'=>'sometimes|in:1',
            'status'=>'required|in:active,inactive',
            'price'=>'required|numeric',
            'type_house'=>'required',
        ]);

        $data=$request->all();
        $data['is_featured']=$request->input('is_featured',0);

        $status=$product->fill($data)->save();
        if($status){
            request()->session()->flash('success','Product Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('rooms.index');
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
        return redirect()->route('rooms.index')
            ->with('success','Room deleted successfully');
    }
}
