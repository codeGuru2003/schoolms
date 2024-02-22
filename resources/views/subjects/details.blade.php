@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Subject Details</div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ $year->name }}" name="name" id="name" disabled class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="startdate" class="form-label">Start Date</label>
                        <input type="date" value="{{ $year->startdate }}" name="startdate" id="startdate" disabled class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="enddate" class="form-label">End Date</label>
                        <input type="date" value="{{ $year->enddate }}" name="enddate" id="enddate" disabled class="form-control">
                    </div>
                    <div class="form-check mb-3">
                        @if ($year->is_active == true)
                            <input class="form-check-input" type="checkbox" id="isactive" disabled checked />
                        @else
                            <input class="form-check-input" type="checkbox" disabled id="isactive" />
                        @endif
                        <label class="form-check-label" for="isactive">
                          Is Active
                        </label>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('years.index') }}" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
