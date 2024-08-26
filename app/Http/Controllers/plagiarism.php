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
use App\Models\group;
use App\Models\messages;
use App\Models\notif;
use App\Models\OP_Archive;
use App\Models\TURNED_OVER_ARCHIVES;
use App\Models\viewsForTrnd;
use App\Models\certificate;
use App\Models\department;



use App\Http\Controllers\userCCcontroller;


class plagiarism extends Controller
{
    public function index(Request $request)
    {


        $total_arch = ARCHIVES::count();
        $total_admin = USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
        $total_student = student_acc::where('ACCTYPE', 'student')->count();
        $total_faculty = USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();
        $archDesc = ARCHIVES::orderBy('viewCount', 'desc')->paginate(3);
        $views = viewsForTrnd::orderBy('VIEWS', 'desc')->paginate(3);


        return view('plag.dashboard')->with('viewss', $views)->with('ttlStud', $total_student)->with('ttlArch', $total_arch);


    }

    public function Archives()
    {
        $trndOver = TURNED_OVER_ARCHIVES::where('PUB_STAT', 2)->paginate(10);
        return view('plag.archives')->with('trnd', $trndOver);


    }
    public function myGroup(string $advisory)
    {


        $myGRP = group::where('id', $advisory)->first();
        $archives = OP_Archive::where('GRP_ID', $advisory)->get();

        return view('plag.Mygroup')->with('isGrouped', $advisory)->with('GRP_det', $myGRP)->with('arch', $archives);

    }
    public function FPC()
    {
        $forPlag = group::where('STATUS_ID', 4)->paginate(10);
        return view('plag.For-plagiarism-checking')->with('groups', $forPlag);


    }

    public function Cert()
    {
        $certificate = certificate::where('status', 'passed')->paginate(10);
        return view('plag.Certificates')->with('certificates', $certificate);


    }


}
