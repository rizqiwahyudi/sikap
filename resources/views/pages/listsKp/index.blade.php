@extends('layouts.apps')

@section('title', 'Daftar Tempat KP')
@section('content')
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Tempat KP</h6>
                </div>
                <div class="card-body">
                    <div class="button-action" style="margin-bottom: 20px">
                        @can('kp-create')
                        <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#import">
                            IMPORT
                        </button>
                        <a href="{{ route('lists-kp.export') }}" class="btn btn-secondary btn-icon-split">EXPORT</a>
                        <a href="{{ route('lists-kp.create') }}" class="btn btn-primary btn-icon-split">TAMBAH</a>
                        @endcan
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="list-kp-table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Postal Code</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">IMPORT DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('lists-kp.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>PILIH FILE</label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required>

                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row pt-3">
                        <div class="col">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">IMPORT</button>
                </div>
            </form>
        </div>
    </div>
</div>

<form id="delete-form" action="" method="POST" class="d-none">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="_method" value="DELETE">
</form>
@section('javascript')
<script>
    $('#list-kp-table').DataTable({
        processing: true,
        serverside: true,
        ajax: {
            url: "{{ route('lists-kp.index') }}",
            type: 'GET',
        },
        "responsive": true,
        columns: [{
                data: 'DT_RowIndex',
            },
            {
                data: 'name',
            },
            {
                data: 'address',
            },
            {
                data: 'telephone',
            },
            {
                data: 'postal_code',
            },
            {
                data: 'city',
            },
            {
                data: 'action',
            },
        ]
    });

    function deleteData() {
        event.preventDefault();
        document.getElementById('delete-form').submit();
    }

    function confirmForm(e) {
        let id = e.getAttribute('data-id');

        $('#delete-form').attr('action', '/lists-kp/' + id);

        if (!confirm('Anda Yakin Ingin Menghapusnya ?')) {
            event.preventDefault();
        } else {
            deleteData();
        }
    }
</script>
@endsection
@endsection