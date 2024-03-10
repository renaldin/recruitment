@extends('layout.main')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$title}}</h5>
                    <a href="/tambah-lowongan-pekerjaan" class="btn btn-primary my-2">Tambah</a>
                    <div class="table-responsive">
                        <table class="table datatable table-responsive">
                            @if (session('success'))
                                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Posisi Pekerjaan</th>
                                    <th>Jumlah Karyawan</th>
                                    <th>Gaji</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($daftarPekerjaan as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->position_name}}</td>
                                        <td>{{$item->number_of_employees}}</td>
                                        <td>Rp. {{number_format($item->salary)}}</td>
                                        <td>
                                            <a href="/detail-lowongan-pekerjaan/{{$item->id}}" class="btn btn-primary"><i class="bi bi-justify"></i></a>
                                            <a href="/edit-lowongan-pekerjaan/{{$item->id}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <button type="button" data-href="/hapus-lowongan-pekerjaan/{{$item->id}}" data-content="Apakah Anda yakin akan hapus data ini ?" class="btn btn-danger btn-delete"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection