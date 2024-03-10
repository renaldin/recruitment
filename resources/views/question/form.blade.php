@extends('layout.main')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">{{$subTitle}}</h3>
            </div>
            <div class="card-body">
                <form class="row g-3" action="@if($form == 'Tambah') /tambah-bank-soal @elseif($form == 'Edit') /edit-bank-soal/{{$detail->id}} @endif" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="type" class="form-label">Tipe Pertanyaan</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Masukkan Tipe Pertanyaan..." @if($form == 'Tambah')value="{{old('type')}}"@elseif($form == 'Edit' || $form == 'Detail')value="{{$detail->type}}"@endif @if($form == 'Detail') disabled @endif>
                    <div class="text-danger">
                        @error('type')
                        {{ $message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="question" class="form-label">Pertanyaan</label>
                    <input type="text" class="form-control" id="question" name="question" placeholder="Masukkan Pertanyaan..." @if($form == 'Tambah')value="{{old('question')}}"@elseif($form == 'Edit' || $form == 'Detail')value="{{$detail->question}}"@endif @if($form == 'Detail') disabled @endif>
                    <div class="text-danger">
                        @error('question')
                        {{ $message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="bobot" class="form-label">Bobot</label>
                    <input type="number" class="form-control" id="bobot" name="bobot" placeholder="Masukkan Bobot..." @if($form == 'Tambah')value="{{old('bobot')}}"@elseif($form == 'Edit' || $form == 'Detail')value="{{$detail->bobot}}"@endif @if($form == 'Detail') disabled @endif>
                    <div class="text-danger">
                        @error('bobot')
                        {{ $message}}
                        @enderror
                    </div>
                </div>
                @include('components.buttonForm', ['back' => '/bank-soal'])
                </form>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection