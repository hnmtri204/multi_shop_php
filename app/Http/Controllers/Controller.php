<?php

namespace App\Http\Controllers;

use App\Models\Category;

abstract class Controller
{
    public function __construct()
    {
        $categorList =Category::all(); 
        view()->share('categorList', $categorList);
    }
}


