<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
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


Route::get('/', [PetController::class, 'index'])->name('pet.index');
Route::post('/byStatus', [PetController::class, 'petByStatus'])->name('pet.byStatus');
Route::get('/create', [PetController::class, 'create'])->name('pet.create');
Route::get('/{id}/edit', [PetController::class, 'edit'])->name('pet.edit');
Route::get('/{id}', [PetController::class, 'show'])->name('pet.show');
Route::post('/', [PetController::class, 'store'])->name('pet.store');
Route::put('/{id}', [PetController::class, 'update'])->name('pet.update');
Route::delete('/{id}', [PetController::class, 'destroy'])->name('pet.destroy');
