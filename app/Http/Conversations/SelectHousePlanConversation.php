<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use App\Http\Conversations\ConfirmEstimation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class SelectHousePlanConversation extends Conversation
{
    public function run()
    {
        $this->askHousePlanType();
    }

    public function askHousePlanType(){

        $question = Question::create('Do you need a database?')
        ->addButtons([
            Button::create('Bare')->value('bare'),
            Button::create('Standard')->value('standard'),
            Button::create('Luxury')->value('luxury'),
        ]);
        // $type = Question::create('Choose what type of House Plan you want for your house.')
        //     ->addButtons([
        //         Button::create('BARE')->value('bare'),
        //         Button::create('STANDARD')->value('standard'),
        //         Button::create('LUXURY')->value('luxury'),
        // ]);

        $this->ask($question, function(Answer $answer){
            $this->say('hey');
           // Log::debug( $answer)
            if ($answer->isInteractiveMessageReply()) {
                # code...
                $selectedValue = $answer->getValue();
                $this->say('hey'.$selectedValue);
               
                $this->bot->userStorage()->save([
                    'house' => $selectedValue,
                ]);
                $user = $this->bot->userStorage()->find();
                
                $this->say( $user->get('house') );
            }
            else {
                # code...
                $this->say('asda');
                $this->repeat();
            }
            $this->bot->startConversation(new ConfirmEstimation());
        });
    }
}