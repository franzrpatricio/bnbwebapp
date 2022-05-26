<?php

namespace App\Http\Conversations;

use App\Models\User;
use App\Http\Conversations\FAQConversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\Question;
use App\Http\Conversations\OnboardingConversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Conversations\Conversation;

class FallbackButtons extends Conversation
{
    public function run()
    {
        $this->onlyKnows();
    }

    public function onlyKnows(){
        $question = Question::create("Here are the commands I know, so feel free to explore!")
        ->addButtons([
            Button::create('Frequently Asked Questions')->value('faq'),
            Button::create('Price Estimation Calculator')->value('estimate'),
            Button::create('Forget Everything')->value('forget')
        ]);

        $this->ask($question, function(Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->bot->userStorage()->save([
                    'value' => $answer->getValue()
                ]);
            } else {
                # code...
                $this->say('Please select from Commands.');
                $this->repeat();
            }
            $this->options();
        });
    }

    public function options(){
        $user = $this->bot->userStorage()->find();
        if ($user->get('value')=='faq') {
            # code...
            $this->bot->typesAndWaits(2);
            $this->bot->startConversation(new FAQConversation());
        } elseif ($user->get('value')=='estimate') {
            # code...
            $this->bot->typesAndWaits(2);
            $this->bot->startConversation(new OnboardingConversation()); 
        } elseif ($user->get('value')=='random memes') {
            # code...
                $url = 'https://api.giphy.com/v1/gifs/search?offset=0&type=gifs&sort=&q='.urlencode($user->get('value')).'&api_key=Gc7131jiJuvI7IdN0HZ1D7nh0ow5BU6g&pingback_id=18009b6aba58c2db';
                $res = json_decode(file_get_contents($url));
                $gif = $res->data[1]->images->downsized_large->url;
            
                $message = OutgoingMessage::create('Hope you like it, pal!')->withAttachment(new Image($gif));
                
                $this->bot->typesAndWaits(2);
                $this->bot->reply($message);
        } elseif ($user->get('value')=='fan') {
            # code...
            $image = new Image('/assets/avatar/luffy.jpg');
            $message = OutgoingMessage::create("Kaizoku ore wa naru! 🤗")
                        ->withAttachment($image);
            $this->bot->reply($message);
        } elseif ($user->get('value')=='forget') {
            # code...
            // Delete all stored information. 
            $this->bot->userStorage()->delete();
            $this->bot->typesAndWaits(2);
            $this->bot->reply("What a loss to spend that much time with someone, only to find out that she's a stranger.<br>
            -Joel Barish");
        } 
    }
}