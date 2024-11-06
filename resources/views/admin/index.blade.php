@extends('admin.admin_master')
@section('admin')



<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Weierstrassmichael</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Display Machines -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Machines Data</h4>

                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Machine ID</th>
                                    <th>Machine Type</th>
                                    <th>Installation Date</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Maintenance Schedule</th>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div> <!-- page-content -->

@endsection