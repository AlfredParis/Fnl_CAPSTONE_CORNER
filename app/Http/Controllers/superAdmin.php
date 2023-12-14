<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;




use Carbon\Carbon;

use App\Models\userCC;
use PhpOffice\PhpSpreadsheet\IOFactory;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\student_acc;
use App\Models\STUDENT;
use App\Models\USER_ACC_EMP;
use App\Models\EMPLOYEE;
use App\Models\ARCHIVES;
use App\Models\notif;

class superAdmin extends Controller
{
    public function index(Request $request)
    {

        $total_arch=ARCHIVES::count() ;
        $total_admin= USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
        $total_student=student_acc::where('ACCTYPE', 'student')->count();
        $total_faculty=USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();
        $auth = STUDENT::where('ARCH_ID', 'N/A')->get();

            return view('superAdmin.dashboard');


    }
}
