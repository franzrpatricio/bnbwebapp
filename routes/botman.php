<?php

use BotMan\BotMan\BotMan;
use App\Http\Controllers\PDFController;
use App\Http\Conversations\BarePDF;
use App\Http\Conversations\EstimationConversation;
use App\Http\Conversations\FallbackButtons;
use App\Http\Conversations\OnboardingConversation;

#DEFINE ALL BOTMAN COMMANDS

$botman = app('botman');

// $botman->hears('pdf', function($bot){
//     $bot->startConversation(new BarePDF());
// });
$botman->hears('Open Calculator', function($bot){
    $bot->typesAndWaits(2);
    $bot->reply("Let's start your Rough Estimation!");
    $bot->startConversation(new OnboardingConversation());
});

#in order for the bot to reply when the user says hi added with something else, we will add '(.*)'
$botman->hears('hi|hello|yow|zup(.*)', function($bot){
    $bot->typesAndWaits(2);
    $bot->assertReplies('hello');
});
$botman->hears('ty|thanks|tnx|thank you(.*)', function($bot){
    $bot->typesAndWaits(2);
    $bot->reply("You're Welcome");
});
$botman->hears('I want to Inquire(.*)', function($bot){
    $bot->typesAndWaits(2);
    $bot->reply("Please go to Contact Us Page to inquire about almost anything to our Architect! :)");
});
$botman->hears('MENU', function($bot){
    $bot->typesAndWaits(2);
    $bot->startConversation(new FallbackButtons());
});
#stops convo immediately
$botman->hears('stop', function($bot){
    $bot->typesAndWaits(2);
    $bot->reply('Conversation has stopped');
})->stopsConversation();
#fallback message
$botman->fallback(function($bot){
    #get the user message
    $message = $bot->getMessage();

    $bot->typesAndWaits(2);
    $bot->reply("I don't know what should I say about ".$message->getText());
    // $bot->reply("Here are the list of my commands:<br>
    //     /gif 'type something...'<br>
    //     /smile<br>
    //     /faq<br>
    //     /estimate<br>
    //     /forgetMe<br>
    //     /stop<br>
    // ");
    $bot->startConversation(new FallbackButtons());
});
#LAHAT NG DATA NA INI -STORE NAPUPUNTA SA STORAGE/BOTMAN
#Capture User Input->use->{}

#bot reply with attachments
// $botman->hears('/gif {meme}',function($bot,$meme){
//     $url = 'https://api.giphy.com/v1/gifs/search?offset=0&type=gifs&sort=&q='.urlencode($meme).'&api_key=Gc7131jiJuvI7IdN0HZ1D7nh0ow5BU6g&pingback_id=18009b6aba58c2db';
//     $res = json_decode(file_get_contents($url));
//     $gif = $res->data[1]->images->downsized_large->url;

//     $message = OutgoingMessage::create('This is your GIF')->withAttachment(new Image($gif));
    
//     $bot->typesAndWaits(2);
//     $bot->reply($message);
// });

// $botman->hears('/smile',function($bot){
//     $image = new Image('/assets/images/smile.png');
//     $message = OutgoingMessage::create("Lighten up, pal! This one's for you. 🤗")
//                 ->withAttachment($image);
//     $bot->reply($message);
// });

#simple inline convo && CONVERSATION class
// $botman->hears('/askMe', function($bot){
//     $bot->typesAndWaits(2);
//     $bot->startConversation(new SelectHousePlanConversation());
// });

// $botman->hears('/faq', function($bot){
//     $bot->typesAndWaits(2);
//     $bot->startConversation(new FAQConversation());
// });

// $botman->hears('/estimate', function($bot){
//     $bot->typesAndWaits(2);
//     $bot->startConversation(new OnboardingConversation());   
// });

// $botman->hears("/forgetMe", function (BotMan $bot) {
//     // Delete all stored information. 
//     $bot->userStorage()->delete();
//     $bot->typesAndWaits(2);
//     $bot->reply("What a loss to spend that much time with someone, only to find out that she's a stranger.<br>
//     -Joel Barish");
// });
?>