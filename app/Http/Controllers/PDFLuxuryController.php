<?php
  
namespace App\Http\Controllers;
  
use PDF;
  
class PDFLuxuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateInvoicePDF()
    {
        // $bot->reply($this->pdf->pdf());
        $pdf = PDF::loadView('layouts.receiptLuxury')->setPaper('A4','portait');
        return $pdf->stream();
        // return $pdf->download('BanaAndBana-Receipt.pdf');
    }
}