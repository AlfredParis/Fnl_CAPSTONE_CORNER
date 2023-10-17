<?php

namespace App\Http\Controllers;


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

use App\Http\Controllers\userCCcontroller;

use Validator;

class adminController extends Controller
{
    public function index()
    {
        $total_arch=ARCHIVES::count() ;
        $total_admin= USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
        $total_student=student_acc::where('ACCTYPE', 'student')->count();
        $total_faculty=USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();

        // $total_proposal=;
        return view('adminDashB')->with('tl_admin', $total_admin)->with('tl_arch', $total_arch)->with('tl_stud', $total_student)->with('tl_fac', $total_faculty);
    }
    public function checker()
    {
        return view('adminChecker');
    }
    public function archives()
    {
        $archives = ARCHIVES::paginate(5);
        return view('adminArchive')->with('arch', $archives);
    }
    public function student()
    {
        $studentPage = userCC::where('acctype', 'student')->paginate(2);
        $studentNew = STUDENT::paginate(2);


        $users = DB::table('s_t_u_d_e_n_t_s')
        ->join('c_o_u_r_s_e_s', 's_t_u_d_e_n_t_s.C_ID', '=', 'c_o_u_r_s_e_s.C_ID')
        ->select('c_o_u_r_s_e_s.C_DESC','s_t_u_d_e_n_t_s.S_ID','s_t_u_d_e_n_t_s.NAME')->paginate(2)
        ;

        return view('adminStudentTB')->with('students', $studentPage)->with('SN', $users);




    }
    public function faculty()
    {
 $facultyPage = DB::table('u_s_e_r__a_c_c__e_m_p_s')
    ->join('e_m_p_l_o_y_e_e_s', 'u_s_e_r__a_c_c__e_m_p_s.EMP_ID', '=', 'e_m_p_l_o_y_e_e_s.EMP_ID')
    ->where('u_s_e_r__a_c_c__e_m_p_s.ACCTYPE', '=', 'faculty') // Add this line
    ->select('e_m_p_l_o_y_e_e_s.NAME', 'u_s_e_r__a_c_c__e_m_p_s.EMP_ID', 'u_s_e_r__a_c_c__e_m_p_s.PASSWORD','u_s_e_r__a_c_c__e_m_p_s.USER_ID_EMP')
    ->paginate(2);
        // $facultyPage = USER_ACC_EMP::where('ACCTYPE', 'faculty')->paginate(2);
        return view('adminFacultyTB')->with('faculty', $facultyPage);
    }
    public function admin()
    {
        // $adminPage = USER_ACC_EMP::where('ACCTYPE', 'admin')->paginate(2);


        $adminPage = DB::table('u_s_e_r__a_c_c__e_m_p_s')
    ->join('e_m_p_l_o_y_e_e_s', 'u_s_e_r__a_c_c__e_m_p_s.EMP_ID', '=', 'e_m_p_l_o_y_e_e_s.EMP_ID')
    ->where('u_s_e_r__a_c_c__e_m_p_s.ACCTYPE', '=', 'admin') // Add this line
    ->select('e_m_p_l_o_y_e_e_s.NAME', 'u_s_e_r__a_c_c__e_m_p_s.EMP_ID', 'u_s_e_r__a_c_c__e_m_p_s.PASSWORD','u_s_e_r__a_c_c__e_m_p_s.USER_ID_EMP')
    ->paginate(2);

        return view('adminAdminTB')->with('admin', $adminPage);
    }

    public function addUser($user)
    {

        return view('adminAdduser')->with('userAdd', $user);
    }

    public function storeEmp(Request $request, $userac)
    {
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         "userID" => "required|min:2|max:20",
        //         "fullname" => "required|min:4|max:50",
        //         "password" => "required|min:4|max:100",

        //     ]
        // );
        // if ($validator->fails()) {

        //     return back()->withErrors($validator)->withInput();
        // }


        $userID = $request->input("userID");
        // $conPass = $request->input("conpassword");
        // $pass = $request->input("password");
        $isStudent = student_acc::where('S_ID', $userID)->exists();
        $isAdmin = USER_ACC_EMP::where('EMP_ID', $userID)->exists();

        if ($isAdmin==NULL && $isStudent==NULL) {
            //  if ($conPass == $pass) {

                if ($userac == 'admin') {

                    $user = new USER_ACC_EMP;
                    $user->EMP_ID = $request->input("userID");
                    $user->PASSWORD = encrypt($request->input("PASSWORD"));
                    $user->ACCTYPE = 'admin';
                    $user->save();
                    $EMP = new EMPLOYEE;
                    $EMP->NAME = $request->input("fullname");
                    $EMP->EMP_ID=$request->input("userID");
                    $EMP->save();
                    $name = Session::get('fullNs');
                    Log::alert("$name has been added this account: $userID a admin");
                    return redirect()->route('admin.admin')->with('alert', 'Admin account succesfully added!');
                } elseif ($userac == 'faculty') {
                    $user = new USER_ACC_EMP;
                    $user->EMP_ID = $request->input("userID");
                    $user->PASSWORD = encrypt($request->input("PASSWORD"));
                    $user->ACCTYPE = 'faculty';
                    $user->save();
                    $EMP = new EMPLOYEE;
                    $EMP->NAME = $request->input("fullname");
                    $EMP->EMP_ID=$request->input("userID");
                    $EMP->save();

                    $name = Session::get('fullNs');
                   Log::alert("$name has been added this account: $userID a faculty");
                    return redirect()->route('admin.faculty')->with('alert', 'Faculty account succesfully added!');



                } else {

                    $user = new student_acc;
                    $user->S_ID = $request->input("userID");
                    $user->PASSWORD = encrypt($request->input("PASSWORD"));

                    $user->save();
                    $EMP = new STUDENT;
                    $EMP->NAME = $request->input("fullname");
                    $EMP->S_ID=$request->input("userID");
                    $EMP->C_ID='1';
                    $EMP->save();
                    $name = Session::get('fullNs');
                  Log::alert("$name has been added this account: $userID a student");
                    return redirect()->route('admin.student')->with('alert', 'Student Account added!');
                }
            // } else {
            //     return back()->with('alert', 'Password does not match')->withInput();
            // }
        } else {
            return back()->with('alert', 'Id already exist!')->withInput();
        }
    }

    public function userEdit($id)
    {
        $User = userCC::find($id);

        return view('adminEditUser')->with('Users', $User);
    }
    public function userUpdate(Request $request, string $id)
    {
        $name = Session::get('fullNs');

        $user = userCC::find($id);
        $user->userID = $request->userID;
        $user->fullname = $request->fullname;
        $user->password = encrypt($request->password);
        $user->acctype = $request->acctype;

        $user->save();
        if ($request->acctype == 'admin') {
            Log::alert("Admin account is updated Successfully by: $name!");
            return redirect()->route('admin.admin')->with('alert', "Admin account is updated Successfully by: $name!");
        } elseif ($request->acctype == 'faculty') {
            Log::alert("Faculty account is updated Successfully by: $name!");
            return redirect()->route('admin.faculty')->with('alert', "Faculty account is updated Successfully by: $name!");
        } else {
            Log::alert("Student account is updated Successfully by: $name!");
            return redirect()->route('admin.student')->with('alert', "Student account is updated Successfully by: $name!");
        }

    }

    public function addArch()
    {
        return view('adminAddarch');
    }


    public function storeArch(Request $request)
    {
        $name = Session::get('fullNs');
        $arch = new ARCHIVES;
        $total_arch=ARCHIVES::count();
        $arch->ARCH_ID = "IT-".$total_arch+1;

         $arch->ARCH_NAME = $request->input("name");
         $arch->ABSTRACT = $request->input("abs");
        $arch->AUTHOR_ID = $request->input("author");

  if ($request->hasFile('pdf_file')) {
        $pdfFile = $request->file('pdf_file');
        $fileName = time() . '_' . $pdfFile->getClientOriginalName();
        $pdfFile->storeAs('pdfs', $fileName, 'public');
$gh = $request->input("gh");
        if (isset($gh)) {
            $arch->PDF_FILE =  $fileName;
            $arch->GITHUB_LINK = $request->input("gh");
            $arch->IS_APPROVED = $request->input("stat");

            $arch->save();
            Log::alert("Archive has been added by $name !");
            return redirect()->route('admin.archives')->with('alert', 'An archive succesfully added !');
        } else {
            $arch->gh = 'There is no GitHub repository For this archive!';
            $arch->save();
            Log::alert("Archive has been added $name !");
            return redirect()->route('admin.archives')->with('alert', 'An archive succesfully added !');
        }

    }
else{
   // If they forgot the paper, tell them to bring one
    return redirect()->back()->with('alert', 'No PDF file selected.')->withInput();
}





    }
    public function archEdit($ARCH_ID)
    {
        // $arch = ARCHIVES::find($ARCH_ID);
        $archs =DB::table('a_r_c_h_i_v_e_s')
    ->where('ARCH_ID', $ARCH_ID)
    ->first();

        return view('adminEditArch')->with('archive', $archs);
    }
    public function archUpdate(Request $request, string $id)
    {
        $name = Session::get('fullNs');

        $arch = ARCHIVES::find($id);
        $arch->archID = $request->archID;
        $arch->name = $request->name;
        $arch->author = $request->author;
        $arch->gh = $request->gh;

        Log::alert("Archive has been Edited by $name!");
        $arch->save();
        return redirect()->route('admin.archives')->with('alert', 'Archive updated Successfully!');
    }
    public function delArch($id)
    {
        $name = Session::get('fullNs');
        Log::alert("$name has been Deleted!");

        $delete = archive::find($id);
        $delete->delete();
        return redirect()->route('admin.archives')->with('alert', 'The Archive has been Deleted Successfully!');
    }

   public function findSimilarWords(Request $request)
{
    $userInput = $request->input('user_input');
    $abs = $request->input('abs');
  if (empty($userInput) || is_null($userInput)) {
        return view('adminChecker')->with('similarTitles', []);
    }
    // Split the user input into individual words
    $inputWords = explode(' ', $userInput);

    // Retrieve all titles from the database
    $titles = DB::table('a_r_c_h_i_v_e_s')->pluck('ARCH_NAME');

     $similarTitles = [];


    foreach ($titles as $title) {
        $titleWords = explode(' ', $title);

        $totalSimilarityPercentage = 0;
        $wordCount = count($inputWords);
        $similarWords = [];

        foreach ($inputWords as $inputWord) {
            $maxSimilarityPercentage = 0;
            $inputWordFound = false; // Flag to track if input word is found in the title

            foreach ($titleWords as $titleWord) {

                $distance = levenshtein($inputWord, $titleWord);

                $wordSimilarityPercentage = 100 - ($distance / max(strlen($inputWord), strlen($titleWord))) * 100;
                if ($wordSimilarityPercentage > $maxSimilarityPercentage) {
                    $maxSimilarityPercentage = $wordSimilarityPercentage;
                      if (stripos($titleWord, $inputWord) !== false) {
                        $inputWordFound = true;

                         }
                }
            }
            if ($inputWordFound) {
                $similarWords[] = $inputWord;
            }

            $totalSimilarityPercentage += $maxSimilarityPercentage;
        }

        // Calculate the average similarity percentage for the title
        if ($wordCount > 0) {
            $averageSimilarityPercentage = $totalSimilarityPercentage / count($inputWords);

        } else {
            $averageSimilarityPercentage = 0;
        }

        // If the average similarity percentage is at least 50%, and there are similar words, add the title to the result
        if ($averageSimilarityPercentage >= 10 && !empty($similarWords)) {
            $similarTitles[] = [
                'title' => $title,
                'average_similarity_percentage' => round($averageSimilarityPercentage, 2),
                'similar_words' => array_unique($similarWords) // Remove duplicates from the list
            ];
        }
    }

    // Sort the results by average similarity percentage in descending order
    usort($similarTitles, function ($a, $b) {
        return $b['average_similarity_percentage'] - $a['average_similarity_percentage'];
    });

// return dd( $wordSimilarityPercentage);
 return view('adminChecker')->with('similarTitles', $similarTitles)->with('titel',$userInput)->with('absract',$abs);
}


public function view($id)
    {
         // Fetch student data from the database based on $studentId
    $show = userCC::find($id);

  return view('adminAccView')->with($show);
    }
public function srch(Request $request)
    {

      }





}
