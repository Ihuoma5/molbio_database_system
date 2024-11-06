@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Edit Engineer</h2>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('engineers.update', $engineer->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Include method spoofing for PUT request -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $engineer->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="contact_information">Contact Information</label>
                                <input type="text" class="form-control" name="contact_information" value="{{ $engineer->contact_information }}" required>
                            </div>
                            <button type="submit" class="btn btn-success">Update Engineer</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>

@endsection
