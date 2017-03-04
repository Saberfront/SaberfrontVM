<?php

namespace Saberfront;
use DB;
use Illuminate\Database\Eloquent\Model;

class SecondaryInventory extends Model
{
    //
    protected $fillable = [
        'userId','tank_ammo'
    ];
}
