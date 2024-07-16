@extends('layouts.app')

@section('content')

<div class="row">
  
  <div class=" d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Jadwal Periksa</h5>
        <form action="{{ route('jadwal-periksa.update', $jadwalPeriksa->id_jadwal) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3  w-25">
            <label for="pasien_id" class="form-label">Nama Pasien:</label>
            <select id="pasien_id" class="form-select" name="pasien_id" required>
                <option disabled>Pilih Pasien</option>
                @foreach ($pasien as $pas)
                    <option selected value="{{ $pas->id_pasien }}" @if($pas->id_pasien == $pas->pasien_id) selected @endif>{{ $pas->nama_pasien }}</option>
                @endforeach
                </select>
            @error('pasien')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3  w-25">
            <label for="dokter_id" class="form-label">Nama Dokter:</label>
            <select id="dokter_id" class="form-select" name="dokter_id" required>
                <option disabled>Pilih Dokter</option>
                @foreach ($dokter as $dokter)
                    <option selected value="{{ $dokter->id_dokter }}" @if($dokter->id_dokter == $dokter->dokter_id) selected @endif>{{ $dokter->nama_dokter }}</option>
                @endforeach
                </select>
            @error('dokter_id')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3  w-25">
            <label for="tanggal" class="form-label">Tanggal :</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $jadwalPeriksa->tanggal) }}">
            @error('tanggal')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3  w-25">
            <label for="status" class="form-label">Status :</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $jadwalPeriksa->status) }}">
            @error('status')
                <div>{{ $message }}</div>
            @enderror
        </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
        <br>
        <a class="btn btn-light-warning" href="{{ route('jadwal-periksa.index') }}">Kembali ke Daftar Dokter</a>
      </div>
    </div>
  </div>
</div>
@endsection
