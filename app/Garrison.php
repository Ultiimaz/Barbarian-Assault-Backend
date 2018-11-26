<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garrison extends Model
{
    protected $table = 'Garrison';
    protected $primaryKey = "Garrison_id";
    protected $keyType = "String"; // because cities can be over 65594!
    protected  $fillable = ["troop_id","troop_name","troopAmount","Owner"];


}
