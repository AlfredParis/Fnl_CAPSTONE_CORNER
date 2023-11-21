<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class subAdmin extends Controller
{
 public function index(Request $request)
    {


            return view('subAdmin.dashboard');


    }
}
