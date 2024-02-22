@extends('layouts.app')
@section('content')
    <div class="contiainer-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Level Type Details</div>
                    <div class="card-body p-3">

                        <div class="form-group mt-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="{{ $leveltype->name }}" readonly required id="name" class="form-control" />
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('leveltypes.index') }}" class="btn btn-primary">Back To List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
