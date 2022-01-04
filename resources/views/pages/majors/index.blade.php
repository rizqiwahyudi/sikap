@extends('layouts.apps')

@section('title', 'Majors Data')
@section('content')
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Jurusan</h6>
                </div>
                <div class="card-body">
                    <div class="button-action" style="margin-bottom: 20px">
                        @can('major-create')
                        <a href="{{ route('majors.create') }}" class="btn btn-primary btn-icon-split">TAMBAH</a>
                        @endcan
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="majors-table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
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

<form id="delete-form" action="" method="POST" class="d-none">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="_method" value="DELETE">
</form>
@section('javascript')
<script>
    $('#majors-table').DataTable({
        processing: true,
        serverside: true,
        ajax: {
            url: "{{ route('majors.index') }}",
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
                data: 'description',
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

        $('#delete-form').attr('action', '/majors/' + id);

        if (!confirm('Anda Yakin Ingin Menghapusnya ?')) {
            event.preventDefault();
        } else {
            deleteData();
        }
    }
</script>
@endsection
@endsection