<?php

namespace App\Listeners;

use App\Events\UserEmailVeriliet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogVerilietUser
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
     * @param  UserEmailVeriliet  $event
     * @return void
     */
    public function handle(UserEmailVeriliet $event)
    {
        //
    }
}
