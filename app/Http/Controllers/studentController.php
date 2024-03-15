<?php

namespace App\Http\Controllers;
use App\Models\ARCHIVES;
use App\Models\USER_ACC_EMP;
use App\Models\EMPLOYEE;
use App\Models\student_acc;
use Illuminate\Http\Request;
use App\Models\STUDENT;
use App\Models\group;
use App\Models\OP_Archive;
use App\Models\notif;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\messages;
class studentController extends Controller
{

    public function index()
    {
        $total_arch = ARCHIVES::count();
        $total_admin = USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
        $total_student = student_acc::where('ACCTYPE', 'student')->count();
        $total_faculty = USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();
       $archDesc = ARCHIVES::orderBy('viewCount', 'desc')->paginate(3);



        return view('studentDB')->with('arch', $archDesc)->with('ttlStud', $total_student)->with('ttlArch', $total_arch);
    }

    public function archives(Request $request)
    {
        $yearToSearch=$request->input("search");

        if(isset($yearToSearch)){
            $archives=ARCHIVES::where('YEAR_PUB', 'LIKE', '%' . $yearToSearch . '%')->paginate(10);
            $title=ARCHIVES::where('ARCH_NAME', 'LIKE', '%' . $yearToSearch . '%')->paginate(10);

            if (!$archives->isEmpty()) {
                $ret = $archives;
            } elseif (!$title->isEmpty()) {
                $ret = $title;
            } else {
                $ret = collect();
            }
            $auth = STUDENT::where('GROUP_ID', 'N/A')->get();

            return view('studArchiveTB')->with('arch', $ret) ->with( 'auths',$auth);
        }
        $auth = STUDENT::where('GROUP_ID', 'N/A')->get();
        $archives = ARCHIVES::orderByRaw("CAST(SUBSTRING(ARCH_ID, 4) AS UNSIGNED)")->orderBy('ARCH_ID')->paginate(10);

        return view('studArchiveTB')->with('arch', $archives) ->with( 'auths',$auth);
    }


    public function viewCnt(string $ARCH_ID)
    {
        Log::info("Received ARCH_ID: $ARCH_ID");

        $archNW = ARCHIVES::where('ARCH_ID', $ARCH_ID)->first();
        $id=ARCHIVES::where('ARCH_ID', $ARCH_ID)->value('ARCH_ID');
        $total=ARCHIVES::where('ARCH_ID', $ARCH_ID)->value('viewCount');


        if ($archNW) {

            $archNW->where('ARCH_ID', $ARCH_ID)->update([
                'viewCount' => $total + 1,
                'updated_at' => now(),
                 ]);

            $success = true;
            $auths = STUDENT::where('ARCH_ID', 'N/A')->get();
            $arch = ARCHIVES::orderByRaw("CAST(SUBSTRING(ARCH_ID, 4) AS UNSIGNED)")->orderBy('ARCH_ID')->paginate(10);


        } else {

            abort(404);
        }
    }

    public function myArchive()
    {
        $ID = Session::get('userID');

    $archId = STUDENT::where("S_ID", $ID)->value("ARCH_ID");
     $archives= ARCHIVES::where('ARCH_ID',$archId )->paginate(2);
        return view('studMyArchive')->with('arch', $archives);
    }

    public function group()
    {
        $id = Session::get('userID');
        $isGroup=STUDENT::where('S_ID',$id)->value('GROUP_ID');

        if($isGroup =='N/A'){

            $auth=EMPLOYEE::get();
            $groupID= STUDENT::where('S_ID',$id)->value('GROUP_ID');
            $archives=OP_Archive::where('GRP_ID', $groupID)->get();

            return view('studGroup')->with('isGrouped',$isGroup) ->with('adviser', $auth)->with('arch', $archives);
        }else {

            $myGRP=group::where('id',$isGroup)->first();
            $groupID= STUDENT::where('S_ID',$id)->value('GROUP_ID');
            $archives=OP_Archive::where('GRP_ID', $groupID)->get();

            return view('studGroup')->with('isGrouped',$isGroup)->with('GRP_det',$myGRP)->with('arch', $archives);
        }


    }

    public function addGroup(Request $request)
    {

        $id = Session::get('userID');

        $grp = new group;

        $grp->GRP_NAME = $request->input("GRP_NAME");
        $grp->ADVSR_ID = $request->input("ADVSR_ID");
        $grp->ARCH_ID = "N/A";
        $grp->STATUS_ID = 1;
        $grp->save();

        $arch = STUDENT::where('S_ID', $id)->first();
        $arch->where('S_ID', $id)->update([
            'GROUP_ID' => $grp->id
        ]);

        return redirect()->route('studentt.group')->with('alert', 'Group created');

    }

   public function findSimilarWords(Request $request)
{
    $userInput = $request->input('user_input');
    $abs = $request->input('abs');
  if (empty($userInput) || is_null($userInput)) {
        return view('studChecker')->with('similarTitles', []);
    }
    // Split the user input into individual words
    $inputWords = explode(' ', $userInput);

    // Retrieve all titles from the database
    $titles=DB::table('a_r_c_h_i_v_e_s')->pluck('ARCH_NAME');

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
 return view('studChecker')->with('similarTitles', $similarTitles)->with('titel',$userInput)->with('absract',$abs);
}

public function Checker()
    {
        return view('studChecker');
    }

public function addArch()
    {
        return view('studaddArch');
    }

    public function updateMember(Request $request)
    {
        $id = Session::get('userID');
        $logGroup = STUDENT::where('S_ID', $id)->value('GROUP_ID');

        $members = $request->input("S_ID");

        if (is_array($members )) {
            foreach ($members  as $member) {
                $rem=Session::get('userID');
                $remover=STUDENT::where('S_ID',$rem)->value('NAME');
                $mmbr=STUDENT::where('S_ID',$member)->value('NAME');;
                $addComment=new messages;
                $addComment->OP_ID =$logGroup;
                $addComment->COMMENTOR =  $remover;
                $addComment->MESSAGE = $mmbr." has been added by ".$remover;
                $addComment->save();
                $stud = STUDENT::where('S_ID', $member)->update(['GROUP_ID' => $logGroup]);


            }
        }
        return redirect()->route('studentt.group')->with('alert', 'Member Successfully added.');

    }
    public function removeMem($S_ID)
    {           $rem=Session::get('userID');
                $remover=STUDENT::where('S_ID',$rem)->value('NAME');
                $stud = STUDENT::where('S_ID', $S_ID)->first();
                $oparchID=STUDENT::where('S_ID', $S_ID)->value('GROUP_ID');
                $stud->where('S_ID', $S_ID)->update(['GROUP_ID' => "N/A"]);
                $studName=STUDENT::where('S_ID',$S_ID)->value('NAME');
                $addComment=new messages;
                $addComment->OP_ID =$oparchID;
                $addComment->COMMENTOR =  $remover;
                $addComment->MESSAGE = $studName." has been removed by ".$remover;
                $addComment->save();

        return redirect()->route('studentt.group')->with('alert', 'Member Successfully added.');

    }

    public function opArch(Request $request)
    {
        $id = Session::get('userID');
        $name = Session::get('fullNs');
        $groupID= STUDENT::where('S_ID',$id)->value('GROUP_ID');
        $arch = new OP_Archive;
        $total_arch=OP_Archive::where('GRP_ID',$groupID)->count();
        $num=$total_arch+1;

        $arch->ARCH_NAME = "Archive Update #".$num;
        $arch->DESCRIPTION = $request->input("DESCRIPTION");
        $arch->UPLOADER = $name ;
        $arch->GRP_ID = $groupID ;


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
        $archives=OP_Archive::where('GRP_ID', $groupID)->get();

         return redirect()->route('studentt.group')->with('arch', $archives)->with('auths', $auth);



    }


public function storeArch(Request $request)
    {
        $name = Session::get('fullNs');
        $id = Session::get('userID');

        $arch = new ARCHIVES;
        $total_arch=ARCHIVES::count();
        $arch->ARCH_ID = "IT-".$total_arch+1;

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
        $arch->PDF_FILE =  $fileName;

            $arch->save();
            Log::alert("Archive has been added by $name !");
            return redirect()->route('studentt.group')->with('alert', 'An archive succesfully added !');

    }
else{
   // If they forgot the paper, tell them to bring one
    return redirect()->route('studentt.group')->with('alert', 'No PDF file selected.')->withInput();
}





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

}
