@extends('layouts.app')
@section('content')
    <div class="contiainer-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Level Type</div>
                    <div class="card-body p-3">
                        <form action="{{ route('leveltypes.update', ['id' => $leveltype->id ]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group mt-2">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" value="{{ $leveltype->name }}" name="name" required id="name" class="form-control" />
                            </div>
                            <div class="form-group mt-4">
                              <button class="btn btn-success">Update</button>
                              <a type="submit" href="{{ route('leveltypes.index') }}" class="btn btn-primary" >Back To List</a>
                            </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
