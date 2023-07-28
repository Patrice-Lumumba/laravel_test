<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;


    class RegisterController extends Controller
    {
        function index()
        {
            return view('auth/register');
        }

        public function store(Request $request)
        {
            $messages = [
                'username.required' => 'Username is required',
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
                'password_confirmation.required' => 'Password and Confirm Password is required',
//                'email.required' => 'Email is required',
            ];
            $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'password' => 'required|string|max:255',
                'password_confirmation' => 'required|string|max:255',

            ],$messages);
        }
    }
