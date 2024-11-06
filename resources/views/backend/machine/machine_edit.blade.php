    @extends('admin.admin_master')
    @section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Edit Machine</h2>

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('machine.update', $machine->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Include method spoofing for PUT request -->
                                <div class="form-group">
                                    <label for="machine_id">Machine ID</label>
                                    <input type="text" class="form-control" name="machine_id" value="{{ $machine->machine_id }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="machine_type">Machine Type</label>
                                    <select name="machine_type" class="form-control" required>
                                        <option value="Trueprep" {{ $machine->machine_type == 'Trueprep' ? 'selected' : '' }}>Trueprep</option>
                                        <option value="Truelab" {{ $machine->machine_type == 'Truelab' ? 'selected' : '' }}>Truelab</option>
                                        <option value="Printer" {{ $machine->machine_type == 'Printer' ? 'selected' : '' }}>Printer</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="installation_date">Installation Date</label>
                                    <input type="date" class="form-control" name="installation_date" value="{{ $machine->installation_date }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" name="location" value="{{ $machine->location }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="active" {{ $machine->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="in repair" {{ $machine->status == 'in repair' ? 'selected' : '' }}>In Repair</option>
                                        <option value="out of service" {{ $machine->status == 'out of service' ? 'selected' : '' }}>Out of Service</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="maintenance_schedule">Maintenance Schedule</label>
                                    <input type="date" class="form-control" name="maintenance_schedule" value="{{ $machine->maintenance_schedule }}">
                                </div>
                                <button type="submit" class="btn btn-success">Update Machine</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>

    @endsection
