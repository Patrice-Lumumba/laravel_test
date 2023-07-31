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

//    Route::controller(RegisterController::class)->group(function () {
//
//        Route::get('login', [LoginController::class, 'index'])->name("login");
//        Route::post('/login', [LoginController::class, 'index'])->middleware(['guest']);
//
//        Route::get('/register', [RegisterController::class, 'store'])->middleware(['guest'])
//            ->name('register');
//        Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
//
//        Route::get('/register/logout', 'logout')->middleware('auth')->name('logout');
//
//    });

    Route::get('login', [LoginController::class, 'index'])->name("login");
    Route::post('/login', [LoginController::class, 'store'])->middleware(['guest']);

    Route::get('/register', [RegisterController::class, 'index'])->middleware(['guest'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

    Route::get('dashboard', function (){
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\Controller::class, 'profile'])->name('profile');

//    Route::middleware('auth')->group(function () {
//        Route::get('dashboard', function (){
//            return view('dashboard');
//        })->name('dashboard');
//        Route::get('/profile', [App\Http\Controllers\Controller::class, 'profile'])->name('profile');
//    });
