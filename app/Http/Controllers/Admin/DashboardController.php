<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;


    class DashboardController extends Controller
    {

        public function __construct()
        {
            $this->middleware('auth');
        }

        function index()
        {
            return view('dashboard');
        }


    }
