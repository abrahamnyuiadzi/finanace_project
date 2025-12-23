<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index(Request $request)
    {
        // Toutes les catégories (pour le filtre)
        $allCategories = Category::orderBy('name')->get();

        // Catégorie sélectionnée
        $selectedCategoryId = $request->get('category');

        // Filtrage
        $categoriesQuery = Category::query();

        if ($selectedCategoryId) {
            $categoriesQuery->where('id', $selectedCategoryId);
        }

        $categories = $categoriesQuery->get()->map(function ($category) {
            $expenses = $category->expenses()->sum('amount');
            $incomes  = $category->incomes()->sum('amount');

            return [
                'name'     => $category->name,
                'expenses' => $expenses,
                'incomes'  => $incomes,
                'balance'  => $incomes - $expenses,
            ];
        });

        // Totaux globaux
        $total_expenses = $categories->sum('expenses');
        $total_incomes  = $categories->sum('incomes');
        $total_balance  = $total_incomes - $total_expenses;

        return view('budget.index', compact(
            'categories',
            'allCategories',
            'total_expenses',
            'total_incomes',
            'total_balance'
        ));
    }
}
