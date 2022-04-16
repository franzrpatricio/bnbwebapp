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
        $type = Question::create('Choose what type of House Plan you want for your house.')
            ->addButtons([
                Button::create('BARE')->value('bare'),
                Button::create('STANDARD')->value('standard'),
                Button::create('LUXURY')->value('luxury'),
        ]);

        $this->ask($type, function(Answer $answer){
            if ($answer->isInteractiveMessageReply()) {
                # code...
                $this->bot->userStorage()->save([
                    'house' => $answer->getValue(),
                ]);
                $this->bot->startConversation(new ConfirmEstimation());
            }
            // else {
            //     # code...
            //     $this->say('Please choose from the options below.');
            //     $this->repeat();
            // }
        });
    }
}