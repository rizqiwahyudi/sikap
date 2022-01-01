@extends('layouts.apps')

@section('title', 'Edit Role')
@section('content')
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Role
                    </div>
                    <div class="card-body">
                        <div class="button-action" style="margin-bottom: 20px">
                            <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        
                        <form action="{{ route('roles.update', [$role->id]) }}" method="POST" id="role-form">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                              <label for="role">Role Name</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $role->name }}" id="role" name="name" placeholder="Enter Role Name">
    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <strong>Permissions : </strong>
                                
                                <div class="container">
                                    <span id="error" class="text-danger"></span>
                                    <div class="row">
                                        @php($iteration = 1)
                                        @foreach ($permissions as $permission)
                                            <div class="col-lg-3 col-md-6">
                                                <div class="card card-stats shadow-none">
                                                    <div  class="card-body">
                                                        <div class="row justify-content-md-center">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <label for="permission{{$iteration}}">
                                                                            <input class="form-check-input" @if( in_array($permission->id, $rolePermissions) ) checked="1" @endif type="checkbox" value="{{ $permission->id }}" id="permission{{$iteration}}" name="permission[]">
                                                                            <span>{{ $permission->name }}</span>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php($iteration++)
                                        @endforeach
                                    </div>
                                </div>
                            </div>
    
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('javascript')
    <script>
        $(document).ready(function(){
            $("input[type=checkbox]").change(function(){
                let permissionChecked = $("input[name='permission[]']:checked")

                if (permissionChecked.length === 0) {
                    $('#error').text('*Permission Is Required!');
                } else {
                    $('#error').text('');
                }
            });
        });
    </script>
@endsection
@endsection