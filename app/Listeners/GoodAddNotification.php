<?php

namespace App\Listeners;

use App\Events\GoodAddEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GoodAddNotification
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
     * @param  GoodAddEvent  $event
     * @return void
     */
    public function handle(GoodAddEvent $event)
    {
        $good = $event->good;

        var_dump($good->title);
    }
}
