<?php

namespace App\Http\Controllers;

use App\Models\userCC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Validator;


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

            $us = userCC::where("userID", $userID)->value("fullname");

            $exists = userCC::where('userID', $userID)->exists();

            if ($exists) {
                $password = userCC::where("fullname", $us)->where("userID", $userID)->value("password");
                $decrypt = decrypt($password);

                if ($passwordinput == $decrypt) {
                    $fullN = userCC::where("userID", $userID)->value("fullname");
                    $accT = userCC::where("fullname", $us)->where("userID", $userID)->value("acctype");

                    Session::put('fullNs', $fullN);

                    //user level : student , admin , faculty


                    if ($accT == 'admin') {
                        Session::put('accT', $accT);
                        return redirect('/admin')->with('lrt', 1)->with('alert', "Welcome  $fullN!");
                    } elseif ($accT == 'faculty') {
                        Session::put('accT', $accT);
                        return redirect('/faculty')->with('alert', "Welcome  $fullN!")->with('lrt', 1);
                    } elseif ($accT == 'student') {
                        Session::put('accT', $accT);
                        return redirect('/student')->with('alert', "Welcome  $fullN!")->with('lrt', 1);
                    } else {
                        return "gagi aliwa HAHAHAHAHAHA";
                    }
                } else {
                    //Session::put('alert', 'wrong password');
                    //return view('login')->with('alert', 'wrong password');
                    return back()->with('messagepass', 'Wrong Password')->withInput();
                    // return redirect()->route('alertLog');


                }
            } else {

                // Session::put('alert', 'The Id does not exist');
                //return view('login')->with('alert', 'The Id does not exist');
                return back()->with('messageid', 'Id does not exist')->withInput();
                // return redirect()->route('alertLog');
                //
            }
        } else {
            Session::forget('alert');
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
        Log::alert("User has been added!");

        $user = new userCC;
        $user->userID = $request->input("userID");
        $userID = $request->input("userID");
        $conPass = $request->input("conpassword");

        $pass = $request->input("password");
        $exists = userCC::where('userID', $userID)->exists();

        if ($exists) {
            return back()->with('alert', 'Id already exist!')->withInput();
        } else {
            if ($conPass == $pass) {
                $user->fullname = $request->input("fullname");
                $user->password = encrypt($request->input("password"));
                $user->acctype = 'student';
                $user->save();
                return redirect()->route('userCC.index')->with('alert', 'Account Succesfully Created!');
            } else {
                return back()->with('alert', 'Password does not match')->withInput();
            }

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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