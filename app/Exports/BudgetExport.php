<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BudgetExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Category::all()->map(function ($category) {
            $totalExpenses = $category->expenses()->sum('amount');
            $totalIncomes  = $category->incomes()->sum('amount');
            $balance       = $totalIncomes - $totalExpenses;

            return [
                'Category' => $category->name,
                'Expenses' => $totalExpenses,
                'Incomes'  => $totalIncomes,
                'Balance'  => $balance
            ];
        });
    }

    public function headings(): array
    {
        return ['Category', 'Expenses', 'Incomes', 'Balance'];
    }
}
