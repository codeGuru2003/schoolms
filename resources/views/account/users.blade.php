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
                <div class="card-body p-4">
                    <a href="{{ route('account.register') }}" class="btn btn-primary mb-2"><i class="bi bi-pencil"> Add New Record</i></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="usersTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
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
                                            <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-danger' }}">
                                              {{ $user->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('account.edit',['id' => $user->id ]) }}" class="btn btn-warning" title="Edit"><i class="bi bi-pencil"></i></a>
                                            <a href="{{ route('account.details',['id' => $user->id ]) }}" class="btn btn-primary" title="Details"><i class="bi bi-journal-text"></i></a>
                                            <a href="{{ route('account.deactivate',['id' => $user->id ]) }}" class="btn btn-dark" title="Deactivate" onclick="confirmDelete(event)"><i class="bi bi-lock-fill"></i></a>
                                            <a href="{{ route('account.destroy',['id' => $user->id ]) }}" class="btn btn-danger" title="Delete" onclick="confirmDelete(event)"><i class="bi bi-trash"></i></a>
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
<script>
    $(document).ready(function(){
        $('#usersTable').DataTable({

        })
    })
</script>
<script type="text/javascript">
    function confirmDelete(event) {
        event.preventDefault();

        if (confirm("Are you sure you want to deactivate or delete this user?")) {
            window.location.href = event.currentTarget.href;
        }

        return false;
    }
</script>
@endsection
