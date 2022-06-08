<?php
  
namespace App\Http\Controllers;

use BotMan\BotMan\Facades\BotMan;
use Illuminate\Http\Request;
use PDF;

  
class PDFBareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function generateInvoicePDF()
    {
        $user = $this->userStorage()->find();

        $pdf = PDF::loadView('layouts.receiptBare', array(
            'name' => $user->get('name'),
            'email' => $user->get('email'),
            'mobile' => $user->get('mobile'),
            'sqm' => $user->get('sqm'),
            'type' => $user->get('type')
        ))->setPaper('A4','portait');
        return $pdf->stream();
        // return $pdf->download('BanaAndBana-Receipt.pdf');
    }
}