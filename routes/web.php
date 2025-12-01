<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class ,'welcome'])->name('welcome');
Route::get('/dashboard',[MainController::class ,'dashboard'])->name('dashboard');





// <--------------------------------------authentification------------------------------------------>
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::get('/registration', [AuthController::class, 'showRegisterForm'])->name('auth.registration');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');







   
// Route::middleware(['auth', 'role:admin'])->group(function () {
// Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

// });

// Zone accessible uniquement par l’admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard Admin
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Routes Income
    Route::resource('incomes', IncomeController::class);

    // Routes Expense
    Route::resource('expenses', ExpenseController::class);

    // Routes Categories
    Route::resource('categories', CategoryController::class);
});

Route::middleware(['auth', 'role:accountant'])->group(function () {
    Route::get('/accountant/dashboard', fn() => view('accountant.dashboard'))->name('accountant.dashboard');
});

Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee/profile', fn() => view('employee.profile'))->name('employee.profile');
});




