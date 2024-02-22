@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Year</div>
                    <div class="card-body p-3">
                        <form action="{{ route('years.create') }}" class="needs-validation" novalidate method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" required value="{{ $year->name }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="startdate" class="form-label">Start Date</label>
                                <input type="date" name="startdate" id="startdate" value="{{ $year->startdate }}" required class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="enddate" class="form-label">End Date</label>
                                <input type="date" name="enddate" id="enddate" required value="{{ $year->enddate }}" class="form-control">
                            </div>
                            <div class="form-check mb-3">

                                @if ($year->is_active == true)
                                <input class="form-check-input" type="checkbox" checked id="isactive" value="1">
                                @else
                                <input class="form-check-input" type="checkbox" id="isactive" value="1">
                                @endif
                                <label class="form-check-label" for="isactive">
                                  Is Active
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Update</button>
                                <a href="{{ route('years.index') }}" class="btn btn-primary">Back to List</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
