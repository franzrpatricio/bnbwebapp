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
    protected $details;

    public function run()
    {
        $this->askHousePlanType();
    }

    public function askHousePlanType(){
        $plans = HousePlan::all();
        if (count($plans)>0) {
            # code...
            $button = Question::create('What type of House Plan do you prefer?');
            foreach ($plans as $plan) {
                # code...
                $button->addButton(Button::create($plan->type)->value($plan->type));
            }
            $this->ask($button, function(Answer $answer,$plan){
                if ($answer->isInteractiveMessageReply()) {
                    # code...)
                    $selectedValue = $answer->getValue();
                    // $this->say($selectedValue);
                    $this->bot->userStorage()->save([
                        'type' => $selectedValue,
                    ]);
                    
                    $user = $this->bot->userStorage()->find();
                    $this->say( $user->get('type') );
                } else {
                    # code...
                    $this->repeat();
                }
                // $this->bot->startConversation(new ConfirmEstimation());
                $this->confirm();
            });
        }
    }

    public function confirm(){
        $this->say('details of estimation');
        $user = $this->bot->userStorage()->find();
        // $answer = HousePlan::find($user->get('type'));
        // $total = $user->get('sqm') * $answer->cost;
        $this->details = HousePlan::where('type',$user->get('type'))->get();
        $total = $user->get('sqm') * $this->details->cost;

        $message = '-------------------------------------- <br>';
        $message .= 'Name : ' . $user->get('name') . '<br>';
        $message .= 'Email : ' . $user->get('email') . '<br>';
        $message .= 'Mobile : ' . $user->get('mobile') . '<br>';
        $message .= 'House Area : ' . $user->get('sqm') . '<br>';
        $message .= 'House Plan Type : ' . $user->get('type') . '<br>';
        $message .= 'MATERIALS USED<br>';
        $message .= 'Floor : ' .$this->details->floor.'<br>';
        $message .= 'Wall : ' .$this->details->wall.'<br>';
        $message .= 'Window : ' .$this->details->window.'<br>';
        $message .= 'Ceiling : ' .$this->details->ceiling.'<br>';
        $message .= '---------------------------------------<br>';
        $message .= 'Total Estimated Price : ' . $total . '<br>';

        $this->say('Great. Your Estimated Price is done! Here is the details for the Estimated Price. <br><br>' . $message);
    }
}