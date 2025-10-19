<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::orderBy('date', 'desc')->paginate(15);
       
        $total = Expense::sum('amount');

        return view('expenses.index', compact('expenses', 'total'));
    }

    public function create()
    {
         $categories = Category::all();
        return view('expenses.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'nullable|string|max:100',
            'date' => 'required|date',
        ]);

     


        Expense::create([
                'title' =>$request->title,
                'description' =>$request->description,
                'amount' =>$request->amount,
                'category_id' =>$request->category_id,
                'date' =>$request->date,

        ]);

        return redirect()->route('expenses.index')->with('success', 'Dépense enregistrée avec succès.');
    }

    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'category' => 'nullable|string|max:100',
            'date' => 'required|date',
        ]);

        $expense->update($data);

        return redirect()->route('expenses.index')->with('success', 'Dépense mise à jour avec succès.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Dépense supprimée avec succès.');
    }
}
