@extends('layouts.app')

@section('content')

<div class="row">
  
  <div class=" d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">User</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">No</th>
                <th class="border-bottom-0">Username</th>
                <th class="border-bottom-0">Action</th>
              </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($users as $user)
              <tr>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center p-2">
                    <div class="ms-3">
                      <h6 class="fw-semibold mb-0">{{ $i++ }}</h6>
                    </div>
                  </div>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $user->username }}</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $user->password }}</p>
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
