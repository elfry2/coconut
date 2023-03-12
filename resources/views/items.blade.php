<!-- BEGIN Content Area -->
@extends('layouts.my-dashboard')
@section('my-top-nav')
  <div class="btn-group">
    @foreach ($itemCategories as $itemCategory)
      @if (strtolower($currentItemsCategory) != 'rumah tangga' && strtolower($itemCategory) != 'rumah tangga')
        <a class="btn @if(isset($currentItemsCategory) && $currentItemsCategory == $itemCategory) {{ 'btn-dark' }} @else {{ 'btn-outline-dark' }} @endif" href="{{ route('preference.set', ['name'=>'currentItemsCategory', 'value'=>urlencode($itemCategory)]).'?redirect='.route('item.index') }}">{{ $itemCategory }}</a>
      @endif
    @endforeach
  </div>
  @include('components.my-button-sized-separator-button')

  <!-- BEGIN item creation button -->
  @if(Auth::user()->role == 'admin')<div class="ms-2 bd-highlight"><a href="#" class="btn" title="Tambah barang baru" data-bs-toggle="modal" data-bs-target="#itemCreationModal"><i class="bi-plus-lg"></i> <span class="ms-2 hide-on-small-screen">Tambah</span></a></div>@endif
  <!-- BEGIN item creation modal -->
  <div class="modal fade" id="itemCreationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('item.create') }}">
            <div class="mb-3">
              <label for="itemNameTextInput" class="form-label">Nama</label>
              <input type="text" class="form-control" id="itemNameTextInput" name="name" required>
            </div>
            <div class="mb-3">
              <label for="itemCategoryTextInput" class="form-label">Kategori</label>
              <input type="text" class="form-control" id="itemCategoryTextInput" name="category" value="{{ $currentItemsCategory }}" required>
              @foreach ($itemCategories as $itemCategory)
                <small><a href="#" class="text-decoration-none me-2" onclick="document.getElementById('itemCategoryTextInput').value='{{ $itemCategory }}'">{{ $itemCategory }}</a></small>
              @endforeach
            </div>
            <div class="mb-3">
              <label for="itemUnitTextInput" class="form-label">Satuan</label>
              <input type="text" class="form-control" id="itemUnitTextInput" name="unit" onkeyup="this.value=this.value.toLowerCase()" required>
              @foreach ($units as $unit)
                <small><a href="#" class="text-decoration-none me-2" onclick="document.getElementById('itemUnitTextInput').value='{{ $unit }}'">{{ $unit }}<a></small>
              @endforeach
            </div>
            <div class="mb-3">
              <label for="itemPriceTextInput" class="form-label">Harga ({{ env('APP_CURRENCY') }})</label>
              <input type="number" min="0" class="form-control" id="itemPriceTextInput" name="price" required>
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
  <!-- END item creation modal -->
  <!-- END item creation button -->
  @include('components.my-search-button')
  <div class="ms-2 bd-highlight"><a href="{{ route('preference.set', ['name'=>'currentItemsOrder', 'value'=>($currentItemsOrder == 'desc' ? 'asc' : 'desc')]).'?redirect='.route('item.index') }}" class="btn" title="Urutkan menurut nama dari {{ ($currentItemsOrder == 'desc' ? 'A ke Z' : 'Z ke A') }}"><i class="bi-sort-alpha-down{{ ($currentItemsOrder == 'asc' ? '-alt' : '') }}"></i></a></div>
  <div class="ms-2 bd-highlight"><a href="#" class="btn" title="Buat spreadsheet laporan" data-bs-toggle="modal" data-bs-target="#generateReportModal"><i class="bi-file-earmark-spreadsheet"></i></a></div>
  <!-- BEGIN generate report modal -->
  <div class="modal fade" id="generateReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buat spreadsheet laporan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('item.generateReport') }}">
            <div class="row">
              <div class="col-sm">
                <div class="mb-3">
                  <label for="fromDateDateInput" class="form-label">Dari</label>
                  <input type="date" class="form-control" id="fromDateDateInput" name="fromDate" value="{{ date('Y-m-d', strtotime('last month')) }}" required>
                </div>
              </div>
              <div class="col-sm">
                <div class="mb-3">
                  <label for="toDateDateInput" class="form-label">Hingga</label>
                  <input type="date" class="form-control" id="toDateDateInput" name="toDate" value="{{ date('Y-m-d') }}" required>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="itemsCategory" value="{{ $currentItemsCategory }}">
            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">Batal</button>
            <button type="submit" class="btn btn-primary"><i class="me-2 bi-file-earmark-spreadsheet"></i>Buat</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END filtration by date modal -->
  @include('components.my-pagination-buttons')
@endsection
@section('my-content-area')
  @if (!isset($items) || $items->count() < 1)
    <center class="center">
      <h3 class="text-muted mx-2">
        Belum ada barang. Tekan tombol <b><i class="bi-plus-lg"></i> <span class="hide-on-small-screen">Tambah</span></b> untuk membuat barang baru.
    </h3></center>
  @else
    <div class="rounded border border-bottom-0">
      <table class="table table-striped align-middle">
        <tr>
          <th>No.</th>
          <th>Nama</th>
          @if (!isset($currentItemsCategory))
          <th>Kategori</th>
          @endif
          <th>Stok</th>
          <th>Satuan</th>
          <th>Harga satuan ({{ env('APP_CURRENCY') }})</th>
          <th>Total harga ({{ env('APP_CURRENCY') }})</th>
          <th></th>
        </tr>
        @php
          $i = 1;
          if (isset($_GET['page']) && $_GET['page'] > 1) {
            $i = ((($_GET['page'] ?? 1)-1)*($maxRecordPerPage ?? 1)) + 1;
          }
        @endphp
        @foreach ($items as $item)
          <tr>
            <td>{{ $i++}}</td>
            <td>{{ $item->name }}</td>
            @if (!isset($currentItemsCategory))
            <td>{{ $item->category }}</td>
            @endif
            <td>{{ $item->stock }}</td>
            <td>{{ $item->unit }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->stock*$item->price }}</td>
            <td align="right">
              <div class="dropdown">
                <a class="btn" href="{{ route('history.index', ['id'=>$item->id]) }}"><i class="bi-arrow-left-right"></i></a>
                @if (Auth::user()->role == 'admin')
                  <a class="btn" href="#" id="item{{ $item->id }}DropdownMenuLink" data-bs-toggle="dropdown"><i class="bi-three-dots-vertical"></i></a>
                @endif
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="{{ route('history.index', ['id'=>$item->id]) }}"><i class="bi-arrow-left-right me-2"></i>Lihat riwayat keluar-masuk</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#item{{ $item->id }}ModificationModal"><i class="bi-pencil-square me-2"></i>Sunting rincian</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#item{{ $item->id }}DeletionModal"><i class="bi-trash me-2"></i>Hapus</a></li>
                </ul>
              </div>
            </td>
          </tr>
          <!-- BEGIN item {{ $item->id }} modification modal -->
          <div class="modal fade" id="item{{ $item->id }}ModificationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModal{{ $item->id }}Label">Sunting rincian barang</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('item.edit', ['id'=>$item->id]) }}">
                    <div class="mb-3">
                      <label for="item{{ $item->id }}NameTextInput" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="item{{ $item->id }}NameTextInput" name="name" value="{{ $item->name }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="item{{ $item->id }}CategoryTextInput" class="form-label">Kategori</label>
                      <input type="text" class="form-control" id="item{{ $item->id }}CategoryTextInput" name="category" value="{{ $item->category }}" required>
                      @foreach ($itemCategories as $itemCategory)
                        <small><a href="#" class="text-decoration-none me-2" onclick="document.getElementById('item{{ $item->id }}CategoryTextInput').value='{{ $itemCategory }}'">{{ $itemCategory }}</a></small>
                      @endforeach
                    </div>
                    <div class="mb-3">
                      <label for="item{{ $item->id }}UnitTextInput" class="form-label">Satuan</label>
                      <input type="text" class="form-control" id="item{{ $item->id }}UnitTextInput" name="unit" onkeyup="this.value=this.value.toLowerCase()" value="{{ $item->unit }}" required>
                      @foreach ($units as $unit)
                        <small><a href="#" class="text-decoration-none me-2" onclick="document.getElementById('item{{ $item->id }}UnitTextInput').value='{{ $unit }}'">{{ $unit }}<a></small>
                      @endforeach
                    </div>
                    <div class="mb-3">
                      <label for="item{{ $item->id }}PriceTextInput" class="form-label">Harga ({{ env('APP_CURRENCY') }})</label>
                      <input type="number" min="0" class="form-control" id="item{{ $item->id }}PriceTextInput" name="price" value="{{ $item->price }}" required>
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
          <!-- END item modification modal -->
          <!-- END item modification button -->
          <!-- BEGIN item {{ $item->id }} deletion modal -->
          <div class="modal fade" id="item{{ $item->id }}DeletionModal" aria-labelledby="item{{ $item->id }}DeletionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="item{{ $item->id }}DeletionModalLabel">Hapus barang "{{ $item->name }}"?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Menghapus barang akan menghapus semua entri riwayat keluar-masuk yang berkaitan dengan barang tersebut.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                  <a href="{{ route('item.delete', ['id'=>$item->id]) }}" class="btn btn-danger"><i class="bi bi-trash me-2"></i>Hapus</a>
                </div>
              </div>
            </div>
          </div>
          <!-- END items {{ $item->id }} deletion modal -->
          @endforeach
      </table>
    </div>

  @endif
@endsection

@section('my-bottom-nav')
  @if (isset($items) && $items->count() > 0)
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
