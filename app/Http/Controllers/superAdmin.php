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
    public function adminTB(){


        $total_admin= USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
        $total_student=student_acc::where('ACCTYPE', 'student')->count();
        $total_faculty=USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();
        $auth = STUDENT::where('ARCH_ID', 'N/A')->get();



        $adminPage = DB::table('u_s_e_r__a_c_c__e_m_p_s')
        ->join('e_m_p_l_o_y_e_e_s', 'u_s_e_r__a_c_c__e_m_p_s.EMP_ID', '=', 'e_m_p_l_o_y_e_e_s.EMP_ID')
        ->where('u_s_e_r__a_c_c__e_m_p_s.ACCTYPE', '=', 'admin')
        ->select('e_m_p_l_o_y_e_e_s.NAME', 'u_s_e_r__a_c_c__e_m_p_s.EMP_ID', 'u_s_e_r__a_c_c__e_m_p_s.PASSWORD','u_s_e_r__a_c_c__e_m_p_s.USER_ID_EMP')
        ->paginate(10);
   

            return view('superAdmin.adminTB')->with('admin', $adminPage);



    }
}
