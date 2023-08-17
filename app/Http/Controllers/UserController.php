<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $users = User::orderBy('created_at', 'DESC')->get();

        return view('admin.users.index', compact('users'));
    }

    public function indexClient()
    {
        $clients = User::orderBy('created_at', 'DESC')->get();

        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('admin.users.add');
    }

    public function clientCreate()
    {
        //
        return view('admin.clients.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mat_client' => 'string|required',
            'sexe' => 'string|required',
            'city' => 'string|required',
            'gender' => 'string|required',
            'date_naiss' => 'string|required',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User added successfully');
        $user = new User();

//            $user->tel = $request['tel'];
        $user->email = $request['email'];
        $user->name = $request['name'];

//             $user->save();

        if ($user) {
            return redirect()->route('users.index')->with('success', 'User added successfully');
        }

    }

    public function clientStore(Request $request)
    {
        //
        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User added successfully');
        $user = new User();

//            $user->tel = $request['tel'];
        $user->email = $request['email'];
        $user->name = $request['name'];

//             $user->save();

        if ($user) {
            return redirect()->route('users.index')->with('success', 'User added successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        $users = User::findOrFail($id);

        $users->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $users = User::findOrFail($id);

        $users->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
