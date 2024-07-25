@extends('layouts.app')


@section('content')
<div class="container bg-white p-4 rounded">
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12 m-2 text-center">
                <div class="d-flex justify-content-between">
                    <h2 class="text-xl font-semibold leading-tight">{{ __('DAFTAR INSTANSI') }}</h2>
                    <a href="#" class="btn btn-primary d-flex justify-content-center">{{ __('Tambah Data') }}</a>
                </div>
            </div>

            <table id="data" class="table table-responsive table-bordered table-striped display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Instansi</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @php $no = 1; @endphp
                        @foreach ($instansis as $instansi)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $instansi->nama_instansi }}</td>
                            <td>{{ $instansi->alamat }}</td>
                            <td>{{ $instansi->telepon }}</td>
                            <td class="d-flex gap-2 justify-content-center">
                               <!-- Button Aksi -->
                                <a href="#" class="btn btn-primary"><i class='bx bx-info-circle'></i></a>
                                <a href="#" class="btn btn-warning"><i class='bx bx-edit'></i></a>
                                <a href="#" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                            </td>
                        </tr>
                        <!-- Tempat Naruh Modal/Routes for Aksi -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
