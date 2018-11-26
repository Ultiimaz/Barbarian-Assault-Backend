<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Troop extends Model
{
    protected $table = 'garrison_troop';
    protected $fillable = ["troop_name","troop_amount"];
}
