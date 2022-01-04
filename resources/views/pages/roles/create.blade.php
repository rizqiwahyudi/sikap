@extends('layouts.apps')

@section('title', 'Create Role')
@section('content')
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Create Role
                </div>
                <div class="card-body">
                    <div class="button-action" style="margin-bottom: 20px">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <form action="{{ route('roles.store') }}" method="POST" id="role-form">
                        @csrf
                        <div class="form-group">
                            <label for="role">Role Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="role" name="name" placeholder="Enter Role Name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>
                                Permissions : <input type="checkbox" id="check-all"> <label for="check-all">Select All</label>
                            </strong>

                            <div class="container">
                                <span id="error" class="text-danger"></span>
                                <div class="row">
                                    @php($iteration = 1)
                                    @foreach ($permissions as $permission)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="card shadow mb-4">
                                            <div class="card-header">
                                                <div class="row justify-content-md-center">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label for="permission{{$iteration}}" class="m-0 font-weight-bold">
                                                                    <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" id="permission{{$iteration}}" name="permission[]">
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
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('javascript')
<script>
    $(document).ready(function() {
        $("input[name='permission[]']").change(function() {
            let permissionChecked = $("input[name='permission[]']:checked")

            if (permissionChecked.length === 0) {
                $('#error').text('*Permission Is Required!');
            } else {
                $('#error').text('');
            }
        });

        $('#check-all').click(function(event) {
            if (this.checked) {
                $(':checkbox').each(function() {
                    this.checked = true;
                    $('#error').text('');
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                    $('#error').text('*Permission Is Required!');
                });
            }
        });
    });
</script>
@endsection
@endsection