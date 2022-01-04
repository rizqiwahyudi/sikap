@extends('../layouts.apps')
@section('title', 'Show')

@section('style')
<style>
    h5{
        text-align: center;
        font-family: 'Roboto Slab', serif;
    }
    .card{
        width: 50%;
        margin: 5rem auto;
    }
    .avatar {
        height: 100px;
        width: 100px;
        border-radius: 50%;
        margin: 5px auto;
    }
    img{
        max-width: 100%;
        height: auto;
    }
</style>

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Show User</h6>
        </div>
        <div class="card-body">
            <div class="button-action" style="margin-bottom: 20px">
                <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            
            <div class="avatar">
                <img src="/img/avatar.png" alt="">
            </div>
                <h5> First Name: <span></span></h5>
                <h5> Last Name : <span></span></h5>
                <h5>Phone : <span></span></h5>
                <a href="/admin/user" class="btn btn-primary float-right">Back</a>
        </div>
    </div>
@endsection