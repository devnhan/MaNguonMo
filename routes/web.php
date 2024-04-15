<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Auth\RegisterForadminController;
use App\Http\Controllers\CVController;

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);

Route::get('/register/admin', [RegisterForadminController::class, 'showRegistrationForm'])->name('register.admin');
Route::post('/register/admin', [RegisterForadminController::class, 'registeradmin']);

Route::get('/jobs', [JobController::class, 'index'])->name('job.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');
Route::post('/jobs', [JobController::class, 'store'])->name('job.store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Các tuyến đường quản lý CV
Route::get('/cvs', [CVController::class, 'index'])->name('cvs.index');
Route::get('/cvs/create', [CVController::class, 'create'])->name('cvs.create');
Route::post('/cvs', [CVController::class, 'store'])->name('cvs.store');
Route::get('/cvs/{cv}', [CVController::class, 'show'])->name('cvs.show');
Route::get('/cvs/{cv}/edit', [CVController::class, 'edit'])->name('cvs.edit');
Route::put('/cvs/{cv}', [CVController::class, 'update'])->name('cvs.update');
Route::delete('/cvs/{cv}', [CVController::class, 'destroy'])->name('cvs.destroy');
