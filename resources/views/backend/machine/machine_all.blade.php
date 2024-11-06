@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Machines</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('machine.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">
                            <i class="fas fa-plus-circle"></i> Add Machine 
                        </a>
                        <br><br>

                        <h4 class="card-title">All Machines Data</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Machine ID</th>
                                    <th>Machine Type</th>
                                    <th>Installation Date</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Maintenance Schedule</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($machines as $machine)
                                    <tr>
                                        <td>{{ $machine->machine_id }}</td>
                                        <td>{{ $machine->machine_type }}</td>
                                        <td>{{ $machine->installation_date }}</td>
                                        <td>{{ $machine->location }}</td>
                                        <td>{{ $machine->status }}</td>
                                        <td>{{ $machine->maintenance_schedule ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('machine.edit', $machine->id) }}" class="btn btn-info sm" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('machine.delete', $machine->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
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
