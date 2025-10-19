<?php

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








