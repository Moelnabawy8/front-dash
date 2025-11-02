<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view("themes.index", get_defined_vars());
    }
    public function contact()
    {
        return view("themes.contact", get_defined_vars());
    }
    public function service()
    {
        return view("themes.service", get_defined_vars());
    }
    public function about()
    {
        return view("themes.about", get_defined_vars());
    }
}
