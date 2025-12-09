<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;

class AccountantDashboardController extends Controller
{
    public function index()
    {
        $total_incomes  = Income::sum('amount');
        $total_expenses = Expense::sum('amount');

        return view('accountant.dashboard', compact(
            'total_incomes',
            'total_expenses'
        ));
    }
}
