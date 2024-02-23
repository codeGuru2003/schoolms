@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body p-4">
                    <form id="createSubjectForm" action="{{ route('classsubjects.update', ['classId' => $classId, 'id' => $classSubject->id ]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="subject_id" class="form-label">Subject</label>
                            <select name="subject_id" id="subject_id" required class="form-control">
                                <option value="0">Select Subject</option>
                                @foreach($subjects as $subjectId => $subjectName)
                                    <option value="{{ $subjectId }}" {{ $classSubject->subject_id == $subjectId ? 'selected' : ''}}>
                                        {{ $subjectName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="faculty_id" class="form-label">Teacher</label>
                            <select name="faculty_id" id="faculty_id" required class="form-control">
                                <option value="0">Select Teacher</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}" {{ $classSubject->faculty_id == $faculty->id ? 'selected' : '' }}>
                                        {{ $faculty->firstname }} {{ $faculty->middlename }} {{ $faculty->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="isactive" name="is_active" {{ $classSubject->is_active ? 'checked' : '' }} style="width:20px; height: 20px">
                            <label class="form-check-label {{ $classSubject->is_active ? 'text-success' : 'text-danger' }}" for="isactive">
                              <span style="font-size: 20px">
                                Is Active
                              </span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('academicclasses.details', ['id' => $classId ]) }}" class="btn btn-danger">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
