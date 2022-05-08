<?php

use BotMan\BotMan\BotMan;
use App\Http\Conversations\FAQConversation;
use BotMan\BotMan\Messages\Attachments\File;
use App\Http\Conversations\ConfirmEstimation;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use App\Http\Conversations\EstimationConversation;
use App\Http\Conversations\OnboardingConversation;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use App\Http\Conversations\SelectHousePlanConversation;

#DEFINE ALL BOTMAN COMMANDS

$botman = app('botman');

#LAHAT NG DATA NA INI -STORE NAPUPUNTA SA STORAGE/BOTMAN

#in order for the bot to reply when the user says hi added with something else, we will add '(.*)'
$botman->hears('hi|hello|yow|zup(.*)', function($bot){
    $bot->typesAndWaits(2);
    $bot->reply('hello');
});

$botman->hears('ty|thanks|tnx|thank you(.*)', function($bot){
    $bot->typesAndWaits(2);
    $bot->reply("You're Welcome");
});

#Capture User Input->use->{}

#bot reply with attachments
$botman->hears('!gif {meme}',function($bot,$meme){
    $url = 'https://api.giphy.com/v1/gifs/search?offset=0&type=gifs&sort=&q='.urlencode($meme).'&api_key=Gc7131jiJuvI7IdN0HZ1D7nh0ow5BU6g&pingback_id=18009b6aba58c2db';
    $res = json_decode(file_get_contents($url));
    $gif = $res->data[1]->images->downsized_large->url;

    $message = OutgoingMessage::create('This is your GIF')->withAttachment(new Image($gif));
    
    $bot->typesAndWaits(2);
    $bot->reply($message);
});

#bot replies with video
// $botman->hears('!watch',function($bot){
//     $message = OutgoingMessage::create('Take a break and listen to Ikaw Lang by Nobita!<3')
//     ->withAttachment(new Video('https://www.youtube.com/watch?v=O18n_AEkee4'));

//     // $vid = new Video('https://youtu.be/rxXsdj7EBm4',['custom_payload'=>true,]);
//     // $message = OutgoingMessage::create('Take a break and listen to Ikaw Lang by Nobita!<3')->withAttachment($vid);

//     $bot->typesAndWaits(2);
//     $bot->reply($message);
// });

$botman->hears('!smile',function($bot){
    $image = new Image('/assets/images/smile.png');
    $message = OutgoingMessage::create("Lighten up, pal! This one's for you. 🤗")
                ->withAttachment($image);
    $bot->reply($message);
});

#store user information
$botman->hears('my name is {name}',function($bot,$name){
    $bot->userStorage()->save(['name'=>$name]);
    $bot->typesAndWaits(2);
    $bot->reply('Hey '.$name);
});

$botman->hears('Say my name(.*)', function($bot){
    $name = $bot->userStorage()->get('name');
    $bot->typesAndWaits(2);
    $bot->reply('Your name is '.$name);
});

$botman->hears('I am {username}, and my real name is {firstname} {lastname}.',function($bot,$un,$fn,$ln){
    $bot->userStorage()->save([
        'username'=>$un,
        'firstname'=>$fn,
        'lastname'=>$ln,
    ]);
    $bot->typesAndWaits(2);
    $bot->reply('Cool, I will remember everything '.$fn.'!');
});

$botman->hears('information',function($bot){
    // $user = $bot->getUser();
    // $bot->reply('ID:'.$user->getId());
    // $bot->reply('Firstname:'.$user->getFirstname());
    // $bot->reply('Lastname:'.$user->getLastname());
    // $bot->reply('Username:'.$user->getUsername());
    // $bot->reply('Info:'.print_r($user->getInfo(),true));
    $un = $bot->userStorage()->get('username');
    $fn = $bot->userStorage()->get('firstname');
    $ln = $bot->userStorage()->get('lastname');
    $bot->typesAndWaits(2);
    $bot->reply('You are '.$un.'! Your real name is '.$fn.''.$ln.'.');
});


#simple inline convo && CONVERSATION class
$botman->hears('!askMe', function($bot){
    $bot->typesAndWaits(2);
    $bot->startConversation(new SelectHousePlanConversation());
    
});

$botman->hears('!faq', function($bot){
    $bot->typesAndWaits(2);
    $bot->startConversation(new FAQConversation());
});

$botman->hears('!estimate', function($bot){
    $bot->typesAndWaits(2);
    $bot->startConversation(new OnboardingConversation());   
   
});

// $botman->hears('!skip', function($bot){
//     $bot->typesAndWaits(2);
//     $bot->reply('Skipped something in our convo!');
// })->skipsConversation();

$botman->hears("!forgetMe", function (BotMan $bot) {
    // Delete all stored information. 
    $bot->userStorage()->delete();
    $bot->typesAndWaits(2);
    $bot->reply("What a loss to spend that much time with someone, only to find out that she's a stranger.<br>
    -Joel Barish");
});

#stops convo immediately
$botman->hears('!stop', function($bot){
    $bot->typesAndWaits(2);
    $bot->reply('Conversation has stopped');
})->stopsConversation();

#fallback message
$botman->fallback(function($bot){
    #get the user message
    $message = $bot->getMessage();

    $bot->typesAndWaits(2);
    $bot->reply("I don't know what should I say about ".$message->getText());
    $bot->reply("Here are the list of my commands:<br>
        !gif 'type something...'<br>
        !smile<br>
        !faq<br>
        !estimate<br>
        !forgetMe<br>
        !stop<br>
    ");
});
?>