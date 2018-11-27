<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $keyType = "String"; // because cities can be over 65594!
    protected $fillable = ["CityName","LoggingCampLevel","SilverMineLevel","IronMineLevel","Academy", "Owner_id"];
    protected $hidden = ['id','Owner_id'];
   function getGarrison()
    {
        return $this->hasOne(Garrison::class,'Garrison_id');
    }
    function getOwner()
    {
        return $this->hasOne(User::class);
    }

    function getGarrisonTimer($CurrentLevel)
    {

        $newLevelTimer  = $CurrentLevel/ ($CurrentLevel+1) * 1.3;
        return (integer)$newLevelTimer;
    }

}
