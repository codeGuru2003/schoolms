@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Faculty Image</div>
                    <div class="card-body p-3 text-center">
                        <img src="{{ asset('storage/'. $user->image) }}" style="border-radius: 2%" alt="User Image" width="170" />
                        <a href="#" class="btn btn-secondary mt-4">Download Information</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit Faculty Member</div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" name="firstname" id="firstname" value="{{ $faculty->firstname }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="middlename" class="form-label">Middle Name</label>
                                    <input type="text" name="middlename" id="middlename" value="{{ $faculty->middlename }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" name="lastname" id="lastname" value="{{ $faculty->lastname }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="date_of_birth" class="form-label">Date Of Birth</label>
                                    <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $faculty->date_of_birth }}" disabled class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="placeofbirth" class="form-label">Place Of Birth</label>
                                    <input type="text" name="placeofbirth" id="placeofbirth" value="{{ $faculty->placeofbirth }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="text" name="contact" id="contact" value="{{ $faculty->contact }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="email_address" class="form-label">Email Address</label>
                                    <input type="text" name="email_address" id="email_address" value="{{ $faculty->email_address }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="current_address" class="form-label">Current Address</label>
                                    <input type="text" name="current_address" id="current_address" value="{{ $faculty->current_address }}" disabled class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="year_of_employment" class="form-label">Year of Employment</label>
                                    <input type="date" name="year_of_employment" id="year_of_employment" value="{{ $faculty->year_of_employment }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="qualifications" class="form-label">Qualifications</label>
                                    <input type="text" name="qualifications" id="qualifications" value="{{ $faculty->qualifications }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="emergency_contact_person" class="form-label">Emergency Contact Person</label>
                                    <input type="text" name="emergency_contact_person" id="emergency_contact_person" value="{{ $faculty->emergency_contact_person }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="emergency_contact_number" class="form-label">Emergency Contact Number</label>
                                    <input type="text" name="emergency_contact_number" id="emergency_contact_number" value="{{ $faculty->emergency_contact_number }}" disabled class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="relationship" class="form-label">Relationship</label>
                                    <input type="text" name="relationship" id="relationship" value="{{ $faculty->relationship }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="position_id" class="form-label">Position</label>
                                    <select name="position_id" id="position_id" disabled class="form-control">
                                        <option value="0">Select Position</option>
                                        @foreach($positions as $positionId => $positionName)
                                            <option value="{{ $positionId }}" {{ $faculty->position_id == $positionId ? 'selected' : '' }}>
                                                {{ $positionName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="marital_status_id" class="form-label">Marital Status</label>
                                    <select name="marital_status_id" id="marital_status_id" disabled class="form-control">
                                        <option value="0">Select Marital Status</option>
                                        @foreach($maritalstatuses as $maritalStatusId => $maritalStatusName)
                                            <option value="{{ $maritalStatusId }}" {{ $faculty->marital_status_id == $maritalStatusId ? 'selected' : '' }}>
                                                {{ $maritalStatusName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="gender_id" class="form-label">Gender</label>
                                    <select name="gender_id" disabled id="gender_id"  class="form-control">
                                        <option value="0">Select Gender</option>
                                        @foreach($genders as $genderId => $genderName)
                                            <option value="{{ $genderId }}" {{ $faculty->gender_id == $genderId ? 'selected' : '' }}>
                                                {{ $genderName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="role_id" class="form-label">Role</label>
                                    <select name="role_id" id="role_id" disabled class="form-control">
                                        <option value="0">Select Role</option>
                                        @foreach($roles as $roleId => $roleName)
                                            <option value="{{ $roleId }}" {{ $faculty->user->role_id == $roleId ? 'selected' : '' }}>
                                                {{ $roleName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <a href="{{ route('faculties.index') }}" class="btn btn-primary">Back To List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
