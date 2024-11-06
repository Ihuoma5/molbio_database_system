@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Engineers</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('engineers.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">
                            <i class="fas fa-plus-circle"></i> Add Engineer 
                        </a>
                        <br><br>

                        <h4 class="card-title">All Engineers Data</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact Information</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($engineers as $engineer)
                                    <tr>
                                        <td>{{ $engineer->name }}</td>
                                        <td>{{ $engineer->contact_information }}</td>
                                        <td>
                                            <a href="{{ route('engineers.edit', $engineer->id) }}" class="btn btn-info sm" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('engineers.delete', $engineer->id) }}" method="POST" style="display:inline;">
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
