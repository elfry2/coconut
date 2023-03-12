<!-- BEGIN Content Area -->
@extends('layouts.my-dashboard')
@section('my-top-nav')
  <div class="ms-2 bd-highlight"><a href="/register" class="btn" title="Tambah pengguna"><i class="bi-plus-lg"></i> <span class="ms-2 hide-on-small-screen">Tambah</span></a></div>
  @include('components.my-reload-button')
  @include('components.my-pagination-buttons')
@endsection

@section('my-content-area')
  @if (!isset($users) || $users->count() < 1)
    <center class="center">
      <h3 class="text-muted mx-2">
        Belum ada pengguna. Tekan tombol <b><i class="bi-plus-lg"></i> <span class="hide-on-small-screen">Tambah</span></b> untuk membuat pengguna baru.
    </h3></center>
  @else
    <div class="rounded border border-bottom-0">
      <table class="table table-striped align-middle">
        <tr>
          <th>No.</th>
          <th>ID</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Email</th>
          <th>Kata Sandi</th>
          <th></th>
        </tr>
        @php
          $i = 1;
        @endphp
        @foreach ($users as $user)
          <tr>
            <td>{{ $i++}}</td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td><i>{{ $user->role == 'admin' ? 'Administrator' : 'Knowledge Engineer' }}</i></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>
              <div class="dropdown">
                <a class="btn {{ Auth::id() == $user->id ? 'disabled' : '' }}" href="#" id="user{{ $user->id }}DropdownMenuLink" data-bs-toggle="dropdown"><i class="bi-{{ Auth::id() == $user->id ? 'dash-circle' : 'three-dots-vertical' }}"></i></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#user{{ $user->id }}DeletionModal"><i class="bi-trash me-2"></i>Hapus</a></li>
                </ul>
              </div>
            </td>
          </tr>
          <!-- BEGIN user {{ $user->id }} deletion modal -->
          <div class="modal fade" id="user{{ $user->id }}DeletionModal" aria-labelledby="user{{ $user->id }}DeletionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="user{{ $user->id }}DeletionModalLabel">Hapus pengguna "{{ $user->name }}" dengan ID {{ $user->id }}?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Menghapus pengguna tidak akan menghapus entri yang dibuat oleh pengguna tersebut.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                  <a href="{{ route('user.delete', ['id'=>$user->id]) }}" class="btn btn-danger"><i class="bi bi-trash me-2"></i>Hapus</a>
                </div>
              </div>
            </div>
          </div>
          <!-- END user {{ $user->id }} deletion modal -->
          @endforeach
      </table>
    </div>

  @endif
@endsection
<!-- END Content Area -->

@section('my-bottom-nav')
  @if (isset($users) && $users->count() > 0)
    @include('components.my-pagination-buttons')
  @endif
@endsection

@section('my-fixed-bottom-nav')
  @if (isset($alerts))
    @foreach ($alerts as $alert)
      @include('components.my-alert')
    @endforeach
  @endif
  <div class="hide-on-wide-screen">
    <div class="d-flex flex-row-reverse p-2 bd-highlight">
      <a href="/register" class="text-dark text-decoration-none">
        <div class="bg-white border shadow me-1 mb-1 floating-add-button p-2 d-flex align-items-center justify-content-center hide-on-wide-screen">
          <h3 class="m-0 p-0"><i class="bi bi-plus-lg"></i></h3>
        </div>
      </a>
    </div>
  </div>
@endsection
