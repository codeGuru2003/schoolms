@extends('layouts.app')
@section('content')
    @php
        $count = 1;
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Schools (Branches)</div>
                    <div class="card-body p-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#schoolModal">
                            <i class="bi bi-pencil"> Add New Record</i>
                        </button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schools as $school)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $school->longname }}</td>
                                            <td>
                                                <a href="{{ route('schools.edit', ['id' => $school->id]) }}" class="btn btn-warning btn-sm text-light"><i class="bi bi-pencil"></i></a>
                                                <a href="{{ route('schools.details', ['id' => $school->id]) }}" class="btn btn-primary btn-sm text-light"><i class="bi bi-journal-text"></i></a>
                                                <a href="{{ route('schools.edit', ['id' => $school->id]) }}" class="btn btn-danger btn-sm text-light"><i class="bi bi-trash"></i></a>
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
    <div class="modal fade" id="schoolModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Create School (Branch)</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('schools.create') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="form-group mt-2">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" name="logo" required id="logo" class="form-control" />
                </div>
                <div class="form-group mt-2">
                    <label for="longname" class="form-label">Name</label>
                    <input type="text" name="longname" required id="longname" class="form-control" />
                </div>
                <div class="form-group mt-2">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" name="code" required id="code" class="form-control" />
                </div>
                <div class="form-group mt-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" required id="email" class="form-control" />
                </div>
                <div class="form-group mt-2">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" name="contact" required id="contact" class="form-control" />
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
@endsection
