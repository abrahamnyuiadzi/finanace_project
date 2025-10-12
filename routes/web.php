<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class ,'welcome'])->name('welcome');

Route::get('/expenses/create',[ExpenseController::class ,'create'])->name('expenses.create');
Route::get('/expenses/show',[ExpenseController::class ,'show'])->name('expenses.show');
Route::get('/dashboard',[MainController::class ,'dashboard'])->name('dashboard');
