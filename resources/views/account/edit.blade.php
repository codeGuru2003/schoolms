@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">User Avatar</div>
                    <div class="card-body p-3 text-center">
                        <img src="{{ asset('storage/'. $user->image) }}" style="border-radius: 2%" alt="User Image" width="170" />
                        <form action="" class="mt-3">
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-outline-success" type="button" id="inputGroupFileAddon04">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-body p-3">
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">User Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" value="{{ $user->name }}"  placeholder="Full Name (Required)" aria-label="Username" name="name" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                                <input type="text" class="form-control" value="{{ $user->email }}" placeholder="Email (Required)" aria-label="Username" name="email" aria-describedby="basic-addon1">
                            </div>
                            {{-- <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01"><i class="bi bi-sign-intersection"></i></label>
                                <select class="form-select" id="inputGroupSelect01" name="role_id">
                                    @foreach($roles as $rolesid => $rolename)
                                        <option value="{{ $rolesid }}">{{ $rolename }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-check"></i></span>
                                <input type="password" class="form-control" value="{{ $user->password }}"  placeholder="Password (Required)" name="password" aria-label="Username" aria-describedby="basic-addon1">
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
