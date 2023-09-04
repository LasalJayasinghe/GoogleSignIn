<?php


namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // Return the 'home' view
    }

    public function old()
    {
        return view('old'); // Return the 'old' view
    }

    public function new()
    {
        return view('new'); // Return the 'new' view
    }

    
}
