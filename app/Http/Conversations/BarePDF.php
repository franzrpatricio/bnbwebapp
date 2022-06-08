<?php

namespace App\Http\Conversations;

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Redirect;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Http\Conversations\SelectHousePlanConversation;

class BarePDF extends Conversation
{
    const PDF = "/generate-pdf";

    public function run()
    {   
        $this->askLot();
    }

    public function askLot(){        
        $slug = self::PDF;
        $question = Question::create("If you have questions about please visit their community page here:")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('see : /city/'.$slug)->value('visit'),
                Button::create('Ask Something Else')->value('continue')
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'visit') {
                    $user = $this->bot->userStorage()->find();
                    $link = route('generate-pdf.bare',[
                        'name' => $user->get('name'),
                        'email' => $user->get('email'),
                        'mobile' => $user->get('mobile'),
                        'sqm' => $user->get('sqm'),
                        'type' => $user->get('type')
                    ]);
                    $this->say("<a href=".$link.">Download your details here.</a>");
                } else {
                    $this->say("Alright, let's talk about something else");
                }
            }
        });
    }
}