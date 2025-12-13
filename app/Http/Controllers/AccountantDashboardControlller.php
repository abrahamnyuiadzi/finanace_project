<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Expense;

class AccountantDashboardController extends Controller
{
    public function index()
    {
        $total_incomes = Income::sum('amount');
        $total_expenses = Expense::sum('amount');
        $balance = $total_incomes - $total_expenses;

        return view('accountant.dashboard', compact(
            'total_incomes',
            'total_expenses',
            'balance'
        ));
    }
}
