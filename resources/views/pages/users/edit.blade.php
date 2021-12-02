@extends('../layouts.apps')
@section('title','Edit')

@section('style')
<style>
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}
.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
</style>

@section('content')
<div class="container">
    <!-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        </div>
        <div class="card-body">
            <form action="{{route('user.update',[$data->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                    </div>
                                    <h5 class="user-name"></h5>
                                    <h6 class="user-email"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <!-- <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="username">Full Name</label>
                                        <input id="username" type="text" class="form-control  rounded-pill" name="username"  required autocomplete="username" autofocus value="{{ $data->username }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input id="first_name" type="text" class="form-control  rounded-pill py-2 pr-5 mr-1" name="first_name"  required autocomplete="first_name" autofocus value="{{ $data->first_name }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input id="last_name" type="text" class="form-control  rounded-pill" name="last_name"  required autocomplete="last_name" autofocus value="{{ $data->last_name }}"> 
                                        
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control rounded-pill" name="email"  required autocomplete="email" value="{{ $data->email }}">

                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control rounded-pill " name="phone" id="phone" value="{{ $data->phone }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Company</label>
                                        <select class="form-control rounded-pill" name="company.id" id="company_id" required>
                                            <option value="">Select</option>
                                            @foreach($companys as $company)
                                            @if ($company->id == $data->company_id)
                                                    @php($select = 'selected')
                                                @else   
                                                    @php($select = '')
                                                @endif
                                                <option {{ $select }} value="{{ $company->id}}">{{ $company->nama}}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12>
                                    <div class="form-group">
                                        <label for="website">Departement</label>
                                        <select class="form-control rounded-pill" name="departement.id" id="departement_id" required>
                                            <option value="">Select</option>
                                            @foreach($departements as $departement)
                                                @if ($departement->id == $data->departement_id)
                                                    @php($select = 'selected')
                                                @else   
                                                    @php($select = '')
                                                @endif
                                                <option {{ $select }} value="{{ $departement->id}}">{{ $departement->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <a href="/admin/user" id="submit" name="submit" class="rounded-pill btn btn-primary">Cancel</a>
                                    <button type="submit" class="rounded-pill btn btn-success">Update</button>
                                </div>
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection