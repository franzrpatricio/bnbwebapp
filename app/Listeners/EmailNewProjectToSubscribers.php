<?php

namespace App\Listeners;

use App\Events\NewProject;
use App\Mail\MailSubscribers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailOwnerSubscription
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewProject $event)
    {
        //
        // Newsletter::create([
        //     'email' => $event->email
        // ]);
        DB::table('newsletter')->find([
            'email' => $event->email,
            // 'created_at' => Carbon::now(),
        ]);
        Mail::to($event->email)->send(new MailSubscribers());
    }
}
