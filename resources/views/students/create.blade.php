@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Create Student</div>
            <div class="card-body p-3">
                <form action="{{ route('students.store', ['schoolId' => $schoolId ]) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="userImage" class="form-label">Student Image</label>
                                <input type="file" name="userImage" id="userImage" required accept=".png,.jpg,.gif" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" name="firstname" id="firstname" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="middlename" class="form-label">Middle Name</label>
                                <input type="text" name="middlename" id="middlename" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" name="lastname" id="lastname" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="date_of_birth" class="form-label">Date Of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="placeofbirth" class="form-label">Place Of Birth</label>
                                <input type="text" name="placeofbirth" id="placeofbirth" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" name="contact" id="contact" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="email_address" class="form-label">Email Address</label>
                                <input type="text" name="email_address" id="email_address" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="current_address" class="form-label">Current Address</label>
                                <input type="text" name="current_address" id="current_address" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="gender_id" class="form-label">Gender</label>
                                <select name="gender_id" id="gender_id" required class="form-control">
                                    <option value="0">Select Gender</option>
                                    @foreach($genders as $genderId => $genderName)
                                        <option value="{{ $genderId }}">{{ $genderName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="class_id" class="form-label">Class</label>
                                <select name="class_id" id="class_id" required class="form-control">
                                    <option value="0">Select Class</option>
                                    @foreach($classes as $classId => $className)
                                        <option value="{{ $classId }}">{{ $className }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" id="isactive" name="is_active"style="width:20px; height: 20px">
                                <label class="form-check-label" for="isactive">
                                    <span style="font-size: 20px">
                                    Is Active
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="emergency_contact_person" class="form-label">Emergency Contact Person</label>
                                <input type="text" name="emergency_contact_person" id="emergency_contact_person" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="emergency_contact_number" class="form-label">Emergency Contact Number</label>
                                <input type="text" name="emergency_contact_number" id="emergency_contact_number" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label for="relationship" class="form-label">Relationship</label>
                                <input type="text" name="relationship" id="relationship" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <button class="btn btn-success">Save</button>
                                <a href="{{ route('students.index',['schoolId' => $schoolId ]) }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
