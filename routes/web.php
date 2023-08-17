<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoomController;
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

Route::get('/',  [FrontendController::class, 'home'])->name('home');

Route::post('logout', [FrontendController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name("login");
Route::post('/login', [LoginController::class, 'store'])->middleware(['guest']);

Route::get('/register', [RegisterController::class, 'index'])->middleware(['guest'])
    ->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['prefix' => '/user'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('user');
    Route::get('/order', [HomeController::class, 'orderIndex'])->name('user.order.index');
    Route::get('/order/show/{id}', [HomeController::class, 'orderShow'])->name('user.order.show');
    Route::delete('/order/delete/{id}', [HomeController::class, 'userOrderDelete'])->name('user.order.delete');
    Route::get('/profile', [HomeController::class, 'profile'])->name('user-profile');
    Route::post('/profile/{id}', [HomeController::class, 'profileUpdate'])->name('user-profile-update');
});

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('users', UserController::class)->middleware(['auth']);
    Route::get('/clients', [UserController::class, 'indexClient'])->name('clients.index')->middleware(['auth']);
    Route::get('/clients/create', [UserController::class, 'clientCreate'])->name('clients.create')->middleware(['auth']);
    Route::get('/clients/store', [UserController::class, 'clientStore'])->name('clients.store')->middleware(['auth']);
    Route::resource('rooms', RoomController::class)->middleware(['auth']);
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin-profile');
    Route::post('/profile/{id}', [AdminController::class, 'profileUpdate'])->name('profile-update');
    Route::resource('/order', OrderController::class);
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('setting/update', [AdminController::class, 'settingsUpdate'])->name('settings.update');
});



