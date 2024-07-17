@extends('layouts.app')

@section('content')

<div class="row">
  
  <div class=" d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Jadwal Periksa</h5>
        <form action="{{ route('jadwal-periksa.store') }}" method="POST">
            @csrf
            @method('POST')
        <div class="mb-3  w-25">
            <label for="pasien_id" class="form-label">Nama Pasien:</label>
            <select id="pasien_id" class="form-select" name="pasien_id" required>
                <option selected disabled>Pilih Pasien</option>
                @foreach ($pasien as $pas)
                    <option value="{{ $pas->id_pasien }}">{{ $pas->nama_pasien }}</option>
                @endforeach
            </select>
            @error('pasien_id')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3  w-25">
            <label for="dokter_id" class="form-label">Nama Dokter:</label>
            <select id="dokter_id" class="form-select" name="dokter_id" required>
                <option selected disabled>Pilih Dokter</option>
                @foreach ($dokter as $dok)
                    <option value="{{ $dok->id_dokter }}">{{ $dok->nama_dokter }}</option>
                @endforeach
            </select>
            @error('dokter_id')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3  w-25">
            <label for="tanggal" class="form-label">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
            @error('tanggal')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3  w-25">
            <label for="status" class="form-label">Status:</label>
            <select id="status" class="form-select" name="status" required>
                <option selected disabled>Pilih Status</option>
                    <option value="Waiting">Waiting</option>
                    <option value="On Checkup">On Checkup</option>
                    <option value="finished">finished</option>
            </select>
            @error('status')
                <div>{{ $message }}</div>
            @enderror
        </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
        <br>
        <a class="btn btn-light-warning" href="{{ route('dokter.index') }}">Kembali ke Daftar Dokter</a>
      </div>
    </div>
  </div>
</div>
@endsection
