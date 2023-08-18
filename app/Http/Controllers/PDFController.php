<?php
namespace App\Http\Controllers;

use PDF;

class PDFController extends Controller{
    public function generatePdf()
    {
        // test message
        $message = 'This is a test message for PDF generation.';

        // Generate PDF
        $pdf = PDF::loadView('pdf', ['message' => $message]);

        // Choose Download PDF or Display PDF
        // return $pdf->download('test.pdf');
        return $pdf->stream('test.pdf'); 
    }
}