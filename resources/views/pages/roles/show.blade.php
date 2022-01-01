@extends('layouts.apps')

@section('title', 'Show Role')
@section('content')
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Show Role
                    </div>
                    <div class="card-body">
                        <div class="button-action" style="margin-bottom: 20px">
                            <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <hr>
                        <div class="row pt-3 container">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <label class="badge badge-success">{{ $role->name }}</label>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permissions:</strong><br>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $roleAndPermission)
                                            <label class="badge bg-light text-dark">{{ $roleAndPermission->name }}</label>,
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection