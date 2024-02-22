@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('globalsettings.index') }}">General Settings</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="{{ route('globalsettings.logo') }}">Logo</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-3">
                    <form action="">
                        <div class="form-group mb-3">
                            <label for="logo" class="form-label">Upload System Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
