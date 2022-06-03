<?php
  
namespace App\Http\Controllers;

use BotMan\BotMan\Facades\BotMan;
use PDF;

  
class PDFBareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateInvoicePDF(BotMan $bot)
    {
        // $user = $bot->userStorage()->find();
        // $cost = $user->get('sqm')*20000;
        // $bot->reply($this->pdf->pdf());
        $pdf = PDF::loadView('layouts.receiptBare')->setPaper('A4','portait');
        return $pdf->stream();
        // return $pdf->download('BanaAndBana-Receipt.pdf');
    }
}