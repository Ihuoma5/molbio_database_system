<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Fetch all machines from the database
        $machines = Machine::all();

        // Return the dashboard view with the machines data
        return view('admin.index', compact('machines'));

        
    }
}
