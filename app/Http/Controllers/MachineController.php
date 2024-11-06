<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    // Display a listing of all machines
    public function index()
    {
        $machines = Machine::all();
        return view('backend.machine.machine_all', compact('machines'));
    }

    // Show the form for adding a new machine
    public function create()
    {
        return view('backend.machine.machine_add');
    }

    public function dashboard()
{
    // Fetch all machines from the database
    $machines = Machine::all();
    
    // Pass the machines to the dashboard view
    return view('admin.dashboard', compact('machines'));
}

   // Store a newly added machine in the database
public function store(Request $request)
{
    $request->validate([
        'machine_id' => 'required|unique:machines,machine_id',
        'machine_type' => 'required|in:Trueprep,Truelab,Printer', // Updated validation rule
        'installation_date' => 'required|date',
        'location' => 'required',
        'status' => 'required|in:active,in repair,out of service',
        'maintenance_schedule' => 'nullable|date',
    ]);

    Machine::create($request->all());

    return redirect()->route('machine.all')->with('success', 'Machine added successfully.');
}


    // Show the form for editing a specific machine
    public function edit($id)
    {
        $machine = Machine::findOrFail($id);
        return view('backend.machine.machine_edit', compact('machine'));
    }

    public function update(Request $request, $id)
    {
        $machine = Machine::findOrFail($id);
    
        $request->validate([
            'machine_type' => 'required|in:Trueprep,Truelab,Printer', // Updated validation rule
            'installation_date' => 'required|date',
            'location' => 'required',
            'status' => 'required|in:active,in repair,out of service',
            'maintenance_schedule' => 'nullable|date',
        ]);
    
        $machine->update($request->all());
    
        return redirect()->route('machine.all')->with('success', 'Machine updated successfully.');
    }
    // Delete a machine from the database
    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);
        $machine->delete();

        return redirect()->route('machine.all')->with('success', 'Machine deleted successfully.');
    }
}
