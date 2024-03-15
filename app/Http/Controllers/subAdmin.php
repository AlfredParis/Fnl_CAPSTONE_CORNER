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

use App\Http\Controllers\userCCcontroller;


class subAdmin extends Controller
{
 public function index(Request $request)
    {


        $total_arch = ARCHIVES::count();
        $total_admin = USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
        $total_student = student_acc::where('ACCTYPE', 'student')->count();
        $total_faculty = USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();
       $archDesc = ARCHIVES::orderBy('viewCount', 'desc')->paginate(3);


            return view('subAdmin.dashboard')->with('arch', $archDesc)->with('ttlStud', $total_student)->with('ttlArch', $total_arch);


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
    public function advisory()
    {
        $userID=Session::get('userID');
        $grp=group::where('ADVSR_ID',$userID)->get();

        return view('subAdmin.Advisory')->with('groups',$grp);
    }
    public function myGroup( string $advisory)
    {
        $id = Session::get('userID');

            $myGRP=group::where('id',$advisory)->first();
            $groupID= STUDENT::where('S_ID',$id)->value('GROUP_ID');
            $archives=OP_Archive::where('GRP_ID', $advisory)->get();

            return view('subAdmin.Mygroup')->with('isGrouped',$advisory)->with('GRP_det',$myGRP)->with('arch', $archives);

    }
    public function addComment(Request $request ,string $oparchID)
    {
            $addComment=new messages;
            $addComment->OP_ID =$oparchID;
            $addComment->COMMENTOR = Session::get('userID');
            $addComment->MESSAGE = $request->input('MESSAGE');
            $addComment->save();
            return redirect()->back()->with('alert', 'sent');

    }
    public function removeMem($S_ID)
    {
                $rem=Session::get('userID');

                $remName=STUDENT::where('S_ID',$S_ID)->value('NAME');
                $remover=EMPLOYEE::where('EMP_ID',$rem)->value('NAME');
                $oparchID=STUDENT::where('S_ID', $S_ID)->value('GROUP_ID');
                $stud = STUDENT::where('S_ID', $S_ID)->first();

                $stud->where('S_ID', $S_ID)->update(['GROUP_ID' => "N/A"]);
                $addComment=new messages;
                $addComment->OP_ID =$oparchID;
                $addComment->COMMENTOR =  $remover;
                $addComment->MESSAGE = $remName." has been removed by ".$remover;
                $addComment->save();


                return redirect()->back()->with('alert', 'student removed.');

    }
    public function updateMember(Request $request)
    {
        $id = Session::get('userID');

        $logGroup = group::where('ADVSR_ID', $id)->value('id');
        $members = $request->input("S_ID");

        $rem=Session::get('userID');

        $remName=STUDENT::where('S_ID',$request->input("S_ID"))->value('NAME');
        $remover=EMPLOYEE::where('EMP_ID',$rem)->value('NAME');



        if (is_array($members )) {
            foreach ($members  as $member) {
                $rem=Session::get('userID');

                $addComment=new messages;
                $addComment->OP_ID =$logGroup;
                $addComment->COMMENTOR =  $remover;
                $addComment->MESSAGE = $remName." has been added by ".$remover;
                $addComment->save();
                $stud = STUDENT::where('S_ID', $member)->update(['GROUP_ID' => $logGroup]);


            }
        }
        return redirect()->back()->with('alert', 'Member Successfully added.');

    }
}
