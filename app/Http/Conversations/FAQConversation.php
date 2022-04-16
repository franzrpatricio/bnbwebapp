<?php

namespace App\Http\Conversations;

use App\Models\Faqs;
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
        $faqs = Faqs::all();
        if (count($faqs)>0) {
            # code...
            $askthis = Question::create('Choose from the Frequently Asked Questions below.');
            foreach ($faqs->question as $faq) {
                # code...
                $askthis->addButton(Button::create($faq)->value($faq->id));
            }
            $this->ask($askthis,function(Answer $answer){
                if ($answer->isInteractiveMessageReply()) {
                    # code...
                    $this->say($answer->getValue());
                    switch ($answer->getValue()) {
                        case '1':
                            # code...
                            $this->say($faqs->answer);
                            break;
                        case '2':
                            # code...
                            $this->say('this is faq 2');
                            break;
                        case '3':
                            # code...
                            $this->say('this is faq 3');
                            break;
                        case '4':
                            # code...
                            $this->say('this is faq 4');
                            break;
                        case '5':
                            # code...
                            $this->say('this is faq 5');
                            break;
                        default:
                            # code...
                            $this->say("I don't have an answer to that but i'll look up to that query.");
                            break;
                    }
                }else {
                    # code...
                    $this->say('lol wtf');
                }
                $this->repeat();
            });
        }else {
            # code...
            $this->say("Sorry we don't have any FAQs for now.");
        }
    }
}