<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\Person;

class PostController extends Controller
{
    public function index ()
    {
        return Post::all();
    }

    public function store (PostRequest $request)
    {
        return Post::create([
            'title' => $request->title,
            'post' => $request->post,
            'person_id' => $request->person_id
        ]);
    }

    public function show ($id)
    {
        return Person::find($id)->post;
    }
}

/**
 * hasOne
 * hasMay
 * 'belongsTo
 * belongsToMany
 * morhMany
 * morhpToMany
 */
