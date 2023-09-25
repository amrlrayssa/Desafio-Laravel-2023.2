<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use App\Models\Consultation;
use App\Models\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::all();
        $users = User::all();
        $animals = Animal::all();
        $owners = Owner::all();
        return view('consultations.index', compact('animals', 'users', 'consultations', 'owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $animals = Animal::all();
        $consultation = new Consultation();
        return view('consultations.index', compact('animals', 'users', 'consultations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Consultation::create($data);
        return redirect()->route('consultations.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        $users = User::all();
        $animals = Animal::all();
        $owners = Owner::all();
        return view('consultations.index', compact('animals', 'users', 'consultations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation, $id)
    {
        $animal = Animal::findOrFail($id);
        $users = User::all();
        $animals = Animal::all();
        $owners = Owner::all();
        return view('consultations.index', compact('animals', 'users', 'consultations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultation $consultation)
    {
        $consultation->treatment = $request->treatment;
        $consultation->initial_date = $request->initial_date;
        $consultation->final_date = $request->final_date;
        $consultation->price = $request->price;
        $consultation->save();

        return redirect()->route('consultations.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();

        return redirect()->route('consultations.index')->with('success', true);
    }
}
