@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Role Details</div>
                <div class="card-body p-4">
                    <h1>{{ $role->name }}</h1>
                    <a href="{{ route('roles.index') }}" class="btn btn-primary">Back To List</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of User in {{ $role->name }}</div>
                <div class="card-body">
                    <table>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
