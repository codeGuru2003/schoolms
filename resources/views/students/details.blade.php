@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Student Image</div>
                    <div class="card-body p-3 text-center">
                        <img src="{{ asset('storage/'. $student->user->image) }}" style="border-radius: 2%" alt="User Image" width="170" />
                        <a href="#" class="btn btn-secondary mt-4">Print</a>
                        <a href="{{ route('students.index',['schoolId' => $student->school_id]) }}" class="btn btn-primary mt-4">Back</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Student Details</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Student Documents</div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Student Parents</div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Student Bills</div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Student Academic Report</div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
