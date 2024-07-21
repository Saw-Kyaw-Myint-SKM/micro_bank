<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransitionHistoryController;
use App\Http\Controllers\UsersController;
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
    return to_route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'checkrole:0'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/transition-history', [TransitionHistoryController::class, 'history'])->name('transition.history');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/transfer', [TransitionHistoryController::class, 'create'])->name('transfer.create');
});

Route::middleware(['auth', 'verified', 'checkrole:1'])->group(function () {
    Route::get('/platform', [TransitionHistoryController::class, 'index'])->name('platform');
});

require __DIR__ . '/auth.php';