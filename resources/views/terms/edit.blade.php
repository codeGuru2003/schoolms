@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Term</div>
                    <div class="card-body p-3">
                        <form action="{{ route('terms.update', ['id' => $term->id ]) }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="year_id">Year</label>
                                <select name="year_id" id="year_id" required class="form-control">
                                    <option value="0">Select Year</option>
                                    @foreach ($years as $yearId => $yearName)
                                        <option value="{{ $yearId }}" {{ $term->year_id == $yearId ? 'selected' : '' }}>
                                            {{ $yearName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" value="{{ $term->name }}" required class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="startdate" class="form-label">Start Date</label>
                                <input type="date" name="startdate" id="startdate" value="{{ $term->startdate }}" required class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="enddate" class="form-label">End Date</label>
                                <input type="date" name="enddate" id="enddate" value="{{ $term->enddate }}" required class="form-control">
                            </div>
                            <div class="form-check mb-3">
                                @if ($term->is_active == true)
                                    <input class="form-check-input" type="checkbox" checked name="is_active" id="is_active" value="1">
                                @else
                                <input class="form-check-input" type="checkbox"  name="is_active" id="is_active" value="1">
                                @endif
                                <label class="form-check-label" for="is_active">
                                  Is Active
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Update</button>
                                <a href="{{ route('terms.index') }}" class="btn btn-primary">Back to List</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection