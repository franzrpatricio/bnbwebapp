<?php

namespace App\Http\Conversations;

use Illuminate\Support\Facades\Validator;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Http\Conversations\EstimationConversation;
use BotMan\BotMan\Messages\Conversations\Conversation;


class OnboardingConversation extends Conversation
{
    // protected $name;
    // protected $age;

    public function run()
    {
        $this->say('But first, let me ask you the necessary informations.');
        $this->askName();
       
    }

    public function askName()
    {
        $this->ask('What is your name?', function(Answer $answer) {
            $this->bot->userStorage()->save([
                'name' => $answer->getText(),
            ]);

            $this->say('Nice to meet you '. $answer->getText());
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask('What is your email?', function(Answer $answer) {

            $validator = Validator::make(['email' => $answer->getText()], [
                'email' => 'email',
            ]);

            if ($validator->fails()) {
                return $this->repeat('That doesn\'t look like a valid email. Please enter a valid email.');
            }

            $this->bot->userStorage()->save([
                'email' => $answer->getText(),
            ]);

            $this->askMobile();
        });
    }

    public function askMobile()
    {
        $this->ask('Great. What is your mobile?', function(Answer $answer) {
            $this->bot->userStorage()->save([
                'mobile' => $answer->getText(),
            ]);
            $this->askLot();
        });
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