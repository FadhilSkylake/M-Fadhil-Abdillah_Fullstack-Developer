@extends('layouts.app')

@section('content')

<div class="row">
  
  <div class=" d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Dokter</h5>
        <form action="{{ route('dokter.update', $dokter->id_dokter) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3  w-25">
            <label for="nama_dokter" class="form-label">Nama Dokter:</label>
            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="{{ old('nama_dokter', $dokter->nama_dokter) }}" required>
            @error('nama_dokter')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3  w-25">
            <label for="spesialisasi" class="form-label">Spesialisasi:</label>
            <select id="spesialisasi_id" class="form-select" name="spesialisasi_id" required>
                <option disabled>Pilih Spesialisasi</option>
                @foreach ($spesialisasis as $spesialisasi)
                    <option selected value="{{ $spesialisasi->id_spesialisasi }}" @if($spesialisasi->id_spesialisasi == $dokter->spesialisasi_id) selected @endif>{{ $spesialisasi->nama_spesialisasi }}</option>
                @endforeach
                </select>
                @error('spesialisasi_id')
                <div>{{ $message }}</div>
                @enderror
        </div>
        <div class="mb-3  w-25">
            <label for="jadwal_kerja" class="form-label">Jadwal Kerja:</label>
            <input type="text" class="form-control" id="jadwal_kerja" name="jadwal_kerja" value="{{ old('jadwal_kerja', $dokter->jadwal_kerja) }}">
            @error('jadwal_kerja')
                <div>{{ $message }}</div>
            @enderror
        </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
        <br>
        <a class="btn btn-light-warning" href="{{ route('dokter.index') }}">Kembali ke Daftar Dokter</a>
      </div>
    </div>
  </div>
</div>
@endsection
