<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class ,'welcome'])->name('welcome');

Route::get('/dashboard',[MainController::class ,'dashboard'])->name('dashboard');

Route::get('/expenses',[ExpenseController::class ,'index'])->name('expenses.index');
Route::get('/expenses/create',[ExpenseController::class ,'create'])->name('expenses.create');
Route::post('/expenses/store',[ExpenseController::class ,'store'])->name('expenses.store');
Route::get('/expenses/show',[ExpenseController::class ,'show'])->name('expenses.show');
Route::put('/expenses/{id}/update',[ExpenseController::class ,'edit'])->name('expenses.edit');
Route::delete('/expenses/{id}/destroy',[ExpenseController::class ,'destroy'])->name('expenses.destroy');


// <--------------------------------------categories------------------------------------------>
Route::get('/categories',[CategoryController::class ,'index'])->name('categories.index');
Route::get('/categories/create',[CategoryController::class ,'create'])->name('categories.create');
Route::post('/categories/store',[CategoryController::class ,'store'])->name('categories.store');
Route::get('/categories/show',[CategoryController::class ,'show'])->name('categories.show');
Route::put('/categories/{id}/update',[CategoryController::class ,'edit'])->name('categories.edit');
Route::delete('/categories/{id}/destroy',[CategoryController::class ,'destroy'])->name('categories.destroy');


// <--------------------------------------authrntification------------------------------------------>


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');






