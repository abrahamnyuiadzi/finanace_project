<?php

use App\Http\Controllers\AccountantDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController as AdminAdminDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDashboardController as ControllersAdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class ,'welcome'])->name('welcome');

Route::middleware(['auth'])->get('/dashboard', [MainController::class, 'dashboard'])
    ->name('dashboard');

 Route::get('/dashboard',[MainController::class ,'dashboard'])->name('dashboard');





// <--------------------------------------authentification------------------------------------------>
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::get('/registration', [AuthController::class, 'showRegisterForm'])->name('auth.registration');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'role:admin,accountant'])->group(function () {
    Route::resource('incomes', IncomeController::class);
    Route::resource('expenses', ExpenseController::class);
});



/************************* ADMIN ****************************** */
Route::middleware(['auth', RoleMiddleware::class.':admin'])->group(function () {
     Route::resource('categories', CategoryController::class);
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard');
    Route::get('/budget', [BudgetController::class, 'index'])->name('budget.index');
    Route::get('/budget/export/csv', [BudgetController::class, 'exportCsv'])->name('budget.export.csv');
    Route::get('/budget/export/pdf', [BudgetController::class, 'exportPdf'])->name('budget.export.pdf');
  // Route::get('/budget/filter', [BudgetController::class, 'filter'])->name('budget.filter');
    Route::post('/admin/users/store', [\App\Http\Controllers\Admin\UserController::class, 'store'])
        ->name('admin.users.store');
    Route::get('/admin/users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])
        ->name('admin.users.create');

         Route::patch('/incomes/{income}/validate', [IncomeController::class, 'validateIncome'])
        ->name('incomes.validate');

    Route::patch('/expenses/{expense}/validate', [ExpenseController::class, 'validateExpense'])
        ->name('expenses.validate');

Route::patch('/incomes/{income}/validate', [IncomeController::class, 'validateIncome'])->name('incomes.validate');
Route::patch('/incomes/{income}/decline', [IncomeController::class, 'declineIncome'])->name('incomes.decline');

Route::patch('/expenses/{expense}/validate', [ExpenseController::class, 'validateExpense'])->name('expenses.validate');
Route::patch('/expenses/{expense}/decline', [ExpenseController::class, 'declineExpense'])->name('expenses.decline');

});








/************************* ACCOUNTANT ****************************** */
Route::middleware(['auth', 'role:accountant'])->group(function () {
  Route::get('/accountant/dashboard', [AccountantDashboardController::class, 'index'])
    ->name('accountant.dashboard');
  
    Route::get('/accountant/password', [AccountantDashboardController::class, 'editPassword'])
        ->name('accountant.password.edit');

    Route::post('/accountant/password', [AccountantDashboardController::class, 'updatePassword'])
        ->name('accountant.password.update');
});

/************************* EMPLOYEE ****************************** */
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeDashboardController::class, 'index'])
        ->name('employee.dashboard');

          Route::get('/employee/password', [EmployeeProfileController::class, 'editPassword'])
        ->name('employee.password.edit');

    Route::post('/employee/password', [EmployeeProfileController::class, 'updatePassword'])
        ->name('employee.password.update');
});




