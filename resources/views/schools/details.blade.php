@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    School Details
                </div>
                <div class="card-body p-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $school->logo) }}" width="200" alt="Logo">
                            </div>
                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-building"></i></span>
                                    <input type="text" class="form-control" value="{{ $school->longname }}" readonly aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-building"></i></span>
                                    <input type="text" class="form-control" value="{{ $school->code }}" readonly aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                                    <input type="text" class="form-control" value="{{ $school->email }}" readonly aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                                    <input type="text" class="form-control" value="{{ $school->contact }}" readonly aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="form-group mb-3">
                                    <a href="{{ route('schools.edit', ['id' => $school->id]) }}" class="btn btn-warning text-white"><i class="bi bi-pencil"></i> Edit</a>
                                    <a href="{{ url('schools') }}" class="btn btn-primary">Back To List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
