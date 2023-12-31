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
            $user = User::orderBy('created_at', 'DESC')->get();

            return view('users.index', compact('user'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function create()
        {
            //
            return view('users.add');
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
            User::create($request->all());

            return redirect()->route('users')->with('success', 'User added successfully');
            $user = new User();

//            $user->tel = $request['tel'];
            $user->email =  $request['email'];
            $user->name =  $request['name'];

//             $user->save();

            if ($user) {
                return redirect()->route('users')->with('success', 'User added successfully');
            }

        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function show($id)
        {
            //
            $user = User::findOrFail($id);

            return view('users.show', compact('user'));
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
            $user = User::findOrFail($id);

            return view('users.edit', compact('user'));
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
            //
            $users = User::findOrFail($id);

            $users->update($request->all());

            return redirect()->route('users')->with('success', 'User updated successfully');
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
            $users = User::findOrFail($id);

            $users->delete();

            return redirect()->route('users')->with('success', 'User deleted successfully');
        }
    }
