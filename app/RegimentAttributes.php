<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class RegimentAttributes extends Model
{
    //
    use Notifiable;
     public function routeNotificationForMail()
    {
        return $this->owner->email;
    }
}
