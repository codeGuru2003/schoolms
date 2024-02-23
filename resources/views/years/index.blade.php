@extends('layouts.app')
@section('content')

@php
    $count = 1;
@endphp
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Academic Years <span class="text-danger"><i>(Note: Please donot edit without developer permission)</i></span></div>
                    <div class="card-body p-3">
                        <a href="{{ route('years.create') }}" class="btn btn-primary"><i class="bi bi-pencil"> Add New Record</i></a>
                        <div class="table-responsive">
                            <table class="table table-striped nowrap" id="yearsTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Is Active</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($years as $year)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $year->name }}</td>
                                            @if ($year->is_active == 1)
                                                <td><span class="badge bg-success">Active</span></td>
                                            @else
                                                <td><span class="badge bg-danger">In-Active</span></td>
                                            @endif
                                            <td>{{ $year->startdate }}</td>
                                            <td>{{ $year->enddate }}</td>
                                            <td>
                                                <a href="{{ route('years.edit', ['id' => $year->id]) }}" class="btn btn-warning btn-sm text-light"><i class="bi bi-pencil"></i></a>
                                                <a href="{{ route('years.details', ['id' => $year->id]) }}" class="btn btn-primary btn-sm text-light"><i class="bi bi-journal-text"></i></a>
                                                <a href="{{ route('years.delete', ['id' => $year->id]) }}" onclick="confirmDelete(event)" class="btn btn-danger btn-sm text-light"><i class="bi bi-trash"></i></a>
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
    <script type="text/javascript">
        function confirmDelete(event) {
            event.preventDefault();

            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = event.currentTarget.href;
            }

            return false;
        }
    </script>
    <script>
        $(document).ready(function(){
            $('#yearsTable').DataTable({

            })
        })
    </script>
@endsection
