<?php

namespace App\Http\Controllers;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use App\Models\STUDENT;

class extraCtrl extends Controller
{
    public function generatePDF($id)
    {
        // Retrieve the user data by ID
        $user = User::find($id);

        if (!$user) {
            return abort(404); // Handle the case where the user doesn't exist
        }

        // Generate the PDF
        $pdf = PDF::loadView('pdf.template', compact('user'));

        // Optionally, you can save the PDF to a file
        // $pdf->save('pdf_filename.pdf');

        // Return the PDF as a response to the user
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
            $rowIndex = 1;
        
            foreach ($worksheet->getRowIterator() as $row) {
                // Get user ID from the first column (A)
                $name = $worksheet->getCellByColumnAndRow(1, $rowIndex)->getValue();
        
                // Get user name from the second column (B)
                $c_id = $worksheet->getCellByColumnAndRow(2, $rowIndex)->getValue();
        
                // Check if both ID and name are present
                if ($name && $c_id) {
                    $userData[] = [
                        'NAME' => $name,
                        'C_ID' => $c_id,
                    ];
                }
        
                $rowIndex++;
            }
        
            // Save user data to the database
            STUDENT::insert($userData);
        
            return redirect()->route('admin.student')->with('alert','Data imported successfully');
        
        
    }
}
