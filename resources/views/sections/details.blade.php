@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Details</div>
                    <div class="card-body">
                        <div class="form-group mt-3">
                            <label for="section_name" class="form-label">Name</label>
                            <input type="text" value="{{ $section->name }}" class="form-control" readonly name="section_name" id="section_name">
                        </div>
                        <div class="form-group mt-3">
                            <a href="{{ route('sections.index') }}" class="btn btn-primary">Back To List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
