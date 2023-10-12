<?php

namespace App\Http\Controllers;

use App\Models\userCC;
use App\Models\student_acc;
use App\Models\STUDENT;
use App\Models\USER_ACC_EMP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Validator;
use PDF;
use DB;

class userCCcontroller extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userID = $request->input('userID');
        if (isset($userID)) {
            $userID = $request->input('userID');
            $passwordinput = $request->input('password');
            $isStudent = student_acc::where('S_ID', $userID)->exists();
            $isAdmin = USER_ACC_EMP::where('EMP_ID', $userID)->exists();

            if ($isStudent) {
                $password = student_acc::where("S_ID", $userID)->value("PASSWORD");
                $decrypt = decrypt($password);
                    if ( $passwordinput == $decrypt) {
                        $accT = student_acc::where("S_ID", $userID)->value("ACCTYPE");
                            $fullN = DB::table('student_accs')
                            ->join('s_t_u_d_e_n_t_s', 'student_accs.S_ID', '=', 's_t_u_d_e_n_t_s.S_ID')
                            ->where('s_t_u_d_e_n_t_s.S_ID', $userID)
                            ->value('s_t_u_d_e_n_t_s.NAME');

                            Session::put('fullNs', $fullN);
                            Session::put('accT', $accT);
                            return redirect('/student')->with('lrt', 1)->with('alert', "Welcome  $fullN!");
                        }else{
                            return back()->with('messagepass', 'Wrong Password')->withInput();
                        }
                // return back()->with('messagepass', 'is student')->withInput();
            }

            if ($isAdmin) {
                 $accT = USER_ACC_EMP::where("EMP_ID", $userID)->value("ACCTYPE");
                    if ($accT=="admin"){
                        $password = USER_ACC_EMP::where("EMP_ID", $userID)->value("PASSWORD");
                        $decrypt = decrypt($password);
                        if ( $passwordinput == $decrypt) {
                            $fullN = DB::table('u_s_e_r__a_c_c__e_m_p_s')
                            ->join('e_m_p_l_o_y_e_e_s', 'u_s_e_r__a_c_c__e_m_p_s.EMP_ID', '=', 'e_m_p_l_o_y_e_e_s.EMP_ID')
                            ->where('e_m_p_l_o_y_e_e_s.EMP_ID', $userID)
                            ->value('e_m_p_l_o_y_e_e_s.NAME');

                            Session::put('fullNs', $fullN);
                            Session::put('accT', $accT);
                            return redirect('/admin')->with('lrt', 1)->with('alert', "Welcome  $fullN!");
                        }else{
                            return back()->with('messagepass', 'Wrong Password')->withInput();
                        }

                    }
                    else{
                         $password = USER_ACC_EMP::where("EMP_ID", $userID)->value("PASSWORD");
                        $decrypt = decrypt($password);
                        if ( $passwordinput == $decrypt) {
                            $fullN = DB::table('u_s_e_r__a_c_c__e_m_p_s')
                            ->join('e_m_p_l_o_y_e_e_s', 'u_s_e_r__a_c_c__e_m_p_s.EMP_ID', '=', 'e_m_p_l_o_y_e_e_s.EMP_ID')
                            ->where('e_m_p_l_o_y_e_e_s.EMP_ID', $userID)
                            ->value('e_m_p_l_o_y_e_e_s.NAME');

                            Session::put('fullNs', $fullN);
                            Session::put('accT', $accT);
                            return redirect('/faculty')->with('lrt', 1)->with('alert', "Welcome  $fullN!");
                        }else{
                            return back()->with('messagepass', 'Wrong Password')->withInput();
                        }

                    }

            }
            if($isStudent==null && $isAdmin==null )
            {
                 return back()->with('messageid', 'Id does not exist')->withInput();
            }
            // if ($exists) {
            //     $password = userCC::where("fullname", $us)->where("userID", $userID)->value("password");
            //     $decrypt = decrypt($password);

            //     if ($passwordinput == $decrypt) {
            //         $fullN = userCC::where("userID", $userID)->value("fullname");
            //         $accT = userCC::where("fullname", $us)->where("userID", $userID)->value("acctype");

            //         Session::put('fullNs', $fullN);

            //         //user level : student , admin , faculty


            //         if ($accT == 'admin') {
            //             Session::put('accT', $accT);
            //             return redirect('/admin')->with('lrt', 1)->with('alert', "Welcome  $fullN!");
            //         } elseif ($accT == 'faculty') {
            //             Session::put('accT', $accT);
            //             return redirect('/faculty')->with('alert', "Welcome  $fullN!")->with('lrt', 1);
            //         } elseif ($accT == 'student') {
            //             Session::put('accT', $accT);
            //             return redirect('/student')->with('alert', "Welcome  $fullN!")->with('lrt', 1);
            //         } else {
            //             return "gagi aliwa HAHAHAHAHAHA";
            //         }
            //     } else {
            //         return back()->with('messagepass', 'Wrong Password')->withInput();
            //     }
            // } else {
            //     return back()->with('messageid', 'Id does not exist')->withInput();
            // }
        } else {
            return view('login');
        }



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regsiter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//       $validator = Validator::make($request->all(), [

//     "fullname" => "required|min:4|max:50",
//     "password" => "required|min:4|max:100",
// ]);

// if ($validator->fails()) {
//     return back()->withErrors($validator)->withInput();
// }

// Log::alert("User has been added!");

    $user = new student_acc;

    $S_ID = $request->input("S_ID");
    $exists = STUDENT::where('S_ID', $S_ID)->exists();
    $conPass = $request->input("conpassword");
    $pass = $request->input("password");



if ($exists) {

$accExist = student_acc::where('S_ID', $S_ID)->exists();
if ($accExist) {
    return back()->with('alert', 'This student id already has a account.')->withInput();
}else{if ($conPass == $pass) {
    $user->S_ID = $request->input("S_ID");
    $user->PASSWORD = encrypt($request->input("password"));
    $user->ACCTYPE = 'student';
    $user->save();


    $user = DB::table('student_accs')
    ->join('s_t_u_d_e_n_t_s', 'student_accs.S_ID', '=', 's_t_u_d_e_n_t_s.S_ID')
    ->select('s_t_u_d_e_n_t_s.C_ID','s_t_u_d_e_n_t_s.S_ID','s_t_u_d_e_n_t_s.NAME', 'student_accs.PASSWORD')
    ->where('s_t_u_d_e_n_t_s.S_ID', $S_ID)
    ->first();

    $studentCId = DB::table('student_accs')
    ->join('s_t_u_d_e_n_t_s', 'student_accs.S_ID', '=', 's_t_u_d_e_n_t_s.S_ID')
    ->where('s_t_u_d_e_n_t_s.S_ID', $S_ID)
    ->value('s_t_u_d_e_n_t_s.C_ID');

    if ($studentCId) {

            $result = DB::table('c_o_u_r_s_e_s')
            ->join('s_t_u_d_e_n_t_s', 'c_o_u_r_s_e_s.C_ID', '=',  DB::raw($studentCId))
            ->where('s_t_u_d_e_n_t_s.C_ID', $studentCId)
            ->select('c_o_u_r_s_e_s.C_DESC')
            ->first();

    } else {
        // pag walang studentCID
    }
// return dd( $user);
    // Generate the PDF with the same filename as the userID
    $pdf = PDF::loadView('pdf.template', compact('user','result'));
    $pdfFilename = $S_ID . '.pdf';

    // Save the PDF to a temporary storage (optional)
    $pdf->save(storage_path('app/public/' . $pdfFilename));

    // Redirect the user to the 'userCC.index' route with a success message
return redirect()->route('userCC.index')->with('alert', 'Account Successfully Created!')
->with('pdf_url', asset('storage/' . $pdfFilename));
} else {
    return back()->with('alert', 'Password does not match')->withInput();
}

}


} else {


    return back()->with('alert', 'This User ID is not ready yet!')->withInput();
}

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
         $data = []; // Replace with your data retrieval logic

        // Generate the PDF
        $pdf = PDF::loadView('pdf.template', compact('data'));

        // Optionally, you can save the PDF to a file
        // $pdf->save('pdf_filename.pdf');

        // Return the PDF as a response to the user
        return $pdf->stream('pdf_filename.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
