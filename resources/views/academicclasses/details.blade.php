@extends('layouts.app')
@section('content')
@php
    $count = 1;
@endphp
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Class Details</div>
                <div class="card-body p-3">
                    <div class="form-group mb-3">
                        <label for="level_types_id" class="form-label">Level Type</label>
                        <select name="level_types_id" id="level_types_id" disabled class="form-control">
                            @foreach($levelTypes as $levelTypesId => $levelTypeName)
                                <option value="{{ $levelTypesId }}" {{ $academicClass->level_types_id == $levelTypesId ? 'selected' : '' }}>
                                    {{ $levelTypeName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="section_id" class="form-label">Section Type</label>
                        <select name="section_id" id="section_id" disabled class="form-control">
                            @foreach($sections as $sectionId => $sectionName)
                                <option value="{{ $sectionId }}" {{ $academicClass->section_id == $sectionId ? 'selected' : '' }}>
                                    {{ $sectionName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ $academicClass->name }}" id="name" disabled class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <a href="{{ route('academicclasses.index') }}" class="btn btn-primary">Back To List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body p-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSubjectModal">Add Class Subject</button>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Subject</th>
                                    <th>Assigned to</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classSubjects as $classSubject)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $classSubject->subject->name }}</td>
                                        <td>{{ $classSubject->faculty->firstname }} {{ $classSubject->faculty->middlename }} {{ $classSubject->faculty->lastname }}</td>
                                        <td>
                                            <a href="{{ route('classsubjects.edit', ['classId'=> $academicClass->id, 'id' => $classSubject->id]) }}" class="btn btn-warning text-light"><i class="bi bi-pencil"></i></a>
                                            <button type="button" class="btn btn-danger delete-subject-btn" data-id="{{ $classSubject->id }}"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Create Class Subject Modal --}}
    <div class="modal fade" id="createSubjectModal" tabindex="-1" aria-labelledby="createSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSubjectModalLabel">Add New Subject to Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('components.classsubjects._createClassSubjectComponent', ['classId' => $academicClass->id ])
                </div>
            </div>
        </div>
    </div>
    {{-- End of Create Class Subject Modal --}}
@endsection
