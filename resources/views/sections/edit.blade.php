@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Section</div>
                    <div class="card-body">
                        <form action="{{ route('sections.update', ['id' => $section->id]) }}" method="POST">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="section_name" class="form-label">Name</label>
                                <input type="text" value="{{ $section->name }}" class="form-control" name="section_name" id="section_name">
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-success">Save Changes</button> |
                                <a href="{{ route('sections.index') }}" class="btn btn-primary">Back To List</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
