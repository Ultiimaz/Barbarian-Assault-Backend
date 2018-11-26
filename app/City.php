<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $keyType = "String"; // because cities can be over 65594!
    protected $fillable = ["WoodcuttingCamp","SilverMine","IronMine","Garrison","Academy", "Owner_id"];

   function getGarrison()
    {
        return $this->hasOne(Garrison::class,'Garrison_id');
    }
    function getOwner()
    {
        return $this->hasOne(User::class);
    }

}
