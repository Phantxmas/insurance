<?php

namespace App\Http\Controllers;

use App\Models\Owner;
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
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
        ]);

        // Create a new owner record
        Owner::create($request->all());

        return redirect()->route('owners.index')->with('success', 'Owner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // This method is not required for this scenario, you can leave it as is.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
        ]);

        // Find the owner record
        $owner = Owner::findOrFail($id);

        // Update the owner record
        $owner->update($request->all());

        return redirect()->route('owners.index')->with('success', 'Owner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the owner record
        $owner = Owner::findOrFail($id);

        // Delete the owner record
        $owner->delete();

        return redirect()->route('owners.index')->with('success', 'Owner deleted successfully.');
    }
}

