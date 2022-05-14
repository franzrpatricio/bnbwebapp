<?php

namespace App\Http\Conversations;

use App\Models\User;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ConfirmEstimation extends Conversation
{
    public function run()
    {
        $this->confirm();
    }

    public function confirm(){
        $this->say('details of estimation');
        $user = $this->bot->userStorage()->find();
        $type = $user->get('type');
        $area = $user->get('sqm');
        // $release = $this->getData();

        $details=0;
        $total=0;
        
        // switch ($type) {
        //     case 'bare':
        //         # code...
        //         $cost = collect($release[0][1]);
        //         $details = collect($release[0][2]);
        //         $total = $cost * $area;
        //         break;
        //     case 'standard':
        //         # code...
        //         $cost = collect($release[1][1]);
        //         $details = collect($release[1][2]);
        //         $total = $cost * $area;
        //         break;
        //     case 'luxury':
        //         # code...
        //         $cost = collect($release[2][1]);
        //         $details = collect($release[2][2]);
        //         $total = $cost * $area;
        //         break;
        //     default:
        //         # code...
        //         $this->return;
        //         break;
        // }

        $message = '-------------------------------------- <br>';
        $message .= 'Name : ' . $user->get('name') . '<br>';
        $message .= 'Email : ' . $user->get('email') . '<br>';
        $message .= 'Mobile : ' . $user->get('mobile') . '<br>';
        $message .= 'House Area : ' . $user->get('sqm') . '<br>';
        $message .= 'House Plan Type : ' . $user->get('type') . '<br>';
        $message .= 'Materials : ' .$details.'<br>';
        $message .= '---------------------------------------<br>';
        $message .= 'Total Estimated Price : ' . $total . '<br>';

        $this->say('Great. Your booking has been confirmed. Here is your booking details. <br><br>' . $message);
    }
}