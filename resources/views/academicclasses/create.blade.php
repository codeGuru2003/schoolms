@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Academic Class</div>
                <div class="card-body p-3">
                    <form action="{{ route('academicclasses.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group mb-3">
                            <label for="level_types_id" class="form-label">Level Type</label>
                            <select name="level_types_id" id="level_types_id" required class="form-control">
                                <option value="0">Select Level Type</option>
                                @foreach($levelTypes as $levelTypesId => $levelTypeName)
                                    <option value="{{ $levelTypesId }}">{{ $levelTypeName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="section_id" class="form-label">Section Type</label>
                            <select name="section_id" id="section_id" required class="form-control">
                                <option value="0">Select Class Section</option>
                                @foreach($sections as $sectionId => $sectionName)
                                    <option value="{{ $sectionId }}">{{ $sectionName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="sponsor_id" class="form-label">Class Sponsor</label>
                            <select name="sponsor_id" id="sponsor_id" required class="form-control">
                                <option value="0">Select Sponsor</option>
                                @foreach($faculties as $faculty )
                                    <option value="{{ $faculty->id }}">{{ $faculty->firstname }} {{ $faculty->middlename }} {{ $faculty->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" required class="form-control" />
                        </div>
                        <div class="form-group mb-3">
                           <button class="btn btn-success">Save Changes</button>
                           <a href="{{ route('academicclasses.index') }}" class="btn btn-primary">Back To List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
