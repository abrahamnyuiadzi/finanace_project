<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    public function index()
    {
        $categories = Category::all()->map(function ($category) {

            $totalExpenses = $category->expenses()->sum('amount');
            $totalIncomes  = $category->incomes()->sum('amount');
            $balance       = $totalIncomes - $totalExpenses;

            return [
                'name' => $category->name,
                'expenses' => $totalExpenses,
                'incomes' => $totalIncomes,
                'balance' => $balance
            ];
        });

        return view('budget.index', compact('categories'));
    }
}
