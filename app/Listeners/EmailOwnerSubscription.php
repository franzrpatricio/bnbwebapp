<?php

namespace App\Listeners;

use App\Models\Newsletter;
use App\Events\ClientSubscribed;
use App\Mail\ClientSubscribedMessage;
use Carbon\Carbon;
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
    public function handle(ClientSubscribed $event)
    {
        //
        // Newsletter::create([
        //     'email' => $event->email
        // ]);
        DB::table('newsletter')->insert([
            'email' => $event->email,
            'created_at' => Carbon::now(),
        ]);
        Mail::to($event->email)->send(new ClientSubscribedMessage());
    }
}
