<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Person extends Model
{
    protected $fillable = ['name'];

    public function post ()
    {
        return $this->hasMany(Post::class);
    }

}
