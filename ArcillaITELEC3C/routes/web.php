<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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
    Route::post('/category/add', [CategoryController::class,'AddCat'])->name('add.category');
    Route::get('edit/{id}', [CategoryController::class,'EditCat']);
    Route::post('update/{id}', [CategoryController::class,'Update'])->name('update.category');
    Route::get('delete/{id}', [CategoryController::class,'DeleteCat']);


    // BRANDS
    Route::get('/brand', [BrandController ::class,'index'])->name('brand');
    Route::post('/brand/add', [BrandController::class,'AddBrand'])->name('add.brand');
    Route::get('/brand/edit/{id}', [BrandController::class,'EditBrand']);
    Route::post('/brand/update/{id}', [BrandController::class,'UpdateBrand']);
    Route::get('/brand/remove/{id}', [BrandController::class,'RemoveBrand']);
    Route::get('/brand/restore/{id}', [BrandController::class,'RestoreBrand']);
    Route::get('/brand/delete/{id}', [BrandController::class,'DeleteBrand']);



});