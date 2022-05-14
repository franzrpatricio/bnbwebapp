<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Http\Conversations\SelectHousePlanConversation;

class EstimationConversation extends Conversation
{
    // protected $sqm;
    // protected $houseplan;

    public function run()
    {   
        $this->askLot();
    }

    public function askLot(){
        $this->ask('What is your House sqm?', function(Answer $answer){
            $value = $answer->getText();
            #validate real-time age
            if (!preg_match ("/^[0-9]*$/", $value) ){  
                return $this->repeat("Please put a valid square meters.");
            } else {
                # code...
                $this->bot->userStorage()->save([
                    'sqm' => $value,
                ]);
                $this->say('You have '.$value.' square meter');
                $this->bot->startConversation(new SelectHousePlanConversation());
            }
        });
    }
}