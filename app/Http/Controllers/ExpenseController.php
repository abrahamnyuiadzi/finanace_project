<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {

        $expenses = Expense::where('status', 'validated')
        ->orderBy('date', 'desc')
        ->paginate(15);

    $total = Expense::where('status', 'validated')->sum('amount');

    return view('expenses.index', compact('expenses', 'total'));
    }

    public function create()
    {
        //  $categories = Category::all();
        // return view('expenses.create');
        return view('expenses.create', [
            'categories' => Category::all()

        ]);
    }

    public function store(Request $request)
    {
        $request->validate([

            'description' => 'nullable|string',
            'recipient' => 'required|string',
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'nullable|string|max:100',
            'date' => 'required|date',
        ]);




        Expense::create([
            'category_id' => $request->category_id,
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'recipient' => $request->recipient,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Dépense enregistrée avec succès.');
    }

    public function show(string $id)
    {
        // return view('expenses.show', compact('expense'));

         $expense =Expense::find($id);
        return view('expenses.show',[
            'expense' => $expense,
        ]);
    }

    public function edit(string $id)
    {
    //   return view('expenses.edit', compact('expense')); 
       $expense =Expense::find($id);
        return view('expenses.edit',[
            'expense' => $expense,
            'categories' => Category::all()
        ]);


    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([

            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'nullable|string|max:100',
            'date' => 'required|date',
            'recipient' => 'required|string',
        ]);

        // $expense->update($data);

          Expense::find($id)->update([
        'amount'=>$request->amount,
        'date'=>$request->date,
        'recipient'=>$request->recipient,
        'category_id'=>$request->category_id,
        'description'=>$request->description,


       ]);

        return redirect()->route('expenses.index')->with('success', 'Dépense mise à jour avec succès.');
    }

    public function destroy(string $id)
    {
        // $expense->delete();
             Expense::find($id)->delete();

        return redirect()->route('expenses.index')->with('success', 'Dépense supprimée avec succès.');
    }


public function validateExpense(Expense $expense)
{
    $expense->update(['status' => 'validated']);
    return redirect()->back()->with('success', 'Dépense validée avec succès.');
}

public function declineExpense(Expense $expense)
{
    $expense->update(['status' => 'declined']);
    return redirect()->back()->with('success', 'Dépense refusée.');
}


}
