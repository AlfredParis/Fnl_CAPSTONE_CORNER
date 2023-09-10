<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
