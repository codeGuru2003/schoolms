@extends('layouts.app')
@section('content')
@php
    $count = 1;
@endphp
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Sections</div>
                    <div class="card-body p-3">
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#sectionsModal">
                            <i class="bi bi-pencil"> Add New Record</i>
                        </button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered datatable nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sections as $section )
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $section->name }}</td>
                                            <td>
                                                <a href="{{ route('sections.edit', ['id' => $section->id]) }}" class="btn btn-warning btn-sm text-light"><i class="bi bi-pencil"></i></a>
                                                <a href="{{ route('sections.details', ['id' => $section->id]) }}" class="btn btn-primary btn-sm text-light"><i class="bi bi-journal-text"></i></a>
                                                <a href="{{ route('sections.delete', ['id' => $section->id]) }}" onclick="confirmDelete(event)" class="btn btn-danger btn-sm text-light"><i class="bi bi-trash"></i></a>
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
    <div class="modal fade" id="sectionsModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Create Section</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('sections.create') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="form-group mt-3">
                    <label for="section_name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="section_name" id="section_name">
                </div>
                <div class="form-group mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save Changes" />
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
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
@endsection
