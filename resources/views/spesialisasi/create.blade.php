@extends('layouts.app')

@section('content')

<div class="row">
  
  <div class=" d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Spesialisasi</h5>
        <form action="{{ route('spesialisasi.store') }}" method="POST">
            @csrf
            @method('POST')
        <div class="mb-3  w-25">
            <label for="nama_spesialisasi" class="form-label">Nama Spesialisasi:</label>
            <input type="text" class="form-control" id="nama_spesialisasi" name="nama_spesialisasi" value="{{ old('nama_spesialisasi') }}" required>
            @error('nama_spesialisasi')
            <div>{{ $message }}</div>
            @enderror
        </div>
    
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
        <br>
        <a class="btn btn-light-warning" href="{{ route('spesialisasi.index') }}">Kembali ke Daftar Spesialisasi</a>
      </div>
    </div>
  </div>
</div>
@endsection
