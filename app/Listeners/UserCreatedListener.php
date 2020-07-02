<?php

namespace App\Listeners;

use App\Mail\SendVerification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserCreatedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */

     public $user;

    public function __construct(User $user)
    {
       $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $email = $event->user->email;

        Mail::to($email)->send(new SendVerification($event->user));

    }
}
