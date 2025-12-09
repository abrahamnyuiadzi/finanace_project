<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BudgetExport;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->month;
        $year  = $request->year;

        $categories = Category::all()->map(function ($category) use ($month, $year) {
            $expensesQuery = $category->expenses();
            $incomesQuery  = $category->incomes();

            if ($month) $expensesQuery->whereMonth('created_at', $month)->whereMonth('created_at', $month);
            if ($year) $expensesQuery->whereYear('created_at', $year)->whereYear('created_at', $year);

            $totalExpenses = $expensesQuery->sum('amount');
            $totalIncomes  = $incomesQuery->sum('amount');
            $balance       = $totalIncomes - $totalExpenses;

            return [
                'name' => $category->name,
                'expenses' => $totalExpenses,
                'incomes' => $totalIncomes,
                'balance' => $balance
            ];
        });

        $total_expenses = $categories->sum('expenses');
        $total_incomes  = $categories->sum('incomes');
        $total_balance  = $total_incomes - $total_expenses;

        return view('budget.index', compact(
            'categories', 'total_expenses', 'total_incomes', 'total_balance'
        ));
    }

    // public function exportCsv()
    // {
    //     return Excel::download(new BudgetExport, 'budget.csv');
    // }

    // public function exportPdf()
    // {
    //     $categories = Category::with(['incomes', 'expenses'])->get();
    //     $pdf = Pdf::loadView('budget.pdf', compact('categories'));
    //     return $pdf->download('budget.pdf');
    // }
}
