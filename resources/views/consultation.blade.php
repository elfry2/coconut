@extends('layouts.my-front')
@section('my-content-area')
    <a class="mt-5 btn" href="{{ route('root') }}"><i class="bi-chevron-left me-2"></i>Kembali</a>
    <h5 class="mt-4">Mohon centang semua gejala yang ditemukan.</h5>
    <div class="mt-4">
        <form action="{{ route('consultation.result') }}" method="POST">
            @csrf
            @foreach ($symptoms as $symptom)
                <div class="card p-3 mt-2 shadow-sm">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="symptoms[]"
                            id="symptom{{ $symptom->id }}CheckBoxInput" value="{{ $symptom->id }}">
                        <label class="form-check-label" for="symptom{{ $symptom->id }}CheckBoxInput">
                            {{ $symptom->name }}
                        </label>
                    </div>
                </div>
            @endforeach
            <div class="d-flex flex-row-reverse">
                <button class="mt-5 btn btn-primary" type="submit"><i class="bi-send me-2"></i>Dapatkan diagnosis</button>
            </div>
        </form>
    </div>
@endsection
