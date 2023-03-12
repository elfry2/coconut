<!-- BEGIN Content Area -->
@extends('layouts.my-dashboard')
@section('my-top-nav')
  @include('components.my-button-sized-separator-button')
  <!-- BEGIN disease creation button -->
  <div class="ms-2 bd-highlight"><a href="#" class="btn" title="Tambah penyakit baru" data-bs-toggle="modal" data-bs-target="#diseaseCreationModal"><i class="bi-plus-lg"></i> <span class="ms-2 hide-on-small-screen">Tambah</span></a></div>
  <!-- BEGIN disease creation modal -->
  <div class="modal fade" id="diseaseCreationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah penyakit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('disease.create') }}">
            <div class="mb-3">
              <label for="diseaseNameTextInput" class="form-label">Nama</label>
              <input type="text" class="form-control" id="diseaseNameTextInput" name="name" required>
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
  <!-- END disease creation modal -->
  <!-- END disease creation button -->
  @include('components.my-search-button')
  @include('components.my-pagination-buttons')
@endsection
@section('my-content-area')
  @if (!isset($diseases) || $diseases->count() < 1)
    <center class="center">
      <h3 class="text-muted mx-2">
        Belum ada penyakit. Tekan tombol <b><i class="bi-plus-lg"></i> <span class="hide-on-small-screen">Tambah</span></b> untuk membuat penyakit baru.
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
        @foreach ($diseases as $disease)
          <tr>
            <td>{{ $disease->id }}</td>
            <td>{{ $disease->name }}</td>
            <td align="right">
              <div class="dropdown">
                <a class="btn" href="#" id="disease{{ $disease->id }}DropdownMenuLink" data-bs-toggle="dropdown"><i class="bi-three-dots-vertical"></i></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disease{{ $disease->id }}ModificationModal"><i class="bi-pencil-square me-2"></i>Sunting rincian</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disease{{ $disease->id }}DeletionModal"><i class="bi-trash me-2"></i>Hapus</a></li>
                </ul>
              </div>
            </td>
          </tr>
          <!-- BEGIN disease {{ $disease->id }} modification modal -->
          <div class="modal fade" id="disease{{ $disease->id }}ModificationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModal{{ $disease->id }}Label">Sunting rincian penyakit</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('disease.edit', ['id'=>$disease->id]) }}">
                    <div class="mb-3">
                      <label for="disease{{ $disease->id }}NameTextInput" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="disease{{ $disease->id }}NameTextInput" name="name" value="{{ $disease->name }}" required>
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
          <!-- END disease modification modal -->
          <!-- END disease modification button -->
          <!-- BEGIN disease {{ $disease->id }} deletion modal -->
          <div class="modal fade" id="disease{{ $disease->id }}DeletionModal" aria-labelledby="disease{{ $disease->id }}DeletionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="disease{{ $disease->id }}DeletionModalLabel">Hapus penyakit "{{ $disease->name }}"?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Menghapus penyakit tidak mengurutkan kembali kode penyakit.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                  <a href="{{ route('disease.delete', ['id'=>$disease->id]) }}" class="btn btn-danger"><i class="bi bi-trash me-2"></i>Hapus</a>
                </div>
              </div>
            </div>
          </div>
          <!-- END diseases {{ $disease->id }} deletion modal -->
          @endforeach
      </table>
    </div>

  @endif
@endsection

@section('my-bottom-nav')
  @if (isset($diseases) && $diseases->count() > 0)
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
      <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#diseaseCreationModal">
        <div class="bg-white border shadow me-1 mb-1 floating-add-button p-2 d-flex align-items-center justify-content-center hide-on-wide-screen">
          <h3 class="m-0 p-0"><i class="bi bi-plus-lg"></i></h3>
        </div>
      </a>
    </div>
  </div>
@endsection
