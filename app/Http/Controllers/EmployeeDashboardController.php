<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class EmployeeDashboardController extends Controller
{
    public function index()
    {
        return view('employee.dashboard', [
            'user' => Auth::user(),
        ]);
    }
}
