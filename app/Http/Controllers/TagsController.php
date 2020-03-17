<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagsRequest;
use Illuminate\Http\Request;
use App\Tags;

class TagsController extends Controller
{
    public function index ()
    {
        return 'test new api tags';
    }

    public function store (TagsRequest $request)
    {
        return Tags::create([
           'name' => $request->name
        ]);
    }

}
