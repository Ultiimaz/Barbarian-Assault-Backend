<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [ 'title','page_id', 'url','description','sender','isRemoved'];

    public function comments()
    {
        return $this ->hasMany(Comment::class);
    }
    public function page()
    {
        return $this ->belongsTo(Page::class);
    }
}
