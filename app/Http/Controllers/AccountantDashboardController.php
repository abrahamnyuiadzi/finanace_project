<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountantDashboardController extends Controller
{
    /**
     * Dashboard du comptable
     */
    public function index()
    {
        // Uniquement les opérations VALIDÉES par l'admin
        $total_incomes = Income::where('status', 'validated')->sum('amount');
        $total_expenses = Expense::where('status', 'validated')->sum('amount');
        $balance = $total_incomes - $total_expenses;

        return view('accountant.dashboard', compact(
            'total_incomes',
            'total_expenses',
            'balance'
        ));
    }

    /**
     * Formulaire de changement de mot de passe
     */
    public function editPassword()
    {
        return view('accountant.password');
    }

    /**
     * Mise à jour du mot de passe
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        // Vérification de l'ancien mot de passe
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Mot de passe actuel incorrect.'
            ]);
        }

        // Mise à jour du mot de passe
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('accountant.dashboard')
            ->with('success', 'Mot de passe modifié avec succès.');
    }
}
