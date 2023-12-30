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

    public function audit(){
        $not = notif::paginate(15);
        return view('superAdmin.Audit')->with('notif', $not);
    }

    public function archives(Request $request){
        $yearToSearch=$request->input("search");

        if(isset($yearToSearch)){
            $archives=ARCHIVES::where('YEAR_PUB', 'LIKE', '%' . $yearToSearch . '%')->paginate(10);
            $title=ARCHIVES::where('ARCH_NAME', 'LIKE', '%' . $yearToSearch . '%')->paginate(10);

                if(isset($archives)){
                    $ret=$archives;
                }elseif(isset($title)){
                    $ret=$title;
                }
                else{

                }
            $auth = STUDENT::where('ARCH_ID', 'N/A')->get();

            return view('superAdmin.ArchiveTB')->with('arch', $ret) ->with( 'auths',$auth);
        }

        $auth = STUDENT::where('ARCH_ID', 'N/A')->get();
        $archives = ARCHIVES::orderByRaw("CAST(SUBSTRING(ARCH_ID, 4) AS UNSIGNED)")->orderBy('ARCH_ID')->paginate(10);
        return view('superAdmin.ArchiveTB')->with('arch', $archives) ->with( 'auths',$auth);
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


}
