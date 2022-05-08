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
                $askthis->addButton(Button::create($faq->question)->value($faq->id));

                $this->ask($askthis,function(Answer $answer, $faq){
                    if ($answer->isInteractiveMessageReply()) {
                        # code...
                        $this->say($faq->answewr);
                        // $faq = Faq::where('id',$answer->getValue())->select('answer')->get();
                        // switch ($answer->getValue()) {
                        //     case '1':
                        //         # code...
                        //         $this->say($faq->answewr);
                        //         break;
                        //     case '2':
                        //         # code...
                        //         $this->say($faq->answewr);
                        //         break;
                        //     case '3':
                        //         # code...
                        //         $this->say($faq->answewr);
                        //         break;
                        //     case '4':
                        //         # code...
                        //         $this->say($faq->answewr);
                        //         break;
                        //     case '5':
                        //         # code...
                        //         $this->say($faq->answewr);
                        //         break;
                        //     default:
                        //         # code...
                        //         $this->say("I don't have an answer to that but i'll look up to that query.");
                        //         break;
                        // }
                    }else {
                        # code...
                        $this->say('lol');
                    }
                    $this->repeat();
                });
            }
        }else {
            # code...
            $this->say("Sorry we don't have any FAQs for now.");
        }
    }
}