<?php

    use App\Http\Controllers\Auth\RegisterController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\LoginController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('login', [LoginController::class, 'index'])->name("login");
    Route::get('/register', [RegisterController::class, 'index'])->middleware(['guest'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
