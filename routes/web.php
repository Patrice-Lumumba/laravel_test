<?php

    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\Auth\RegisterController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\UserController;
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

    Route::get('/login', [LoginController::class, 'index'])->name("login");
    Route::post('/login', [LoginController::class, 'store'])->middleware(['guest']);

    Route::get('/register', [RegisterController::class, 'index'])->middleware(['guest'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });


    Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

