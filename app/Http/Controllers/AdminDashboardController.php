<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Totaux (uniquement VALIDATED)
        $total_incomes = Income::where('status', 'validated')->sum('amount');
        $total_expenses = Expense::where('status', 'validated')->sum('amount');
        $balance = $total_incomes - $total_expenses;

        // Données en attente (IMPORTANT)
        $pending_incomes = Income::where('status', 'pending')
            ->orderBy('date', 'desc')
            ->get();

        $pending_expenses = Expense::where('status', 'pending')
            ->orderBy('date', 'desc')
            ->get();

        // Graphiques (uniquement VALIDATED)
        $months = collect(range(1, 12))->map(fn ($m) =>
            Carbon::create()->month($m)->format('F')
        );

        $monthly_incomes = collect(range(1, 12))->map(fn ($m) =>
            Income::where('status', 'validated')
                ->whereMonth('date', $m)
                ->sum('amount')
        );

        $monthly_expenses = collect(range(1, 12))->map(fn ($m) =>
            Expense::where('status', 'validated')
                ->whereMonth('date', $m)
                ->sum('amount')
        );

        return view('admin.dashboard', compact(
            'total_incomes',
            'total_expenses',
            'balance',
            'months',
            'monthly_incomes',
            'monthly_expenses',
            'pending_incomes',
            'pending_expenses'
        ));
    }
}
