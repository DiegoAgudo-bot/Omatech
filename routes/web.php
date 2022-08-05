<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\UsersController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::name('users::')->prefix('users')->group(function() {
        Route::get('/list', [UsersController::class, 'index'])->name('list');
        Route::post('/list', [UsersController::class, 'index'])->name('list');

        Route::get('/edit/{user}', [UsersController::class, 'edit'])->name('edit');
        Route::post('/update/{user}', [UsersController::class, 'update'])->name('update');

        Route::get('/create', [UsersController::class, 'create'])->name('create');
        Route::post('/store', [UsersController::class, 'store'])->name('store');

        Route::get('/delete/{user}', [UsersController::class, 'destroy'])->name('delete');

    });
});
require __DIR__.'/auth.php';
