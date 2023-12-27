<?php
namespace App\Http\Controllers;
// library for year
use Carbon\Carbon;

use App\Models\userCC;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\student_acc;
use App\Models\STUDENT;
use App\Models\USER_ACC_EMP;
use App\Models\EMPLOYEE;
use App\Models\ARCHIVES;
use App\Models\notif;

use App\Http\Controllers\userCCcontroller;

use Validator;

class group extends Controller
{
   
    public function index(Request $request)
    {

            $total_arch=ARCHIVES::count() ;
            $total_admin= USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
            $total_student=student_acc::where('ACCTYPE', 'student')->count();
            $total_faculty=USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();
            $auth = STUDENT::where('ARCH_ID', 'N/A')->get();

            return view('superAdmin.group')->with('tl_admin', $total_admin)->with('tl_arch', $total_arch)->with('tl_stud', $total_student)->with('tl_fac', $total_faculty)->with( 'auths',$auth);


    }
}
