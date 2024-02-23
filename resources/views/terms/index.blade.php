@extends('layouts.app')
@section('content')
@php
    $count = 1;
@endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Terms</div>
                    <div class="card-body p-3">
                        <a href="{{ route('terms.create') }}" class="btn btn-primary">
                            <i class="bi bi-pencil"> Add New Record</i>
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped nowrap" id="termsTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Year</th>
                                        <th>Is Active</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($terms as $term)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $term->name }}</td>
                                            <td>{{ $term->year->name }}</td>
                                            <td>
                                                @if ($term->is_active == true)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">In Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('terms.edit', ['id' => $term->id]) }}" class="btn btn-warning btn-sm text-light"><i class="bi bi-pencil"></i></a>
                                                <a href="{{ route('terms.details', ['id' => $term->id]) }}" class="btn btn-primary btn-sm text-light"><i class="bi bi-journal-text"></i></a>
                                                <a href="{{ route('terms.destroy', ['id' => $term->id]) }}" onclick="confirmDelete(event)" class="btn btn-danger btn-sm text-light"><i class="bi bi-trash"></i></a>
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

            if (confirm("Are you sure you want to delete this section?")) {
                window.location.href = event.currentTarget.href;
            }

            return false;
        }
    </script>
    <script>
        $(document).ready(function(){
            $('#termsTable').DataTable({

            })
        })
    </script>
@endsection
