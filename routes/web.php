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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/example', function () {
//     return view('home'); // Memanggil file view 'example.blade.php'
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/division', [App\Http\Controllers\HomeController::class, 'show'])->name('division');
Route::get('/division', [App\Http\Controllers\HomeController::class, 'show'])->name('division');
