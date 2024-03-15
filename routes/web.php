<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Logical;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/tambah-data', [HomeController::class, 'create']);
Route::post('/store-data', [HomeController::class, 'store'])->name('storeData');
Route::get('/edit-data/{id}', [HomeController::class, 'edit'])->name('editData');
Route::post('/update-data/{id}', [HomeController::class, 'update'])->name('updateData');
Route::delete('/delete-data/{id}', [HomeController::class, 'destroy'])->name('deleteData');

Route::get('/logical-test', [Logical::class, 'viewtest1']);
Route::post('/run-test', [Logical::class, 'test1'])->name('test1');
