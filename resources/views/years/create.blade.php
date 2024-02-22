@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Academic Year</div>
                    <div class="card-body p-3">
                        <form action="{{ route('years.create') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" required class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="startdate" class="form-label">Start Date</label>
                                <input type="date" name="startdate" id="startdate" required class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="enddate" class="form-label">End Date</label>
                                <input type="date" name="enddate" id="enddate" required class="form-control">
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="isactive" value="1">
                                <label class="form-check-label" for="isactive">
                                  Is Active
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Save Changes</button>
                                <a href="{{ route('years.index') }}" class="btn btn-primary">Back to List</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
