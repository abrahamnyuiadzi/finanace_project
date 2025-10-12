<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
     public function welcome() {
        return view('welcome');
}

public function dashboard() {
   return view('dashboard');
}

}

