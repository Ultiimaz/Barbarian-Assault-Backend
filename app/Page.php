<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';
    protected $fillable = ['url', 'title', 'description','owner'];

    public function posts()
    {
        return $this->hasMany(Post::class,'page_id');
    }

    public function owner()
    {
        return $this->hasOne(User::class);
    }    

}
