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
                        <label for="sponsor_id" class="form-label">Class Sponsor</label>
                        <select name="sponsor_id" id="sponsor_id" disabled class="form-control">
                            <option value="0">Select Sponsor</option>
                            @foreach($faculties as $faculty)
                                <option value="{{ $faculty->id }}" {{ $academicClass->sponsor_id == $faculty->id ? 'selected' : '' }}>
                                    {{ $faculty->firstname }} {{ $faculty->middlename }} {{ $faculty->lastname }}</option>
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
    {{-- Start of Class Subject Div --}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Class Subjects</div>
                <div class="card-body p-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSubjectModal">Add Class Subject</button>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered table-hover nowrap datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Subject</th>
                                    <th>Assigned to</th>
                                    <th>Status</th>
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
                                            <span class="badge {{ $classSubject->is_active ? 'bg-success' : 'bg-danger' }}">
                                              {{ $classSubject->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                          </td>
                                        <td>
                                            <a href="{{ route('classsubjects.edit', ['classId'=> $academicClass->id, 'id' => $classSubject->id ]) }}" class="btn btn-warning text-light"><i class="bi bi-pencil"></i></a>
                                            <a href="{{ route('classsubjects.destroy', ['classId' => $academicClass->id, 'id' => $classSubject->id ]) }}" class="btn btn-danger " onclick="confirmDelete(event)"><i class="bi bi-trash"></i></a>
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
    {{-- End of Class Subject Div --}}

    {{-- Start of Class Bill Div --}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Class Bills</div>
                <div class="card-body p-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createClassBillModal">Add Class Bill</button>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered table-hover nowrap datatable" >
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classBills as $classBill)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $classBill->name }}</td>
                                        <td>{{ $classBill->amount }}</td>
                                        <td>{{ $classBill->currency->code }}</td>
                                        <td>
                                            <span class="badge {{ $classBill->is_active ? 'bg-success' : 'bg-danger' }}">
                                              {{ $classBill->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                          </td>
                                        <td>
                                            <a href="{{ route('classbills.edit', ['classId'=> $academicClass->id, 'id' => $classBill->id ]) }}" class="btn btn-warning text-light"><i class="bi bi-pencil"></i></a>
                                            <a href="{{ route('classbills.destroy', ['classId' => $academicClass->id, 'id' => $classBill->id ]) }}" class="btn btn-danger " onclick="confirmDelete(event)"><i class="bi bi-trash"></i></a>
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
    {{-- End of Class Bill Div --}}

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

    {{-- Create Class Bill Modal --}}
    <div class="modal fade" id="createClassBillModal" tabindex="-1" aria-labelledby="createClassBillModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClassBillModalLabel">Add New Bill to Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('components.classbills._createClassBillComponent', ['classId' => $academicClass->id ])
                </div>
            </div>
        </div>
    </div>
    {{-- End of Class Bill Modal --}}

    <script type="text/javascript">
        function confirmDelete(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Show a confirmation dialog
            if (confirm("Are you sure you want to delete this section?")) {
            // If the user clicks "OK", proceed with the delete action
                window.location.href = event.currentTarget.href;
            }

            return false;
        }
    </script>
    <script>
        $(document).ready(function(){
            $('.datatable').DataTable({

            })
        })
    </script>
@endsection
