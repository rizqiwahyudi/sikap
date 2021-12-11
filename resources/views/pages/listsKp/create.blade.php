@extends('layouts.apps')

@section('title', 'Tambah Tempat KP')
@section('content')
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Tempat KP
                </div>
                <div class="card-body">
                    <form action="{{ route('lists-kp.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Enter Name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter Address">{{ old('address') }}</textarea>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telephone">Phone Number</label>
                            <input type="text" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" id="telephone" name="telephone" placeholder="Enter Phone Number">

                            @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="postal-code">Postal Code</label>
                            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}" id="postal-code" name="postal_code" placeholder="Enter Postal Code">

                            @error('postal_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" id="city" name="city" placeholder="Enter City">

                            @error('city')
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