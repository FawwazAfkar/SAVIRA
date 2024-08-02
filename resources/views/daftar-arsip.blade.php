@extends('layouts.app')


@section('content')
<div class="custom-container bg-white p-4 rounded">
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12 m-2 text-center">
                <div class="d-flex justify-content-between">
                    <h2 class="text-xl font-semibold leading-tight">{{ __('DAFTAR ARSIP VITAL') }}</h2>
                    @can('createArsips')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputArsip">
                        <i class='bx bxs-folder-plus'></i>
                        <span>Tambah Arsip</span>
                    </button>
                    @endcan
                </div>
            </div>

            {{-- Call Modal --}}
            <x-arsip.create />

            {{-- Call Alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            {{-- Arsip Vital Table --}}
            <table id="dataarsip" class="table table-responsive table-bordered table-striped display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Arsip</th>
                        <th>Tingkat Perkembangan</th>
                        <th>Kurun Waktu</th>
                        <th>Media</th>
                        <th id="jumlah">Jumlah</th>
                        <th>Jangka Simpan</th>
                        <th>Metode Perlindungan</th>
                        <th>Lokasi Simpan</th>
                        <th>Keterangan</th>
                        @hasrole('SuperAdmin')<th>Instansi</th>@endhasrole
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
                            @hasrole('SuperAdmin')<td>{{ $arsip->instansi->nama_instansi }}</td>@endhasrole
                            <td>
                                <!-- Button Aksi -->
                                <div class="d-flex gap-2 justify-content-between">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewArsip{{ $arsip->id }}"><i class='bx bx-info-circle'></i></button>
                                    @can('editArsips')
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateArsip{{ $arsip->id }}"><i class='bx bx-edit'></i></button>
                                    @endcan
                                    @can('deleteArsips')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteArsip{{ $arsip->id }}"><i class='bx bx-trash'></i></button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        <!-- Tempat Naruh Modal/Routes for Aksi -->
                        <x-arsip.view :arsip="$arsip" :show="false"/>
                        <x-arsip.update :arsip="$arsip"/>
                        <x-arsip.delete :arsip="$arsip"/>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
