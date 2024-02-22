@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Create System User
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('account.store') }}" novalidate enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">User Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" placeholder="Full Name (Required)" aria-label="Username" name="name" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="Email (Required)" aria-label="Username" name="email" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01"><i class="bi bi-sign-intersection"></i></label>
                                <select class="form-select" id="inputGroupSelect01" name="role_id">
                                    @foreach($roles as $rolesid => $rolename)
                                        <option value="{{ $rolesid }}">{{ $rolename }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-check"></i></span>
                                <input type="password" class="form-control" placeholder="Password (Required)" name="password" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-check"></i></span>
                                <input type="password" class="form-control" placeholder="Confirm Password (Required)" name="confirmed" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-success">Create Record</button> |
                                <a href="{{ route('account.users') }}" class="btn btn-primary">Back To List</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
