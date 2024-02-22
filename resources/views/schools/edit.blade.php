@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit School</div>
                    <div class="card-body p-3">
                        <form action="{{ route('schools.create') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                          @csrf
                          <div class="form-group mt-2">
                              <label for="logo" class="form-label">Logo</label>
                              <input type="file" value="{{ $school->logo }}" name="logo" required id="logo" class="form-control" />
                          </div>
                          <div class="form-group mt-2">
                              <label for="longname" class="form-label">Name</label>
                              <input type="text" name="longname" value="{{ $school->longname }}" required id="longname" class="form-control" />
                          </div>
                          <div class="form-group mt-2">
                              <label for="code" class="form-label">Code</label>
                              <input type="text" name="code" value="{{ $school->code }}" required id="code" class="form-control" />
                          </div>
                          <div class="form-group mt-2">
                              <label for="email" class="form-label">Email</label>
                              <input type="text" name="email" value="{{ $school->email }}" required id="email" class="form-control" />
                          </div>
                          <div class="form-group mt-2">
                              <label for="contact" class="form-label">Contact</label>
                              <input type="text" name="contact" value="{{ $school->contact }}" required id="contact" class="form-control" />
                          </div>
                          <div class="form-group mt-4">
                            <input type="submit" class="btn btn-success" value="Update" />
                            <a href="{{ route('schools.index') }}" class="btn btn-primary">Back to List</a>
                          </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
