<?php

use App\Http\Controllers\App\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenancyRegisterController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tenancy-register', [TenancyRegisterController::class, 'create'])->name('tenancy-register.create');
Route::post('/tenancy-register', [TenancyRegisterController::class, 'store'])->name('tenancy-register.store');

require __DIR__.'/auth.php';
