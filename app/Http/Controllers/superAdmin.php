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
    public function index(Request $request){
        $total_arch=ARCHIVES::count() ;
        $total_admin= USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
        $total_student=student_acc::where('ACCTYPE', 'student')->count();
        $total_faculty=USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();
        $auth = STUDENT::where('ARCH_ID', 'N/A')->get();
        $archDesc=ARCHIVES::orderBy('viewCount', 'desc')->get();
        $auth = STUDENT::where('ARCH_ID', 'N/A')->get();

        return view('superAdmin.dashboard')->with('arch',$archDesc) ->with( 'auths',$auth)->with('ttlStud',$total_student)->with('ttlArch',$total_arch);
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

    public function audit(){
        $not = notif::paginate(15);
        return view('superAdmin.Audit')->with('notif', $not);
    }

    public function archives(Request $request){
        $srch=$request->input("search");

        if(isset($srch)){
            $archives=ARCHIVES::where('YEAR_PUB', 'LIKE', '%' . $srch . '%')->paginate(10);
            $title=ARCHIVES::where('ARCH_NAME', 'LIKE', '%' . $srch . '%')->paginate(10);

                // if(isset($archives)){
                //     $ret=$archives;
                // }elseif(isset($title)){
                //     $ret=$title;
                // }
                // else{

                // }


                if (!$archives->isEmpty()) {
                    $ret = $archives;
                } elseif (!$title->isEmpty()) {
                    $ret = $title;
                } else {
                    $ret = collect(); // Create an empty collection if both are empty
                }


            $auth = STUDENT::where('ARCH_ID', 'N/A')->get();

            return view('superAdmin.ArchiveTB')->with('arch', $ret) ->with( 'auths',$auth);
        }

        $auth = STUDENT::where('ARCH_ID', 'N/A')->get();
        $archives = ARCHIVES::orderByRaw("CAST(SUBSTRING(ARCH_ID, 4) AS UNSIGNED)")->orderBy('ARCH_ID')->paginate(10);
        return view('superAdmin.ArchiveTB')->with('arch', $archives) ->with( 'auths',$auth);
    }




   public function viewCnt(string $ARCH_ID)
{
    \Log::info("Received ARCH_ID: $ARCH_ID");

    $archNW = ARCHIVES::where('ARCH_ID', $ARCH_ID)->first();
    $id=ARCHIVES::where('ARCH_ID', $ARCH_ID)->value('ARCH_ID');
    $total=ARCHIVES::where('ARCH_ID', $ARCH_ID)->value('viewCount');

    // return dd($ARCH_ID);
    if ($archNW) {
//  return dd($archNW);
        // Check if $arch is not null before proceeding

        // Increment the viewCount directly in the update statement
        $archNW->where('ARCH_ID', $ARCH_ID)->update([
            'viewCount' => $total + 1,
            'updated_at' => now(), // or use a specific timestamp if needed
        ]);

        $success = true;
        $auths = STUDENT::where('ARCH_ID', 'N/A')->get();
        $arch = ARCHIVES::orderByRaw("CAST(SUBSTRING(ARCH_ID, 4) AS UNSIGNED)")->orderBy('ARCH_ID')->paginate(10);

        // return response()->json(['success' => true]);
        // return view('superAdmin.ArchiveTB', compact('success', 'arch', 'auths'));
    } else {
        // Handle the case where the archive is not found
        abort(404);
    }
}



    public function student(){
        $studentPage = userCC::where('acctype', 'student')->paginate(10);
        $studentNew = STUDENT::paginate(10);


        $users = DB::table('s_t_u_d_e_n_t_s')
        ->join('c_o_u_r_s_e_s', 's_t_u_d_e_n_t_s.C_ID', '=', 'c_o_u_r_s_e_s.C_ID')
        ->select('c_o_u_r_s_e_s.C_DESC','s_t_u_d_e_n_t_s.S_ID','s_t_u_d_e_n_t_s.NAME')->paginate(10);

        return view('superAdmin.studentTB')->with('students', $studentPage)->with('SN', $users);
    }

// archive Crud
    public function archUpdate(Request $request, string $id){
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

        }elseif(isset($gh) && !isset($request->PDF_FILE) ){
            $arch->where('ARCH_ID', $id)->update([
                'ARCH_ID' => $request->ARCH_ID,
                'ARCH_NAME' => $request->ARCH_NAME,
                'ABSTRACT' => $request->ABSTRACT,
                'GITHUB_LINK' => $request->GITHUB_LINK,
                'IS_APPROVED' => $request->IS_APPROVED,
            ]);
        }elseif (!isset($gh) && isset($request->PDF_FILE)) {
            $arch->where('ARCH_ID', $id)->update([
                'ARCH_ID' => $request->ARCH_ID,
                'ARCH_NAME' => $request->ARCH_NAME,
                'ABSTRACT' => $request->ABSTRACT,
                'IS_APPROVED' => $request->IS_APPROVED,
                'PDF_FILE' => $request->PDF_FILE,
            ]);
        }else{
            $arch->where('ARCH_ID', $id)->update([
                'ARCH_ID' => $request->ARCH_ID,
                'ARCH_NAME' => $request->ARCH_NAME,
                'ABSTRACT' => $request->ABSTRACT,
                'IS_APPROVED' => $request->IS_APPROVED,
            ]);
        }
        $selectedCountries  = $request->input("countries");

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
        $notif->content="$name has been updated this archive: $id  ";
        $notif->suspect=$name ;


        $notif->save();
        return redirect()->route('superAdmin.archives')->with('alert', 'Archive updated Successfully!');
    }
    public function storeArch(Request $request){

        $name = Session::get('fullNs');
        $arch = new ARCHIVES;
        $total_arch=ARCHIVES::count();
        $archID=  "IT-".$total_arch+1;
        $arch->ARCH_ID =$archID;

        $selectedCountries  = $request->input("countries");
        $gh= $request->input("gh");


        $arch->ARCH_NAME = $request->input("name");
        $arch->ABSTRACT = $request->input("abs");
        $arch->IS_APPROVED = $request->input("stat");
        $arch->YEAR_PUB = $request->input("pubYear");

            if ($request->hasFile('pdf_file')) {

                    $pdfFile = $request->file('pdf_file');
                    $fileName = time() . '_' . $pdfFile->getClientOriginalName();
                    $pdfFile->storeAs('pdfs', $fileName, 'public');

                    $selectedCountries  = $request->input("countries");


                    if (isset($gh)) {
                        $arch->PDF_FILE =  $fileName;
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
                        $notif->content="$name has been added this archive: $archID ";
                        $notif->suspect=$name ;
                           } else {
                        $arch->gh = 'There is no GitHub repository For this archive!';
                        $arch->save();

                        Log::alert("Archive has been added $name !");
                        $notif = new notif;
                        $notif->category = "Add";
                        $notif->content="$name has been added this archive: $archID  ";
                        $notif->suspect=$name ;
                         }

                }
            else{

                return redirect()->back()->with('alert', 'No PDF file selected.')->withInput();
                }


                $auth = STUDENT::where('ARCH_ID', 'N/A')->get();
                $archives = ARCHIVES::orderByRaw("CAST(SUBSTRING(ARCH_ID, 4) AS UNSIGNED)")->orderBy('ARCH_ID')->paginate(10);
                return view('superAdmin.ArchiveTB')->with('arch', $archives) ->with( 'auths',$auth);



    }

    public function storeEmp(Request $request, $userac)
    {
        $userID = $request->input("userID");
        $isStudent = student_acc::where('S_ID', $userID)->exists();
        $isAdmin = USER_ACC_EMP::where('EMP_ID', $userID)->exists();

        if ($isAdmin==NULL && $isStudent==NULL) {

                if ($userac == 'admin') {
                    $name = Session::get('fullNs');

                    $user = new USER_ACC_EMP;

                    $user->EMP_ID = $request->input("userID");
                    $user->PASSWORD = encrypt($request->input("PASSWORD"));
                    $user->ACCTYPE = 'admin';
                    $user->save();
                    $EMP = new EMPLOYEE;
                    $EMP->NAME = $request->input("fullname");
                    $EMP->EMP_ID=$request->input("userID");
                    $EMP->save();
                    $added=$request->input("userID");
                    $notif = new notif;
                    $notif->category = "Add";
                    $notif->content="$name has been added this account: $added a admin";
                    $notif->suspect=$name ;

                    $notif->save();

                    Log::alert("$name has been added this account: $userID a admin");
                    return redirect()->route('superAdmin.admin')->with('alert', 'Admin account succesfully added!');

                } elseif ($userac == 'faculty') {
                    $name = Session::get('fullNs');
                    $user = new USER_ACC_EMP;
                    $user->EMP_ID = $request->input("userID");
                    $user->PASSWORD = encrypt($request->input("PASSWORD"));
                    $user->ACCTYPE = 'faculty';
                    $user->save();

                    $EMP = new EMPLOYEE;
                    $EMP->NAME = $request->input("fullname");
                    $EMP->EMP_ID=$request->input("userID");
                    $EMP->save();

                    $added=$request->input("userID");
                    $notif = new notif;
                    $notif->category = "Add";
                    $notif->content="$name has been added this account: $added a faculty ";
                    $notif->suspect=$name ;

                    $notif->save();

                    Log::alert("$name has been added this account: $userID a faculty");
                    return redirect()->route('superAdmin.faculty')->with('alert', 'Faculty account succesfully added!');

                } else {
                    if ($request->input("ARCH_ID") == null) {
                    $user = new student_acc;
                    $user->S_ID = $request->input("userID");
                    $user->ACCTYPE = $userac;
                    $user->PASSWORD = encrypt($request->input("PASSWORD"));

                    $user->save();

                    $EMP = new STUDENT;
                    $EMP->NAME = $request->input("fullname");
                    $EMP->S_ID=$request->input("userID");
                    $EMP->C_ID='1';
                    $EMP->ARCH_ID='N/A';
                    $EMP->save();


                    }else{

                    $user = new student_acc;
                    $user->S_ID = $request->input("userID");
                    $user->PASSWORD = encrypt($request->input("PASSWORD"));
                    $user->ACCTYPE = $userac;
                    $user->save();

                    $EMP = new STUDENT;
                    $EMP->NAME = $request->input("fullname");
                    $EMP->S_ID=$request->input("userID");
                    $EMP->C_ID='1';
                    $EMP->ARCH_ID=$request->input("ARCH_ID");
                    $EMP->save();
                    }


                    $name = Session::get('fullNs');
                    $added=$request->input("userID");
                    $notif = new notif;
                    $notif->category = "Add";
                    $notif->content="$name has been added this account: $added a student ";
                    $notif->suspect=$name ;

                    $notif->save();

                    Log::alert("$name has been added this account: $userID a student");
                    return redirect()->route('superAdmin.student')->with('alert', 'Student Account added!');
                }

        } else {
            return back()->with('alert', 'Id already exist!')->withInput();
        }
    }
}
