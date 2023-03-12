<!-- BEGIN Content Area -->
@extends('layouts.my-dashboard')
@section('my-top-nav')
@include('components.my-button-sized-separator-button')
<form>
  <div class="ms-2 bd-highlight"><button class="btn" type="submit" title="Tambah kasus baru"><i class="bi-plus-lg"></i> <span class="ms-2 hide-on-small-screen">Tambah</span></a></div>
  @endsection
  @section('my-content-area')
  <div class="row">
    <div class="col-sm-4">
      <h5>Gejala</h5>
      <div class="rounded border border-bottom-0">
        <table class="table table-striped align-middle">
          <tr>
            <th style="width: 1%"></th>
            <th style="width: 1%">Id.</th>
            <th>Nama</th>
          </tr>
          @foreach ($symptoms as $symptom)
          <tr>
            <td><input type="checkbox" name="symptoms[]" value="{{ $symptom->id }}"></td>
            <td>{{ $symptom->id }}</td>
            <td>{{ $symptom->name }}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
    <div class="col-sm-4">
      <h5>Penyakit</h5>
      <div class="rounded border border-bottom-0">
        <table class="table table-striped align-middle">
          <tr>
            <th style="width: 1%"></th>
            <th style="width: 1%">Id.</th>
            <th>Nama</th>
          </tr>
          @foreach ($diseases as $disease)
          <tr>
            <td><input type="radio" name="disease" value="{{ $disease->id }}"></td>
            <td>{{ $disease->id }}</td>
            <td>{{ $disease->name }}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
    <div class="col-sm-4">
      <h5>Solusi</h5>
      <div class="rounded border border-bottom-0">
        <table class="table table-striped align-middle">
          <tr>
            <th style="width: 1%"></th>
            <th style="width: 1%">Id.</th>
            <th>Nama</th>
          </tr>
          @foreach ($solutions as $solution)
          <tr>
            <td><input type="checkbox" name="solutions[]" value="{{ $solution->id }}"></td>
            <td>{{ $solution->id }}</td>
            <td>{{ $solution->name }}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
  <form>
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
    @endsection