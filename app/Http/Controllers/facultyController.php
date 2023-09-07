<?php

namespace App\Http\Controllers;

use App\Models\archive;
use App\Models\userCC;
use Illuminate\Http\Request;

class facultyController extends Controller
{
    // TODO:finish faculty intrface
    public function index()
    {
          $total_arch=archive::count() ;
        $total_admin= userCC::where('acctype', 'admin')->count();
        $total_student=userCC::where('acctype', 'student')->count();
        $total_faculty=userCC::where('acctype', 'faculty')->count();
        return view('facultyDashB')->with('tl_admin', $total_admin)->with('tl_arch', $total_arch)->with('tl_stud', $total_student)->with('tl_fac', $total_faculty);
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
