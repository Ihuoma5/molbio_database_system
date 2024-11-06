@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Reports</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('reports.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">
                            <i class="fas fa-plus-circle"></i> Add Report 
                        </a>
                        <br><br>

                        <h4 class="card-title">All Reports Data</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Machine</th>
                                    <th>Engineer</th>
                                    <th>Repair Date</th>
                                    <th>Issue Reported</th>
                                    <th>Issues Fixed</th>
                                    <th>Parts Replaced</th>
                                    <th>Resolution Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                    <td>{{ $report->machine->name }} {{ $report->machine->location }}({{ $report->machine->machine_id }}) </td>
                                        <td>{{ $report->engineer->name }}</td>
                                        <td>{{ $report->repair_date }}</td>
                                        <td>{{ $report->issue_reported }}</td>
                                        <td>{{ $report->issues_fixed }}</td>
                                        <td>{{ $report->parts_replaced ?? 'N/A' }}</td>
                                        <td>{{ $report->resolution_status }}</td>
                                        <td>
                                            <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-info sm" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('reports.delete', $report->id) }}" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger sm" title="Delete Data" id="delete">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>

@endsection
