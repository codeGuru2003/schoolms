@extends('layouts.app')
@section('content')
@php
    $count = 1;
@endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Faculty Members</div>
                    <div class="card-body p-3">
                        <a href="{{ route('faculties.create') }}" class="btn btn-primary">
                            <i class="bi bi-pencil"> Add New Record</i>
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped datatable nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Fullname</th>
                                        <th>Position</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faculties as $faculty)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td><img src="{{ asset('storage/' . $faculty->user->image ) }}" alt="Faculty Image" class="rounded-circle" width="50"></td>
                                            <td>{{ $faculty->firstname }} {{ $faculty->middlename }} {{ $faculty->lastname }}</td>
                                            <td>{{ $faculty->position->name }}</td>
                                            <td>{{ $faculty->email_address }}</td>
                                            <td>{{ $faculty->contact }}</td>
                                            <td>
                                                <span class="badge {{ $faculty->is_active ? 'bg-success' : 'bg-danger' }}">
                                                  {{ $faculty->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('faculties.edit', ['id' => $faculty->id]) }}" class="btn btn-warning btn-sm text-light"><i class="bi bi-pencil"></i></a>
                                                <a href="{{ route('faculties.details', ['id' => $faculty->id]) }}" class="btn btn-primary btn-sm text-light"><i class="bi bi-journal-text"></i></a>
                                                <a href="{{ route('faculties.destroy', ['id' => $faculty->id]) }}" onclick="confirmDelete(event)" class="btn btn-danger btn-sm text-light"><i class="bi bi-trash"></i></a>
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
    <div class="modal fade" id="subjectModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Create Subject</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('subjects.create') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="form-group mt-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" required id="name" class="form-control" />
                </div>
                <div class="form-group mt-2">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" required id="description" class="form-control" />
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
