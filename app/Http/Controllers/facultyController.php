<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class facultyController extends Controller
{
    // TODO:finish faculty intrface  
    public function index()
    {
        return view('facultyDashB');
    }
    public function myArchive()
    {
        return view('facultyArchive');
    }
    public function Checker()
    {
        return view('facultyChecker');
    }
    public function student()
    {
        return view('facultyStudentTB');
    }
}