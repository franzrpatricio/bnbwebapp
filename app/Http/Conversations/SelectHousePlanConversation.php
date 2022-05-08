<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use App\Http\Conversations\ConfirmEstimation;
use App\Models\HousePlan;
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

        // $question = Question::create('Do you need a database?')
        // ->addButtons([
        //     Button::create('Bare')->value('bare'),
        //     Button::create('Standard')->value('standard'),
        //     Button::create('Luxury')->value('luxury'),
        // ]);

        $plans = HousePlan::all();
        if (count($plans)>0) {
            # code...
            $button = Question::create('What type of House Plan do you prefer?');
            foreach ($plans as $plan) {
                # code...
                $button->addButton(Button::create($plan->type)->value($plan->id));

                $this->ask($button, function(Answer $answer){
                    if ($answer->isInteractiveMessageReply()) {
                        # code...
                        $selectedValue = $answer->getValue();
                        $this->say($selectedValue);
                        $this->bot->userStorage()->save([
                            'type' => $selectedValue,
                        ]);
                        $user = $this->bot->userStorage()->find();
                        $this->say( $user->get('type') );
                    } else {
                        # code...
                        $this->repeat();
                    }
                    $this->bot->startConversation(new ConfirmEstimation());
                });
            }
        }

        // $this->ask($question, function(Answer $answer){
        //     $this->say('hey');
        //     if ($answer->isInteractiveMessageReply()) {
        //         # code...
        //         $selectedValue = $answer->getValue();
        //         $this->say('hey'.$selectedValue);
               
        //         $this->bot->userStorage()->save([
        //             'house' => $selectedValue,
        //         ]);
        //         $user = $this->bot->userStorage()->find();
                
        //         $this->say( $user->get('house') );
        //     }
        //     else {
        //         # code...
        //         $this->say('asda');
        //         $this->repeat();
        //     }
        //     $this->bot->startConversation(new ConfirmEstimation());
        // });
    }
}