<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regiment extends Model
{
    protected $table = "regiments";
    protected $fillable = ["name"];
}
