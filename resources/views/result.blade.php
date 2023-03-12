@extends('layouts.my-front')
@section('my-content-area')
    <div class="card mt-5 shadow-sm">
        <div class="card-body my-2">
            <div class="row align-items-center">
                <div class="col-sm-10">
                    <p class="mb-0">Diagnosis:</p>
                    <h1>{{ $diagnosis->disease->name }}</h1>
                    <p>Kemiripan: {{ $diagnosis->similarity }}</p>
                </div>
                <div class="col-sm">
                    <button onclick="window.print()" class="btn btn-primary no-print"><i class="bi-printer me-2"></i>Cetak</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <h5>Gejala diagnosis:</h5>
            <ul>
                @foreach ($diagnosis->symptoms as $symptom)
                    <li>{{ $symptom->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col">
            <h5>Gejala yang diberikan:</h5>
            <ul>
                @foreach ($givenSymptoms as $symptom)
                    <li>{{ $symptom->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <h5 class="mt-5">Solusi yang disarankan:</h5>
    <ul>
        @foreach ($diagnosis->solutions as $solution)
            <li>{{ $solution->name }}</li>
        @endforeach
    </ul>
    <a href="{{ route('root') }}" class="mt-5 btn no-print"><i class="bi-chevron-left me-2"></i>Kembali</a>
@endsection
