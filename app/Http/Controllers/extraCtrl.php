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
use App\Models\group;
use App\Models\OP_Archive;
use App\Models\messages;
use App\Models\TURNED_OVER_ARCHIVES;
use App\Models\User;
use Illuminate\Support\Str;
use SimilarText\Finder;

use Illuminate\Support\Facades\Mail as FacadesMail;


use Mail;
use App\Mail\addStud;
use App\Models\viewsForTrnd;

class extraCtrl extends Controller
{
    public function generatePDF($id)
    {
        // Retrieve the user data by ID
        $user = User::find($id);

        if (!$user) {
            return abort(404); // Handle the case where the user doesn't exist
        }


        $pdf = PDF::loadView('pdf.template', compact('user'));


        return $pdf->stream('pdf_filename.pdf');
    }
    public function importExcelSTUDENT(Request $request)
{
    $this->validate($request, [
        'excel_file' => 'required|mimes:xlsx,xls',
    ]);

    $excelFile = $request->file('excel_file');
    $spreadsheet = IOFactory::load($excelFile->getPathname());
    $worksheet = $spreadsheet->getActiveSheet();

    // Initialize an empty array to store user data
    $userData = [];

    // Start from the second row (assuming the first row contains headers)
    $rowIndex = 2;

    foreach ($worksheet->getRowIterator() as $row) {
        $s_id = $worksheet->getCellByColumnAndRow(1, $rowIndex)->getValue();
        $name = $worksheet->getCellByColumnAndRow(2, $rowIndex)->getValue();
        $c_id = $worksheet->getCellByColumnAndRow(3, $rowIndex)->getValue();
        $ARCH_ID = $worksheet->getCellByColumnAndRow(4, $rowIndex)->getValue();

        // Check if both ID and name are present
        if ($name && $c_id) {
            // Check if the record with the given ID already exists in the database
            if (!STUDENT::where('S_ID', $s_id)->exists()) {
                $userData[] = [
                    'S_ID' => $s_id,
                    'NAME' => $name,
                    'C_ID' => $c_id,
                    'ARCH_ID' => $ARCH_ID,
                ];
            }
        }

        $rowIndex++;
    }

    // Save user data to the database
    STUDENT::insert($userData);

    return redirect()->route('admin.student')->with('alert', 'Data imported successfully');
}


public function findSimilarWords(Request $request)
{
    $userInput = $request->input('user_input');
    $userInputAbs = $request->input('abs');

    if (empty($userInput) || is_null($userInput)) {
        return redirect()->back()->with('similarTitles', []);
    }

    // Split the user input into individual words
    $inputWords = explode(' ', $userInput);

    // Split the user input abstract into individual words
    $inputAbsWords = explode(' ', $userInputAbs);

    // Retrieve all titles and abstracts from the database
    $titlesAndAbstracts = DB::table('t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s')
        ->where('PUB_STAT', 2)
        ->select('TITLE', 'ABS')
        ->get();

    $similarTitles = [];

    foreach ($titlesAndAbstracts as $item) {
        $titleWords = explode(' ', $item->TITLE);
        $absWords = explode(' ', $item->ABS);

        // Compare user input with title
        $titleSimilarity = $this->calculateSimilarity($inputWords, $titleWords);

        // Compare user input abstract with database abstract
        $abstractSimilarity = $this->calculateSimilarity($inputAbsWords, $absWords);

        // If the average similarity percentage is at least 10% for title or abstract, add the title to the result
        if ($titleSimilarity >= 10 || $abstractSimilarity >= 10) {
            $similarTitles[] = [
                'title' => $item->TITLE,
                'abstract' => $item->ABS,
                'average_similarity_percentage' => max($titleSimilarity, $abstractSimilarity),
            ];
        }
    }

    // Sort the results by average similarity percentage in descending order
    usort($similarTitles, function ($a, $b) {
        return $b['average_similarity_percentage'] - $a['average_similarity_percentage'];
    });

    return redirect()->back()->with('similarTitles', $similarTitles)->with('titel', $userInput)->with('abstract', $userInputAbs);
}

private function calculateSimilarity($inputWords, $compareWords)
{
    $totalSimilarityPercentage = 0;

    foreach ($inputWords as $inputWord) {
        $maxSimilarityPercentage = 0;

        foreach ($compareWords as $compareWord) {
            $distance = levenshtein($inputWord, $compareWord);
            $wordSimilarityPercentage = 100 - ($distance / max(strlen($inputWord), strlen($compareWord))) * 100;

            // Cap the similarity percentage at 100%
            $wordSimilarityPercentage = min($wordSimilarityPercentage, 100);

            if ($wordSimilarityPercentage > $maxSimilarityPercentage) {
                $maxSimilarityPercentage = $wordSimilarityPercentage;
            }
        }

        $totalSimilarityPercentage += $maxSimilarityPercentage;
    }

    // Calculate the average similarity percentage
    $wordCount = count($inputWords);
    $averageSimilarityPercentage = $wordCount > 0 ? $totalSimilarityPercentage / $wordCount : 0;

    // Cap the average similarity percentage at 100%
    $averageSimilarityPercentage = min($averageSimilarityPercentage, 100);

    return $averageSimilarityPercentage;
}






public function checkSimilarity(Request $request)
{
    // Validate incoming request data
    $request->validate([
        'title' => 'required|string',
        'abstract' => 'required|string',
    ]);

    // Retrieve input data
    $inputTitle = $request->input('title');
    $inputAbstract = $request->input('abstract');

    // Fetch all articles from the database
    $articles = TURNED_OVER_ARCHIVES::all();

    // Initialize variables for storing most similar article and similarity percentage
    $mostSimilarArticle = null;
    $maxSimilarityPercentage = 0;

    // Loop through each article to find the most similar one
    foreach ($articles as $article) {
        // Calculate similarity percentage for title and abstract
        $titleSimilarityPercentage = $this->SimilarityPercentage($inputTitle, $article->TITLE);
        $abstractSimilarityPercentage = $this->SimilarityPercentage($inputAbstract, $article->ABS);

        // Average similarity percentage for title and abstract
        $averageSimilarityPercentage = ($titleSimilarityPercentage + $abstractSimilarityPercentage) / 2;

        // Check if the current article has a higher similarity percentage
        // than the previously found most similar article
        if ($averageSimilarityPercentage > $maxSimilarityPercentage) {
            $maxSimilarityPercentage = $averageSimilarityPercentage;
            $mostSimilarArticle = $article;
        }
    }

    // Return the most similar article and its similarity percentage
    return response()->json([
        'most_similar_article' => $mostSimilarArticle,
        'similarity_percentage' => $maxSimilarityPercentage,
    ]);
}

// Function to calculate similarity percentage using PHP's similar_text function
private function SimilarityPercentage($string1, $string2)
{
    similar_text($string1, $string2, $percentage);
    return $percentage;
}

public function importExcelSTUDENTFac(Request $request)
{
    $this->validate($request, [
        'excel_file' => 'required|mimes:xlsx,xls',
    ]);

    $excelFile = $request->file('excel_file');
    $spreadsheet = IOFactory::load($excelFile->getPathname());
    $worksheet = $spreadsheet->getActiveSheet();

    // Initialize an empty array to store user data
    $userData = [];

    // Start from the second row (assuming the first row contains headers)
    $rowIndex = 2;

    foreach ($worksheet->getRowIterator() as $row) {
        $s_id = $worksheet->getCellByColumnAndRow(1, $rowIndex)->getValue();
        $name = $worksheet->getCellByColumnAndRow(2, $rowIndex)->getValue();
        $c_id = $worksheet->getCellByColumnAndRow(3, $rowIndex)->getValue();
        $ARCH_ID = $worksheet->getCellByColumnAndRow(4, $rowIndex)->getValue();

        // Check if both ID and name are present
        if ($name && $c_id) {
            // Check if the record with the given ID already exists in the database
            if (!STUDENT::where('S_ID', $s_id)->exists()) {
                $userData[] = [
                    'S_ID' => $s_id,
                    'NAME' => $name,
                    'C_ID' => $c_id,
                    'ARCH_ID' => $ARCH_ID,
                ];
            }
        }

        $rowIndex++;
    }

    // Save user data to the database
    STUDENT::insert($userData);

    return redirect()->route('faculty.student')->with('alert', 'Data imported successfully');
}

public function getSuggestions(Request $request)
{
    $query = $request->input('query');

    $suggestions = DB::table('s_t_u_d_e_n_t_s')
        ->select('S_ID')
        ->where('S_ID', 'like', "%$query%")
        ->get();

    return response()->json($suggestions);
}




public function mail()
{

    $body="Test body";
    $subject="Test subject";
    Mail::to('layla25laser@gmail.com')->send(new addStud($body, $subject));

    return "Test email sent successfully!";

}


public function userEdit($id)
{

    $isAdmin = USER_ACC_EMP::where('EMP_ID', $id)->first();
    $isStudent = student_acc::where('S_ID', $id)->first();
    $isDontAcc = STUDENT::where('S_ID', $id)->first();

  if (!isset($isStudent)&&isset($isDontAcc)) {


      $profile = STUDENT::where('S_ID', $id)->first();

      return view('adminEditUser', compact('profile'));
    }

    else if(isset($isStudent)){

        $Users=$isStudent;
        $profile = STUDENT::where('S_ID', $id)->first();

        return view('adminEditUser', compact('Users', 'profile'));

     }
    else if(isset($isAdmin)){

        $Users=$isAdmin;
        $profile = EMPLOYEE::where('EMP_ID', $id)->first();
        return view('adminEditUser', compact('Users', 'profile'));

    }

}
        public function userUpdate(Request $request, string $id)
        {

            $name = Session::get('fullNs');

            $userID=Session::get('userID');
            $isEMP=USER_ACC_EMP::where('EMP_ID',$id)->value('ACCTYPE');
            $isSTUD=student_acc::where('S_ID',$id)->value('ACCTYPE');

            if ($isSTUD == 'student') {
                $studAcc = student_acc::where('S_ID', $id)->first();
                $currentPass= student_acc::where('S_ID', $id)->value('PASSWORD');
                $currentCourse=STUDENT::where('S_ID', $id)->value('DEPT_ID');
                $NewPASSWORD=$request->NewPASSWORD;

                if(decrypt($currentPass) == $request->PASSWORD){
                        if(!empty($NewPASSWORD)){
                            $studAcc->PASSWORD = encrypt($NewPASSWORD);
                        }
                        $studAcc->save();

                        $studProf = STUDENT::where('S_ID', $id)->first();
                        if (!empty($request->DEPT_ID)) {
                            $studProf->where('S_ID', $id)->update([
                                'NAME' => $request->NAME,
                                'DEPT_ID' => $request->DEPT_ID,
                            ]);
                        }
                        $studProf->where('S_ID', $id)->update([
                            'NAME' => $request->NAME,

                        ]);

                        $notif = new notif;
                        $notif->category = "Update";
                        $notif->content="$name has been updated this account: $id a student ";
                        $notif->suspect=$name ;
                        $notif->save();
                        Log::alert("Student account is updated Successfully by: $name!");
                    return redirect()->back()->with('alert', 'Account Successfully updated.');
                    }else{
                        return redirect()->back()->with('alert', 'Wrong old password.');
                    }

            } else {
                $emp = USER_ACC_EMP::where('EMP_ID', $id)->first();
                $currentPass=USER_ACC_EMP::where('EMP_ID', $id)->value('PASSWORD');
                $PASSWORD=$request->PASSWORD;
                $NewPASSWORD=encrypt($request->NewPASSWORD);

                if($PASSWORD == decrypt($currentPass)){

                    if(!empty($NewPASSWORD)){
                        $emp->where('EMP_ID', $id)->update([
                            'PASSWORD' => $NewPASSWORD,
                        ]);

                    }


                $studProf = EMPLOYEE::where('EMP_ID', $id)->first();
                $studProf->where('EMP_ID', $id)->update([
                    'NAME' => $request->NAME,
                ]);

                $notif = new notif;
                $notif->category = "Update";
                $notif->content="$name has been updated this account: $id a faculty ";
                $notif->suspect=$name ;
                $notif->save();

                Log::alert("Faculty account is updated Successfully by: $name!");
                         return redirect()->back()->with('alert', 'Account Successfully updated.');
                    }else{
                        return redirect()->back()->with('alert', 'Wrong old password.');
                    }
            }

        }

        public function updateProg( string $S_ID ,$G_ID){

            $studProf = group::where('id', $G_ID)->first();

            $studProf->where('id', $G_ID)->update([
                'STATUS_ID' =>$S_ID,
            ]);

            return redirect()->back()->with('alert', 'Status updated');
        }

        public function turnOver(Request $request, $grp_id){

            $userid=Session::get('userID');
             $latestArch=group::where('id', $grp_id)->first();

            $crs="";
            $course=EMPLOYEE::where('EMP_ID', $userid)->value('EMP_DEPT');


            $total_arch=OP_Archive::where('GRP_ID',$grp_id)->count();
            $yawa = "Archive Update #".$total_arch;

            $file=OP_Archive::where('ARCH_NAME',$yawa)->where('GRP_ID',$grp_id)->value('PDF_FILE');
            if ($course== 1) {
                $crs="BEED";
            }

            elseif ($course== 2) {
                $crs="BTLED";
            }
            elseif ($course== 3) {
                $crs="BSEF";
            }
            elseif ($course== 4) {
                $crs="BSESS";
            }
            elseif ($course== 5) {
                $crs="BSBA";
            }
            elseif ($course== 6) {
                $crs="BSIT";
            }
            elseif ($course== 7) {
                $crs="BSHM";
            }
            elseif ($course== 8) {
                $crs="BSOA";
            }
            elseif ($course== 9) {
                $crs="BSA";
            }
            else {
                $crs="BEED";
            }

            $naa=$latestArch['ADVSR_ID'];
            $total=TURNED_OVER_ARCHIVES::count();
            $totalTRND=$total+1;
            $trnd=new TURNED_OVER_ARCHIVES;
            $trnd->ARCH_ID =$crs.$totalTRND;
            $trnd->GROUP_ID=$grp_id;
            $trnd->ADVISER_ID= $userid;
            $trnd->TITLE= $request->input('TITLE') ;
            $trnd->ABS= $request->input('ABS') ;
            $trnd->DEPT_ID= $course;
            $trnd->DOCU= $file;


            $trnd->ADVS_STAT=0;
            $trnd->PUB_STAT=0;
            $trnd->save();
            return redirect()->back()->with('alert', 'Group archive has been turned over');

        }
        public function opArch(Request $request,$grp_id){
            $id = Session::get('userID');
            $name = Session::get('fullNs');

            $arch = new OP_Archive;
            $total_arch=OP_Archive::where('GRP_ID',$grp_id)->count();
            $num=$total_arch+1;
            $arch->ARCH_NAME = "Archive Update #".$num;
            $arch->DESCRIPTION = $request->input("DESCRIPTION");
            $arch->UPLOADER = $name ;
            $arch->GRP_ID = $grp_id ;
            if ($request->hasFile('pdf_file')) {
                $pdfFile = $request->file('pdf_file');
                $fileName = time() . '_' . $pdfFile->getClientOriginalName();
                $pdfFile->storeAs('pdfs', $fileName, 'public');
                    $arch->PDF_FILE = $fileName;
                    $arch->save();
                    $notif = new notif;
                    $notif->category = "Add";
                    $notif->content = "$name has been updated on Progress Archive: $total_arch ";
                    $notif->suspect = $name;
                    $notif->save();
            } else {
                return redirect()->back()->with('alert', 'No PDF file selected.')->withInput();
            }
            $auth = STUDENT::where('GROUP_ID', 'N/A')->get();
            $archives=OP_Archive::where('GRP_ID', $grp_id)->get();

            return redirect()->back()->with('alert', 'PDF uploaded.');
        }

        public function turnedOverArch()
        {
            $userID=Session::get('userID');

        $trndOver=TURNED_OVER_ARCHIVES::paginate(10);
        return view('turnedOverArch')->with('trnd',$trndOver);
        }


        public function archivesFinal()
        {
            $userID=Session::get('userID');
        $grp=TURNED_OVER_ARCHIVES::where('PUB_STAT',2)->paginate(10);

        return view('archiveFinal')->with('groups',$grp);
        }

        public function viewCnt(string $ARCH_ID)
    {
        Log::info("Received ARCH_ID: $ARCH_ID");

        $archNW = viewsForTrnd::where('TRND_ID', $ARCH_ID)->first();

        $total=viewsForTrnd::where('TRND_ID', $ARCH_ID)->value('VIEWS');


        if ($archNW) {

            $archNW->where('TRND_ID', $ARCH_ID)->update([
                'VIEWS' => $total + 1,
                'updated_at' => now(),
                 ]);

            $success = true;

        } else {

            abort(404);
        }
    }
        public function panel(Request $request){
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
