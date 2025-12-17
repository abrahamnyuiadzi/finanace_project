<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
     public function welcome() {
        return view('welcome');
}

// public function dashboard() {
//    return view('dashboard');
// }

// public function dashboard()
// {
//     $user = auth()->user();

//     switch ($user->role) {
//         case 'admin':
//             return redirect()->route('admin.dashboard');
//         case 'accountant':
//             return redirect()->route('accountant.dashboard');
//         case 'employee':
//             return redirect()->route('employee.dashboard');
//     }

//     abort(403, 'Role non reconnu');
// }
public function dashboard()
{
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('auth.login');
    }

    switch ($user->role) {
        case 'admin':
            return redirect()->route('admin.dashboard');

        case 'accountant':
            return redirect()->route('accountant.dashboard');

        case 'employee':
            return redirect()->route('employee.dashboard');

        default:
            abort(403, 'Rôle non reconnu');
    }
}

}

