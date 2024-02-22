@extends('layouts.app')
@section('content')
    @php
        $count = 1;
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Roles</div>
                    <div class="card-body p-3">
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#roleModal">
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
                                    @foreach ($roles as $role )
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-warning btn-sm text-light"><i class="bi bi-pencil"></i></a>
                                                <a href="{{ route('roles.details', ['id' => $role->id]) }}" class="btn btn-primary btn-sm text-light"><i class="bi bi-journal-text"></i></a>
                                                <a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-danger btn-sm text-light"><i class="bi bi-trash"></i></a>
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
    <div class="modal fade" id="roleModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Create Role</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('roles.create') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="form-group mt-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" required id="name" class="form-control" />
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
