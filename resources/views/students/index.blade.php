@extends('layouts.app')
@section('content')
@php
    $count = 1;
@endphp
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Students</div>
                    <div class="card-body p-4">
                        <a href="{{ route('students.create', ['schoolId' => $id ]) }}" class="btn btn-primary mb-3" >
                            <i class="bi bi-pencil"> Add New Student</i>
                        </a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered datatable nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Student ID</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Status</th>
                                        <th>Class</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td><img src="{{ asset('storage/' . $student->user->image ) }}" alt="Student Image" class="rounded-circle" width="50"></td>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->firstname }}</td>
                                            <td>{{ $student->middlename }}</td>
                                            <td>{{ $student->lastname }}</td>
                                            <td>
                                                <span class="badge {{ $student->is_active ? 'bg-success' : 'bg-danger' }}">
                                                  {{ $student->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            @foreach ($student->studentclasses as $studentclass)
                                                <td>{{ $studentclass->class->name }}</td>
                                            @endforeach
                                            <td>
                                                <a href="{{ route('students.edit', ['schoolId'=> $id, 'id' => $student->id]) }}" class="btn btn-warning text-light"><i class="bi bi-pencil"></i></a>
                                                <a href="{{ route('students.details', ['schoolId' => $id, 'id' => $student->id]) }}" class="btn btn-primary text-light"><i class="bi bi-journal-text"></i></a>
                                                <a href="{{ route('students.destroy', ['schoolId' => $id, 'id' => $student->id]) }}" onclick="confirmDelete(event)" class="btn btn-danger text-light"><i class="bi bi-trash"></i></a>
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
    </div>
    <script>
        $(document).ready(function(){
            $('.datatable').DataTable({})
        })
    </script>
@endsection
