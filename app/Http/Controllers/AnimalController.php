<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use App\Models\Consultation;
use App\Models\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::all();
        $owners = Owner::all();
        $consultations = Consultation::all();
        return view('animals.index', compact('animals', 'owners', 'consultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = Owner::all();
        $animal = new Animal();
        return view('animals.index', compact('animal', 'owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Animal::create($data);
        return redirect()->route('animals.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        $owners = Owner::all();
        $consultations = Consultation::all();
        return view ('animals.index', compact('animal', 'owners', 'consultations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal, $id)
    {
        $animal = Animal::findOrFail($id);
        $owners = Owner::all();
        return view('animals.edit', compact('animal', 'owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $animal->name = $request->name;
        $animal->specie = $request->specie;
        $animal->breed = $request->breed;

        $animal->save();

        return redirect()->route('animals.index')->with('success', true);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        
        return redirect()->route('animals.index')->with('success', true);
    }
}
