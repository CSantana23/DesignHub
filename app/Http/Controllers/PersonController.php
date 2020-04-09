<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class PersonController
 * @package App\Http\Controllers
 */
class PersonController extends Controller
{
    //:suppose to returning back
    /**
     * @param Person $person
     * @return PersonResource
     */
    public function show(Person $person) : PersonResource
    {
        //going up to PersonResource,collecting everything from database and returning array, then returning that here.
        //everything id wrap in a data document.
        return new PersonResource($person);
    }

    /**
     * @return PersonResourceCollection
     */
    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate());
    }

    /**
     * @param Request $request
     * @return PersonResource
     */
    public function store(Request $request): PersonResource
    {
        //create a person
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
        ]);
        $person = new Person($request->all());
        //return resource
        return new PersonResource($person);
    }

    /**
     * @param Person $person
     * @param Request $request
     * @return PersonResource
     */
    public function update(Person $person, Request $request):PersonResource
    {
        $person->update($request->all());
        return new PersonResource($person);
    }

    /**
     * @param Person $person
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return response()->json();
    }
}
