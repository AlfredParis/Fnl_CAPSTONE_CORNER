<?php

namespace App\Http\Controllers;
use App\Models\archive;
use App\Models\userCC;
use Illuminate\Http\Request;
use DB;

class studentController extends Controller
{

    public function index()
    {  $total_arch=archive::count() ;
        $total_admin= userCC::where('acctype', 'admin')->count();
        $total_student=userCC::where('acctype', 'student')->count();
        $total_faculty=userCC::where('acctype', 'faculty')->count();
        return view('studentDB')->with('tl_admin', $total_admin)->with('tl_arch', $total_arch)->with('tl_stud', $total_student)->with('tl_fac', $total_faculty);
    }
    public function myArchive()
    {
        return view('studMyArchive');
    }
  
    public function findSimilarWords(Request $request)
{
    $userInput = $request->input('user_input');
  if (empty($userInput) || is_null($userInput)) {
        return view('studChecker')->with('similarTitles', []);
    }
    // Split the user input into individual words
    $inputWords = explode(' ', $userInput);

    // Retrieve all titles from the database
    $titles = DB::table('archives')->pluck('name');

    $similarTitles = [];

    // Loop through each title and check for similarity with any input word
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

                // Calculate similarity percentage for this word
                $wordSimilarityPercentage = 100 - ($distance / max(strlen($inputWord), strlen($titleWord))) * 100;

                // If the similarity percentage is higher, update max similarity
                if ($wordSimilarityPercentage > $maxSimilarityPercentage) {
                    $maxSimilarityPercentage = $wordSimilarityPercentage;

                    // Check if this input word is already found in the title
                    if (stripos($titleWord, $inputWord) !== false) {
                        $inputWordFound = true;
                    }
                }
            }

            // Add the similar word to the list only if it is found in the title
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
        if ($averageSimilarityPercentage >= 40 && !empty($similarWords)) {
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



    return view('studChecker')->with('similarTitles', $similarTitles)->with('titel',$userInput);
}

}
