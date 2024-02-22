@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Term</div>
                    <div class="card-body p-3">
                        <form action="{{ route('terms.store') }}" class="needs-validation" method="POST" novalidate>
                            @csrf
                            <div class="form-group mb-3">
                                <label for="year_id" class="form-label">Year</label>
                                <select name="year_id" class="form-control">
                                    @foreach ($options as $id => $label)
                                        <option value="{{ $id }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
                                {{-- <select name="year_id" id="year_id" required class="form-control">
                                    <option value="0">Select Year</option>
                                    @foreach ($year as $yearId => $yearName)
                                        <option value="{{ $yearId }}">{{ $yearName }}</option>
                                    @endforeach
                                </select> --}}
                            </div>
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="startdate" class="form-label">Start Date</label>
                                <input type="date" name="startdate" id="startdate" class="form-control" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="enddate" class="form-label">End Date</label>
                                <input type="date" name="enddate" id="enddate" class="form-control" />
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" name="is_active" type="checkbox" id="is_active" value="1">
                                <label class="form-check-label" for="is_active">
                                  Is Active
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Save Changes</button>
                                <a href="{{ route('terms.index') }}" class="btn btn-primary">Back to List</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
