@extends('../layouts.apps')
@section('title','User')

@section('content')
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
            <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
        </div>
        <div class="card-body">
            <!-- <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Fisrt Name</label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"  required autocomplete="first_name" autofocus>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required autocomplete="last_name" autofocus>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label">Select Company</label>
                    <select class="form-control @error('company') is-invalid @enderror" name="company.id" id="select_company" required>
                        <option value="">Select</option>
                        @foreach($companys as $company)
                            <option value="{{$company->id}}">{{$company->nama}}</option>
                        @endforeach
                        @error('company')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </select>
                </div>
                <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label">Select Departement</label>
                    <select class="form-control @error('departement') is-invalid @enderror" name="departement.id" id="select_departement" required>
                        <option value="">Select</option>
                        @foreach($departements as $departement)
                            <option value="{{$departement->id}}">{{$departement->name}}</option>
                        @endforeach
                        @error('departement')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </select>
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  required autocomplete="phone">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="mb-3 float-right">
                    <a href="/admin/user" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form> -->
        </div>
</div>
@endsection