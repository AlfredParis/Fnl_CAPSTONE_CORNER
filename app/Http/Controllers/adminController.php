<?php

namespace App\Http\Controllers;

use App\Models\archive;
use App\Models\userCC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


use App\Http\Controllers\userCCcontroller;
use Validator;

class adminController extends Controller
{
    // TODO:design table
    // TODO:make table of faculty and admin
    // TODO:apply the checker and akso connect it in the database
    public function index()
    {
        return view('adminDashB');
    }
    public function checker()
    {
        return view('adminChecker');
    }
    public function archives()
    {
        $archives = archive::paginate(2);
        return view('adminArchive')->with('arch', $archives);
    }
    public function student()
    {
        $studentPage = userCC::where('acctype', 'student')->paginate(2);

        return view('adminStudentTB')->with('students', $studentPage);
    }
    public function faculty()
    {
        $facultyPage = userCC::where('acctype', 'faculty')->paginate(2);
        return view('adminFacultyTB')->with('faculty', $facultyPage);
    }
    public function admin()
    {
        $adminPage = userCC::where('acctype', 'admin')->paginate(2);
        return view('adminAdminTB')->with('admin', $adminPage);
    }

    public function addUser($user)
    {

        return view('adminAdduser')->with('userAdd', $user);
    }
    public function storeUser(Request $request, $userac)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "userID" => "required|min:2|max:20",
                "fullname" => "required|min:4|max:50",
                "password" => "required|min:4|max:100",

            ]
        );
        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();
        }


        $user = new userCC;
        $user->userID = $request->input("userID");
        $userID = $request->input("userID");
        $conPass = $request->input("conpassword");

        $pass = $request->input("password");
        $exists = userCC::where('userID', $userID)->exists();
        $name = Session::get('fullNs');

        if ($exists) {
            return back()->with('alert', 'Id already exist!')->withInput();
        } else {
            if ($conPass == $pass) {
                $user->fullname = $request->input("fullname");
                $user->password = encrypt($request->input("password"));
                if ($userac == 'admin') {
                    $user->acctype = 'admin';
                    $user->save();
                     Log::alert("$name has been added this account: $userID a admin");
                    return redirect()->route('admin.admin')->with('alert', 'Admin account succesfully added!');
                } elseif ($userac == 'faculty') {
                    $user->acctype = 'faculty';
                    $user->save();
                     Log::alert("$name has been added this account: $userID a faculty");
                    return redirect()->route('admin.faculty')->with('alert', 'Faculty account succesfully added!');
                } else {
                    $user->acctype = 'student';
                    $user->save();
                     Log::alert("$name has been added this account: $userID a student");
                    return redirect()->route('admin.student')->with('alert', 'Student Account added!');
                }



            } else {
                return back()->with('alert', 'Password does not match')->withInput();
            }

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
        $arch = new archive;
        $arch->archID = $request->input("archID");
        $arch->name = $request->input("name");
        $arch->author = $request->input("author");

// Check if a file was uploaded
if ($request->hasFile('pdf_file')) {
    $pdfFile = $request->file('pdf_file');

    // Move the uploaded file to a directory and generate a unique filename
    $filename = uniqid().'.'.$pdfFile->getClientOriginalExtension();
    $pdfFile->move(public_path('pdfs'), $filename);

    // Set the PDF file path in the archive object
    $arch->pdf_file = 'pdfs/'.$filename;
} else {
    $arch->pdf_file = null;
}


        $gh = $request->input("gh");
        if (isset($gh)) {
            $arch->gh = $request->input("gh");
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
    public function archEdit($id)
    {
        $arch = archive::find($id);

        return view('adminEditArch')->with('archive', $arch);
    }
    public function archUpdate(Request $request, string $id)
    {
        $name = Session::get('fullNs');

        $arch = archive::find($id);
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

        // Retrieve all sentences from the database
        $sentences = DB::table('archives')->pluck('name');

        $similarSentences = [];

        // Loop through each sentence and check for similar words
        foreach ($sentences as $sentence) {
            $sentenceWords = explode(' ', $sentence);
            $similarWords = [];
            $similarWordCount = 0;

            foreach ($sentenceWords as $word) {
                $distance = levenshtein($userInput, $word);

                // If the distance is below a certain threshold, consider it a similar word
                if ($distance <= 2) {
                    $similarWords[] = $word;
                    $similarWordCount++;
                }
            }

            // Calculate the percentage of similarity
            $similarityPercentage = ($similarWordCount / count($sentenceWords)) * 100;

            // If there are similar words, add the sentence to the result
            if (!empty($similarWords)) {
                $similarSentences[] = [
                    'sentence' => $sentence,
                    'similar_words' => $similarWords,
                    'similarity_percentage' => $similarityPercentage
                ];
            }
        }

        return view('adminChecker')->with('similarSentences', $similarSentences);
    }



}
