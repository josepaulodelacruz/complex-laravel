<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    public function index()
    {
        return Person::all();
    }

    public function store (PersonRequest $request)
    {
        return Person::create(['name' => $request->name]);
    }

    public function show ($id)
    {
        $showPerson = Person::find($id);
        return response($showPerson);
    }

    public function destroy ($id)
    {
        $person = Person::find($id);

        $person->delete();


        return 'Successfully deleted';
    }

}
