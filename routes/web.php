<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class ,'welcome'])->name('welcome');

Route::get('/expenses/create',[MainController::class ,'create'])->name('expenses.create');
Route::get('/expenses/show',[MainController::class ,'show'])->name('expenses.show');
Route::get('/dashboard',[MainController::class ,'dashboard'])->name('dashboard');
