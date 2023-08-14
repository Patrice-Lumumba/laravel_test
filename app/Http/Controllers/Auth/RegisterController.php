<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
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
            'firstname.required' => 'Nom est obligatoire',
            'lastname.required' => 'Prénom est obligatoire',
            'email.required' => 'Email is required',
            'password.required' => 'Mot de passe est obligatoire',
            'password.confirmed.required' => 'Password and Confirm Password is required',
        ];
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => ['required', 'confirmed'],
            'password.confirmed' => 'Les deux mots de passes ne coincident pas',

        ], $messages);


        $user = new User();

        $user->password = $request['password'];
        $user->email =  $request['email'];
        $user->firstname =  $request['firstname'];
        $user->lastname =  $request['lastname'];


//            $user->getRoleNames();
//
        $new_user = $user->save();

        if ($new_user) {
            return redirect()->route('login')->with('success', __('Enregitrement réussit'));
        }


//
    }
}
