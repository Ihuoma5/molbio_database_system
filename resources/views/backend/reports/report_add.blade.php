@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Report</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add New Report</h4><br>

                        <form method="post" action="{{ route('reports.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="machine_id" class="col-sm-2 col-form-label">Machine</label>
                                <div class="col-sm-10">
                                    <select name="machine_id" class="form-select">
                                        <option selected disabled>Select Machine</option>
                                        @foreach($machines as $machine)
                                        <option value="{{ $machine->id }}">{{ $machine->machine_id }} - {{ $machine->location }}</option>


                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="repair_date" class="col-sm-2 col-form-label">Repair Date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" id="repair_date" name="repair_date">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="issue_reported" class="col-sm-2 col-form-label">Issue Reported</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="issue_reported" name="issue_reported">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="issues_fixed" class="col-sm-2 col-form-label">Issues Fixed</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="issues_fixed" name="issues_fixed">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="parts_replaced" class="col-sm-2 col-form-label">Parts Replaced</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="parts_replaced" name="parts_replaced">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="resolution_status" class="col-sm-2 col-form-label">Resolution Status</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="resolution_status" name="resolution_status">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="engineer_id" class="col-sm-2 col-form-label">Engineer</label>
                                <div class="col-sm-10">
                                    <select name="engineer_id" class="form-select">
                                        <option selected disabled>Select Engineer</option>
                                        @foreach($engineers as $engineer)
                                            <option value="{{ $engineer->id }}">{{ $engineer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark waves-effect waves-light">Add Report</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
