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

// Route::get('/division', [App\Http\Controllers\DivisionController::class, 'index']);

Route::resource('employee', 'App\Http\Controllers\EmployeeListController');
Route::resource('division', 'App\Http\Controllers\DivisionController');
Route::resource('employee-list', 'App\Http\Controllers\UsersController');
Route::Resource('user',  'App\Http\controllers\EmployeeListController');
