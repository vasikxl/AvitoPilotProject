<?php

namespace App\NotifiedUsers;

use Illuminate\Notifications\Notifiable;

trait NotifiableUserTrait
{
    use Notifiable;

    function notifyUser(mixed $instance) : void {
        $this->notify($instance);
    }
}
