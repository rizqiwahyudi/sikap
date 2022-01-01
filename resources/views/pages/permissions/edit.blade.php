@extends('layouts.apps')

@section('title', 'Edit Permission')
@section('content')
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Permission
                    </div>
                    <div class="card-body">
                        <div class="button-action" style="margin-bottom: 20px">
                            <a href="{{ route('permissions.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        
                        <form action="{{ route('permissions.update', [$permission->id]) }}" method="POST" id="permission-form">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                              <label for="permission">Permission Name</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $permission->name }}" id="permission" name="name" placeholder="Enter Permission Name">
    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection