<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'post', 'person_id'];

    public function person ()
    {
        $this->belongsTo(Person::class);
    }
}
