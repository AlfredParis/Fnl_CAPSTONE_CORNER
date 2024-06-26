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
use App\Models\program;
use App\Models\department;
use App\Models\group;
use App\Models\TURNED_OVER_ARCHIVES;
use App\Models\viewsForTrnd;
use App\Models\archStatus;





class superAdmin extends Controller
{
    public function index(Request $request)
    {

        $total_admin = USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
        $total_student = student_acc::where('ACCTYPE', 'student')->count();
        $total_faculty = USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();
        // $auth = STUDENT::where('ARCH_ID', 'N/A')->get();->with('auths', $auth)
        $total_arch = TURNED_OVER_ARCHIVES::where('PUB_STAT', 2)->count();

        $views=viewsForTrnd::orderBy('VIEWS', 'desc')->paginate(3);

        return view('superAdmin.dashboard')->with('viewss', $views)->with('ttlStud', $total_student)->with('ttlArch', $total_arch);
    }

    public function adminTB()
    {
        $total_admin = USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
        $total_student = student_acc::where('ACCTYPE', 'student')->count();
        $total_faculty = USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();

        $adminPage = DB::table('u_s_e_r__a_c_c__e_m_p_s')
            ->join('e_m_p_l_o_y_e_e_s', 'u_s_e_r__a_c_c__e_m_p_s.EMP_ID', '=', 'e_m_p_l_o_y_e_e_s.EMP_ID')
            ->where('u_s_e_r__a_c_c__e_m_p_s.ACCTYPE', '=', 'admin')
            ->select('e_m_p_l_o_y_e_e_s.NAME', 'u_s_e_r__a_c_c__e_m_p_s.EMP_ID', 'u_s_e_r__a_c_c__e_m_p_s.PASSWORD', 'u_s_e_r__a_c_c__e_m_p_s.USER_ID_EMP')
            ->paginate(10);

        return view('superAdmin.adminTB')->with('admin', $adminPage);
    }

    public function audit()
    {
        $not = notif::paginate(15);
        return view('superAdmin.Audit')->with('notif', $not);
    }

    public function archives(Request $request)
    {


        $trndOver=TURNED_OVER_ARCHIVES::where('PUB_STAT',2)->paginate(10);


            return view('turnedOverArchSuperAdmin')->with('trnd',$trndOver);

    }




    public function viewCnt(string $ARCH_ID)
    {
        Log::info("Received ARCH_ID: $ARCH_ID");

        $archNW = ARCHIVES::where('ARCH_ID', $ARCH_ID)->first();
        $id = ARCHIVES::where('ARCH_ID', $ARCH_ID)->value('ARCH_ID');
        $total = ARCHIVES::where('ARCH_ID', $ARCH_ID)->value('viewCount');
            if ($archNW) {
                        $archNW->where('ARCH_ID', $ARCH_ID)->update([
                            'viewCount' => $total + 1,
                            'updated_at' => now(), // or use a specific timestamp if needed
                        ]);

                        $success = true;
                        $auths = STUDENT::where('ARCH_ID', 'N/A')->get();
                        $arch = ARCHIVES::orderByRaw("CAST(SUBSTRING(ARCH_ID, 4) AS UNSIGNED)")->orderBy('ARCH_ID')->paginate(10);

                    } else {
                    abort(404);
                    }
                }



    public function student()
    {
        $studentPage = userCC::where('acctype', 'student')->paginate(10);
        $studentNew = STUDENT::paginate(10);


        $users = DB::table('s_t_u_d_e_n_t_s')
            ->join('departments', 's_t_u_d_e_n_t_s.DEPT_ID', '=', 'departments.id')
            ->select('departments.DEPT_NAME', 's_t_u_d_e_n_t_s.S_ID', 's_t_u_d_e_n_t_s.NAME')->paginate(10);

        return view('superAdmin.studentTB')->with('students', $studentPage)->with('SN', $users);
    }

    // archive Crud
    public function archUpdate(Request $request, string $id)
    {
        $arch = ARCHIVES::where('ARCH_ID', $id)->first();
        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $fileName = time() . '_' . $pdfFile->getClientOriginalName();
            $pdfFile->storeAs('pdfs', $fileName, 'public');
            $arch->where('ARCH_ID', $id)->update([
                'PDF_FILE' => $fileName,
            ]);
        }


        if (isset($gh) && isset($request->PDF_FILE)) {
            $arch->where('ARCH_ID', $id)->update([
                'ARCH_ID' => $request->ARCH_ID,
                'ARCH_NAME' => $request->ARCH_NAME,
                'ABSTRACT' => $request->ABSTRACT,
                'GITHUB_LINK' => $request->GITHUB_LINK,
                'IS_APPROVED' => $request->IS_APPROVED,
                'PDF_FILE' => $request->PDF_FILE,
            ]);

        } elseif (isset($gh) && !isset($request->PDF_FILE)) {
            $arch->where('ARCH_ID', $id)->update([
                'ARCH_ID' => $request->ARCH_ID,
                'ARCH_NAME' => $request->ARCH_NAME,
                'ABSTRACT' => $request->ABSTRACT,
                'GITHUB_LINK' => $request->GITHUB_LINK,
                'IS_APPROVED' => $request->IS_APPROVED,
            ]);
        } elseif (!isset($gh) && isset($request->PDF_FILE)) {
            $arch->where('ARCH_ID', $id)->update([
                'ARCH_ID' => $request->ARCH_ID,
                'ARCH_NAME' => $request->ARCH_NAME,
                'ABSTRACT' => $request->ABSTRACT,
                'IS_APPROVED' => $request->IS_APPROVED,
                'PDF_FILE' => $request->PDF_FILE,
            ]);
        } else {
            $arch->where('ARCH_ID', $id)->update([
                'ARCH_ID' => $request->ARCH_ID,
                'ARCH_NAME' => $request->ARCH_NAME,
                'ABSTRACT' => $request->ABSTRACT,
                'IS_APPROVED' => $request->IS_APPROVED,
            ]);
        }
        $selectedCountries = $request->input("countries");

        if (isset($selectedCountries)) {
            $auth = STUDENT::where('ARCH_ID', $id)->get();
            foreach ($auth as $a) {
                // Update ARCH_ID directly without the need for a second query
                $idNga = $a->S_ID;
                $a->where('S_ID', $idNga)->update([
                    'ARCH_ID' => 'N/A',
                ]);
            }

            if (is_array($selectedCountries)) {
                foreach ($selectedCountries as $ID) {

                    $student = STUDENT::where('S_ID', $ID)->first();
                    $idNga = $student->S_ID;
                    $student->where('S_ID', $idNga)->update([

                        'ARCH_ID' => $request->ARCH_ID

                    ]);

                }
            }
        }

        $name = Session::get('fullNs');
        Log::alert("Archive has been added $name !");
        $notif = new notif;
        $notif->category = "Update";
        $notif->content = "$name has been updated this archive: $id  ";
        $notif->suspect = $name;


        $notif->save();
        return redirect()->route('superAdmin.archives')->with('alert', 'Archive updated Successfully!');
    }

    public function storeArch(Request $request)
    {

        $name = Session::get('fullNs');
        $arch = new ARCHIVES;
        $total_arch = ARCHIVES::count();
        $archID = "IT-" . $total_arch + 1;
        $arch->ARCH_ID = $archID;

        $selectedCountries = $request->input("countries");
        $gh = $request->input("gh");


        $arch->ARCH_NAME = $request->input("name");
        $arch->ABSTRACT = $request->input("abs");
        $arch->IS_APPROVED = $request->input("stat");
        $arch->YEAR_PUB = $request->input("pubYear");

        if ($request->hasFile('pdf_file')) {

            $pdfFile = $request->file('pdf_file');
            $fileName = time() . '_' . $pdfFile->getClientOriginalName();
            $pdfFile->storeAs('pdfs', $fileName, 'public');

            $selectedCountries = $request->input("countries");


            if (isset($gh)) {
                $arch->PDF_FILE = $fileName;
                $arch->viewCount = 0;
                $arch->GITHUB_LINK = $request->input("gh");
                $arch->IS_APPROVED = $request->input("stat");
                if (is_array($selectedCountries)) {
                    foreach ($selectedCountries as $ID) {

                        $country = STUDENT::where('S_ID', $ID)->first();
                        $country->where('S_ID', $ID)->update(['ARCH_ID' => $archID,]);


                    }
                }
                $arch->save();

                $notif = new notif;
                $notif->category = "Add";
                $notif->content = "$name has been added this archive: $archID ";
                $notif->suspect = $name;
            } else {
                $arch->PDF_FILE = $fileName;
                $arch->viewCount = 0;
                $arch->GITHUB_LINK = 'There is no GitHub repository For this archive!';
                $arch->save();

                Log::alert("Archive has been added $name !");
                $notif = new notif;
                $notif->category = "Add";
                $notif->content = "$name has been added this archive: $archID  ";
                $notif->suspect = $name;
            }

        } else {

            return redirect()->back()->with('alert', 'No PDF file selected.')->withInput();
        }


        $auth = STUDENT::where('GROUP_ID', 'N/A')->get();

        $archives = ARCHIVES::orderByRaw("CAST(SUBSTRING(ARCH_ID, 4) AS UNSIGNED)")->orderBy('ARCH_ID')->paginate(10);
        return view('superAdmin.ArchiveTB')->with('arch', $archives)->with('auths', $auth);



    }

    public function storeEmp(Request $request, $userac)
    {
        $userID = $request->input("userID");
        $isStudent = student_acc::where('S_ID', $userID)->exists();
        $isAdmin = USER_ACC_EMP::where('EMP_ID', $userID)->exists();

        if ($isAdmin == NULL && $isStudent == NULL) {

            if ($userac == 'admin') {
                $name = Session::get('fullNs');

                $user = new USER_ACC_EMP;

                $user->EMP_ID = $request->input("userID");
                $user->PASSWORD = encrypt($request->input("PASSWORD"));
                $user->ACCTYPE = 'admin';
                $user->save();
                $EMP = new EMPLOYEE;
                $EMP->NAME = $request->input("fullname");
                $EMP->EMP_ID = $request->input("userID");
                $EMP->EMP_DEPT = 10;
                $EMP->ADVICER_STATUS = "INACTIVE";
                $EMP->POSITION_ID = 2;
                $EMP->PROG_ID = 4;
                $EMP->save();
                $added = $request->input("userID");
                $notif = new notif;
                $notif->category = "Add";
                $notif->content = "$name has been added this account: $added a admin";
                $notif->suspect = $name;

                $notif->save();

                Log::alert("$name has been added this account: $userID a admin");
                return redirect()->back()->with('alert', 'An Administrator has been added.');

            } elseif ($userac == 'student') {

                $user = new student_acc;
                $user->S_ID = $request->input("userID");
                $user->PASSWORD = encrypt($request->input("PASSWORD"));
                $user->ACCTYPE = $userac;
                $user->save();

                $EMP = new STUDENT;
                $EMP->NAME = $request->input("fullname");
                $EMP->S_ID = $request->input("userID");
                $EMP->DEPT_ID =  $request->input("DEPT_ID");
                $EMP->GROUP_ID = "N/A";
                $EMP->save();



            $name = Session::get('fullNs');
            $added = $request->input("userID");
            $notif = new notif;
            $notif->category = "Add";
            $notif->content = "$name has been added this account: $added a student ";
            $notif->suspect = $name;

            $notif->save();

            Log::alert("$name has been added this account: $userID a student");
            return redirect()->back()->with('alert', 'An student has been added.');

            } else {
                $name = Session::get('fullNs');
                $user = new USER_ACC_EMP;
                $user->EMP_ID = $request->input("userID");
                $user->PASSWORD = encrypt($request->input("PASSWORD"));
                $user->ACCTYPE = 'faculty';
                $user->save();

                $EMP = new EMPLOYEE;
                $EMP->NAME = $request->input("fullname");
                $EMP->EMP_ID = $request->input("userID");
                $EMP->EMP_DEPT = $request->input("DEPT_ID");
                $progID=department::where('id',$request->input("DEPT_ID"))->value('PROG_ID');
                $EMP->ADVICER_STATUS ='ACTIVE';
                $EMP->POSITION_ID = $request->input("POSITION_ID");
                $EMP->PROG_ID =$progID;

                $EMP->save();

                $added = $request->input("userID");
                $notif = new notif;
                $notif->category = "Add";
                $notif->content = "$name has been added this account: $added a faculty ";
                $notif->suspect = $name;

                $notif->save();

                Log::alert("$name has been added this account: $userID ");
                return redirect()->back()->with('alert', 'An account has been added.');

            }

        } else {
            return back()->with('alert', 'Id already exist!')->withInput();
        }


    }




    public function department(Request $request)
    {

        $program = program::paginate(10);
        $programCount = program::count();
        $department = department::all();



        return view('superAdmin.programsTB')->with('progCnt', $programCount)->with('prog', $program);
    }




    public function group(){

        $studProf = group::paginate(10);
        return view('superAdmin.groupsTB')->with('groups',$studProf);
    }



    public function addCourse(Request $request,$id){
        $user = new department;

        $user->DEPT_NAME = $request->input("DEPT_NAME");
        $user->PROG_ID = $id;
        $user->save();


        return redirect()->route('superAdmin.department');
    }

    public function faculty(){
        $employee=EMPLOYEE::paginate(10);

        return view("superAdmin.Fac&Emplo")->with('SN',$employee);
    }

    public function facultySort(Request $request){



    }

    public function specAdminTB($id){

        $identifyProg=program::where('id', $id)->value('PROG_NAME');

        $depts=department::where('PROG_ID',$id)->get();



        return view("superAdmin.specAdminTB")->with('dept',$depts)->with('if',$identifyProg);
    }

    public function storeProg(Request $request){
        $prog=new program;
        $prog->PROG_NAME =$request->input('PROG_NAME');
        $prog->PROG_ABBR =$request->input('PROG_ABBR');
        $prog->save();


        return redirect()->back()->with('alert', 'Created a program.')->withInput();
    }
    public function updateProg(Request $request,$id){


        $country = program::where('id', $id)->first();
        $country->where('id', $id)->update([
            'PROG_ABBR' => $request->input('PROG_ABBR   '),
            'PROG_NAME' => $request->input('PROG_NAME'),
    ]);


        return redirect()->back()->with('alert', 'Created a program.')->withInput();
    }

    public function delStud(){

        $stud = STUDENT::where('S_ID',)->delete();
        $studAcc = student_acc::where('S_ID',)->delete();
        if ($record) {

            $record->delete();
        }
        return redirect()->back()->with('alert', 'Student successfully deleted.')->withInput();

    }
    public function archStat(){

        $status = archStatus::get();

        return view('superAdmin.archStat')->with('stats',$status);

    }
    public function archStatAdd(Request $request){

        $status = new archStatus;
        $status->arch_stat =$request->input("STAT_NAME");
        $status->SAVE();
        return redirect()->back()->with('alert', 'Status succesfully added.')->withInput();

    }


    public function updateCourse(Request $request,$S_ID){

        $isStudent = department::where('PROG_ID', $S_ID)->get();

        $archNW = ARCHIVES::where('ARCH_ID', $ARCH_ID)->first();
        $archNW->where('ARCH_ID', $ARCH_ID)->update([
                                   'viewCount' => $total + 1,
                                   'updated_at' => now(), // or use a specific timestamp if needed
                               ]);


        redirect()->back()->with('alert', 'course successfully Edited.')->withInput();

    }

}
