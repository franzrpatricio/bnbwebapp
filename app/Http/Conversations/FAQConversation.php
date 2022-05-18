<?php

namespace App\Http\Conversations;

use App\Models\Faq;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class FAQConversation extends Conversation
{
    public function run()
    {
        $this->faqs();
    }
    
    public function faqs(){
        $faqs = Faq::all();
        if (count($faqs)>0) {
            # code...
            $askthis = Question::create('Choose from the Frequently Asked Questions below.');
            foreach ($faqs as $faq) {
                # code...
                $askthis->addButton(Button::create($faq->question)->value($faq->answewr));
            }
            
            $this->ask($askthis,function(Answer $answer){
                if ($answer->isInteractiveMessageReply()) {
                    # code...
                    // $this->say($answer->getValue());
                    $selectedValue = $answer->getValue();
                    // $this->say($selectedValue);
                    $this->bot->userStorage()->save([
                        'answewr' => $selectedValue,
                    ]);
                    $choice = $this->bot->userStorage()->find();
                    $this->say('Answer: '.$choice->get('answewr') );
                }else {
                    # code...
                    $this->say('lol');
                }
                $this->say("Type stop if you wish to stop the FAQs");
                $this->repeat();
            });
        }else {
            # code...
            $this->say("Sorry we don't have any FAQs for now.");
        }
    }
}