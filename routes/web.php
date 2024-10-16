<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
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
})->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/job/create', [JobController::class, 'create'])->middleware(['auth', 'verified'])->name('job.create');
Route::post('/job/store', [JobController::class, 'store'])->middleware(['auth', 'verified'])->name('job.store');
Route::get('/job/{job}', [JobController::class, 'show'])->middleware(['auth', 'verified'])->name('job.show');

Route::post('/application/{application}', [JobApplicationController::class, 'create'])->middleware(['auth', 'verified'])->name('job.application.create');
Route::get('/applications/', [JobApplicationController::class, 'show'])->middleware(['auth', 'verified'])->name('job.application.show');

Route::get('/my-profile', [UserProfileController::class, 'show'])->middleware(['auth', 'verified'])->name('my.profile.show');
Route::post('/my-profile', [UserProfileController::class, 'store'])->middleware(['auth', 'verified'])->name('my.profile.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
