@extends('layouts.apps')

@section('title', 'Edit Jurusan')
@section('content')
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Jurusan
                </div>
                <div class="card-body">
                    <form action="{{ route('majors.update', [$major->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $major->name }}" id="name" name="name" placeholder="Enter Major Name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Major Description">{{$major->description}}</textarea>

                            @error('description')
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