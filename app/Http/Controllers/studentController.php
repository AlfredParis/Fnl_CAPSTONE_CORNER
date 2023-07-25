<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{

    public function index()
    {
        return view('studentDB');
    }
    public function myArchive()
    {
        return view('studMyArchive');
    }
    public function Checker()
    {
        return view('studChecker');
    }
}