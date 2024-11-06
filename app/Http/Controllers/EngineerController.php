<?php

namespace App\Http\Controllers;

use App\Models\Engineer; // Make sure you have the Engineer model created
use Illuminate\Http\Request;

class EngineerController extends Controller
{
    // Display a listing of all engineers
    public function index()
    {
        $engineers = Engineer::all();
        return view('backend.engineer.engineer_all', compact('engineers'));
    }

    // Show the form for adding a new engineer
    public function create()
    {
        return view('backend.engineer.engineer_add');
    }

    // Store a newly added engineer in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_information' => 'required|string|max:255',
        ]);

        Engineer::create($request->all());

        return redirect()->route('engineers.all')->with('success', 'Engineer added successfully.');
    }

    // Show the form for editing a specific engineer
    public function edit($id)
    {
        $engineer = Engineer::findOrFail($id);
        return view('backend.engineer.engineer_edit', compact('engineer'));
    }

    // Update a specific engineer in the database
    public function update(Request $request, $id)
    {
        $engineer = Engineer::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'contact_information' => 'required|string|max:255',
        ]);

        $engineer->update($request->all());

        return redirect()->route('engineers.all')->with('success', 'Engineer updated successfully.');
    }

    // Delete an engineer from the database
    public function destroy($id)
    {
        $engineer = Engineer::findOrFail($id);
        $engineer->delete();

        return redirect()->route('engineers.all')->with('success', 'Engineer deleted successfully.');
    }
}
