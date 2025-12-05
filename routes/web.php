<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class ,'welcome'])->name('welcome');
 Route::get('/dashboard',[MainController::class ,'dashboard'])->name('dashboard');





// <--------------------------------------authentification------------------------------------------>
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::get('/registration', [AuthController::class, 'showRegisterForm'])->name('auth.registration');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');






Route::middleware(['auth', RoleMiddleware::class.':admin'])->group(function () {

    Route::get('/admin/dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('/budget', [BudgetController::class, 'index'])->name('budget.index');


    Route::resource('incomes', IncomeController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('categories', CategoryController::class);

 Route::post('/admin/users/store', [\App\Http\Controllers\Admin\UserController::class, 'store'])
        ->name('admin.users.store');

        Route::get('/admin/users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])
        ->name('admin.users.create');

     
});









Route::middleware(['auth', 'role:accountant'])->group(function () {
    Route::get('/accountant/dashboard', fn() => view('accountant.dashboard'))->name('accountant.dashboard');
});

Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee/profile', fn() => view('employee.profile'))->name('employee.profile');
});




