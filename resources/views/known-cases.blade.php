<!-- BEGIN Content Area -->
@extends('layouts.my-dashboard')
@section('my-top-nav')
  @include('components.my-button-sized-separator-button')
  <div class="ms-2 bd-highlight"><a href="{{ route('knownCase.create') }}" class="btn" title="Tambah kasus baru"><i class="bi-plus-lg"></i> <span class="ms-2 hide-on-small-screen">Tambah</span></a></div>
  @include('components.my-search-button')
  @include('components.my-pagination-buttons')
@endsection
@section('my-content-area')
  @if (!isset($knownCases) || $knownCases->count() < 1)
    <center class="center">
      <h3 class="text-muted mx-2">
        Belum ada kasus. Tekan tombol <b><i class="bi-plus-lg"></i> <span class="hide-on-small-screen">Tambah</span></b> untuk membuat kasus baru.
    </h3></center>
  @else
    <div class="rounded border border-bottom-0">
      <table class="table table-striped align-middle">
        <tr>
          <th>Tanggal</th>
          <th>Gejala</th>
          <th>Penyakit</th>
          <th>Solusi</th>
          <th></th>
        </tr>
        @php
          $i = 1;
          if (isset($_GET['page']) && $_GET['page'] > 1) {
            $i = ((($_GET['page'] ?? 1)-1)*($maxRecordPerPage ?? 1)) + 1;
          }
        @endphp
        @foreach ($knownCases as $knownCase)
          <tr>
            <td>{{ $knownCase->created_at }}</td>
            <td>{{ $knownCase->symptoms }}</td>
            <td>{{ $knownCase->disease }}</td>
            <td>{{ $knownCase->solutions }}</td>
            <td align="right">
              <div class="dropdown">
                <a class="btn" href="#" id="knownCase{{ $knownCase->id }}DropdownMenuLink" data-bs-toggle="dropdown"><i class="bi-three-dots-vertical"></i></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="{{ route('knownCase.edit', ['id'=>$knownCase->id]) }}"><i class="bi-pencil-square me-2"></i>Sunting rincian</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#knownCase{{ $knownCase->id }}DeletionModal"><i class="bi-trash me-2"></i>Hapus</a></li>
                </ul>
              </div>
            </td>
          </tr>
          <!-- BEGIN knownCase {{ $knownCase->id }} deletion modal -->
          <div class="modal fade" id="knownCase{{ $knownCase->id }}DeletionModal" aria-labelledby="knownCase{{ $knownCase->id }}DeletionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="knownCase{{ $knownCase->id }}DeletionModalLabel">Hapus kasus "{{ $knownCase->created_at }}"?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Menghapus kasus tidak menghapus gejala, penyakit, maupun solusi terkait.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                  <a href="{{ route('knownCase.delete', ['id'=>$knownCase->id]) }}" class="btn btn-danger"><i class="bi bi-trash me-2"></i>Hapus</a>
                </div>
              </div>
            </div>
          </div>
          <!-- END knownCases {{ $knownCase->id }} deletion modal -->
          @endforeach
      </table>
    </div>

  @endif
@endsection

@section('my-bottom-nav')
  @if (isset($knownCases) && $knownCases->count() > 0)
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
      <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#knownCaseCreationModal">
        <div class="bg-white border shadow me-1 mb-1 floating-add-button p-2 d-flex align-items-center justify-content-center hide-on-wide-screen">
          <h3 class="m-0 p-0"><i class="bi bi-plus-lg"></i></h3>
        </div>
      </a>
    </div>
  </div>
@endsection
