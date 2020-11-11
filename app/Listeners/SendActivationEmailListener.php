<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendActivationEmailListener
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
    public function handle($event)
    {
        $data['email'] = $event->user->email;
        $data['code'] = $event->user->code;
        $data['link'] = env('APP_URL') . '/activate/' . $event->user->email . '/' . $event->user->code;

        Mail::send('activate', $data, function ($em) use ($data) {
            $em->from(env('MAIL_FROM_ADDRESS'));
            $em->to($data['email'])->subject('Activate');
        });
    }
}
