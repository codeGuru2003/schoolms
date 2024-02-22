@extends('layouts.app')
@section('content')
@php
$count = 1;
@endphp
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Academic Classes</div>
                <div class="card-body p-3">
                   <a href="{{ route('academicclasses.create') }}" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Level</th>
                                    <th>Name</th>
                                    <th>Section</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($academicClasses as $academicClass)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $academicClass->lname }}</td>
                                        <td>{{ $academicClass->name }}</td>
                                        <td>{{ $academicClass->sname }}</td>
                                        <td>
                                            <a href="{{ route('academicclasses.edit', ['id' => $academicClass->id]) }}" class="btn btn-warning btn-sm text-light"><i class="bi bi-pencil"></i></a>
                                            <a href="{{ route('academicclasses.details', ['id' => $academicClass->id]) }}" class="btn btn-primary btn-sm text-light"><i class="bi bi-journal-text"></i></a>
                                            <a href="{{ route('academicclasses.delete', ['id' => $academicClass->id]) }}" class="btn btn-danger btn-sm text-light"><i class="bi bi-trash"></i></a>
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
@endsection
