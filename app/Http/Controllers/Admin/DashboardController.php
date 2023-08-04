<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\User;


    class DashboardController extends Controller
    {

        public function __construct()
        {
            $this->middleware('auth');
        }

        function index()
        {
            $users = User::with('roles')->where('name', 'admin')->get();
            return view('dashboard', compact('users'));
        }


    }
