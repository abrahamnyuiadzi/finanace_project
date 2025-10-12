<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::orderBy('date', 'desc')->paginate(15);
        $total = Income::sum('amount');

        return view('incomes.index', compact('incomes', 'total'));
    }

    public function create()
    {
        return view('incomes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'category' => 'nullable|string|max:100',
            'date' => 'required|date',
        ]);

        Income::create($data);

        return redirect()->route('incomes.index')->with('success', 'Revenu enregistré avec succès.');
    }

    public function show(Income $income)
    {
        return view('incomes.show', compact('income'));
    }

    public function edit(Income $income)
    {
        return view('incomes.edit', compact('income'));
    }

    public function update(Request $request, Income $income)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'category' => 'nullable|string|max:100',
            'date' => 'required|date',
        ]);

        $income->update($data);

        return redirect()->route('incomes.index')->with('success', 'Revenu mis à jour avec succès.');
    }

    public function destroy(Income $income)
    {
        $income->delete();

        return redirect()->route('incomes.index')->with('success', 'Revenu supprimé avec succès.');
    }
}
