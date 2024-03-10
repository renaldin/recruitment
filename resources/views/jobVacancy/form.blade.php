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
                <form class="row g-3" action="@if($form == 'Tambah') /tambah-lowongan-pekerjaan @elseif($form == 'Edit') /edit-lowongan-pekerjaan/{{$detail->id}} @endif" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul..." @if($form == 'Tambah')value="{{old('title')}}"@elseif($form == 'Edit' || $form == 'Detail')value="{{$detail->title}}"@endif @if($form == 'Detail') disabled @endif>
                    <div class="text-danger">
                        @error('title')
                        {{ $message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="position_name" class="form-label">Posisi Perkerjaan</label>
                    <input type="text" class="form-control" id="position_name" name="position_name" placeholder="Masukkan Posisi Pekerjaan..." @if($form == 'Tambah')value="{{old('position_name')}}"@elseif($form == 'Edit' || $form == 'Detail')value="{{$detail->position_name}}"@endif @if($form == 'Detail') disabled @endif>
                    <div class="text-danger">
                        @error('position_name')
                        {{ $message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="salary" class="form-label">Gaji</label>
                    <input type="number" class="form-control" id="salary" name="salary" placeholder="Masukkan Gaji..." @if($form == 'Tambah')value="{{old('salary')}}"@elseif($form == 'Edit' || $form == 'Detail')value="{{$detail->salary}}"@endif @if($form == 'Detail') disabled @endif>
                    <div class="text-danger">
                        @error('salary')
                        {{ $message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="number_of_employees" class="form-label">Jumlah Karyawan Yang Dibutuhkan</label>
                    <input type="number" class="form-control" id="number_of_employees" name="number_of_employees" placeholder="Masukkan Jumlah Karyawan..." @if($form == 'Tambah')value="{{old('number_of_employees')}}"@elseif($form == 'Edit' || $form == 'Detail')value="{{$detail->number_of_employees}}"@endif @if($form == 'Detail') disabled @endif>
                    <div class="text-danger">
                        @error('number_of_employees')
                        {{ $message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" id="editor1" cols="10" rows="5" placeholder="Masukkan Deskripsi..." @if($form == 'Detail') disabled @endif>@if($form == 'Tambah'){{old('description')}}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->description}}@endif</textarea>
                    <div class="text-danger">
                        @error('description')
                        {{ $message}}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="qualification" class="form-label">Kualifikasi</label>
                    <textarea class="form-control" name="qualification" id="editor2" cols="10" rows="5" placeholder="Masukkan Kualifikasi..." @if($form == 'Detail') disabled @endif>@if($form == 'Tambah'){{old('qualification')}}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->qualification}}@endif</textarea>
                    <div class="text-danger">
                        @error('qualification')
                        {{ $message}}
                        @enderror
                    </div>
                </div>
                @include('components.buttonForm', ['back' => '/lowongan-pekerjaan'])
                </form>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection