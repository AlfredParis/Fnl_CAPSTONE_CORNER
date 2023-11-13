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
use App\Models\notif;
class facultyController extends Controller
{
    // TODO:finish faculty intrface
    public function index()
    {
        $total_arch=ARCHIVES::count() ;
        $total_admin= USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
        $total_student=student_acc::where('ACCTYPE', 'student')->count();
        $total_faculty=USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();
        $auth = STUDENT::where('ARCH_ID', 'N/A')->get();

        return view('facultyDashB')->with('tl_admin', $total_admin)->with('tl_arch', $total_arch)->with('tl_stud', $total_student)->with('tl_fac', $total_faculty)->with( 'auths',$auth);
     }
    public function myArchive()
    {

        $auth = STUDENT::where('ARCH_ID', 'N/A')->get();


        $archives = ARCHIVES::orderByRaw("CAST(SUBSTRING(ARCH_ID, 4) AS UNSIGNED)")->orderBy('ARCH_ID')->paginate(10);

        return view('facultyArchive')->with('arch', $archives) ->with( 'auths',$auth);;
    }
    public function Checker()
    {
        return view('facultyChecker');
    }
    public function student()
    {
        $studentPage = userCC::where('acctype', 'student')->paginate(10);
        $studentNew = STUDENT::paginate(10);


        $users = DB::table('s_t_u_d_e_n_t_s')
        ->join('c_o_u_r_s_e_s', 's_t_u_d_e_n_t_s.C_ID', '=', 'c_o_u_r_s_e_s.C_ID')
        ->select('c_o_u_r_s_e_s.C_DESC','s_t_u_d_e_n_t_s.S_ID','s_t_u_d_e_n_t_s.NAME')->paginate(10)
        ;

        return view('facultyStudentTB')->with('students', $studentPage)->with('SN', $users);


    }

    public function findSimilarWords(Request $request)
    {
        $userInput = $request->input('user_input');
        $abs = $request->input('abs');
      if (empty($userInput) || is_null($userInput)) {
            return view('facultyChecker')->with('similarTitles', []);
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
            if ($averageSimilarityPercentage >= 20 && !empty($similarWords)) {
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
     return view('facultyChecker')->with('similarTitles', $similarTitles)->with('titel',$userInput)->with('absract',$abs);
    }


    public function storeArch(Request $request){

        $name = Session::get('fullNs');
        $arch = new ARCHIVES;
        $total_arch=ARCHIVES::count();
        $archID=  "IT-".$total_arch+1;
        $arch->ARCH_ID =$archID;

        $selectedCountries  = $request->input("countries");



        $arch->ARCH_NAME = $request->input("name");
        $arch->ABSTRACT = $request->input("abs");
        $arch->IS_APPROVED = $request->input("stat");

            if ($request->hasFile('pdf_file')) {

                    $pdfFile = $request->file('pdf_file');
                    $fileName = time() . '_' . $pdfFile->getClientOriginalName();
                    $pdfFile->storeAs('pdfs', $fileName, 'public');
                    $gh = $request->input("gh");

                    if (isset($gh)) {
                        $arch->PDF_FILE =  $fileName;
                        $arch->GITHUB_LINK = $request->input("gh");
                        $arch->IS_APPROVED = $request->input("stat");
                        if (is_array($selectedCountries)) {
                        foreach ($selectedCountries as $ID) {

                            $country = STUDENT::where('S_ID', $ID)->first();
                $country->where('S_ID', $ID)->update([
                      'ARCH_ID' => $archID,

                  ]);


                        }
                    }
                        $arch->save();
                        Log::alert("Archive has been added by $name !");
                        return redirect()->route('faculty.myArchive')->with('alert', 'An archive succesfully added !');
                    } else {
                        $arch->gh = 'There is no GitHub repository For this archive!';
                        $arch->save();
                        Log::alert("Archive has been added $name !");
                        return redirect()->route('faculty.myArchive')->with('alert', 'An archive succesfully added !');
                    }

                }
            else{
            // If they forgot the paper, tell them to bring one
                return redirect()->back()->with('alert', 'No PDF file selected.')->withInput();
                }





    }

    public function archEdit($ARCH_ID){

        $archs =DB::table('a_r_c_h_i_v_e_s')->where('ARCH_ID', $ARCH_ID)->first();

        return view('adminEditArch')->with('archive', $archs);
    }

    public function archUpdate(Request $request, string $id){

        $arch = ARCHIVES::where('ARCH_ID', $id)->first();

        $arch->where('ARCH_ID', $id)->update([

         'ARCH_ID' => $request->ARCH_ID,
         'ARCH_NAME' => $request->ARCH_NAME,
         'ABSTRACT' => $request->ABSTRACT,
         'GITHUB_LINK' => $request->GITHUB_LINK,
         'IS_APPROVED' => $request->IS_APPROVED,
         'PDF_FILE' => $request->pdf_file,
        ]);

        $name = Session::get('fullNs');


        Log::alert("Archive has been Edited by $name!");
        $arch->save();
        return redirect()->route('faculty.archives')->with('alert', 'Archive updated Successfully!');
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
                    return redirect()->route('admin.admin')->with('alert', 'Admin account succesfully added!');

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
                    return redirect()->route('admin.faculty')->with('alert', 'Faculty account succesfully added!');



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
                    return redirect()->route('faculty.student')->with('alert', 'Student Account added!');
                }

        } else {
            return back()->with('alert', 'Id already exist!')->withInput();
        }
    }
}
