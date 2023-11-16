<?php

namespace App\Http\Controllers;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use App\Models\STUDENT;
use Mail;
use App\Mail\addStud;



use Illuminate\Support\Facades\DB;

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
}
