@extends('layouts.app')


@section('content')
<div class="container bg-white p-4 rounded">
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12 m-2 text-center">
                <div class="d-flex justify-content-between">
                    <h2 class="text-xl font-semibold leading-tight">{{ __('DAFTAR ARSIP VITAL') }}</h2>
                    <a href="#" class="btn btn-primary d-flex justify-content-center">{{ __('Tambah Data') }}</a>
                </div>
            </div>

            <table id="data" class="table table-responsive table-bordered table-striped display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Arsip</th>
                        <th>Tingkat Perkembangan</th>
                        <th>Kurun Waktu</th>
                        <th>Media</th>
                        <th>Jumlah</th>
                        <th>Jangka Simpan</th>
                        <th>Metode Perlindungan</th>
                        <th>Lokasi Simpan</th>
                        <th>Keterangan</th>
                        <th>Instansi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @php $no = 1; @endphp
                        @foreach ($arsips as $arsip)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $arsip->jenis_arsip }}</td>
                            <td>{{ $arsip->tingkat_perkembangan }}</td>
                            <td>{{ $arsip->kurun_waktu }}</td>
                            <td>{{ $arsip->media }}</td>
                            <td>{{ $arsip->jumlah }}</td>
                            <td>{{ $arsip->jangka_simpan }}</td>
                            <td>{{ $arsip->metode_perlindungan }}</td>
                            <td>{{ $arsip->lokasi_simpan }}</td>
                            <td>{{ $arsip->keterangan }}</td>
                            <td>{{ $arsip->instansi->nama_instansi }}</td>
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
