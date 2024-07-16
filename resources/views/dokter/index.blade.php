@extends('layouts.app')

@section('content')

<div class="row">
  
  <div class=" d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">User</h5>
        <a class="btn btn-primary" href="{{ route('dokter.create') }}">Create Dokter</a>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">No</th>
                <th class="border-bottom-0">Nama Dokter</th>
                <th class="border-bottom-0">Spesialisasi</th>
                <th class="border-bottom-0">Jadwal Kerja</th>
                <th class="border-bottom-0">Action</th>
              </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($dokters as $dok)
              <tr>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center p-2">
                    <div class="ms-3">
                      <h6 class="fw-semibold mb-0">{{ $i++ }}</h6>
                    </div>
                  </div>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $dok->nama_dokter }}</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $dok->spesialisasi->nama_spesialisasi }}</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $dok->jadwal_kerja }}</p>
                </td>
                <td class="border-bottom-0">
                    <a class="btn btn-warning" href="{{ route('dokter.edit', $dok->id_dokter) }}">Edit</a>
                    <form action="{{ route('dokter.destroy', $dok->id_dokter) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
