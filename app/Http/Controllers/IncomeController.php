<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $request->validate([
     
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'nullable|string|max:100',
            'date' => 'required|date',
        ]);
        Income::create([
            'category_id' => $request->category_id,
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
       
        ]);
        

        return redirect()->route('incomes.index')->with('success', 'Revenu enregistré avec succès.');
    }

    public function show(string $id)
    {
        // return view('incomes.show', compact('income'));
          $income =Income::find($id);
        return view('incomes.show',[
            'income' => $income,
        ]);
    }

    public function edit(string $id)
    {
        // return view('incomes.edit', compact('income'));
           $income =Income::find($id);
            return view('expenses.edit',[
            'expense' => $income,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
        
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'nullable|string|max:100',
            'date' => 'required|date',
        ]);

           Income::find($id)->update([
            'category_id' => $request->category_id,
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
       
        ]);


        return redirect()->route('incomes.index')->with('success', 'Revenu mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        // $income->delete();
               Income::find($id)->delete();

        return redirect()->route('incomes.index')->with('success', 'Revenu supprimé avec succès.');
    }
}
