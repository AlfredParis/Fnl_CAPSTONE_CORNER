<?php
namespace App\Http\Controllers;
// library for year
use Carbon\Carbon;

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

use App\Http\Controllers\userCCcontroller;

use Validator;

class group extends Controller
{

    public function index(Request $request)
    {

    }
}
