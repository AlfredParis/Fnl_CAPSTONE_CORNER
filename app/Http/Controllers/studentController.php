<?php

namespace App\Http\Controllers;
use App\Models\ARCHIVES;
use App\Models\USER_ACC_EMP;
use App\Models\student_acc;
use Illuminate\Http\Request;
use DB;

class studentController extends Controller
{

    public function index()
    {
        $ID = Session::get('userID') ;
        $total_arch=ARCHIVES::count() ;
  $total_admin= USER_ACC_EMP::where('ACCTYPE', 'admin')->count();
  $total_student=student_acc::where('ACCTYPE', 'student')->count();
  $total_faculty=USER_ACC_EMP::where('ACCTYPE', 'faculty')->count();


        return view('studentDB')->with('tl_admin', $total_admin)->with('tl_arch', $total_arch)->with('tl_stud', $total_student)->with('tl_fac', $total_faculty);
    }


    public function myArchive()
    {
         $archives = DB::table('ARCHIVES')
     ->where('ARCHIVES.AUTHOR_ID', '=', $ID)
    ->select('ARCHIVES.ARCH_ID', 'ARCHIVES.ARCH_NAME', 'ARCHIVES.PASSWORD','u_s_e_r__a_c_c__e_m_p_s.USER_ID_EMP')
    ->paginate(2);
        return view('studMyArchive')->with('arch', $archives);
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
 return view('studChecker')->with('similarTitles', $similarTitles)->with('titel',$userInput)->with('absract',$abs);
}
  public function Checker()
    {
        return view('studChecker');
    }

}
