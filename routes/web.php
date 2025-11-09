<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class ,'welcome'])->name('welcome');
Route::get('/dashboard',[MainController::class ,'dashboard'])->name('dashboard');

// <--------------------------------------Expenses------------------------------------------>
Route::get('/expenses',[ExpenseController::class ,'index'])->name('expenses.index');
Route::get('/expenses/create',[ExpenseController::class ,'create'])->name('expenses.create');
Route::post('/expenses/store',[ExpenseController::class ,'store'])->name('expenses.store');
Route::get('/expenses/{id}/show',[ExpenseController::class ,'show'])->name('expenses.show');
Route::get('/expenses/{id}/update',[ExpenseController::class ,'edit'])->name('expenses.edit');

Route::put('/expenses/{id}/update', [ExpenseController::class , 'update'])->name('expenses.update');
Route::delete('/expenses/{id}/destroy',[ExpenseController::class ,'destroy'])->name('expenses.destroy');


// <--------------------------------------categories------------------------------------------>
Route::get('/categories',[CategoryController::class ,'index'])->name('categories.index');
Route::get('/categories/create',[CategoryController::class ,'create'])->name('categories.create');
Route::post('/categories/store',[CategoryController::class ,'store'])->name('categories.store');
Route::get('/categories/show',[CategoryController::class ,'show'])->name('categories.show');
Route::put('/categories/{id}/update',[CategoryController::class ,'edit'])->name('categories.edit');
Route::delete('/categories/{id}/destroy',[CategoryController::class ,'destroy'])->name('categories.destroy');

// <--------------------------------------Incomes------------------------------------------>
Route::get('/incomes',[IncomeController::class ,'index'])->name('incomes.index');
Route::get('/incomes/create',[IncomeController::class ,'create'])->name('incomes.create');
Route::post('/incomes/store',[IncomeController::class ,'store'])->name('incomes.store');
Route::get('/incomes/{id}/show',[IncomeController::class ,'show'])->name('incomes.show');
Route::get('/incomes/{id}/update',[IncomeController::class ,'edit'])->name('incomes.edit');

Route::put('/incomes/{id}/update', [IncomeController::class , 'update'])->name('incomes.update');
Route::delete('/incomes/{id}/destroy',[IncomeController::class ,'destroy'])->name('incomes.destroy');

// <--------------------------------------authentification------------------------------------------>


// Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
// Route::post('/registration', [AuthController::class, 'registration'])->name('auth.registration');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
});

Route::middleware(['auth', 'role:accountant'])->group(function () {
    Route::get('/accountant/dashboard', fn() => view('accountant.dashboard'))->name('accountant.dashboard');
});

Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee/profile', fn() => view('employee.profile'))->name('employee.profile');
});




