<!-- BEGIN Content Area -->
@extends('layouts.my-dashboard')
@section('my-top-nav')
  @include('components.my-button-sized-separator-button')

  <!-- BEGIN solution creation button -->
  <div class="ms-2 bd-highlight"><a href="#" class="btn" title="Tambah solusi baru" data-bs-toggle="modal" data-bs-target="#solutionCreationModal"><i class="bi-plus-lg"></i> <span class="ms-2 hide-on-small-screen">Tambah</span></a></div>
  <!-- BEGIN solution creation modal -->
  <div class="modal fade" id="solutionCreationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah solusi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('solution.create') }}">
            <div class="mb-3">
              <label for="solutionNameTextInput" class="form-label">Nama</label>
              <input type="text" class="form-control" id="solutionNameTextInput" name="name" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary"><i class="bi-plus-lg me-2"></i>Tambah</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END solution creation modal -->
  <!-- END solution creation button -->
  @include('components.my-search-button')
  @include('components.my-pagination-buttons')
@endsection
@section('my-content-area')
  @if (!isset($solutions) || $solutions->count() < 1)
    <center class="center">
      <h3 class="text-muted mx-2">
        Belum ada solusi. Tekan tombol <b><i class="bi-plus-lg"></i> <span class="hide-on-small-screen">Tambah</span></b> untuk membuat solusi baru.
    </h3></center>
  @else
    <div class="rounded border border-bottom-0">
      <table class="table table-striped align-middle">
        <tr>
          <th style="width: 1%">Id.</th>
          <th>Nama</th>
          <th></th>
        </tr>
        @php
          $i = 1;
          if (isset($_GET['page']) && $_GET['page'] > 1) {
            $i = ((($_GET['page'] ?? 1)-1)*($maxRecordPerPage ?? 1)) + 1;
          }
        @endphp
        @foreach ($solutions as $solution)
          <tr>
            <td>{{ $solution->id }}</td>
            <td>{{ $solution->name }}</td>
            <td align="right">
              <div class="dropdown">
                <a class="btn" href="#" id="solution{{ $solution->id }}DropdownMenuLink" data-bs-toggle="dropdown"><i class="bi-three-dots-vertical"></i></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#solution{{ $solution->id }}ModificationModal"><i class="bi-pencil-square me-2"></i>Sunting rincian</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#solution{{ $solution->id }}DeletionModal"><i class="bi-trash me-2"></i>Hapus</a></li>
                </ul>
              </div>
            </td>
          </tr>
          <!-- BEGIN solution {{ $solution->id }} modification modal -->
          <div class="modal fade" id="solution{{ $solution->id }}ModificationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModal{{ $solution->id }}Label">Sunting rincian solusi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('solution.edit', ['id'=>$solution->id]) }}">
                    <div class="mb-3">
                      <label for="solution{{ $solution->id }}NameTextInput" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="solution{{ $solution->id }}NameTextInput" name="name" value="{{ $solution->name }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary"><i class="bi-pencil-square me-2"></i>Sunting</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END solution modification modal -->
          <!-- END solution modification button -->
          <!-- BEGIN solution {{ $solution->id }} deletion modal -->
          <div class="modal fade" id="solution{{ $solution->id }}DeletionModal" aria-labelledby="solution{{ $solution->id }}DeletionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="solution{{ $solution->id }}DeletionModalLabel">Hapus solusi "{{ $solution->name }}"?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Menghapus solusi tidak mengurutkan kembali kode solusi.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                  <a href="{{ route('solution.delete', ['id'=>$solution->id]) }}" class="btn btn-danger"><i class="bi bi-trash me-2"></i>Hapus</a>
                </div>
              </div>
            </div>
          </div>
          <!-- END solutions {{ $solution->id }} deletion modal -->
          @endforeach
      </table>
    </div>

  @endif
@endsection

@section('my-bottom-nav')
  @if (isset($solutions) && $solutions->count() > 0)
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
      <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#solutionCreationModal">
        <div class="bg-white border shadow me-1 mb-1 floating-add-button p-2 d-flex align-items-center justify-content-center hide-on-wide-screen">
          <h3 class="m-0 p-0"><i class="bi bi-plus-lg"></i></h3>
        </div>
      </a>
    </div>
  </div>
@endsection
