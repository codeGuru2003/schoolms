@extends('layouts.app')
@section('content')

@php
    $count = 1;
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Users</div>
                <div class="card-body p-3">
                    <a href="{{ route('account.register') }}" class="btn btn-primary mb-2"><i class="bi bi-pencil"> Add New Record</i></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered datatable nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('account.edit',['id' => $user->id ]) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
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
@endsection
