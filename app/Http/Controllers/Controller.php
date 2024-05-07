<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function __construct()
    {
        $categorList =Category::all(); 
        $user = Auth::user();
        view()->share('categorList', $categorList);
        view()->share('user', $user);
    }
}


