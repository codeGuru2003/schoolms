@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Global Setting
                </div>
                <div class="card-body p-3">
                    @if ($globalsetting == null)
                        <form action="{{ route('globalsettings.create') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="system_logo" class="form-label">System Logo</label>
                                <input type="file" name="system_logo" id="system_logo" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="system_name" class="form-label">System Name</label>
                                <input type="text" name="system_name" id="system_name" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="system_email" class="form-label">System Email</label>
                                <input type="text" name="system_email" id="system_email" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="contact" class="form-label">System Phone Numer</label>
                                <input type="text" name="contact" id="contact" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="footer_text" class="form-label">System Footer Text</label>
                                <input type="text" name="footer_text" id="footer_text" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('globalsettings.update', ['id' => $globalsetting->id ]) }}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group mt-3">
                                <label for="system_logo" class="form-label">System Logo</label>
                                <input type="file" name="system_logo" value="{{ $globalsetting->system_logo }}" id="system_logo" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="system_name" class="form-label">System Name</label>
                                <input type="text" name="system_name" value="{{ $globalsetting->system_name }}" id="system_name" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="system_email" class="form-label">System Email</label>
                                <input type="text" name="system_email" value="{{ $globalsetting->system_email }}" id="system_email" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="contact" class="form-label">System Phone Numer</label>
                                <input type="text" name="contact" value="{{ $globalsetting->contact }}" id="contact" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="footer_text" class="form-label">System Footer Text</label>
                                <input type="text" name="footer_text" value="{{ $globalsetting->footer_text }}" id="footer_text" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-success"><i class="bi bi-floppy"></i> Update Record</button>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
