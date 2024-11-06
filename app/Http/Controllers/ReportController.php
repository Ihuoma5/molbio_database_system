<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Machine;
use App\Models\Engineer;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Display a listing of reports
    public function index()
    {
        $reports = Report::with(['machine', 'engineer'])->get();
        return view('backend.reports.report_all', compact('reports'));
    }

    // Show the form for adding a new report
    public function create()
    {
        $machines = Machine::all();
        $engineers = Engineer::all();
        return view('backend.reports.report_add', compact('machines', 'engineers'));
    }

    // Store a newly added report in the database
    public function store(Request $request)
    {
        $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'repair_date' => 'required|date',
            'issue_reported' => 'required|string',
            'issues_fixed' => 'required|string',
            'parts_replaced' => 'nullable|string',
            'resolution_status' => 'required|string',
            'engineer_id' => 'required|exists:engineers,id'
        ]);

        Report::create($request->all());

        return redirect()->route('reports.all')->with('success', 'Report added successfully.');
    }

    // Show the form for editing a specific report
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        $machines = Machine::all();
        $engineers = Engineer::all();
        return view('backend.reports.report_edit', compact('report', 'machines', 'engineers'));
    }

    // Update a specific report in the database
    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'repair_date' => 'required|date',
            'issue_reported' => 'required|string',
            'issues_fixed' => 'required|string',
            'parts_replaced' => 'nullable|string',
            'resolution_status' => 'required|string',
            'engineer_id' => 'required|exists:engineers,id'
        ]);

        $report->update($request->all());

        return redirect()->route('reports.all')->with('success', 'Report updated successfully.');
    }

    // Delete a report from the database
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('reports.all')->with('success', 'Report deleted successfully.');
    }
}
