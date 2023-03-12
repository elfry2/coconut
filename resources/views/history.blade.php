<!-- BEGIN Content Area -->
@extends('layouts.my-dashboard')
@section('my-top-nav')
  <!-- BEGIN item creation button -->
  <div class="ms-2 bd-highlight"><a href="#" class="btn" title="Tambah riwayat keluar-masuk baru" data-bs-toggle="modal" data-bs-target="#historyCreationModal"><i class="bi-plus-lg"></i> <span class="ms-2 hide-on-small-screen">Tambah</span></a></div>
  <!-- BEGIN item creation modal -->
  <div class="modal fade" id="historyCreationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah riwayat keluar-masuk "{{ $item->name }}"</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('history.create') }}">
            <div class="row">
              <div class="col-sm-8">
                <div class="mb-3">
                  <input type="date" class="form-control" id="historyDateDateInput" value="{{ date('Y-m-d') }}" name="date" required>
                </div>
              </div>
              <div class="col-sm">
                <div class="mb-3">
                  <input type="time" step="any" class="form-control" id="historyTimeTimeInput" value="{{ date('H:i:s') }}" name="time" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="mb-3">
                  <label for="historyQuantityOutTextInput" class="form-label">Keluar</label>
                  <input type="number" class="form-control" id="historyQuantityOutTextInput" onchange="document.getElementById('historyDescriptionTextArea').innerHTML = 'Keluar'" value="0" min="0" name="quantityOut" required>
                </div>
              </div>
              <div class="col-sm">
                <div class="mb-3">
                  <label for="historyQuantityInTextInput" class="form-label">Masuk</label>
                  <input type="number" class="form-control" id="historyQuantityInTextInput" onchange="document.getElementById('historyDescriptionTextArea').innerHTML = 'Masuk'" value="0" min="0" name="quantityIn" required>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="historyPersonInChargeTextInput" class="form-label">Penanggung-jawab</label>
              <input type="text" class="form-control" id="historyPersonInChargeTextInput" value="{{ Auth::user()->name }}" name="personInCharge" required>
            </div>
            <div class="mb-3">
              <label for="historyDescriptionTextArea" class="form-label">Keterangan</label>
              <textarea class="form-control task-description-text-area" name="description" id="historyDescriptionTextArea"></textarea>
            </div>
            <input type="hidden" name="itemId" value="{{ $itemId }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary"><i class="bi-plus-lg me-2"></i>Tambah</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END item creation modal -->
  <!-- END item creation button -->
  <div class="ms-2 bd-highlight"><a href="{{ route('preference.set', ['name'=>'currentHistoryOrder', 'value'=>($currentHistoryOrder == 'desc' ? 'asc' : 'desc')]).'?redirect='.route('history.index', ['id'=>$itemId]) }}" class="btn" title="Urutkan menurut tanggal dari yang {{ ($currentHistoryOrder == 'desc' ? 'terlama' : 'terbaru') }}"><i class="bi-sort-numeric-down{{ ($currentHistoryOrder == 'desc' ? '' : '-alt') }}"></i></a></div>
  <div class="ms-2 bd-highlight"><a href="#" class="btn" title="Saring menurut tanggal" data-bs-toggle="modal" data-bs-target="#filtrationByDateModal"><i class="bi-calendar-range"></i></a></div>
  <!-- BEGIN filtration by date modal -->
  <div class="modal fade" id="filtrationByDateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Saring menurut tanggal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-sm">
                <div class="mb-3">
                  <label for="fromDateDateInput" class="form-label">Dari</label>
                  <input type="date" class="form-control" id="fromDateDateInput" name="from" value="{{ $dateRange[0] ?? (new DateTime())->setTimestamp(0)->format('Y-m-d') }}" required>
                </div>
              </div>
              <div class="col-sm">
                <div class="mb-3">
                  <label for="toDateDateInput" class="form-label">Hingga</label>
                  <input type="date" class="form-control" id="toDateDateInput" name="to" value="{{ $dateRange[1] ?? date('Y-m-d') }}" required>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <a class="btn" href="{{ route('preference.reset', ['name'=>'dateRange']).'?redirect='.route('history.index', ['id'=>$item->id]) }}">Clear</a>
          <button onclick="window.location.href = '/preference/dateRange/'+ encodeURI(document.getElementById('fromDateDateInput').value) + encodeURI(';') + encodeURI(document.getElementById('toDateDateInput').value) + '?redirect={{ route('history.index', ['id'=>$item->id]) }}'" class="btn btn-primary"><i class="bi-funnel me-2"></i>Saring</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END filtration by date modal -->
  @include('components.my-pagination-buttons')
@endsection
@section('my-content-area')
  @if (!isset($history) || $history->count() < 1)
    <center class="center">
      <h3 class="text-muted mx-2">
        Belum ada riwayat. Tekan tombol <b><i class="bi-plus-lg"></i> <span class="hide-on-small-screen">Tambah</span></b> untuk membuat riwayat baru.
    </h3></center>
  @else
    <div class="rounded border border-bottom-0">
      <table class="table table-striped align-middle">
        <tr>
          <th>No.</th>
          <th>Tanggal</th>
          <th>Masuk</th>
          <th>Keluar</th>
          <th>Stok setelah</th>
          <th>Penanggung-jawab</th>
          <th>Keterangan</th>
          <th></th>
        </tr>
        @php
          $i = 1;
          if (isset($_GET['page']) && $_GET['page'] > 1) {
            $i = ((($_GET['page'] ?? 1)-1)*($maxRecordPerPage ?? 1)) + 1;
          }
        @endphp
        @foreach ($history as $entry)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ date_format(date_create($entry->created_at), 'Y/m/d H:i:s') }}</td>
            <td>{{ $entry->quantity_in }}</td>
            <td>{{ $entry->quantity_out }}</td>
            <td>{{ $entry->stock_after }}</td>
            <td>{{ $entry->person_in_charge }}</td>
            <td>{{ $entry->description }}</td>
            <td align="right">
              <div class="dropdown">
                @if (Auth::user()->role == 'admin' || $entry->person_in_charge == Auth::user()->name)
                  <a class="btn" href="#" id="history{{ $entry->id }}DropdownMenuLink" data-bs-toggle="dropdown"><i class="bi-three-dots-vertical"></i></a>
                @endif
                @php
                  $i++;
                @endphp
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#history{{ $entry->id }}ModificationModal"><i class="bi-pencil-square me-2"></i>Sunting rincian</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#history{{ $entry->id }}DeletionModal"><i class="bi-trash me-2"></i>Hapus</a></li>
                </ul>
              </div>
            </td>
          </tr>
          <!-- BEGIN entry {{ $entry->id }} deletion modal -->
          <div class="modal fade" id="history{{ $entry->id }}DeletionModal" aria-labelledby="history{{ $entry->id }}DeletionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="history{{ $entry->id }}DeletionModalLabel">Hapus riwayat keluar-masuk?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Menghapus riwayat akan memengaruhi jumlah stok barang terkait.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                  <a href="{{ route('history.delete', ['id'=>$entry->id]) }}" class="btn btn-danger"><i class="bi bi-trash me-2"></i>Hapus</a>
                </div>
              </div>
            </div>
          </div>
          <!-- END entry {{ $item->id }} deletion modal -->
          <!-- BEGIN entry {{ $item->id }} modification modal -->
          <div class="modal fade" id="history{{ $entry->id }}ModificationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="history{{ $entry->id }}ModalLabel">Sunting riwayat keluar-masuk "{{ $item->name }}"</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('history.edit', ['id'=>$entry->id]) }}">
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="mb-3">
                          <input type="date" class="form-control" id="history{{ $entry->id }}DateDateInput" value="{{ date_format(date_create($entry->created_at), "Y-m-d") }}" name="date" required>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="mb-3">
                          <input type="time" step="any" class="form-control" id="history{{ $entry->id }}TimeTimeInput" value="{{ date_format(date_create($entry->created_at), 'H:i:s') }}" name="time" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm">
                        <div class="mb-3">
                          <label for="history{{ $entry->id }}QuantityOutTextInput" class="form-label">Keluar</label>
                          <input type="number" class="form-control" id="history{{ $entry->id }}QuantityOutTextInput" onchange="document.getElementById('history{{ $entry->id }}DescriptionTextArea').innerHTML = 'Keluar'" value="{{ $entry->quantity_out }}" min="0" name="quantityOut" required>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="mb-3">
                          <label for="history{{ $entry->id }}QuantityInTextInput" class="form-label">Masuk</label>
                          <input type="number" class="form-control" id="history{{ $entry->id }}QuantityInTextInput" onchange="document.getElementById('history{{ $entry->id }}DescriptionTextArea').innerHTML = 'Masuk'" value="{{ $entry->quantity_in }}" min="0" name="quantityIn" required>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="history{{ $entry->id }}PersonInChargeTextInput" class="form-label">Penanggung-jawab</label>
                      <input type="text" class="form-control" id="history{{ $entry->id }}PersonInChargeTextInput" value="{{ $entry->person_in_charge }}" name="personInCharge" required>
                    </div>
                    <div class="mb-3">
                      <label for="history{{ $entry->id }}DescriptionTextArea" class="form-label">Keterangan</label>
                      <textarea class="form-control task-description-text-area" name="description" id="history{{ $entry->id }}DescriptionTextArea"></textarea>
                    </div>
                    <input type="hidden" name="itemId" value="{{ $itemId }}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary"><i class="bi-pencil-square me-2"></i>Sunting</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END item creation modal -->
        @endforeach
      </table>
    </div>

  @endif
@endsection

@section('my-bottom-nav')
  @if (isset($history) && $history->count() > 0)
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
      <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#itemCreationModal">
        <div class="bg-white border shadow me-1 mb-1 floating-add-button p-2 d-flex align-items-center justify-content-center hide-on-wide-screen">
          <h3 class="m-0 p-0"><i class="bi bi-plus-lg"></i></h3>
        </div>
      </a>
    </div>
  </div>
@endsection
