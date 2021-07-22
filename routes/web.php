<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\ShowProfile;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/{id}', [\App\Http\Controllers\UserController::class, 'show']);

Route::get('/profile', ShowProfile::class);

Route::apiResource('photos', \App\Http\Controllers\PhotoController::class);

Route::get('/say/{id}', [\App\Http\Controllers\HelloController::class, 'say'])->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('showBlade/{id}', function ($id) {
    return view("bladelearn.child", ['sex' => $id]);
});

//Route::get('/create', [\App\Http\Controllers\GoodsController::class, 'create']);
Route::resource('goods', '\App\Http\Controllers\GoodsController');

Route::get('mail', [\App\Http\Controllers\MailController::class, 'send']);
