<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $people = Person::all();

        return view('view', compact('people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePersonRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePersonRequest $request)
    {
        $this->authorize('manage-person');

        $request->validated();

        Person::create([
            'name' => $request->name,
            'id_number' => $request->id_number,
            'dob' => $request->dob,
            'age' => $request->age,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'religion' => $request->religion,
            'nationality' => $request->nationality,
        ]);

        return back()->with('person-added', "Person registered successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Person $person
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Person $person)
    {
        return view('show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Person $person
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Person $person)
    {
        $this->authorize('manage-person');

        return view('edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePersonRequest $request
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $this->authorize('manage-person');

        $person->update($request->only([
            'name', 'id_number', 'dob', 'age', 'mobile', 'address', 'religion', 'nationality'
        ]));

        return back()->with('person-updated', "Person updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Person $person)
    {
        $this->authorize('manage-person');
        $person->delete();
        return back()->with('person-deleted', "Person deleted successfully!");
    }
}
