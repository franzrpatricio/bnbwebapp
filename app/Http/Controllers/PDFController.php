<?php
  
namespace App\Http\Controllers;
  
use PDF;
use Illuminate\Http\Request;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateInvoicePDF()
    {
        $pdf = PDF::loadView('layouts.receipt')->setPaper('A4','portait');

        return $pdf->stream('BanaAndBana-Receipt.pdf');
    }
}