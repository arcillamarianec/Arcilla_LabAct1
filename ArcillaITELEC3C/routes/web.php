<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route::get('/category', function () {
    //     return view('category');
    // })->name('category');
    
    Route::get('/category', [CategoryController ::class,'index'])->name('category');
    Route::get('/category/create', CategoryController::class.'@create')->name('category.create');
    Route::post('/category', CategoryController::class.'@store')->name('category.store');

});