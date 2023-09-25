<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owner = new Owner();
        return view('owners.index', compact('owner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owner = new Owner;
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->phone = $request->phone;
        $owner->address = $request->address;
        $owner->birth_date = date('Y-m-d', strtotime($request->birth_date));
        $owner->cpf = $request->cpf;

        $imageName = null;

        if($request->hasFile('image')) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('img/owners'), $imageName);
        }
        
        $owner->image = $imageName;
        $owner->save();

        return redirect()->route('owners.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        return view('owners.index', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);

        $owner->name = $request->input('name');
        $owner->email = $request->input('email');
        $owner->phone = $request->input('phone');
        $owner->address = $request->input('address');
        $owner->birth_date = date('Y-m-d', strtotime($request->input('birth_date')));
        $owner->cpf = $request->input('cpf');

        $imageName = null;
        if($request->hasFile('image')) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('img/owners'), $imageName);
        }
        if($imageName != null) {
            $owner->image = $imageName;
        }

        $owner->save();

        return redirect()->route('owners.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        
        return redirect()->route('owners.index')->with('success', true);
    }
}