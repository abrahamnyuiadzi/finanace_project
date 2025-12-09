<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Expense;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total
        $total_incomes = Income::sum('amount');
        $total_expenses = Expense::sum('amount');
        $balance = $total_incomes - $total_expenses;

        // Monthly stats (chart)
        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create(null, $month)->format('F');
        });

        $monthly_incomes = collect(range(1, 12))->map(function ($month) {
            return Income::whereMonth('date', $month)->sum('amount');
        });

        $monthly_expenses = collect(range(1, 12))->map(function ($month) {
            return Expense::whereMonth('date', $month)->sum('amount');
        });

        return view('admin.dashboard', [
            'total_incomes' => $total_incomes,
            'total_expenses' => $total_expenses,
            'balance' => $balance,
            'months' => $months,
            'monthly_incomes' => $monthly_incomes,
            'monthly_expenses' => $monthly_expenses,
        ]);
    }
}
