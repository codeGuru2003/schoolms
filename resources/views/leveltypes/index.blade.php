@extends('layouts.app')
@section('content')
    @php
        $count = 1;
    @endphp
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Level Types</div>
                    <div class="card-body p-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#levelModal">
                            <i class="bi bi-pencil"> Add New Record</i>
                        </button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" id="levelTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leveltypes as $level)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $level->name }}</td>
                                            <td>
                                                <a href="{{ route('leveltypes.edit',['id' => $level->id ]) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a> |
                                                <a href="{{ route('leveltypes.details',['id' => $level->id ]) }}" class="btn btn-primary"><i class="bi bi-journal-text"></i></a> |
                                                <a href="{{ route('leveltypes.delete',['id' => $level->id ]) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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
    <div class="modal fade" id="levelModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Create Level Types</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('leveltypes.create') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
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
    <script>
        $(document).ready(function(){
            $('#levelTable').DataTable({

            })
        })
    </script>
@endsection
