@extends('layouts.apps')

@section('title', 'Edit Academic Year')
@section('content')
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Tahun Akademik
                </div>
                <div class="card-body">
                    <form action="{{ route('academic-years.update', [$academic_year]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="academic_year">Academic Year</label>
                          <input type="number" name="academic_year" min="1900" max="2099" step="1" placeholder="Ex: 2022" value="{{ $academic_year->academic_year }}" class="form-control @error('academic_year') is-invalid @enderror" required>

                            @error('academic_year')
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