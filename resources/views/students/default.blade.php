@extends('layouts.app')
@section('content')
@php
    $count = 1;
@endphp
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of School Branches</div>
                    <div class="card-body p-3">
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>School Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schools as $school)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $school->longname }}</td>
                                        <td>
                                            <a href="{{ route('students.index', ['schoolId' => $school->id ]) }}" class="btn btn-primary"> Proceed <i class="bi bi-arrow-right"></i></a>
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
@endsection
