<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Support\Facades\Redirect;

class SelectHousePlanConversation extends Conversation
{    
    public function run()
    {
        $this->askHousePlanType();
    }

    public function askHousePlanType(){

        $question = Question::create('What type of House Plan do you prefer?')
            ->addButtons([
                Button::create('Bare')->value('Bare'),
                Button::create('Standard')->value('Standard'),
                Button::create('Luxury')->value('Luxury'),
            ]);

        $this->ask($question, function(Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->bot->userStorage()->save([
                    'type' => $answer->getValue()
                ]);
            } else {
                # code...
                $this->say('Please Select only from the Buttons.');
                $this->repeat();
            }
            $this->choices();
        });
    }

    public function choices(){
        $user = $this->bot->userStorage()->find();
        if ($user->get('type')=='Bare') {
            # code...
            $this->Bare();
        } elseif ($user->get('type')=='Standard') {
            # code...
            $this->Standard();
        } elseif ($user->get('type')=='Luxury') {
            # code...
            $this->Luxury();
        }
    }

    public function Bare(){
        $user = $this->bot->userStorage()->find();
        $total = $user->get('sqm')*20000;

        // return view('layouts.receiptBare',compact('user','total'));
        $message = '-------------------------------------- <br>';
        $message .= 'Name : ' . $user->get('name') . '<br>';
        $message .= 'Email : ' . $user->get('email') . '<br>';
        $message .= 'Mobile : ' . $user->get('mobile') . '<br>';
        $message .= 'House Area : ' . $user->get('sqm').'sqm'. '<br>';
        $message .= 'House Plan Type : ' . $user->get('type') . '<br>';
        $message .= 'MATERIALS USED<br>';
        $message .= 'Floor : Polished Concrete<br>';
        $message .= 'Wall : Concrete<br>';
        $message .= 'Window : Minimal To Standard<br>';
        $message .= 'Ceiling : None/Soffit is optional<br>';
        $message .= '---------------------------------------<br>';
        $message .= 'Total Estimated Price : P ' . $total .'.00 <br>';
        $message .= '<br>';
        $message .= '<small><strong>IMPORTANT: PLEASE READ!</strong></small><br>';
        $message .= '<small>-RATES are rules of thumb ONLY and serve as the minimum basis for your building ESTIMATES may vary to your choosen design</small><br>';
        $message .= '<small>-ALWAYS consult with an ARCHITECT to know more about your building according to you unique needs</small><br>';
        $message .= '<small>-A lot of factors may affect the COSTS,i.e. soil state, market influence, labor,etc.</small><br>';
        $message .= '<small>-These data should be useful at the early stages of the design process to know certain limitations and manage expections</small><br>';
        $message .= '<small>-Landscape,pools, fences and other structures or components aside from the main building are EXCLUDED in the said approximate rate and should be computed saperately.</small><br>';
        $message .= '<small>-Lastly, Professional Fees, Transaction and Permit Fees, Taxes and the like are also NOT included in the approximate buiuilding contruction rate.</small><br>';
        $this->say('<small>Great. Your Estimated Price is done! Here is the details for the Estimated Price.</small><br><br>' . $message);
        $this->bot->startConversation(new BarePDF());
        // $this->pdfBare();
    }

    public function Standard(){
        $user = $this->bot->userStorage()->find();
        $total = $user->get('sqm')*30000;
        
        $message = '-------------------------------------- <br>';
        $message .= 'Name : ' . $user->get('name') . '<br>';
        $message .= 'Email : ' . $user->get('email') . '<br>';
        $message .= 'Mobile : ' . $user->get('mobile') . '<br>';
        $message .= 'House Area : ' . $user->get('sqm').'sqm'. '<br>';
        $message .= 'House Plan Type : ' . $user->get('type') . '<br>';
        $message .= 'MATERIALS USED<br>';
        $message .= 'Floor : Tiles<br>';
        $message .= 'Wall : Paint<br>';
        $message .= 'Window : Standard<br>';
        $message .= 'Ceiling : Gypsum<br>';
        $message .= '---------------------------------------<br>';
        $message .= 'Total Estimated Price : ' . $total . '<br>';
        $message .= '<br>';
        $message .= '<small><strong>IMPORTANT: PLEASE READ!</strong></small><br>';
        $message .= '<small>-RATES are rules of thumb ONLY and serve as the minimum basis for your building ESTIMATES may vary to your choosen design</small><br>';
        $message .= '<small>-ALWAYS consult with an ARCHITECT to know more about your building according to you unique needs</small><br>';
        $message .= '<small>-A lot of factors may affect the COSTS,i.e. soil state, market influence, labor,etc.</small><br>';
        $message .= '<small>-These data should be useful at the early stages of the design process to know certain limitations and manage expections</small><br>';
        $message .= '<small>-Landscape,pools, fences and other structures or components aside from the main building are EXCLUDED in the said approximate rate and should be computed saperately.</small><br>';
        $message .= '<small>-Lastly, Professional Fees, Transaction and Permit Fees, Taxes and the like are also NOT included in the approximate buiuilding contruction rate.</small><br>';
        $this->say('<small>Great. Your Estimated Price is done! Here is the details for the Estimated Price.</small><br><br>' . $message);
        $this->bot->startConversation(new StandardPDF());
        // $this->pdfStandard();
    }
    public function Luxury(){
        $user = $this->bot->userStorage()->find();
        $total = $user->get('sqm')*40000;
        $message = '-------------------------------------- <br>';
        $message .= 'Name : ' . $user->get('name') . '<br>';
        $message .= 'Email : ' . $user->get('email') . '<br>';
        $message .= 'Mobile : ' . $user->get('mobile') . '<br>';
        $message .= 'House Area : ' . $user->get('sqm').'sqm'. '<br>';
        $message .= 'House Plan Type : ' . $user->get('type') . '<br>';
        $message .= 'MATERIALS USED<br>';
        $message .= 'Floor : Tiles to Natural Stones<br>';
        $message .= 'Wall : Imported Wall tiles to Cladding<br>';
        $message .= 'Window : Bigger to Window<br>';
        $message .= 'Ceiling : PVC<br>';
        $message .= '---------------------------------------<br>';
        $message .= 'Total Estimated Price : ' . $total . '<br>';
        $message .= '<br>';
        $message .= '<small><strong>IMPORTANT: PLEASE READ!</strong></small><br>';
        $message .= '<small>-RATES are rules of thumb ONLY and serve as the minimum basis for your building ESTIMATES may vary to your choosen design</small><br>';
        $message .= '<small>-ALWAYS consult with an ARCHITECT to know more about your building according to you unique needs</small><br>';
        $message .= '<small>-A lot of factors may affect the COSTS,i.e. soil state, market influence, labor,etc.</small><br>';
        $message .= '<small>-These data should be useful at the early stages of the design process to know certain limitations and manage expections</small><br>';
        $message .= '<small>-Landscape,pools, fences and other structures or components aside from the main building are EXCLUDED in the said approximate rate and should be computed saperately.</small><br>';
        $message .= '<small>-Lastly, Professional Fees, Transaction and Permit Fees, Taxes and the like are also NOT included in the approximate buiuilding contruction rate.</small><br>';
        $this->say('<small>Great. Your Estimated Price is done! Here is the details for the Estimated Price.</small><br><br>' . $message);
        $this->bot->startConversation(new LuxuryPDF());
        // $this->pdfLuxury();
    }
}