@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Student Image</div>
                    <div class="card-body p-3 text-center">
                        <img src="{{ asset('storage/'. $student->user->image) }}" style="border-radius: 2%" alt="User Image" width="170" />
                        <form action="{{ route('students.updateImage',['schoolId' => $student->school_id,'id' => $student->id ]) }}" class="mt-3" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
