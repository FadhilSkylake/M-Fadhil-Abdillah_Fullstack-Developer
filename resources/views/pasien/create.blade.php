@extends('layouts.app')

@section('content')

<div class="row">
  
  <div class=" d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Pasien</h5>
        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf
            @method('POST')
        <div class="mb-3  w-25">
            <label for="nama_pasien" class="form-label">Nama Pasien:</label>
            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien') }}" required>
            @error('nama_pasien')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3  w-25">
            <label for="usia" class="form-label">Usia:</label>
            <input type="number" class="form-control" id="usia" name="usia" value="{{ old('usia') }}" required>
            @error('usia')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3  w-25">
            <label for="no_hp" class="form-label">No HP:</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
            @error('no_hp')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3  w-25">
            <label for="alamat" class="form-label">Alamat:</label>
            <textarea id="alamat" class="form-control" name="alamat" required>{{ old('alamat') }}</textarea>
            @error('alamat')
                <div>{{ $message }}</div>
            @enderror
        </div>
    
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
        <br>
        <a class="btn btn-light-warning" href="{{ route('pasien.index') }}">Kembali ke Daftar Pasien</a>
      </div>
    </div>
  </div>
</div>
@endsection
