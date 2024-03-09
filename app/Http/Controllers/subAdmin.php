<?php

namespace App\Http\Controllers;

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


class subAdmin extends Controller
{
 public function index(Request $request)
    {

        $total_arch=ARCHIVES::count() ;
        $total_admin= USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
        $total_student=student_acc::where('ACCTYPE', 'student')->count();
        $total_faculty=USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();

            return view('subAdmin.dashboard');


    }

    public function archives(Request $request){
        $srch=$request->input("search");

        if(isset($srch)){
            $archives=ARCHIVES::where('YEAR_PUB', 'LIKE', '%' . $srch . '%')->paginate(10);
            $title=ARCHIVES::where('ARCH_NAME', 'LIKE', '%' . $srch . '%')->paginate(10);

                if (!$archives->isEmpty()) {
                    $ret = $archives;
                } elseif (!$title->isEmpty()) {
                    $ret = $title;
                } else {
                    $ret = collect(); // Create an empty collection if both are empty
                }


            $auth = STUDENT::where('ARCH_ID', 'N/A')->get();

            return view('subAdmin.ArchiveTB')->with('arch', $ret) ->with( 'auths',$auth);
        }

        $auth = STUDENT::where('ARCH_ID', 'N/A')->get();
        $archives = ARCHIVES::orderByRaw("CAST(SUBSTRING(ARCH_ID, 4) AS UNSIGNED)")->orderBy('ARCH_ID')->paginate(10);
        return view('subAdmin.ArchiveTB')->with('arch', $archives) ->with( 'auths',$auth);
    }


}
