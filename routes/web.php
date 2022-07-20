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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\Customer::class, 'index']);
Route::get('/add_customer', [App\Http\Controllers\Customer::class, 'tambah_customer']);
Route::post('/create_customer', [App\Http\Controllers\Customer::class, 'save_customer']);
Route::get('/edit_customer/{id}', [App\Http\Controllers\Customer::class, 'ubah_customer']);
Route::post('/update_customer', [App\Http\Controllers\Customer::class, 'update_customer']);
Route::get('/hapus_customer/{id}', [App\Http\Controllers\Customer::class, 'delete_customer']);