@extends('layouts.apps')

@section('title', 'Tambah Kelas')
@section('content')
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Kelas
                </div>
                <div class="card-body">
                    <form action="{{ route('kelas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <input type="text" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas') }}" id="kelas" name="kelas" placeholder="Enter Kelas">

                            @error('kelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="sub_kelas">Sub Kelas</label>
                          <input type="text" class="form-control @error('sub_kelas') is-invalid @enderror" value="{{ old('sub_kelas') }}" id="sub_kelas" name="sub_kelas" placeholder="Enter Sub Kelas">

                            @error('sub_kelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr class="mb-4">
                        <div class="form-group">
                          <label for="major_id">Jurusan</label>
                          <select name="major_id" id="major_id" class="form-control @error('major_id') is-invalid @enderror">
                              <option value="" selected>-- Pilih Jurusan --</option>
                              
                              @foreach($majors as $major)
                                <option value="{{$major->id}}">{{$major->name}}</option>
                              @endforeach
                          </select>

                            @error('major_id')
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